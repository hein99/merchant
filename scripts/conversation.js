$(document).ready(function(){
  getAllChatUsers();

});

function getAllChatUsers()
{
  $.ajax({
    method:"GET",
    url: PAGE_URL+'/conversation/get_all_chat_users',
    success: function(returnUserLists){
      for(userList of returnUserLists){
        $(buildUserList(userList.id, userList.username)).appendTo('#user-lists');
      }
    },
    dataType: 'json'
  }).done(function(){
    $('.messages-count-js').hide();
    $('.typing-js').hide();
    $('.active-now').hide();

    //request as soon as user lists were bulided
    getActiveUsers();
    getTypingUsers();
    getEachNewMessagesCount();

    //request after every 3 seconds
    setInterval(function(){
      getActiveUsers();
      getTypingUsers();
      getEachNewMessagesCount();
    }, 3000);
  });
}

function buildUserList(id, username)
{
  var list = '';
  list += '<li id="customer-' + id + '-js">';
  list += '<span class="customer-name-js">'+username+'</span>';
  list += '<span class="messages-count-js">0</span>';
  list += '<span class="typing-js">Typing...</span>';
  list += '<span class="active-now">Active now</span>';
  list += '</li>';
  return list;
}

function getActiveUsers()
{
  $.ajax({
    method:"GET",
    url: PAGE_URL+'/conversation/get_active_users',
    success: function(returnUserLists){
      $('.active-now').hide();
      for(id of returnUserLists){
        var parent = '#customer-' + id + '-js';
        $('.active-now', parent).show();
        // $(parent).prependTo('#user-lists');
      }
    },
    dataType: 'json'
  });
}

function getTypingUsers()
{
  $.ajax({
    method:"GET",
    url: PAGE_URL+'/conversation/get_typing_users',
    success: function(returnUserLists){
      $('.typing-js').hide();
      for(id of returnUserLists){
        var parent = '#customer-' + id + '-js';
        $('.typing-js', parent).show();
      }
    },
    dataType: 'json'
  });
}

function getEachNewMessagesCount()
{
  $.ajax({
    method:"GET",
    url: PAGE_URL+'/conversation/get_each_new_messages_count',
    success: function(returnUserLists){
      $('.messages-count-js').hide().html('0');
      for(userList of returnUserLists){
        var parent = '#customer-' + userList['from_user_id'] + '-js';
        $('.messages-count-js', parent).show().html(userList['messages_count']);
        $(parent).prependTo('#user-lists')
      }
    },
    dataType: 'json'
  });
}


// console.log(returnUserLists);
