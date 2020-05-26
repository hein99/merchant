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
  if(!isset($_SESSION['admin_account']) or !$_SESSION['admin_account'] or !$_SESSION['admin_account']->getValueEncoded('id') or !$_SESSION['admin_account'] = UsersAccount::getAdminAccountById($_SESSION['admin_account']->getValue('id')))
  {
    $_SESSION['admin_account'] = '';
    header('location: '.URL. '/views/login.php');
  }
  exit();
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
    checkAuthentication();
    break;
  case 'conversation':
    checkAuthentication();
    break;
  case 'setting':
    checkAuthentication();
    require('./controllers/settings.php');
    break;

  default:
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
