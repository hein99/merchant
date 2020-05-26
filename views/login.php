<?php
require('../config.php');
require('../htmlstructureconfig.php');
require('../models/DataObject.class.php');
require('../models/UsersAccount.class.php');
session_start();

if( isset($_POST['action']) and $_POST['action'] == 'login')
{
  processLoginForm();
}
else {
  displayLoginFrom(array(), new UsersAccount(array()));
}

function displayLoginFrom($error_messages, $admin_account)
{
  displayPageHeader('Login | ' . WEB_NAME, true);
?>
  <h1>LOGIN</h1>
  <?php
  if($error_messages)
  {
    foreach ($error_messages as $error_message)
      echo $error_message;
  }
  else {
    echo '<p>Welcome to the best shop!</p>';
  }
  ?>
  <form class="" action="<?php echo URL ?>/views/login.php" method="post">
    <input type="hidden" name="action" value="login">
    <input type="text" name="username" placeholder="Username" id="username" value="<?php echo isset($admin_account) ? $admin_account->getValueEncoded('username') : ''?>">
    <input type="password" name="password" placeholder="Password" id="password">
    <input type="submit" name="" value="Login">
  </form>
  <?php
  displayPageFooter();
  }

  function processLoginForm()
  {
    $required_fields = array('username', 'password');
    $missing_fields = array();
    $error_messages = array();

    $admin_account = new UsersAccount(array(
      'username' => isset($_POST['username']) ? preg_replace('/[^ \-\_a-zA-Z0-9]/', '', $_POST['username']) : '',
      'password' => isset($_POST['password']) ? preg_replace('/[^ \-\_a-zA-Z0-9]/', '', $_POST['password']) : ''
    ));
    foreach ($required_fields as $required_field) {
      if(!$admin_account->getValue($required_field))
        $missing_fields[] = $required_field;
    }
    if($missing_fields)
    {
      $error_messages[] = '<p class="error">Please complete all fields below.</p>';
    }
    elseif(!$loggedin_account = $admin_account->authenticateAdminAccount())
    {
      $error_messages[] = '<p class="error">Please check your username and password, and try again.</p>';
    }
    if($error_messages)
    {
      displayLoginFrom($error_messages, $admin_account);
    }
    else {
      $_SESSION['merchant_admin_account'] = $loggedin_account;
      header('location: ' .URL. '/dashboard/');
    }
  }
  ?>
