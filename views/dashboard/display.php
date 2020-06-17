<?php
displayPageHeader('Dashboard | ' . WEB_NAME);
displayMainNavigation('dashboard');
 ?>
<section id="ky-dashboard-section">
  <div class="ky-dashboard">
    <a href="<?php echo URL ?>/customer/display/" class="">
      <div class="dashboard-small-container">
        <div class="ky-icon-container ky-customer-icon">
          <span><i class="fas fa-users"></i></span>
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
          <span><i class="fas fa-shapes"></i></span>
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
          <span><i class="fas fa-envelope"></i></span>
        </div>
        <div class="ky-info-container ky-conversation-info">
          <span id="messages_count"></span>
          <span>New Messages</span>
        </div>
      </div>
    </a>
    <a href="<?php echo URL ?>/membership/display/">
      <div class="dashboard-small-container memberships">
        <div>Memberships</div>
        <div class="ky-membership-icons-container">
          <span><i class="fas fa-award ky-silver-icon"></i></span>
          <span id="membership-hover"><i class="fas fa-award ky-gold-icon"></i></span>
          <span><i class="fas fa-award ky-platinum-icon"></i></span>
          <span><i class="fas fa-gem ky-diamond-icon"></i></span>
        </div>
      </div>
    </a>
    </div>
    <section class="dashboard-form-part">
      <div class="dashboard-form-container">
        <div class="dashboard-form">
          <span>Add New Customer</span>
          <form class="ky-create-customer-form" action="<?php echo URL ?>/customer/create/" method="post">
            <input type="text" name="username" placeholder="Username">
            <input type="password" name="password1" placeholder="Password">
            <input type="password" name="password2" placeholder="Confirm Password">
            <input type="number" name="phone" placeholder="Phone Number">
            <textarea name="address" placeholder="Address"></textarea>
            <input type="submit" value="Create">
          </form>
        </div>
        <div class=""></div>
        <div class=""></div>
        <div class=""></div>
      </div>
      <div class="exchange-rate-and-req-pass-container">
        <div class="wp-exchange-rate-container">
          <div class="wp-exchange-rate-header">
            <span>Exchange rate</span>
            <span id="wp-rate-svg">
              <svg width="120" height="32" viewBox="0 0 120 32" fill="none" xmlns="http://www.w3.org/2000/svg">
              <g clip-path="url(#clip0)">
              <path d="M1.63266 30.8175C1.63266 30.8175 5.84164 19.5207 13.3061 22.8078C20.7706 26.0956 16.822 24.1429 20.6025 24.1429C24.382 24.1429 25.6384 11.9717 30.7837 14.2377C35.9298 16.5038 31.1649 39.7857 39.1502 24.0625C47.1347 8.34007 44.3355 3.97095 50.3045 1.34249C56.2735 -1.28672 60.8188 14.6657 65.6425 15.4657C70.4661 16.2664 73.5233 6.86881 74.0082 6.86881C74.4931 6.86881 77.8286 12.6057 80.9796 8.71142C84.1314 4.81709 83.6506 2.99607 86.5576 6.25486C89.4637 9.51439 100.238 35.9449 104.683 27.133C109.129 18.3211 107.004 25.6893 111.071 27.4805C115.139 29.271 118.367 30.8175 118.367 30.8175" fill="#2EC5FF" fill-opacity="0.3"/>
              <path d="M1.63266 30.8175C1.63266 30.8175 5.84164 19.5207 13.3061 22.8078C20.7706 26.0956 16.822 24.1429 20.6025 24.1429C24.382 24.1429 25.6384 11.9717 30.7837 14.2377C35.9298 16.5038 31.1649 39.7857 39.1502 24.0625C47.1347 8.34007 44.3355 3.97095 50.3045 1.34249C56.2735 -1.28672 60.8188 14.6657 65.6425 15.4657C70.4661 16.2664 73.5233 6.86881 74.0082 6.86881C74.4931 6.86881 77.8286 12.6057 80.9796 8.71142C84.1314 4.81709 83.6506 2.99607 86.5576 6.25486C89.4637 9.51439 100.238 35.9449 104.683 27.133C109.129 18.3211 107.004 25.6893 111.071 27.4805C115.139 29.271 118.367 30.8175 118.367 30.8175" stroke="#2EC5FF" stroke-width="2.74"/>
              </g>
              <defs>
              <clipPath id="clip0">
              <rect width="120" height="32" fill="white"/>
              </clipPath>
              </defs>
              </svg>
            </span>
            <span class="wp-edit edit-rate"><i class="fas fa-pen"></i></span>
            <span class="wp-edit done-edit"><i class="fas fa-check"></i></span>
          </div>
          <div id="wp-exc-rate">
            <div class="wp-exchange-rate">
              <?php $rate = ExchangeRate::getLatestExchangeRate(); ?>
              <span>1&nbsp;<i class="fas fa-dollar-sign"></i></span>
              <span id="wp-exchange-icon"><i class="fas fa-exchange-alt"></i></span>
              <span id="mmk-rate"><input id="mmk" type="text" name="" value="<?php echo $rate->getValueEncoded('mmk') ?>" disabled="disabled"><span id="exc-mmk">MMK</span></span>
            </div>
          </div>
        </div>
        <div class="wp-req-pass">
          <h2>Password Request</h2>
          <div class="wp-req-pass-table">
            <table>
              <thead>
                <tr>
                  <th><span><i class="fas fa-phone-alt"></i></span></th>
                  <th><span><i class="fas fa-clock"></i></span></th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $password_requests = PasswordRequest::getAllPasswordRequest();
                  foreach($password_requests as $password_request) :
                 ?>
                 <tr>
                   <td><?php echo $password_request->getValueEncoded('phone') ?></td>
                   <td><?php echo $password_request->getValueEncoded('requested_date') ?></td>
                 </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </section>
</section>
<script type="text/javascript">
  $(document).ready(function() {
    var w=$('#ky-dashboard-section').width();
    var h=$('.dashboard-form-part').height();
  });
</script>
<script src="<?php echo FILE_URL ?>/scripts/jquery.validate.min.js" charset="utf-8"></script>
<script src="<?php echo URL ?>/scripts/dashboard.js"></script>

<?php
displayPageFooter();
?>
