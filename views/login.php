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
<div class="login-container">
  <div class="login-header">
  <span id="user-icon"><i class="fas fa-user-circle"></i></span>
  <span id="welcome">
  <?php
  if($error_messages)
  {
    foreach ($error_messages as $error_message)
      echo $error_message;
  }
  else {?>
    Welcome to the best shop!</span>
  <?php
  }
  ?>
  </div>
  <form class="login-body" action="<?php echo FILE_URL ?>/views/login.php" method="post">
    <input type="hidden" name="action" value="login">
    <div class="error-input">
      <input type="text" name="phone" placeholder="Phone" id="phone-js" value="<?php echo isset($admin_account) ? $admin_account->getValueEncoded('phone') : ''?>">
    </div>
    <div class="error-input">
      <div class="login-pass">
        <input type="password" name="password" placeholder="Password" id="password">
        <span class="login-eye">
          <i class="far fa-eye-slash close-eye"></i>
          <i class="open-eye">
            <div class="outer">
            <svg width="10" height="7" viewBox="0 0 10 7" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M1 3.50388C2.26035 1.61439 5.62484 -1.03088 9 3.50388C7.7621 5.38751 4.42905 8.0246 1 3.50388Z" stroke="black" stroke-width="0.8"/>
            </svg>
            <span class="inner"></span>
            </div>
          </i>
        </span>
      </div>
    </div>
    <input type="submit" id="login" name="" value="Login">
  </form>
</div>
<script src="<?php echo FILE_URL ?>/scripts/jquery.validate.min.js" charset="utf-8"></script>
<script src="<?php echo FILE_URL ?>/scripts/login.js" charset="utf-8"></script>
  <?php
  displayPageFooter();
  }

  function processLoginForm()
  {
    $required_fields = array('phone', 'password');
    $missing_fields = array();
    $error_messages = array();

    $admin_account = new UsersAccount(array(
      'phone' => isset($_POST['phone']) ? preg_replace('/[^0-9]/', '', $_POST['phone']) : '',
      'password' => isset($_POST['password']) ? $_POST['password'] : ''
    ));
    foreach ($required_fields as $required_field) {
      if(!$admin_account->getValue($required_field))
        $missing_fields[] = $required_field;
    }
    if($missing_fields)
    {
      $error_messages[] = '<p class="error">Please complete all the fields below!</p>';
    }
    elseif(!$loggedin_account = $admin_account->authenticateAdminAccount())
    {
      $error_messages[] = '<p class="error">Please check your phone number and password, and try again!</p>';
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
