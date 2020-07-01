<?php
date_default_timezone_set('Asia/Yangon');
require('./views/conversation/general.php');
switch($action)
{
  case '':
  case 'display':
    require('./views/conversation/display.php');
    break;

  #request all messages that admin have not seen yet
  case 'get_all_new_messages_count':
    getAllNewMessagesCount();
    break;

  case 'get_all_chat_users':
    getAllChatUsers();
    break;

  case 'get_active_users':
    getActiveUsers();
    break;

  case 'get_typing_users':
    gettypingUsers();
    break;

  case 'get_each_new_messages_count':
    getEachNewMessagesCount();
    break;

  case 'get_all_messages_by_customer_id':
    getAllMessagesByCustomerId($id);
    break;

  case 'get_new_messages_by_customer_id':
    getNewMessagesByCustomerId($id);
    break;

  case 'change_typing_by_id':
    changeTypingById();
    break;

  case 'update_activity_time':
    updateActivityTime();
    break;

  case 'send_message':
    sendMessage();
    break;

  case 'send_photo':
    sendPhoto();
    break;

  default:
    $ERR_STATUS = ERR_ACTION;
    require('./views/error_display.php');
    exit();
}

function getAllNewMessagesCount()
{
  $total = MessageRecord::getAllNewMessagesCount($_SESSION['merchant_admin_account']->getValue('id'));
  echo $total;
}

function getAllChatUsers()
{
  $userList = UsersAccount::getActivateCustomerAccount();
  $returnUserList = array();
  foreach($userList as $ul)
  {
    $returnUserList[]= array(
      'id' => $ul['id'],
      'username' => $ul['username']
    );;
  }
  echo json_encode($returnUserList);
}

function getActiveUsers()
{
  $login_records = LoginRecord::getUsersActiveActivity($_SESSION['merchant_admin_account']->getValue('id'));
  $return_active_users = array();
  foreach($login_records as $login_record)
  {
    if(checkActiveNow($login_record->getValue('active_activity')))
    {
      $return_active_users[]= $login_record->getValue('user_id');
    }
  }
  echo json_encode($return_active_users);
}

function gettypingUsers()
{
  $login_records = LoginRecord::getIsType($_SESSION['merchant_admin_account']->getValue('id'));
  $return_typing_users = array();
  foreach($login_records as $login_record)
  {
    $return_typing_users[]= $login_record->getValue('user_id');
  }
  echo json_encode($return_typing_users);
}

function getEachNewMessagesCount()
{
  $eachNewMessages = array();
  $userList = UsersAccount::getActivateCustomerAccount();
  foreach($userList as $ul)
  {
    $count = MessageRecord::countUnseenMessage($ul['id'], $_SESSION['merchant_admin_account']->getValue('id'));
    if($count>0)
    {
      $eachNewMessages[] = array(
        'from_user_id' => $ul['id'],
        'messages_count' => $count
      );
    }
  }
  echo json_encode($eachNewMessages);
}

function getAllMessagesByCustomerId($id)
{
  if($id)
  {
    $messages = MessageRecord::getAllMessage($_SESSION['merchant_admin_account']->getValue('id'), $id);
    MessageRecord::updateMessageStatus($_SESSION['merchant_admin_account']->getValue('id'), $id);
    $returnMessages = array();
    foreach ($messages as $message)
    {
      $mss = '';
      if($message->getValue('is_image') == 'yes')
        if($message->getValue('from_user_id') == $_SESSION['merchant_admin_account']->getValue('id'))
          $mss = '<img src="'.FILE_URL.'/photos/conversation/'.$message->getValue('messages').'" alt="Photo Downloading" class="display-photo">';
        else
          $mss = '<img src="'.OTHER_FILE_URL.'/photos/conversation/'.$message->getValue('messages').'" alt="Photo Downloading" class="display-photo">';
      else
        $mss = $message->getValue('messages');

      $returnMessages[] = array(
        'from_user_id' => $message->getValue('from_user_id'),
        'to_user_id' => $message->getValue('to_user_id'),
        'messages' => $mss,
        'arrived_time' => $message->getValue('arrived_time')
      );
    }
    echo json_encode($returnMessages);
  }
}

function getNewMessagesByCustomerId($id)
{
  if($id)
  {
    $messages = MessageRecord::getNewMessage($_SESSION['merchant_admin_account']->getValue('id'), $id);
    MessageRecord::updateMessageStatus($_SESSION['merchant_admin_account']->getValue('id'), $id);
    $returnMessages = array();
    foreach ($messages as $message)
    {
      $mss = '';
      if($message->getValue('is_image') == 'yes')
        if($message->getValue('from_user_id') == $_SESSION['merchant_admin_account']->getValue('id'))
          $mss = '<img src="'.FILE_URL.'/photos/conversation/'.$message->getValue('messages').'" alt="Photo Downloading" class="display-photo">';
        else
          $mss = '<img src="'.OTHER_FILE_URL.'/photos/conversation/'.$message->getValue('messages').'" alt="Photo Downloading" class="display-photo">';
      else
        $mss = $message->getValue('messages');

      $returnMessages[] = array(
        'from_user_id' => $message->getValue('from_user_id'),
        'to_user_id' => $message->getValue('to_user_id'),
        'messages' => $mss,
        'arrived_time' => $message->getValue('arrived_time')
      );
    }
    echo json_encode($returnMessages);
  }
}

function changeTypingById()
{
  $required_fields = array('user_id', 'is_type', 'to_whom_id');
  $missing_fields = array();
  $error_messages = array();

  $login_record = new LoginRecord(array(
    'user_id' => $_SESSION['merchant_admin_account']->getValue('id'),
    'is_type' => isset($_POST['is_type']) ? preg_replace('/[^.\ \-\_a-zA-Z0-9]/', '', $_POST['is_type']) : '',
    'to_whom_id' => isset($_POST['to_whom_id']) ? preg_replace('/[^.\ \-\_a-zA-Z0-9]/', '', $_POST['to_whom_id']) : ''
  ));

  foreach($required_fields as $required_field)
  {
    if($login_record->getValue($required_field) == '' )
      $missing_fields[] = $required_field;
  }

  if($missing_fields)
  {
    $error_messages[] = 'Please fill all required field';
  }

  if($error_messages)
  {
    $ERR_STATUS = ERR_FORM;
    require('./views/error_display.php');
  }
  else
  {
    $login_record->updateIsType();
  }
}

function updateActivityTime()
{
  LoginRecord::updateUsersActiveActivity($_SESSION['merchant_admin_account']->getValue('id'));
}

function sendMessage()
{
  $required_fields = array('to_user_id', 'from_user_id', 'messages');
  $missing_fields = array();
  $error_messages = array();

  $message = new MessageRecord(array(
    'to_user_id' => isset($_POST['to_user_id']) ? preg_replace('/[^0-9]/', '', $_POST['to_user_id']) : '',
    'from_user_id' => $_SESSION['merchant_admin_account']->getValue('id'),
    'messages' => isset($_POST['messages']) ? $_POST['messages'] : '',
    'is_image' => 'no'
  ));
  foreach($required_fields as $required_field)
  {
    if($message->getValue($required_field) == '' )
      $missing_fields[] = $required_field;
  }
  if($missing_fields)
  {
    $error_messages[] = 'Please fill all required field';
  }

  if($error_messages)
  {
    $ERR_STATUS = ERR_FORM;
    require('./views/error_display.php');
  }
  else
  {
    $message->addMessage();
  }
}

function sendPhoto()
{
  $required_fields = array('to_user_id',);
  $missing_fields = array();
  $error_messages = array();

  $message = new MessageRecord(array(
    'to_user_id' => isset($_POST['to_user_id']) ? preg_replace('/[^0-9]/', '', $_POST['to_user_id']) : '',
    'from_user_id' => $_SESSION['merchant_admin_account']->getValue('id'),
    'messages' => 'not message',
    'is_image' => 'yes'
  ));
  foreach($required_fields as $required_field)
  {
    if($message->getValue($required_field) == '' )
      $missing_fields[] = $required_field;
  }
  if($missing_fields)
  {
    $error_messages[] = 'Please fill all required field';
  }

  if($error_messages)
  {
    $ERR_STATUS = ERR_FORM;
    require('./views/error_display.php');
  }
  else
  {
    switch ($_FILES['photo']['type']) {
      case 'image/gif':
        savePhoto($message, 'gif');
        break;

      case 'image/jpeg':
        savePhoto($message, 'jpeg');
        break;

      case 'image/png':
        savePhoto($message, 'png');
        break;

      default:
        exit();
        break;
    }

  }
}

function checkActiveNow($active_activity)
{
  $diff_time = strtotime('now') - strtotime($active_activity);
  if($diff_time > 0 && $diff_time < 60)
    return true;
  else
    return false;
}

function savePhoto($message, $img_type)
{
  $message_id = $message->addMessage();
  $tmp = $_FILES['photo']['tmp_name'];
  $photo_name = 'user_' . $message->getValue('to_user_id') . '_img_mss_' . $message_id . '.' .$img_type;
  move_uploaded_file($tmp, './photos/conversation/' . $photo_name);
  $update_message = new MessageRecord(array(
    'id' => $message_id,
    'messages' => $photo_name
  ));
  $update_message->updatePhotoName();
}

 ?>
