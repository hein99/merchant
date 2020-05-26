<?php
switch()
{
  case '':
  case 'customer':
  break;

  default:
    $ERR_STATUS = 2;
    require('./views/error_display.php');
    exit();

}
 ?>
