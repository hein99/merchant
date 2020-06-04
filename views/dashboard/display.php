<?php
displayPageHeader('Dashboard | ' . WEB_NAME);
displayMainNavigation('dashboard');
 ?>
<section id="ky-dashboard-section">
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
  <a href="<?php echo URL ?>/membership/display/" class="">
    <div class="dashboard-small-container memberships">
      <span>Memberships</span>
      <div class="ky-membership-icons-container">
        <div class="ky-silver-icon">
          <i class="fas fa-award"></i>
          <span class="ky-letter-inside-icon">s</span>
        </div>
        <div class="ky-gold-icon">
          <i class="fas fa-award"></i>
          <span class="ky-letter-inside-icon">g</span>
        </div>
        <div class="ky-platinum-icon">
          <i class="fas fa-award"></i>
          <span class="ky-letter-inside-icon">p</span>
        </div>
        <div class="ky-diamond-icon">
          <i class="fas fa-gem"></i>
        </div>
      </div>
    </div>
  </a>
  <section class="dashboard-form-part">
    <div class="dashboard-form-conatainer">
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
</section>
<script src="<?php echo URL ?>/scripts/dashboard.js"></script>

<?php
displayPageFooter();
?>
