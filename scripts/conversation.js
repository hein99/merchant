$(document).ready(function(){

// User Lists

  getAllChatUsers();

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
  list += '<li id="customer-' + id + '-js" class="start_chat" data-touserid="'+id+'" data-tousername="'+username+'">';
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
        $(parent).prependTo('#user-lists');
      }
    },
    dataType: 'json'
  });
}

// Message Lists
$(document).on('click', '.start_chat', function(){
  var to_user_id = $(this).data('touserid');
  var to_user_name = $(this).data('tousername');
  get_chat_history(to_user_id, to_user_name);
});

function makeChatBox(to_user_id, to_user_name)
{
  var content = '<div id="user_dialog_'+to_user_id+'" class="user_dialog" title="You have chat with '+to_user_name+'">';
  content += '<h4>You have chat with '+to_user_name;
  content += '</h4><div class="chat_history" data-touserid="'+to_user_id+'" id="chat_history_'+to_user_id+'"><ul>';
  // get_chat_history(to_user_id, to_user_name);
  content += '</ul></div>';
  content += '<div class="form-group">';
  content += '<textarea name="chat_message_'+to_user_id+'" id="chat_message_'+to_user_id+'" class="form-control chat_message"></textarea>';
  content += '<div class="image_upload"><form id="uploadImage" method="post" action="upload.php"><label for="uploadFile"></label><input type="file" name="uploadFile" id="uploadFile" accept=".jpg, .png" /></form></div>';
  content += '</div><div class="form-group" align="right">';
  content += '<button type="button" name="send_chat" id="'+to_user_id+'" class="btn btn-info send_chat">Send</button></div></div>';
  $('#user_model_details').html(content);
}

function get_chat_history(to_user_id, to_user_name)
{
  $.ajax({
    url: PAGE_URL+'/conversation/get_all_messages_by_customer_id/'+to_user_id,
    method: "GET",
    success: function(returnMessages){
      makeChatBox(to_user_id, to_user_name);
      var output = '';
      for(message of returnMessages){
        var user_name = '';
        var chat_style = '';
        var time_style = '';
        var message_list = '';
        if(message.from_user_id == ADMIN_ID)
        {
          message_list = message.messages;
          user_name = '<b class="from_user">You</b>';
          chat_style = 'from_user_chat_style';
          time_style = 'from_user_time_style';
        }else{
          message_list = message.messages;
          user_name = '<b class="to_user">'+to_user_name+'</b>';
          chat_style = 'to_user_chat_style';
          time_style = 'to_user_time_style';
        }
        output += '<li><div class=""><div class="'+chat_style+'"><p>'+user_name+' - '+message_list+'</p></div><div class="'+time_style+'"><small><em>'+message.arrived_time+'</em></small></div></div></li>';
      }
      $(output).appendTo("#chat_history_"+to_user_id+" ul");
    },
      dataType: 'json'
    }).done(function(){
      var element = document.getElementsByClassName("chat_history")[0];
      element.scrollTo(0,element.scrollHeight);

      setInterval(function(){
        get_new_message(to_user_id, to_user_name);
      }, 3000);

    });
  }
  function get_new_message(to_user_id, to_user_name)
  {
    $.ajax({
      url: PAGE_URL+'/conversation/get_new_messages_by_customer_id/'+to_user_id,
      method: "GET",
      success: function(returnMessages){
        if(returnMessages)
        {
          var output = '';
          for(message of returnMessages){
            var user_name = '';
            var chat_style = '';
            var time_style = '';
            var message_list = '';
            if(message.from_user_id == ADMIN_ID)
            {
              message_list = message.messages;
              user_name = '<b class="from_user">You</b>';
              chat_style = 'from_user_chat_style';
              time_style = 'from_user_time_style';
            }else{
              message_list = message.messages;
              user_name = '<b class="to_user">'+to_user_name+'</b>';
              chat_style = 'to_user_chat_style';
              time_style = 'to_user_time_style';
            }
            output += '<li><div class=""><div class="'+chat_style+'"><p>'+user_name+' - '+message_list+'</p></div><div class="'+time_style+'"><small><em>'+message.arrived_time+'</em></small></div></div></li>';
          }
          $(output).appendTo("#chat_history_"+to_user_id+" ul");
        }
      },
        dataType: 'json'
      }).done(function(){
        var element = document.getElementsByClassName("chat_history")[0];
        element.scrollTo(0,element.scrollHeight);
      });
  }
});
// console.log(returnUserLists);
