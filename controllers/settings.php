<?php
switch($action)
{
  case '':
  case 'display':
    require('./views/settings/display.php');
  break;
  case 'logout':
    $_SESSION['merchant_admin_account'] = '';
    header('location:' . URL . '/views/login.php');
  break;

  default:
    $ERR_STATUS = ERR_ACTION;
    require('./views/error_display.php');
    exit();
}
 ?>
