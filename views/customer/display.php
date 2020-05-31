<?php
displayPageHeader('Customer List | ' . WEB_NAME);
displayMainNavigation('customer');
 ?>
<div class="wp-customer-page-container">
  <div class="wp-customer-page-header">
    <div class="wp-customer-count-container">
      <span>Customers</span>
      <div id="wp-customer-count"><i id="customer-count-js"></i>&nbsp;Total</div>
      <span id="user-plus-icon"><i class="fas fa-user-plus"></i></span>
    </div>

    <div class="wp-customer-ac-de-buttons">
      <button type="button" name="button" id="btn-activate-js">Activate</button>
      <button type="button" name="button" id="btn-deactivate-js">Deactivate</button>
    </div>

    <div id="extra"></div>
  </div>

  <link rel="stylesheet" href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
 
  <div class="wp-customer-table">
    <table id="tb-activate-js">
      <thead>
        <tr>
          <th>Membership</th>
          <th>Customer ID</th>
          <th>Customer Name</th>
          <th>Phone no.</th>
          <th>Balance</th>
          <th>Created Date</th>
          <th>Activate/Deactivate</th>
        </tr>
      </thead>
    </table>

    <table id="tb-deactivate-js">
      <thead>
        <tr>
          <th>Membership</th>
          <th>Customer ID</th>
          <th>Customer Name</th>
          <th>Phone no.</th>
          <th>Balance</th>
          <th>Created Date</th>
          <th>Activate/Deactivate</th>
        </tr>
      </thead>
    </table>
  </div>

  <!-- silver icon -->
  <div class="wp-membership-logo">
    <i class="fas fa-award"></i>
    <span id="membership-level">S</span>
  </div>
  <!-- end of silver icon -->

</div>

<script src="<?php echo FILE_URL ?>/scripts/customer.js" charset="utf-8"></script>
<script src="<?php echo FILE_URL ?>/scripts/datatables.min.js" charset="utf-8"></script>
<?php
displayPageFooter();
?>
