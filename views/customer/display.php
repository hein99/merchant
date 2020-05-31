<?php
displayPageHeader('Customer List | ' . WEB_NAME);
displayMainNavigation('customer');
 ?>
<div>
  <h1>Customers</h1>
  <span id="customer-count-js"><!--customer count--></span>
  <button type="button" name="button">Add Logo<span><!--Add customer Logo--></span></button>

  <button type="button" name="button" id="btn-activate-js">Activate</button>
  <button type="button" name="button" id="btn-deactivate-js">Deactivate</button>

  <link rel="stylesheet" href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">

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
    <tfoot>
      <tr>
        <th>Membership</th>
        <th>Customer ID</th>
        <th>Customer Name</th>
        <th>Phone no.</th>
        <th>Balance</th>
        <th>Created Date</th>
        <th>Activate/Deactivate</th>
      </tr>
    </tfoot>
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
    <tfoot>
      <tr>
        <th>Membership</th>
        <th>Customer ID</th>
        <th>Customer Name</th>
        <th>Phone no.</th>
        <th>Balance</th>
        <th>Created Date</th>
        <th>Activate/Deactivate</th>
      </tr>
    </tfoot>
  </table>
</div>

<script src="<?php echo FILE_URL ?>/scripts/customer.js" charset="utf-8"></script>
<script src="<?php echo FILE_URL ?>/scripts/datatables.min.js" charset="utf-8"></script>
<?php
displayPageFooter();
?>
