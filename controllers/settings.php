<?php
switch($action)
{
  case '':
  case 'display':
    require('./views/settings/display.php');
  break;

  default:
    $ERR_STATUS = 2;
    require('./views/error_display.php');
    exit();
}
 ?>
