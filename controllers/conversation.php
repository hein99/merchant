<?php
date_default_timezone_set('Asia/Yangon');
require('./views/conversation/general.php');
switch($action)
{
  case '':
  case 'display':
    require('./views/conversation/display.php');
    break;

  case 'get_all_new_messages_count'://request all messages that admin have not seen yet
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
  $return_active_users = array();
  foreach($login_records as $login_record)
  {
    $return_active_users[]= $login_record->getValue('user_id');
  }
  echo json_encode($return_active_users);
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
