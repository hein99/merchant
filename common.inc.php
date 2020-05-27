<?php
require('./config.php');
require('./models/DataObject.class.php');
require('./models/UsersAccount.class.php');
require('./htmlstructureconfig.php');
session_start();

$controller = $_GET['controller'];
$action = isset($_GET['action']) ? $_GET['action'] : '';
$id = isset($_GET['id']) ? $_GET['id'] : '';

function checkAuthentication()
{
  if(!isset($_SESSION['merchant_admin_account']) or !$_SESSION['merchant_admin_account'] or !$_SESSION['merchant_admin_account']->getValueEncoded('id') or !$_SESSION['merchant_admin_account'] = UsersAccount::getAdminAccountById($_SESSION['merchant_admin_account']->getValue('id')))
  {
    $_SESSION['merchant_admin_account'] = '';
    header('location: '.URL. '/views/login.php');
    exit();
  }
}

#Loading model
switch ($controller)
{
  case 'dashboard':
    checkAuthentication();
    break;
  case 'customer':
    checkAuthentication();
    break;
  case 'order':
    require('./models/CustomerOrder.class.php');
    checkAuthentication();
    break;
  case 'membership':
    checkAuthentication();
    break;
  case 'conversation':
    checkAuthentication();
    break;
  case 'settings':
    checkAuthentication();
    break;

  default:
    $ERR_STATUS = ERR_CONTROLLER;
    header('location: ' . URL . '/views/error_display.php');
    exit("UnExcepted model file call -> ${controller}");
}

#Loading controller
  $controller = "./controllers/${controller}.php";
  if(file_exists($controller) and !is_dir($controller))
    require($controller);
  else
    exit("models -> ${controller} not found");
 ?>
