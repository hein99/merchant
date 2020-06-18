<?php
displayPageHeader('Settings | ' . WEB_NAME);
displayMainNavigation('settings');
 ?>
 <section id="ky-settings-section">
   <div class="ky-settings-container">
     <i class="fas fa-user-circle"></i>
     <span><?php $admin_account = UsersAccount::getAdminAccount(); echo $admin_account->getValue('username')?></span>
     <form class="ky-account-configure-form" action="<?php echo URL ?>/settings/change_account/" method="post">
       <div class="">
         <span id="current-text">CURRENT</span>
         <span id="new-text">NEW</span>
         <div class="ky-current-account-container">
          <div class="error-input">
            <input type="text" name="phone" placeholder="Phone" id="phone">
          </div>
          <div class="error-input">
            <input type="password" name="current_password" placeholder="Password" id="current_password"></div>
          </div>
         <div class="ky-new-account-container">
           <div class="error-input"><input type="text" name="new_username" placeholder="Username" id="new_username"></div>
           <div class="error-input"><input type="password" name="new_password1" placeholder="New Password" id="new_password1"></div>
           <div class="error-input"><input type="password" name="new_password2" placeholder="Confirm Password" id="new_password2"></div>
         </div>
         <div class="ky-change-button-container">
           <button type="submit">CHANGE</button>
         </div>
       </div>
     </form>
   </div>
   <div class=""></div>
   <div class=""></div>
   <div class=""></div>
   <div class=""></div>
 </section>
 <script src="<?php echo FILE_URL ?>/scripts/jquery.validate.min.js" charset="utf-8"></script>
 <script src="<?php echo FILE_URL ?>/scripts/settings.js" charset="utf-8"></script>
<?php
displayPageFooter();
?>
