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
    <div class="swiper-container">
      <div class="swiper-wrapper">
        <?php foreach($banner_photos as $banner_photo):?>
          <div class="swiper-slide">
            <img src="<?php echo FILE_URL ?>/photos/banner/id_<?php echo $banner_photo->getValue('id') . '_' . $banner_photo->getValueEncoded('photo_name')?>" alt="<?php $banner_photo->getValueEncoded('photo_name') ?>">
            <span class="sn-show-edit"><i class="fas fa-ellipsis-v"></i></span>
            <ul class="sn-edit-list">
              <li><a href="<?php echo $banner_photo->getValueEncoded('link') ?>" target="_blank">Test Link</a></li>
              <li>Edit Link</li>
              <li>Delete</li>
            </ul>
          </div>
        <?php endforeach; ?>
      </div>
      <div class="swiper-pagination"></div>
    </div>
    <!-- end photos list-->

    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>

    <!-- ***** photo create form-->
    <div class="sn-add-image-form">
      <h1>Add Photo</h1>
      <form action="<?php echo URL ?>/dashboard/create_photo" method="post" enctype="multipart/form-data">
        <input type="file" name="photo">
        <input type="url" name="link" placeholder="https://www.example.com">
        <input type="submit" value="Add">
      </form>
    </div>
    <!-- end photo create form -->
    <button type="button" id="sn-image-upload-js"><span><i class="fas fa-plus"></i></span></button>
  </article>
  <!-- End banner photo -->

  <!-- ***** Exchange Rate -->
  <article class="sn-exchange-wrapper">
    <h1>Exchange rate</h1>
    <?php $rate = ExchangeRate::getLatestExchangeRate(); ?>
    <div class="sn-exchange">
      <span>1&nbsp;<?php echo CURRENCY_SYMBOL ?></span>
      <span class="sn-exchange-icon"><i class="fas fa-exchange-alt"></i></span>
      <span><input type="number" value="<?php echo $rate->getValueEncoded('mmk') ?>" disabled="disabled" id="mmk-input-js"><span>MMK</span></span>
    </div>
    <button type="button" id="edit-currency-rate-btn-js"><span><i class="fas fa-pencil-alt"></i></span></button>
    <button type="button" id="save-currency-rate-btn-js"><span><i class="fas fa-check"></i></span></button>
  </article>
  <!-- End exchange rate -->

  <article class="sn-widget-wrapper">
    <ul>
      <li class="sn-customer-widget">
        <a href="<?php echo URL ?>/customer/display/">
          <div class="">
            <span><i class="fas fa-users"></i></span>
          </div>
          <span id="customers_count"></span>
          <span>Customers</span>
        </a>
      </li>

      <li class="sn-order-widget">
        <a href="<?php echo URL ?>/order/display/">
          <div class="">
            <span><i class="fas fa-shapes"></i></span>
          </div>
          <span id="orders_count"></span>
          <span>New Orders</span>
        </a>
      </li>

      <li class="sn-message-widget">
        <a href="<?php echo URL ?>/conversation/display/">
          <div class="">
            <span><i class="fas fa-envelope"></i></span>
          </div>
          <span id="messages_count"></span>
          <span>New Messages</span>
        </a>
      </li>

      <li class="sn-membership-widget">
        <a href="<?php echo URL ?>/membership/display/">
          <div class="">
            <span id=""><i class="fas fa-award"></i></span>
            <span><i class="fas fa-award"></i></span>
            <span><i class="fas fa-award"></i></span>
            <span><i class="fas fa-gem"></i></span>
          </div>
          <span>Memberships</span>
        </a>
      </li>
    </ul>
  </article>


</main>
<script src="https://swiperjs.com/package/swiper-bundle.min.js"></script>
<script src="<?php echo FILE_URL ?>/scripts/jquery.validate.min.js" charset="utf-8"></script>
<script src="<?php echo FILE_URL ?>/scripts/dashboard.js"></script>

<?php
displayPageFooter();
?>
