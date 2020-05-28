<?php
displayPageHeader('Dashboard | ' . WEB_NAME);
displayMainNavigation('dashboard');
 ?>
 <section>
   <div class="">
     
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
<?php
displayPageFooter();
?>
