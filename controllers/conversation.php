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

  default:
    $ERR_STATUS = ERR_ACTION;
    require('./views/error_display.php');
    exit();
}

function getAllNewMessagesCount()
{
  // $id = UsersAccount::getAdminAccountById($_SESSION['merchant_admin_account']->getValue('id'));
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
      $returnMessages[] = array(
        'from_user_id' => $message->getValue('from_user_id'),
        'to_user_id' => $message->getValue('to_user_id'),
        'messages' => $message->getValue('messages'),
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
      $returnMessages[] = array(
        'from_user_id' => $message->getValue('from_user_id'),
        'to_user_id' => $message->getValue('to_user_id'),
        'messages' => $message->getValue('messages'),
        'arrived_time' => $message->getValue('arrived_time')
      );
    }
    echo json_encode($returnMessages);
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
 ?>
