<?php
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
  chatUserList($userList);
}


 ?>
