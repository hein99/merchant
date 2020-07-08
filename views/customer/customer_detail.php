<?php
displayPageHeader('Customer List | ' . WEB_NAME);
displayMainNavigation('customer');
 ?>
 <section id="wp-customer-detail-back">
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
  <div class="wp-customer-detail-header">
    <a href="javascript:history.go(-1)"><i class="fas fa-arrow-left"></i></a>
  </div>
  <div class="wp-customer-detail-container">
    <div class="wp-customer-detail">
      <div class="wp-customer-data">
        <div id="user-icon"><i class="fas fa-user-circle"></i></div>
        <div class="wp-customer-name-and-point">
          <h2><?php echo $customer->getValueEncoded('username') ?></h2>
          <?php
          // echo $customer->getValueEncoded('activate_status') ? '<button type="button" name="button" class="activate-toggle-js" id="btn-activate-js" data-id="'.$customer->getValueEncoded('id').'">Activate</button>' :
          //   '<button type="button" name="button" class="activate-toggle-js" id="btn-deactivate-js" data-id="'.$customer->getValueEncoded('id').'">Deactivate</button>';
           ?>
            <span>
              <i class="fas fa-award <?php echo $membership_icon; ?>"></i>
              <span id="membership-status"><?php echo $membership_name; ?></span>
              <span id="slash">&nbsp;/&nbsp;</span><?php echo number_format($customer->getValueEncoded('point')/1000) ?> points
            </span>
        </div>
          <span id="wp-customer-activation">
            <button type="button" name="button" class="detail-activate-toggle-js <?php echo $customer->getValueEncoded('activate_status') ? '':'hide' ?> wp-activate" id="btn-activate-js" data-id="<?php echo $customer->getValueEncoded('id') ?>">Activate</button>
            <button type="button" name="button" class="detail-activate-toggle-js <?php echo $customer->getValueEncoded('activate_status') ? 'hide':'' ?> wp-deactivate" id="btn-deactivate-js" data-id="<?php echo $customer->getValueEncoded('id') ?>">Deactivate</button>
          </span>
      </div>

      <div class="wp-customer-about">
        <div id="wp-balance">
          <i class="fas fa-wallet"></i>
          <span id="balance"><?php echo number_format($customer->getValueEncoded('balance'), 2) ?></span>&nbsp;Ks
        </div>
        <div id="wp-phone">
          <i class="fas fa-phone-alt"></i>
          <?php echo $customer->getValueEncoded('phone') ?>
        </div>
        <div id="wp-address">
          <i class="fas fa-map-marker-alt"></i>
          <span><?php echo $customer->getValueEncoded('address') ?></span>
        </div>
      </div>
    </div>

<div class="wp-customer-forms">
    <form class="wp-change-customer-detail-container" action="<?php echo URL ?>/customer/edit_customer_info/" method="post">
      <h2>Change Information</h2>
      <input type="hidden" name="id" value="<?php echo $customer->getValueEncoded('id') ?>">
      <div class="wp-change-customer-detail">
        <input type="text" name="username" value="<?php echo $customer->getValueEncoded('username') ?>" id="username">
        <span>Username</span>
      </div>
      <div class="wp-change-customer-detail">
        <input type="number" name="phone" value="<?php echo $customer->getValueEncoded('phone') ?>" id="phone">
        <span>Phone</span>
      </div>
      <div class="wp-change-customer-detail wp-customer-address">
        <textarea name="address" id="address"><?php echo $customer->getValueEncoded('address') ?></textarea>
        <span>Address</span>
      </div>
      <div class="wp-change-customer-detail">
        <input type="number" name="point" value="<?php echo $customer->getValueEncoded('point') ?>" id="point">
        <span>Point</span>
      </div>
      <div class="wp-change-customer-detail">
        <select name="membership_id">
          <option value="1" <?php echo $membership_id == 1 ? 'selected': '' ?>>Silver</option>
          <option value="2" <?php echo $membership_id == 2 ? 'selected': '' ?>>Gold</option>
          <option value="3" <?php echo $membership_id == 3 ? 'selected': '' ?>>Platinum</option>
          <option value="4" <?php echo $membership_id == 4 ? 'selected': '' ?>>Diamond</option>
        </select>
        <span>Membership</span>
      </div>
      <div class="wp-change-customer-detail">
        <button type="submit">Change</button>
      </div>
    </form>

   <form class="wp-change-customer-password-container" action="<?php echo URL ?>/customer/change_password/" method="post">
      <div id="fingerprint"><i class="fas fa-fingerprint"></i></div>
     <h2>Change Password</h2>
       <input type="hidden" name="id" value="<?php echo $customer->getValueEncoded('id') ?>">
       <input type="hidden" name="phone" value="<?php echo $customer->getValueEncoded('phone') ?>">
     <div class="wp-change-customer-password">
       <input type="password" name="new_password" placeholder="New Password">
     </div>
     <div class="wp-change-customer-password">
       <button type="submit" id="change_password">Change</button>
     </div>
   </form>
</div>
</div>

  <div class="wp-customer-history-container">
    <form class="wp-customer-amount" action="" method="">
      <div class="wp-amount">
        <h2>Add an amount</h2>
        <input type="hidden" name="id" value="<?php echo $customer->getValueEncoded('id') ?>" id="customer_id">
        <input type="number" name="amount" placeholder="0.00&nbsp;Ks" id="amount">
      </div>

      <div class="wp-about">
        <textarea name="about" rows="5" cols="20" placeholder="Add a reason to add or subtract" id="about"></textarea>
      </div>

      <div class="wp-add-sub-buttons">
        <button type="button" name="add" id="sn-add-amount">Add</button>
        <button type="button" name="sub" id="sn-sub-amount">Sub</button>
      </div>
    </form>

  <div class="wp-customer-history">
    <h2>History</h2>
    <!-- <?php echo '<span id="status">status</span>'; ?> -->
    <div class="wp-history-table">
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
            <td class="<?php echo $customer_statement->getValue('amount_status') ? 'plus' : 'minus'?>"><span><?php echo $customer_statement->getValue('amount_status') ? '+' : '-'?></span><?php echo $customer_statement->getValueEncoded('amount'); ?>&nbsp;Ks</td>
          </tr>
        <?php endforeach; ?>
      </tbody>
      </div>
    </table>
  </div>
</div>
 </section>
<script src="<?php echo FILE_URL ?>/scripts/jquery.validate.min.js" charset="utf-8"></script>
<script src="<?php echo FILE_URL ?>/scripts/customer_detail.js"></script>
<?php
displayPageFooter();
?>
