<?php
require('./config.php');
require('./models/DataObject.class.php');
require('./models/UsersAccount.class.php');
require('./htmlstructureconfig.php');
session_start();

$controller = $_GET['controller'];
$action = isset($_GET['action']) ? $_GET['action'] : '';
$id = isset($_GET['id']) ? $_GET['id'] : '';

#Loading model
switch ($controller)
{
  case 'dashboard':

    break;
  case 'customer':

    break;
  case 'order':

    break;
  case 'conversation':

    break;
  case 'setting':
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
