<?php
switch($action)
{
  case '':
  case 'display':
    require('./views/customer/display.php');
    break;
  case 'detail':
    detail($id);
    break;
  case 'get_activate_customers':
    getActivateCustomers();
    break;
  case 'get_deactivate_customers':
    getDeactivateCustomers();
    break;
  case 'get_customers_count':
    getCustomersCount();
    break;
  case 'get_customer_balance':
    getCustomerBalance();
    break;
  case 'get_history_table':
    getHistoryTable();
    break;
  case 'create':
    addCustomerAccount();
    break;
  case 'edit_customer_info':
    editCustomerInfo();
    break;
  case 'change_password':
    changeCustomerPassword();
    break;
  case 'add_amount':
    addAmount();
    break;
  case 'sub_amount':
    subAmount();
    break;
  case 'change_activate_status':
    changeActivateStatus();
    break;
  default:
    $ERR_STATUS = ERR_ACTION;
    require('./views/error_display.php');
    exit();

}
function detail($id)
{
  $customer = UsersAccount::getCustomerAccountByID($id);
  $customer_statements = CustomerStatement::getCustomerStatement($id);
  if(!$customer)
  {
    $ERR_STATUS = ERR_URL;
    require('./views/error_display.php');
  }else{
    require('./views/customer/customer_detail.php');
  }
}
function getActivateCustomers()
{
  $activate_customers = UsersAccount::getActivateCustomerAccount();
  require('./views/customer/general.php');
  customersJsonReturn($activate_customers, true);
}
function getDeactivateCustomers()
{
  $deactivate_customers = UsersAccount::getDeactivateCustomerAccount();
  require('./views/customer/general.php');
  customersJsonReturn($deactivate_customers, false);
}
function getCustomersCount()
{
  $total = UsersAccount::getTotalCustomersCount();
  echo $total;
}
function getCustomerBalance()
{
  $customer_amount = UsersAccount::getCustomerBalance($_POST['customer_id']);
  echo $customer_amount->getValue('balance');
}
function getHistoryTable()
{
  $customer_statements = CustomerStatement::getCustomerStatement($_POST['customer_id']);
  require('./views/customer/general.php');
  echo $table_output = updateHistoryTable($customer_statements);
}
function addCustomerAccount()
{
  $required_fields = array('username', 'password', 'phone', 'address');
  $missing_fields = array();
  $error_messages = array();

  $customer_account = new UsersAccount(array(
    'username' => isset($_POST['username']) ? preg_replace('/[^ \-\_a-zA-Z0-9]/', '', $_POST['username']) : '',
    'password' => (isset($_POST['password1']) and isset($_POST['password2']) and $_POST['password1'] == $_POST['password2']) ? $_POST['password1'] : '',
    'phone' => isset($_POST['phone']) ? preg_replace('/[^0-9]/', '', $_POST['phone']) : '',
    'address' => isset($_POST['address']) ? preg_replace('/[^ \,\-\_a-zA-Z0-9]/', '', $_POST['address']) : ''
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
  if(UsersAccount::getCustomerAccountByPhone($customer_account->getValue('phone')))
  {
    $error_messages[] = 'A member with that phone number already exists in the database. Please use another phone number.';
  }
  if($error_messages)
  {
    $ERR_STATUS = ERR_FORM;
    require('./views/error_display.php');
  }
  else {
    $id = $customer_account->createCustomerAccount();
    LoginRecord::addUserLoginRecord($id);
    header('location: ' . URL . '/dashboard/');
  }
}
function editCustomerInfo()
{
  $required_fields = array('username', 'phone', 'address', 'point', 'membership_id');
  $missing_fields = array();
  $error_messages = array();

  $customer_info = new UsersAccount(array(
    'id' => isset($_POST['id']) ? preg_replace('/[^0-9]/', '', $_POST['id']) : '',
    'username' => isset($_POST['username']) ? preg_replace('/[^ \-\_a-zA-Z0-9]/', '', $_POST['username']) : '',
    'phone' => isset($_POST['phone']) ? preg_replace('/[^0-9]/', '', $_POST['phone']) : '',
    'address' => isset($_POST['address']) ? preg_replace('/[^ \,\-\_a-zA-Z0-9]/', '', $_POST['address']) : '',
    'point' => isset($_POST['point']) ? preg_replace('/[^0-9]/', '', $_POST['point']) : '',
    'membership_id' => isset($_POST['membership_id']) ? preg_replace('/[^0-9]/', '', $_POST['membership_id']) : ''
  ));
  foreach ($required_fields as $required_field) {
    if($customer_info->getValue($required_field) == '')
      $missing_fields[] = $required_field;
  }
  if($missing_fields)
  {
    $error_messages[] = 'There were some missing fields. Please make sure and submit again!';
  }
  if(UsersAccount::getPhoneNumberCheck($customer_info->getValue('phone'), $customer_info->getValue('id')))
  {
    $error_messages[] = 'A member with that phone number already exists in the database. Please choose an another phone number.';
  }
  if($error_messages)
  {
    $ERR_STATUS = ERR_FORM;
    require('./views/error_display.php');
  }else {
    $customer_info->editCustomerInfo();
    header('location: '. URL . '/customer/detail/' . $_POST['id']);
  }
}
function changeCustomerPassword()
{
    $required_fields = array('password');
    $missing_fields = array();
    $error_messages = array();

    $new_account = new UsersAccount(array(
      'id' => isset($_POST['id']) ? preg_replace('/[^0-9]/', '', $_POST['id']) : '',
      'phone' => isset($_POST['phone']) ? preg_replace('/[^0-9]/', '', $_POST['phone']) : '',
      'password' => isset($_POST['new_password']) ? $_POST['new_password'] : ''
    ));
    foreach ($required_fields as $required_field) {
      if(!$new_account->getValue($required_field))
        $missing_fields[] = $required_field;
    }
    if($missing_fields)
    {
      $error_messages[] = 'There were some missing fields. Please make sure and submit again!';
    }
    if($error_messages)
    {
      $ERR_STATUS = ERR_FORM;
      require('./views/error_display.php');
    }else {
      $new_account->editCustomerPassword();
      PasswordRequest::donePasswordChanged($new_account->getValue('phone'));
      header('location: ' . URL . '/customer/detail/' . $_POST['id']);
    }
}
function addAmount()
{
  $required_fields = array('amount', 'about');
  $missing_fields = array();
  $error_messages = array();

  $customer_statement = new CustomerStatement(array(
    'customer_id' => isset($_POST['customer_id']) ? preg_replace('/[^0-9]/', '', $_POST['customer_id']) : '',
    'amount' => isset($_POST['amount']) ? preg_replace('/[^.\0-9]/', '', $_POST['amount']) : '',
    'about' => isset($_POST['about']) ? preg_replace('/[^ \,\-\_a-zA-Z0-9]/', '', $_POST['about']) : ''
  ));

  foreach($required_fields as $required_field)
  {
    if(!$customer_statement->getValue($required_field))
      $missing_fields[] = $required_field;
  }
  if($missing_fields)
  {
    $error_messages[] = 'There were some missing fields!';
  }
  if($error_messages)
  {
    $ERR_STATUS = ERR_FORM;
    require('./views/error_display.php');
  }
  else {
    $customer_amount = UsersAccount::getCustomerBalance($customer_statement->getValue('customer_id'));
    $customer_total_amount = $customer_amount->getValue('balance') + $customer_statement->getValue('amount');
    UsersAccount::updateCustomerBalance($customer_statement->getValue('customer_id'), $customer_total_amount);
    $amount_status = 1;
    $customer_statement->addCustomerStatement($customer_statement->getValue('amount'), $amount_status);
  }
}
function subAmount()
{
  $required_fields = array('amount', 'about');
  $missing_fields = array();
  $error_messages = array();

  $customer_statement = new CustomerStatement(array(
    'customer_id' => isset($_POST['customer_id']) ? preg_replace('/[^0-9]/', '', $_POST['customer_id']) : '',
    'amount' => isset($_POST['amount']) ? preg_replace('/[^.\0-9]/', '', $_POST['amount']) : '',
    'about' => isset($_POST['about']) ? preg_replace('/[^ \,\-\_a-zA-Z0-9]/', '', $_POST['about']) : ''
  ));

  foreach($required_fields as $required_field)
  {
    if(!$customer_statement->getValue($required_field))
      $missing_fields[] = $required_field;
  }
  if($missing_fields)
  {
    $error_messages[] = 'There were some missing fields!';
  }
  if($error_messages)
  {
    $ERR_STATUS = ERR_FORM;
    require('./views/error_display.php');
  }
  else {
    $customer_amount = UsersAccount::getCustomerBalance($customer_statement->getValue('customer_id'));
    if($customer_amount->getValue('balance') < $customer_statement->getValue('amount'))
    {
      $ERR_STATUS = ERR_FORM;
      require('./views/error_display.php');
    }else{
      $customer_total_amount = $customer_amount->getValue('balance') - $customer_statement->getValue('amount');
      UsersAccount::updateCustomerBalance($customer_statement->getValue('customer_id'), $customer_total_amount);
      $amount_status = 0;
      $customer_statement->addCustomerStatement($customer_statement->getValue('amount'), $amount_status);
    }
  }
}
function changeActivateStatus()
{
  $required_fields = array('id');
  $missing_fields = array();
  $error_messages = array();

  $customer = new UsersAccount(array(
    'id' => isset($_POST['id']) ? preg_replace('/[^0-9]/', '', $_POST['id']) : ''
  ));

  foreach($required_fields as $required_field)
  {
    if(!$customer->getValue($required_field))
      $missing_fields[] = $required_field;
  }

  if($missing_fields)
  {
    $error_messages[] = 'ID Not Included';
  }

  if($error_messages)
  {
    $ERR_STATUS = ERR_FORM;
    require('./views/error_display.php');
  }
  else
  {
    $customer->editCustomerActivateStatus();
  }
}

function getForgotPasswordCustomer()
{

}
 ?>
