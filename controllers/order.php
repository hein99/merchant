<?php
switch($action)
{
  case '':
  case 'display':
  require('./views/order/display.php');
  $row = CustomerOrder::getNewOrderCount();
  print_r($row);
  break;

  default:
    $ERR_STATUS = ERR_ACTION;
    require('./views/error_display.php');
    exit();

}
 ?>
