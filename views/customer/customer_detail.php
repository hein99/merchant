<?php
displayPageHeader('Customer List | ' . WEB_NAME);
displayMainNavigation('customer');
 ?>
 <section>
   <h1>Customer Detail</h1>
   <form class="" action="<?php echo URL ?>/change_password/" method="post">
     <span>New Account</span>
     <input type="hidden" name="username" value="<?php echo $customer->getValueEncoded('username') ?>">
     <input type="password" name="current_password" placeholder="Current Password">
     <input type="password" name="new_password1" placeholder="New Password">
     <input type="password" name="new_password2" placeholder="Confirm Password">
     <button type="submit">Change</button>
   </form>
 </section>

<?php
 // echo "<pre>";
 // print_r($customer);
 // print_r($customer_statement);
 // echo "</pre>";
displayPageFooter();
?>
