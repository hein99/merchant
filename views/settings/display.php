<?php
displayPageHeader('Settings | ' . WEB_NAME);
displayMainNavigation('settings');
 ?>
 <form class="" action="<?php echo URL ?>/settings/change_account/" method="post">
   <div class="">
     <span>Current Account</span>
     <input type="text" name="current_username" placeholder="Username">
     <input type="password" name="current_password" placeholder="Password">
  </div>
  <div class="">
    <span>New Account</span>
    <input type="text" name="new_username" placeholder="Username">
    <input type="password" name="new_password1" placeholder="New Password">
    <input type="password" name="new_password2" placeholder="Confirm Password">
  </div>
  <div class="">
    <button type="submit">Change</button>
  </div>
 </form>
<?php
displayPageFooter();
?>
