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

  $new_customers = array(); //Array Variable for json return
  foreach ($activate_customers as $activate_customer) {
    $membership_name = '';
    // change from membership id to membership name
    switch($activate_customer['membership_id'])
    {
      case 1:
        $membership_name = '<div class="wp-membership-logo sliver-status" dataholder="Silver">
          <i class="fas fa-award"></i>
          <span id="membership-level">S</span>
        </div>';
        break;

      case 2:
        $membership_name = '<div class="wp-membership-logo gold-status" dataholder="Gold">
          <i class="fas fa-award"></i>
          <span id="membership-level">G</span>
        </div>';
        break;

      case 3:
        $membership_name = '<div class="wp-membership-logo platinum-status" dataholder="Platinum">
          <i class="fas fa-award"></i>
          <span id="membership-level">P</span>
        </div>';
        break;

      case 4:
        $membership_name = '<div class="wp-membership-logo diamond-status" dataholder="Diamond">
          <i class="fas fa-gem"></i>
        </div>';
        break;

      default:
        exit();
    }

    $new_customer = (object)array(
      'customer_id' => str_pad( $activate_customer['id'], 7, 0, STR_PAD_LEFT ),
      'customer_name' => '<a href="'.URL.'/customer/detail/'.$activate_customer['id'].'" class ="customer-detail">'.$activate_customer['username'].'</a>',
      'membership_name' => $membership_name,
      'phone' => $activate_customer['phone'],
      'balance' => number_format($activate_customer['balance'], 2) . 'Ks',
      'created_date' => $activate_customer['created_date'],
      'activate_status' => '<input type="checkbox" class="activate-toggle-js" data-id="'. $activate_customer['id'] .'" checked>'
    );
    $new_customers[] = $new_customer;
  }

  echo json_encode($new_customers);
}
function getDeactivateCustomers()
{
  $deactivate_customers = UsersAccount::getDeactivateCustomerAccount();
  $new_customers = array(); //Array Variable for json return
  foreach ($deactivate_customers as $deactivate_customer) {
    $membership_name = '';
    // change from membership id to membership name
    switch($deactivate_customer['membership_id'])
    {
      case 1:
        $membership_name = '<div class="wp-membership-logo sliver-status" dataholder="Silver">
          <i class="fas fa-award"></i>
          <span id="membership-level">S</span>
        </div>';
        break;

      case 2:
        $membership_name = '<div class="wp-membership-logo gold-status" dataholder="Gold">
          <i class="fas fa-award"></i>
          <span id="membership-level">G</span>
        </div>';
        break;

      case 3:
        $membership_name = '<div class="wp-membership-logo platinum-status" dataholder="Platinum">
          <i class="fas fa-award"></i>
          <span id="membership-level">P</span>
        </div>';
        break;

      case 4:
        $membership_name = '<div class="wp-membership-logo diamond-status" dataholder="Diamond">
          <i class="fas fa-gem"></i>
        </div>';
        break;

      default:
        exit();
    }

    $new_customer = (object)array(
      'customer_id' => str_pad( $deactivate_customer['id'], 7, 0, STR_PAD_LEFT ),
      'customer_name' => $deactivate_customer['username'],
      'membership_name' => $membership_name,
      'phone' => $deactivate_customer['phone'],
      'balance' => number_format($deactivate_customer['balance'], 2) . 'Ks',
      'created_date' => $deactivate_customer['created_date'],
      'activate_status' => '<input type="checkbox" class="activate-toggle-js" data-id="'. $deactivate_customer['id'] .'">'
    );
    $new_customers[] = $new_customer;
  }

  echo json_encode($new_customers);
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
    $ERR_STATUS = ERR_FORM;
    require('./views/error_display.php');
  }
  else {
    $customer_account->createCustomerAccount();
    header('location: ' . URL . '/dashboard/');
  }
}
function editCustomerInfo()
{
  $required_fields = array('username', 'phone', 'address', 'point','balance', 'membership_id');
  $missing_fields = array();
  $error_messages = array();

  $customer_info = new UsersAccount(array(
    'id' => isset($_POST['id']) ? preg_replace('/[^-\_a-zA-Z0-9]/', '', $_POST['id']) : '',
    'username' => isset($_POST['username']) ? preg_replace('/[^-\_a-zA-Z0-9]/', '', $_POST['username']) : '',
    'phone' => isset($_POST['phone']) ? preg_replace('/[^-\_a-zA-Z0-9]/', '', $_POST['phone']) : '',
    'address' => isset($_POST['address']) ? preg_replace('/[^-\_a-zA-Z0-9]/', '', $_POST['address']) : '',
    'point' => isset($_POST['point']) ? preg_replace('/[^-\_a-zA-Z0-9]/', '', $_POST['point']) : '',
    'balance' => isset($_POST['balance']) ? preg_replace('/[^-\_a-zA-Z0-9]/', '', $_POST['balance']) : '',
    'membership_id' => isset($_POST['membership_id']) ? preg_replace('/[^-\_a-zA-Z0-9]/', '', $_POST['membership_id']) : ''
  ));
  foreach ($required_fields as $required_field) {
    if(!$customer_info->getValue($required_field))
      $missing_fields[] = $required_field;
  }
  if($missing_fields)
  {
    $error_messages[] = 'There were some missing fields!';
  }
  if(UsersAccount::getCustomerNameCheck($customer_info->getValue('username'), $customer_info->getValue('id')))
  {
    $error_messages[] = 'A member with that username already exists in the database. Please choose an another username.';
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
  $request_account = new UsersAccount(array(
    'id' => isset($_POST['id']) ? preg_replace('/[^ \-\_a-zA-Z0-9]/', '', $_POST['id']) : '',
    'username' => isset($_POST['username']) ? preg_replace('/[^ \-\_a-zA-Z0-9]/', '', $_POST['username']) : '',
    'password' => isset($_POST['current_password']) ? preg_replace('/[^ \-\_a-zA-Z0-9]/', '', $_POST['current_password']) : ''
  ));
  $current_account = $request_account->authenticateCustomerAccount();
  if($current_account)
  {
    $required_fields = array('password');
    $missing_fields = array();
    $error_messages = array();

    $new_account = new UsersAccount(array(
      'id' => isset($_POST['id']) ? preg_replace('/[^ \-\_a-zA-Z0-9]/', '', $_POST['id']) : '',
      'username' => isset($_POST['username']) ? preg_replace('/[^ \-\_a-zA-Z0-9]/', '', $_POST['username']) : '',
      'password' => ( isset($_POST['new_password1']) and isset($_POST['new_password2']) and $_POST['new_password1'] == $_POST['new_password2']) ? preg_replace('/[^ \-\_a-zA-Z0-9]/', '', $_POST['new_password1']) : ''
    ));
    foreach ($required_fields as $required_field) {
      if(!$new_account->getValue($required_field))
        $missing_fields[] = $required_field;
    }
    if($missing_fields)
    {
      $error_messages[] = 'Some missing in field. Make sure that and submit again!';
    }
    if(!isset($_POST['new_password1']) or !isset($_POST['new_password2']) or !$_POST['new_password1'] or !$_POST['new_password2'] or $_POST['new_password1'] != $_POST['new_password2'])
    {
      $error_messages[] = 'Make sure you enter your password correctly in both password fields';
    }
    if($error_messages)
    {
      $ERR_STATUS = ERR_FORM;
      require('./views/error_display.php');
    }else {
      $new_account->editCustomerPassword();
      header('location: ' . URL . '/customer/detail/' . $_POST['id']);
    }
  }
  else {
    $error_messages = array();
    $error_messages[] = 'Current password is not correct.';
    $error_messages[] = 'Please make sure and submit again';
    $ERR_STATUS = ERR_FORM;
    require('./views/error_display.php');
  }
}
function addAmount()
{
  $required_fields = array('amount', 'about');
  $missing_fields = array();
  $error_messages = array();

  $customer_statement = new CustomerStatement(array(
    'customer_id' => isset($_POST['customer_id']) ? preg_replace('/[^-\_a-zA-Z0-9]/', '', $_POST['customer_id']) : '',
    'amount' => isset($_POST['amount']) ? preg_replace('/[^-\_a-zA-Z0-9]/', '', $_POST['amount']) : '',
    'about' => isset($_POST['about']) ? preg_replace('/[^-\_a-zA-Z0-9]/', '', $_POST['about']) : ''
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
    $add_amount = '+' . $customer_statement->getValue('amount');
    $customer_statement->addCustomerStatement($add_amount);
  }
}
function subAmount()
{
  $required_fields = array('amount', 'about');
  $missing_fields = array();
  $error_messages = array();

  $customer_statement = new CustomerStatement(array(
    'customer_id' => isset($_POST['customer_id']) ? preg_replace('/[^-\_a-zA-Z0-9]/', '', $_POST['customer_id']) : '',
    'amount' => isset($_POST['amount']) ? preg_replace('/[^-\_a-zA-Z0-9]/', '', $_POST['amount']) : '',
    'about' => isset($_POST['about']) ? preg_replace('/[^-\_a-zA-Z0-9]/', '', $_POST['about']) : ''
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
      $sub_amount = '-' . $customer_statement->getValue('amount');
      $customer_statement->addCustomerStatement($sub_amount);
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
 ?>
