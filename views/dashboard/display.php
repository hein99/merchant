<?php
displayPageHeader('Dashboard | ' . WEB_NAME);
displayMainNavigation('dashboard');
 ?>
<main class="sn-grid-warpper">
  <!-- ***** Customer create form -->
  <article class="sn-form-wrapper">
    <h1>Add New Customer</h1>
    <form action="<?php echo URL ?>/customer/create/" method="post" id="customer-create-form-js">
        <div class="error-text">
          <input type="text" name="username" placeholder="Username">
        </div>
        <div class="error-text">
          <input type="password" name="password1" placeholder="Password" id="password1-js">
        </div>
        <div class="error-text">
          <input type="password" name="password2" placeholder="Confirm Password">
        </div>
        <div class="error-text">
          <input type="number" name="phone" placeholder="Phone Number">
        </div>
        <div class="textarea-error">
          <textarea name="address" placeholder="Address"></textarea>
        </div>
      <input type="submit" value="Create">
    </form>
  </article>
  <!-- End customer create form -->

  <!-- ***** Password request table -->
  <article class="sn-pass-wrapper">
    <h1>Password Request</h1>
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
  </article>
  <!-- End password request table -->

  <!-- ***** Floating Text -->
  <article class="sn-floattext-wrapper">
    <?php $text = FloatText::getText(); ?>
    <h1>Floating Text</h1>
    <textarea rows="8" cols="80" disabled="disabled" placeholder="Type here...." id="float-textarea-js"><?php echo $text->getValueEncoded('text') ?></textarea>
    <button type="button" id="edit-float-text-btn-js"><span><i class="fas fa-pencil-alt"></i></span></button>
    <button type="button" id="save-float-text-btn-js"><span><i class="fas fa-check"></i></span></button>
  </article>
  <!-- End floating Text -->

  <!-- ***** Banner Photo -->
  <article class="sn-banner-wrapper">
    <h1>Banner Photos</h1>
    <!-- ***** photos list-->
    <?php $banner_photos = BannerPhotos::getAllPhotos();?>
    <ul>
      <?php foreach($banner_photos as $banner_photo):?>
        <li>
          <img src="<?php echo FILE_URL ?>/photos/banner/id_<?php echo $banner_photo->getValue('id') . '_' . $banner_photo->getValueEncoded('photo_name')?>" alt="<?php $banner_photo->getValueEncoded('photo_name') ?>">
          <ul>
            <li><a href="<?php echo $banner_photo->getValueEncoded('link') ?>" target="_blank">Test Link</a></li>
            <li>Edit Link</li>
            <li>Delete Photo</li>
          </ul>
        </li>
      <?php endforeach; ?>
    </ul>
    <!-- end photos list-->

    <!-- ***** photo create form-->
    <div>
      <form action="<?php echo URL ?>/dashboard/create_photo" method="post" enctype="multipart/form-data">
        <input type="file" name="photo">
        <input type="url" name="link" placeholder="https://www.example.com">
        <input type="submit" value="Add">
      </form>
    </div>
    <!-- end photo create form -->
  </article>
  <!-- End banner photo -->

  <!-- ***** Exchange Rate -->
  <article class="sn-exchange-warpper">
    <h1>Exchange rate</h1>
    <?php $rate = ExchangeRate::getLatestExchangeRate(); ?>
    <span>1&nbsp;<?php echo CURRENCY_SYMBOL ?></span>
    <input type="number" value="<?php echo $rate->getValueEncoded('mmk') ?>" disabled="disabled" id="mmk-input-js">
    <span>MMK</span>
    <button type="button" id="edit-currency-rate-btn-js">Edit</button>
    <button type="button" id="save-currency-rate-btn-js">Save</button>
  </article>
  <!-- End exchange rate -->

  <article class="sn-widget-wrapper">
    <ul>
      <li>
        <a href="<?php echo URL ?>/customer/display/">
          <span id="customers_count"></span>
          <span>Customers</span>
        </a>
      </li>

      <li>
        <a href="<?php echo URL ?>/order/display/">
          <span id="orders_count"></span>
          <span>New Orders</span>
        </a>
      </li>

      <li>
        <a href="<?php echo URL ?>/conversation/display/">
          <span id="messages_count"></span>
          <span>New Messages</span>
        </a>
      </li>

      <li>
        <a href="<?php echo URL ?>/membership/display/">
          <span>Memberships</span>
        </a>
      </li>
    </ul>
  </article>


</main>
<script src="<?php echo FILE_URL ?>/scripts/jquery.validate.min.js" charset="utf-8"></script>
<script src="<?php echo FILE_URL ?>/scripts/dashboard.js"></script>

<?php
displayPageFooter();
?>
