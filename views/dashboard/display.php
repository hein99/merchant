<?php
displayPageHeader('Dashboard | ' . WEB_NAME);
displayMainNavigation('dashboard');
 ?>
<section id="ky-dashboard-section">
  <div class="ky-dashboard">
    <a href="<?php echo URL ?>/customer/display/" class="">
      <div class="dashboard-small-container">
        <div class="ky-icon-container ky-customer-icon">
          <i class="fas fa-users"></i>
        </div>
        <div class="ky-info-container ky-customer-info">
          <span id="customers_count"></span>
          <span>Customers</span>
        </div>
      </div>
    </a>
    <a href="<?php echo URL ?>/order/display/" class="">
      <div class="dashboard-small-container">
        <div class="ky-icon-container ky-order-icon">
          <i class="fas fa-shapes"></i>
        </div>
        <div class="ky-info-container ky-order-info">
          <span id="orders_count"></span>
          <span>New Orders</span>
        </div>
      </div>
    </a>
    <a href="<?php echo URL ?>/conversation/display/" class="">
      <div class="dashboard-small-container">
        <div class="ky-icon-container ky-conversation-icon">
          <i class="fas fa-envelope"></i>
        </div>
        <div class="ky-info-container ky-conversation-info">
          <span id="messages_count"></span>
          <span>New Messages</span>
        </div>
      </div>
    </a>
    <a href="<?php echo URL ?>/membership/display/">
      <div class="dashboard-small-container memberships">
        <span>Memberships</span>
        <div class="ky-membership-icons-container">
          <i class="fas fa-award ky-silver-icon"></i>
          <i class="fas fa-award ky-gold-icon"></i>
          <i class="fas fa-award ky-platinum-icon"></i>
          <i class="fas fa-gem ky-diamond-icon"></i>
        </div>
      </div>
    </a>
    <section class="dashboard-form-part">
      <div class="dashboard-form-container">
        <span>Add New Customer</span>
        <form class="" action="<?php echo URL ?>/customer/create/" method="post">
          <div class="ky-create-customer-form">
            <input type="text" name="username" placeholder="Username">
            <input type="password" name="password1" placeholder="Password">
            <input type="password" name="password2" placeholder="Confirm Password">
            <input type="number" name="phone" placeholder="Phone Number">
            <textarea name="address" placeholder="Address"></textarea>
            <input type="submit" value="Create">
          </div>
        </form>
      </div>
      <div class=""></div>
      <div class=""></div>
      <div class=""></div>
    </section>
  </div>
  <div class="">
    <?php
      $password_requests = PasswordRequest::getAllPasswordRequest();
     ?>
     <ul>
       <?php foreach($password_requests as $password_request) : ?>
         <li class=""><?php echo $password_request->getValueEncoded('phone') ?> <span><?php echo $password_request->getValueEncoded('requested_date') ?></span></li>
       <?php endforeach; ?>
     </ul>
  </div>
</section>
<script type="text/javascript">
  $(document).ready(function() {
    var w=$('#ky-dashboard-section').width();
    var h=$('.dashboard-form-part').height();
    console.log(w);
    console.log(h);
  });
</script>
<script src="<?php echo URL ?>/scripts/dashboard.js"></script>

<?php
displayPageFooter();
?>
