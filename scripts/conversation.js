$(document).ready(function(){
  getAllChatUsers();

  function getAllChatUsers()
  {
    $.get(PAGE_URL + "/conversation/get_all_chat_users", function(returnUserList){
      $.each(returnUserList, function(index, userlist){
        $(buildUserList(userlist.id, userlist.username)).appendTo("#user_lists");
      });
    }, "json");
  }

  function buildUserList(id, username)
  {
    var list = '';
    list += '<li class="start_chat" data_touserid="'+id+'"data_tousername="'+username+'">';
    list += '<span>'+username+'</span>';
    list += '<span>'+messageCount()+'</span>';
    list += '<span>'+checkIsTyping()+'</span>';
    list += '<span>'+checkIsActive()+'</span>';
    list += '</li>';
    return list;
  }

  function messageCount()
  {
    return "4";
  }
  function checkIsTyping()
  {
    return "Typing...";
  }
  function checkIsActive()
  {
    return "active";
  }
});
