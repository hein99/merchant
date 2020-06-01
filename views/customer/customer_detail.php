<?php
displayPageHeader('Customer List | ' . WEB_NAME);
displayMainNavigation('customer');
 ?>
 <section>
  <h1>Customer Detail</h1>
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
          $membership_name = 'Gold';
          $membership_icon = 'gold';
          break;
        case '3':
          $membership_name = 'Platinum';
          $membership_icon = 'platinum';
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
    <a href="<?php echo URL ?>/customer/">Back</a>
  </div>
  <div class="">
    <span id="user-icon"><i class="fas fa-user-circle"></i></span>
    <h2><?php echo $customer->getValueEncoded('username') ?></h2>
    <?php
    // echo $customer->getValueEncoded('activate_status') ? '<button type="button" name="button" class="activate-toggle-js" id="btn-activate-js" data-id="'.$customer->getValueEncoded('id').'">Activate</button>' :
    //   '<button type="button" name="button" class="activate-toggle-js" id="btn-deactivate-js" data-id="'.$customer->getValueEncoded('id').'">Deactivate</button>';
     ?>
    <button type="button" name="button" class="activate-toggle-js <?php echo $customer->getValueEncoded('activate_status') ? '':'hide' ?>" id="btn-activate-js" data-id="<?php echo $customer->getValueEncoded('id') ?>">Activate</button>
    <button type="button" name="button" class="activate-toggle-js <?php echo $customer->getValueEncoded('activate_status') ? 'hide':'' ?>" id="btn-deactivate-js" data-id="<?php echo $customer->getValueEncoded('id') ?>">Deactivate</button>
    <div class="">
      <span><i class="fas fa-award silver <?php echo $membership_icon; ?>"></i> <?php echo $membership_name; ?></span> / <span><?php echo $customer->getValueEncoded('point') ?> points</span>
    </div>
    <div class="">
      <span><i class="fas fa-wallet"></i><span id="balance"><?php echo $customer->getValueEncoded('balance') ?> Ks</span></span>
      <span><i class="fas fa-phone-alt"></i><?php echo $customer->getValueEncoded('phone') ?></span>
      <span><i class="fas fa-map-marker-alt"></i><?php echo $customer->getValueEncoded('address') ?></span>
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
        <span>Balance</span>
        <input type="number" name="balance" value="<?php echo $customer->getValueEncoded('balance') ?>">
      </div>
      <div class="">
        <span>Membership</span>
        <select name="membership_id">
          <option value="1" <?php echo $membership_id == 1 ? 'selected': '' ?>>Silver</option>
          <option value="2" <?php echo $membership_id == 2 ? 'selected': '' ?>>Gold</option>
          <option value="3" <?php echo $membership_id == 3 ? 'selected': '' ?>>Platinum</option>
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
<br/><br/>
  <div class="">
    <form class="" action="" method="">
      <h2>Add an amount</h2>
      <input type="hidden" name="id" value="<?php echo $customer->getValueEncoded('id') ?>" id="customer_id">
      <div class="">
        <input type="number" name="amount" placeholder="0Ks" id="amount">
      </div>
      <div class="">
        <textarea name="about" rows="5" cols="20" placeholder="Add a reason to add or subtract" id="about"></textarea>
      </div>
      <div class="">
        <button type="button" name="add" id="sn-add-amount">+</button>
        <button type="button" name="sub" id="sn-sub-amount">-</button>
      </div>
    </form>
  </div>
<br/><br/>
<div class="">
  <h2>History</h2>
  <?php echo '<span id="status">status</span>'; ?>
  <table>
    <thead>
      <tr>
        <th>Date</th>
        <th>About</th>
        <th>Amount</th>
      </tr>
    </thead>
    <tbody id="statement_history">
      <?php foreach ($customer_statements as $customer_statement): ?>
        <tr>
          <td><?php echo $customer_statement->getValueEncoded('created_date'); ?></td>
          <td><?php echo $customer_statement->getValueEncoded('about'); ?></td>
          <td class="<?php echo $customer_statement->getValue('amount_status') ? 'plus' : 'minus'?>"><span><?php echo $customer_statement->getValue('amount_status') ? '+' : '-'?></span><?php echo $customer_statement->getValueEncoded('amount'); ?></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>
 </section>
<script src="<?php echo URL ?>/scripts/customer_detail.js"></script>
<?php
displayPageFooter();
?>
