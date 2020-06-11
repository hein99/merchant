<?php
displayPageHeader('Order List | ' . WEB_NAME);
displayMainNavigation('order');
 ?>
 <div class="wp-customer-page-container">
<div class="wp-customer-page-header">
    <div class="wp-customer-count-container">
      <span>Orders</span>
      <div id="wp-customer-count"><i id="order-count-js"></i>&nbsp;Total</div>
    </div>

    <div class="wp-customer-ac-de-buttons order-status-buttons">
        <button type="button" name="button" id="btn-request-js" class="active">Request</button>
        <button type="button" name="button" id="btn-pending-js">Pending</button>
        <button type="button" name="button" id="btn-confirm-js">Confirm</button>
        <button type="button" name="button" id="btn-cancel-js">Cancel</button>
    </div>

    <div id="extra"></div>
</div>

   <div class="wp-customer-table wp-order-table">
   <table id="tb-request-js">
     <thead>
       <tr>
         <th>Order&nbsp;Id</th>
         <th>Customer&nbsp;Name</th>
         <th>Product&nbsp;Link</th>
         <th>Remark</th>
         <th>Quantity</th>
         <th>Unit&nbsp;Price[$]</th>
         <th>Product&nbsp;Weight[Kg]</th>
         <th>Weight&nbsp;Cost[$]</th>
         <th>SubTotal[$]</th>
         <th>MM&nbsp;Tax[%]</th>
         <th>US&nbsp;Tax[%]</th>
         <th>Commission[%]</th>
         <th>Total&nbsp;Amount[$]</th>
         <th>Exchange&nbsp;Rate</th>
         <th>Total&nbsp;Amount[MMK]</th>
         <th>Order&nbsp;Status</th>
         <th>Product&nbsp;Shipping&nbsp;Status</th>
       </tr>
     </thead>
   </table>

   <table id="tb-pending-js">
     <thead>
       <tr>
         <th>Order&nbsp;Id</th>
         <th>Customer&nbsp;Name</th>
         <th>Product&nbsp;Link</th>
         <th>Remark</th>
         <th>Quantity</th>
         <th>Unit&nbsp;Price[$]</th>
         <th>Product&nbsp;Weight[Kg]</th>
         <th>Weight&nbsp;Cost[$]</th>
         <th>SubTotal[$]</th>
         <th>MM&nbsp;Tax[%]</th>
         <th>US&nbsp;Tax[%]</th>
         <th>Commission[%]</th>
         <th>Total&nbsp;Amount[$]</th>
         <th>Exchange&nbsp;Rate</th>
         <th>Total&nbsp;Amount[MMK]</th>
         <th>Order&nbsp;Status</th>
         <th>Product&nbsp;Shipping&nbsp;Status</th>
       </tr>
     </thead>
   </table>

   <table id="tb-confirm-js">
     <thead>
       <tr>
         <th>Order&nbsp;Id</th>
         <th>Customer&nbsp;Name</th>
         <th>Product&nbsp;Link</th>
         <th>Remark</th>
         <th>Quantity</th>
         <th>Unit&nbsp;Price[$]</th>
         <th>Product&nbsp;Weight[Kg]</th>
         <th>Weight&nbsp;Cost[$]</th>
         <th>SubTotal[$]</th>
         <th>MM&nbsp;Tax[%]</th>
         <th>US&nbsp;Tax[%]</th>
         <th>Commission[%]</th>
         <th>Total&nbsp;Amount[$]</th>
         <th>Exchange&nbsp;Rate</th>
         <th>Total&nbsp;Amount[MMK]</th>
         <th>Order&nbsp;Status</th>
         <th>Product&nbsp;Shipping&nbsp;Status</th>
       </tr>
     </thead>
   </table>

   <table id="tb-cancel-js">
     <thead>
       <tr>
         <th>Order&nbsp;Id</th>
         <th>Customer&nbsp;Name</th>
         <th>Product&nbsp;Link</th>
         <th>Remark</th>
         <th>Quantity</th>
         <th>Unit&nbsp;Price[$]</th>
         <th>Product&nbsp;Weight[Kg]</th>
         <th>Weight&nbsp;Cost[$]</th>
         <th>SubTotal[$]</th>
         <th>MM&nbsp;Tax[%]</th>
         <th>US&nbsp;Tax[%]</th>
         <th>Commission[%]</th>
         <th>Total&nbsp;Amount[$]</th>
         <th>Exchange&nbsp;Rate</th>
         <th>Total&nbsp;Amount[MMK]</th>
         <th>Order&nbsp;Status</th>
         <th>Product&nbsp;Shipping&nbsp;Status</th>
       </tr>
     </thead>
   </table>
    </div>
</div>

 <script src="<?php echo FILE_URL ?>/scripts/order.js" charset="utf-8"></script>
 <script src="<?php echo FILE_URL ?>/scripts/order1.js" charset="utf-8"></script>
 <script src="<?php echo FILE_URL ?>/scripts/datatables.min.js" charset="utf-8"></script>
<?php
displayPageFooter();
?>
