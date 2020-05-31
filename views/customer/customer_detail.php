<?php
displayPageHeader('Customer List | ' . WEB_NAME);
displayMainNavigation('customer');
 ?>
 <section>
  <h1>Customer Detail</h1>

  <div class="">
    <?php
    $membership_id = $customer->getValueEncoded('membership_id');
    $membership_name = '';
    $membership_icon = '';
      switch ($membership_id) {
        case '1':
          $membership_name = 'Silver';
          $membership_icon = 'silver';
          break;
        case '2':
          $membership_name = 'Platinum';
          $membership_icon = 'platinum';
          break;
        case '3':
          $membership_name = 'Gold';
          $membership_icon = 'gold';
          break;
        case '4':
          $membership_name = 'Diamond';
          $membership_icon = 'diamond';
          break;
        default:
          // code...
          break;
      }
    ?>
    <div class="">
      <span id="user-icon"><i class="fas fa-user-circle"></i></span>
      <h2><?php echo $customer->getValueEncoded('username') ?></h2>
      <button type="button" name="button" id="btn-activate-js">Activate</button>
      <button type="button" name="button" id="btn-deactivate-js">Deactivate</button>
      <div class="">
        <span><i class="fas fa-award silver <?php echo $membership_icon; ?>"></i> <?php echo $membership_name; ?></span> / <span><?php echo $customer->getValueEncoded('point') ?> points</span>
      </div>
      <div class="">
        <span><i class="fas fa-wallet"></i><?php echo $customer->getValueEncoded('point') ?> Ks</span>
        <span><i class="fas fa-phone-alt"></i><?php echo $customer->getValueEncoded('phone') ?></span>
        <span><i class="fas fa-map-marker-alt"></i><?php echo $customer->getValueEncoded('address') ?></span>
      </div>
    </div>
    <div class="">

    </div>
  </div>
</br></br>
  <div class="">
    <form class="" action="<?php echo URL ?>/customer/edit_customer_info/" method="post">
      <h2>Edit Customer Information</h2>
      <input type="hidden" name="id" value="<?php echo $customer->getValueEncoded('id') ?>">
      <div class="">
        <span>Username</span>
        <input type="text" name="username" value="<?php echo $customer->getValueEncoded('username') ?>">
      </div>
      <div class="">
        <span>Phone</span>
        <input type="number" name="phone" value="<?php echo $customer->getValueEncoded('phone') ?>">
      </div>
      <div class="">
        <span>Address</span>
        <input type="text" name="address" value="<?php echo $customer->getValueEncoded('address') ?>">
      </div>
      <div class="">
        <span>Point</span>
        <input type="number" name="point" value="<?php echo $customer->getValueEncoded('point') ?>">
      </div>
      <div class="">
        <span>Membership</span>
        <select name="membership_id">
          <option value="1" <?php echo $membership_id == 1 ? 'selected': '' ?>>Silver</option>
          <option value="2" <?php echo $membership_id == 2 ? 'selected': '' ?>>Platinum</option>
          <option value="3" <?php echo $membership_id == 3 ? 'selected': '' ?>>Gold</option>
          <option value="4" <?php echo $membership_id == 4 ? 'selected': '' ?>>Diamond</option>
        </select>
      </div>
      <div class="">
        <button type="submit">Change</button>
      </div>
    </form>
  </div>
<br/><br/>
  <div class="">
   <form class="" action="<?php echo URL ?>/customer/change_password/" method="post">
     <h2>Change Password</h2>
       <input type="hidden" name="id" value="<?php echo $customer->getValueEncoded('id') ?>">
       <input type="hidden" name="username" value="<?php echo $customer->getValueEncoded('username') ?>">
     <div class="">
       <input type="password" name="current_password" placeholder="Current Password">
     </div>
     <div class="">
       <input type="password" name="new_password1" placeholder="New Password">
     </div>
     <div class="">
       <input type="password" name="new_password2" placeholder="Confirm Password">
     </div>
     <div class="">
       <button type="submit">Change</button>
     </div>
   </form>
  </div>

 </section>

<?php
 // echo "<pre>";
 // print_r($customer);
 // print_r($customer_statement);
 // echo "</pre>";
displayPageFooter();
?>
