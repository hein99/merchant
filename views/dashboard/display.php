<?php
displayPageHeader('Dashboard | ' . WEB_NAME);
displayMainNavigation('dashboard');
 ?>
 <section>
   <div class="">
      <a href="<?php echo URL ?>/customer/display/" class="">
      <span id="customers_count"></span>
      <span>Customers</span>
    </a>
   </div>
   <div class="">
     <a href="<?php echo URL ?>/order/display/" class="">
       <span id="orders_count"></span>
       <span>New Orders</span>
     </a>
   </div>
   <div class="">
     <a href="<?php echo URL ?>/conversation/display/" class="">
       <span id="messages_count"></span>
       <span>New Messages</span>
     </a>
   </div>
   <div class="">
     <a href="<?php echo URL ?>/membership/display/">
       <span>Memberships</span>
     </a>
   </div> 
 </section>
 <section>
   <h1>Add New Customer</h1>
   <form class="" action="<?php echo URL ?>/customer/create/" method="post">
     <div class="">
       <input type="text" name="username" placeholder="Username">
     </div>
     <div class="">
       <input type="password" name="password1" placeholder="Password">
     </div>
     <div class="">
       <input type="password" name="password2" placeholder="Confirm Password">
     </div>
     <div class="">
       <input type="number" name="phone" placeholder="Phone Number">
     </div>
     <div class="">
       <input type="text" name="address" placeholder="Address">
     </div>
     <div class="">
         <input type="submit" value="Create">
     </div>
   </form>
 </section>
<script src="<?php echo URL ?>/scripts/dashboard.js"></script>

<?php
displayPageFooter();
?>
