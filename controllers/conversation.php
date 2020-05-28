<?php
switch($action)
{
  case '':
  case 'display':
    require('./views/conversation/display.php');
    break;
  case 'get_new_messages_count':
    getNewMessagesCount();
    break;

  default:
    $ERR_STATUS = ERR_ACTION;
    require('./views/error_display.php');
    exit();
}

function getNewMessagesCount()
{
  $total = MessageRecord::getNewMessagesCount(1);
  echo $total;
}
 ?>
