<?php
displayPageHeader('Settings | ' . WEB_NAME);
displayMainNavigation('settings');
 ?>
 <section id="ky-settings-content">
   <i class="fas fa-user-circle"></i>
   <span>Swe Swe Nyein</span>
   <form id="ky-account-configure-form" action="<?php echo URL ?>/settings/change_account/" method="post">
     <div class="">
       <span id="current-text">CURRENT</span>
       <span id="new-text">NEW</span>
       <div id="ky-current-account-container">
         <input type="text" name="current_username" placeholder="Username">
         <input type="password" name="current_password" placeholder="Password">
       </div>
       <div id="ky-new-account-container">
         <input type="text" name="new_username" placeholder="Username">
         <input type="password" name="new_password1" placeholder="New Password">
         <input type="password" name="new_password2" placeholder="Confirm Password">
       </div>
       <div id="ky-change-button-container">
         <button type="submit">CHANGE</button>
       </div>
     </div>
   </form>
 </section>
 <script type="text/javascript">
 $(document).ready(function() {
   $('#ky-current-account-container input').on('focus', function(){
   $('#new-text').removeClass('ky-onfocus');
   $('#current-text').addClass('ky-onfocus');
 });

 $('#ky-new-account-container input').on('focus', function(){
   $('#current-text').removeClass('ky-onfocus');
   $('#new-text').addClass('ky-onfocus');
 });
 });
 </script>
<?php
displayPageFooter();
?>
