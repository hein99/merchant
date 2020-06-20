window.onbeforeunload = function(event) {
  var is_type = 'no';
  var to_whom_id = document.getElementById("to_user_id").value;
  console.log(to_whom_id);
  $.ajax({
    url: PAGE_URL+'/conversation/change_typing_by_id',
    method: "POST",
    data: {is_type:is_type, to_whom_id:to_whom_id}
  })
};
$(document).ready(function(){
  // User Lists
  getAllChatUsers();

  $(document).on('click', '.start_chat', function(){
    $(this).addClass('active').siblings().removeClass('active');
  });

  $(document).on('click', '.upload_image_logo', function(){
    $('#uploadForm').css('display', 'block');
  });

  $(document).on('click', '#btn_send, #cancel_send', function(){
    $('#uploadForm').css('display', 'none');
  });

  if($('#user_model_details').is(':empty')) {
    $('#user_model_details').wrapInner("<div id='blank-container'><i class='far fa-comments'></i><p>Click on name to start chatting</p></div>");
  }
});

$(document).on('focus', '.chat_message', function(){
  var is_type = 'yes';
  var to_whom_id = document.getElementById("to_user_id").value;
  console.log(to_whom_id);
  $.ajax({
    url: PAGE_URL+'/conversation/change_typing_by_id',
    method: "POST",
    data: {is_type:is_type, to_whom_id:to_whom_id}
  })
});

$(document).on('blur', '.chat_message', function(){
  var is_type = 'no';
  var to_whom_id = document.getElementById("to_user_id").value;
  console.log(to_whom_id);
  $.ajax({
    url: PAGE_URL+'/conversation/change_typing_by_id',
    method: "POST",
    data: {is_type:is_type, to_whom_id:to_whom_id}
  })
});

$(document).on('click', '.send_chat', function(){
  var to_user_id = $(this).attr('id');
  var message  = $.trim($('#chat_message_'+to_user_id).val());
  if(message != '')
  {
    $.ajax({
      url: PAGE_URL+'/conversation/send_message',
      method: "POST",
      data: {to_user_id:to_user_id, messages:message},
      success: function(msg){
        var element = $('#chat_message_'+to_user_id).emojioneArea();
        element[0].emojioneArea.setText('');
      }
    })
  }else{
    alert('Type something');
  }
});

$(document).on('click', '#btn_send', function(){
  var formElem = document.querySelector("#uploadForm");
  var formData = new FormData(formElem)

  $.ajax({
    method:"POST",
    url: PAGE_URL+'/conversation/send_photo',
    data: formData,
    contentType: false,
    processData: false
  });
});

$(document).on('change', '#uploadFile', function(e){
  var reader = new FileReader();
  reader.onload = function(e) {
  document.getElementById("preview").src = e.target.result;
  };
  reader.readAsDataURL(this.files[0]);
});

// Message Lists
$(document).on('click', '.start_chat', function(){
  var to_user_id = $(this).data('touserid');
  var to_user_name = $(this).data('tousername');
  get_chat_history(to_user_id, to_user_name);
});


function buildUserList(id, username)
{
  var list = '';
  list += '<li id="customer-' + id + '-js" class="start_chat" data-touserid="'+id+'" data-tousername="'+username+'">';
  list += '<span class="customer-name-js">'+username+'</span>';
  list += '<div class="customer-active-status"><span class="messages-count-js">0</span>';
  list += '<span class="typing-js">Typing...</span>';
  list += '<span class="active-now"></span></div>';
  list += '</li>';
  return list;
}

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

function makeChatBox(to_user_id, to_user_name)
{
  var content = '<div id="user_dialog_'+to_user_id+'" class="user_dialog" title="You have chat with '+to_user_name+'">';
  content += '<h4>You have chat with <span id="chatting-name">'+to_user_name;
  content += '</span></h4><div class="chat_history" data-touserid="'+to_user_id+'" id="chat_history_'+to_user_id+'"><ul>';
  content += '</ul></div>';
  content += '<div class="wp-conversation-message-container">';
  content += '<label id="wp-send-photo" for="uploadFile"><img src="'+PAGE_FILE_URL+'/logos/photo.png" class="upload_image_logo"/></label><textarea name="chat_message_'+to_user_id+'" id="chat_message_'+to_user_id+'" class="chat_message"></textarea>';
  content += '<form id="uploadForm" action="" method="post" enctype="multipart/form-data"><img src="'+PAGE_FILE_URL+'/logos/image-preview.png" id="preview" class="img-thumbnail">';
  content += '<input type="hidden" name="to_user_id" placeholder="To User ID" value="'+to_user_id+'" id="to_user_id"><br>';
  content += '<input type="file" name="photo" id="uploadFile" accept="image/*" />';
  content += '<div id="send_photo_button_container"><input type="button" value="Send Photo" name="send_photo" id="btn_send" /><input type="button" value="Cancel" name="cancel_photo" id="cancel_send" /></div></form>';
  content += '<button type="button" name="send_chat" id="'+to_user_id+'" class="send_chat">Send</button></div></div>';

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
        output += '<li><div class="chat_list"><div class="'+chat_style+'"><p>'+user_name+' - '+message_list+'</p></div><div class="'+time_style+'"><small><em>'+message.arrived_time+'</em></small></div></div></li>';
      }
      $(output).appendTo("#chat_history_"+to_user_id+" ul");
    },
      dataType: 'json'
    }).done(function(){
      var element = document.getElementsByClassName("chat_history")[0];
      element.scrollTo(0,element.scrollHeight);

      $('#chat_message_'+to_user_id).emojioneArea({
        pickerPosition:"top",
        toneStyle: "bullet"
      });

      setInterval(function(){
        get_new_message(to_user_id, to_user_name);
      }, 2000);

    });
  }

function get_new_message(to_user_id, to_user_name)
{
  $.ajax({
    url: PAGE_URL+'/conversation/get_new_messages_by_customer_id/'+to_user_id,
    method: "GET",
    success: function(returnMessages){
      if(returnMessages != '')
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
          output += '<li><div class="wp-chat-message"><div class="'+chat_style+'"><p>'+user_name+' - '+message_list+'</p></div><div class="'+time_style+'"><small><em>'+message.arrived_time+'</em></small></div></div></li>';
        }
        $(output).appendTo("#chat_history_"+to_user_id+" ul");
        $(".chat_history").stop().animate({ scrollTop: $(".chat_history")[0].scrollHeight}, 1000);
      }
    },
      dataType: 'json'
    })
}
