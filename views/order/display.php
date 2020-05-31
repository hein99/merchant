<?php
displayPageHeader('Order List | ' . WEB_NAME);
displayMainNavigation('order');
 ?>
 <div>
   <h1>Order List</h1>
   <span id="order-count-js"><!--order count--></span>

   <button type="button" name="button" id="btn-request-js">Request</button>
   <button type="button" name="button" id="btn-pending-js">Pending</button>
   <button type="button" name="button" id="btn-confirm-js">Confirm</button>
   <button type="button" name="button" id="btn-cancel-js">Cancel</button>


   <table id="tb-request-js">
     <thead>
       <tr>
         <th>Request Membership</th>
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

   <table id="tb-pending-js">
     <thead>
       <tr>
         <th>Pending Membership</th>
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

   <table id="tb-confirm-js">
     <thead>
       <tr>
         <th>Confirm Membership</th>
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

   <table id="tb-cancel-js">
     <thead>
       <tr>
         <th>Cancel Membership</th>
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


 <script src="<?php echo FILE_URL ?>/scripts/order.js" charset="utf-8"></script>
 <script src="<?php echo FILE_URL ?>/scripts/datatables.min.js" charset="utf-8"></script>
<?php
displayPageFooter();
?>
