<?php
switch($action)
{
  case '':
  case 'display':
    require('./views/customer/display.php');
    break;
  case 'get_all_customers':
    getAllCustomers();
    break;
  case 'get_customers_count':
    getCustomersCount();
    break;
  case 'create':
    addCustomerAccount();
    break;

  default:
    $ERR_STATUS = ERR_ACTION;
    require('./views/error_display.php');
    exit();

}
function getAllCustomers()
{
  $customers = UsersAccount::getAllCustomerAccount();
  echo $customers;
}
function getCustomersCount()
{
  $total = UsersAccount::getTotalCustomersCount();
  echo $total;
}
function addCustomerAccount()
{
  $required_fields = array('username', 'password', 'phone', 'address');
  $missing_fields = array();
  $error_messages = array();

  $customer_account = new UsersAccount(array(
    'username' => isset($_POST['username']) ? preg_replace('/[^-\_a-zA-Z0-9]/', '', $_POST['username']) : '',
    'password' => (isset($_POST['password1']) and isset($_POST['password2']) and $_POST['password1'] == $_POST['password2']) ? preg_replace('/[^ \-\_a-zA-Z0-9]/', '', $_POST['password1']) : '',
    'phone' => isset($_POST['phone']) ? preg_replace('/[^-\_a-zA-Z0-9]/', '', $_POST['phone']) : '',
    'address' => isset($_POST['address']) ? preg_replace('/[^-\_a-zA-Z0-9]/', '', $_POST['address']) : ''
  ));

  foreach($required_fields as $required_field)
  {
    if(!$customer_account->getValue($required_field))
      $missing_fields[] = $required_field;
  }
  if($missing_fields)
  {
    $error_messages[] = 'There were some missing fields!';
  }
  if(!isset( $_POST["password1"] ) or !isset( $_POST["password2"] ) or !$_POST["password1"] or !$_POST["password2"] or ( $_POST["password1"] != $_POST["password2"] ))
  {
    $error_messages[] = 'Please make sure you enter your password correctly in both password fields!';
  }
  if(UsersAccount::getCustomerAccountByUsername($customer_account->getValue('username')))
  {
    $error_messages[] = 'A member with that username already exists in the database. Please choose another username.';
  }
  if($error_messages)
  {
    require('./views/error_display.php');
  }
  else {
    $customer_account->createCustomerAccount();
    header('location: ' . URL . '/dashboard/');
  }
}
 ?>
