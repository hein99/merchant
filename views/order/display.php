<?php
displayPageHeader('Order List | ' . WEB_NAME);
displayMainNavigation('order');
 ?>
 <div class="wp-customer-page-container">
<div class="wp-customer-page-header wp-order-page-header">
    <div class="wp-customer-count-container">
      <span>Orders</span>
      <div id="wp-customer-count"><i id="order-count-js"></i>&nbsp;Total</div>
    </div>

    <div class="wp-customer-ac-de-buttons order-status-buttons">
        <button type="button" name="button" data-no="3" class="order-btn-js"><?php echo ORDER_STATUS_3 ?></button>
        <button type="button" name="button" data-no="4" class="order-btn-js"><?php echo ORDER_STATUS_4 ?></button>
        <button type="button" name="button" data-no="5" class="order-btn-js"><?php echo ORDER_STATUS_5 ?></button>
        <button type="button" name="button" data-no="6" class="order-btn-js"><?php echo ORDER_STATUS_6 ?></button>
        <button type="button" name="button" data-no="0" class="order-btn-js active"><?php echo ORDER_STATUS_0 ?></button>
        <button type="button" name="button" data-no="1" class="order-btn-js"><?php echo ORDER_STATUS_1 ?></button>
        <button type="button" name="button" data-no="2" class="order-btn-js"><?php echo ORDER_STATUS_2 ?></button>
        <button type="button" name="button" data-no="7" class="order-btn-js"><?php echo ORDER_STATUS_7 ?></button>
        <button type="button" name="button" data-no="8" class="order-btn-js"><?php echo ORDER_STATUS_8 ?></button>
    </div>
    <div id="extra"></div>
</div>

   <div class="wp-customer-table wp-order-table">
   <table id="tb-request-js" class="order-tb-js">
     <thead>
       <tr>
         <th>Order&nbsp;Id</th>
         <th>Customer&nbsp;Name</th>
         <th>Product&nbsp;Link</th>
         <th>Remark</th>
         <th>Cupon&nbsp;Code</th>
         <th>Quantity</th>
         <th>Unit&nbsp;Price[<?php echo CURRENCY_SYMBOL ?>]</th>
         <th><?php echo CURRENCY_LABEL ?>&nbsp;Tax[<?php echo CURRENCY_SYMBOL ?>]</th>
         <th>Shipping&nbsp;Cost[<?php echo CURRENCY_SYMBOL ?>]</th>
         <th>First&nbsp;Payment&nbsp;Dollar</th>
         <th>First&nbsp;Exchange&nbsp;Rate</th>
         <th>First&nbsp;Payment&nbsp;MMK</th>
         <th>Order&nbsp;Status</th>
       </tr>
     </thead>
   </table>

   <table id="tb-pending-js" class="order-tb-js">
     <thead>
       <tr>
         <th>Order&nbsp;Id</th>
         <th>Customer&nbsp;Name</th>
         <th>Product&nbsp;Link</th>
         <th>Remark</th>
         <th>Cupon&nbsp;Code</th>
         <th>Quantity</th>
         <th>Unit&nbsp;Price[<?php echo CURRENCY_SYMBOL ?>]</th>
         <th><?php echo CURRENCY_LABEL ?>&nbsp;Tax[<?php echo CURRENCY_SYMBOL ?>]</th>
         <th>Shipping&nbsp;Cost[<?php echo CURRENCY_SYMBOL ?>]</th>
         <th>First&nbsp;Payment&nbsp;Dollar</th>
         <th>First&nbsp;Exchange&nbsp;Rate</th>
         <th>First&nbsp;Payment&nbsp;MMK</th>
         <th>Order&nbsp;Status</th>
       </tr>
     </thead>
   </table>

   <table id="tb-confirm-js" class="order-tb-js">
     <thead>
       <tr>
         <th>Order&nbsp;Id</th>
         <th>Customer&nbsp;Name</th>
         <th>Product&nbsp;Link</th>
         <th>Remark</th>
         <th>Cupon&nbsp;Code</th>
         <th>Quantity</th>
         <th>Unit&nbsp;Price[<?php echo CURRENCY_SYMBOL ?>]</th>
         <th><?php echo CURRENCY_LABEL ?>&nbsp;Tax[<?php echo CURRENCY_SYMBOL ?>]</th>
         <th>Shipping&nbsp;Cost[<?php echo CURRENCY_SYMBOL ?>]</th>
         <th>First&nbsp;Payment&nbsp;Dollar</th>
         <th>First&nbsp;Exchange&nbsp;Rate</th>
         <th>First&nbsp;Payment&nbsp;MMK</th>
         <th>Order&nbsp;Status</th>
       </tr>
     </thead>
   </table>

   <table id="tb-ship-to-us-js" class="order-tb-js">
     <thead>
       <tr>
         <th>Order&nbsp;Id</th>
         <th>Customer&nbsp;Name</th>
         <th>Product&nbsp;Link</th>
         <th>Remark</th>
         <th>Cupon&nbsp;Code</th>
         <th>Quantity</th>
         <th>Unit&nbsp;Price[<?php echo CURRENCY_SYMBOL ?>]</th>
         <th><?php echo CURRENCY_LABEL ?>&nbsp;Tax[<?php echo CURRENCY_SYMBOL ?>]</th>
         <th>Shipping&nbsp;Cost[<?php echo CURRENCY_SYMBOL ?>]</th>
         <th>First&nbsp;Payment&nbsp;Dollar</th>
         <th>First&nbsp;Exchange&nbsp;Rate</th>
         <th>First&nbsp;Payment&nbsp;MMK</th>
         <th>Order&nbsp;Status</th>
       </tr>
     </thead>
   </table>

   <table id="tb-arrived-at-us-js" class="order-tb-js">
     <thead>
       <tr>
         <th>Order&nbsp;Id</th>
         <th>Customer&nbsp;Name</th>
         <th>Product&nbsp;Link</th>
         <th>Remark</th>
         <th>Cupon&nbsp;Code</th>
         <th>Quantity</th>
         <th>Unit&nbsp;Price[<?php echo CURRENCY_SYMBOL ?>]</th>
         <th><?php echo CURRENCY_LABEL ?>&nbsp;Tax[<?php echo CURRENCY_SYMBOL ?>]</th>
         <th>Shipping&nbsp;Cost[<?php echo CURRENCY_SYMBOL ?>]</th>
         <th>First&nbsp;Payment&nbsp;Dollar</th>
         <th>First&nbsp;Exchange&nbsp;Rate</th>
         <th>First&nbsp;Payment&nbsp;MMK</th>
         <th>Order&nbsp;Status</th>
       </tr>
     </thead>
   </table>

   <table id="tb-ship-to-mm-js" class="order-tb-js">
     <thead>
       <tr>
         <th>Order&nbsp;Id</th>
         <th>Customer&nbsp;Name</th>
         <th>Product&nbsp;Link</th>
         <th>Remark</th>
         <th>Cupon&nbsp;Code</th>
         <th>Quantity</th>
         <th>Unit&nbsp;Price[<?php echo CURRENCY_SYMBOL ?>]</th>
         <th><?php echo CURRENCY_LABEL ?>&nbsp;Tax[<?php echo CURRENCY_SYMBOL ?>]</th>
         <th>Shipping&nbsp;Cost[<?php echo CURRENCY_SYMBOL ?>]</th>
         <th>First&nbsp;Payment&nbsp;Dollar</th>
         <th>First&nbsp;Exchange&nbsp;Rate</th>
         <th>First&nbsp;Payment&nbsp;MMK</th>
         <th>Commission&nbsp;[%]</th>
         <th>Weight&nbsp;[lb]</th>
         <th>Weight&nbsp;Cost[<?php echo CURRENCY_SYMBOL ?>]</th>
         <th>MM&nbsp;Task[%]</th>
         <th>Second&nbsp;Payment&nbsp;Dollar</th>
         <th>Second&nbsp;Exchange&nbsp;Rate</th>
         <th>Second&nbsp;Payment&nbsp;MMK</th>
         <th>Order&nbsp;Status</th>
       </tr>
     </thead>
   </table>

   <table id="tb-arrived-at-mm-js" class="order-tb-js">
     <thead>
       <tr>
         <th>Order&nbsp;Id</th>
         <th>Customer&nbsp;Name</th>
         <th>Product&nbsp;Link</th>
         <th>Remark</th>
         <th>Cupon&nbsp;Code</th>
         <th>Quantity</th>
         <th>Unit&nbsp;Price[<?php echo CURRENCY_SYMBOL ?>]</th>
         <th><?php echo CURRENCY_LABEL ?>&nbsp;Tax[<?php echo CURRENCY_SYMBOL ?>]</th>
         <th>Shipping&nbsp;Cost[<?php echo CURRENCY_SYMBOL ?>]</th>
         <th>First&nbsp;Payment&nbsp;Dollar</th>
         <th>First&nbsp;Exchange&nbsp;Rate</th>
         <th>First&nbsp;Payment&nbsp;MMK</th>
         <th>Commission&nbsp;[%]</th>
         <th>Weight&nbsp;[lb]</th>
         <th>Weight&nbsp;Cost[<?php echo CURRENCY_SYMBOL ?>]</th>
         <th>MM&nbsp;Task[%]</th>
         <th>Second&nbsp;Payment&nbsp;Dollar</th>
         <th>Second&nbsp;Exchange&nbsp;Rate</th>
         <th>Second&nbsp;Payment&nbsp;MMK</th>
         <th>Delivery&nbsp;Fee&nbsp;MMK</th>
         <th>Order&nbsp;Status</th>
       </tr>
     </thead>
   </table>

   <table id="tb-complete-js" class="order-tb-js">
     <thead>
       <tr>
         <th>Order&nbsp;Id</th>
         <th>Customer&nbsp;Name</th>
         <th>Product&nbsp;Link</th>
         <th>Remark</th>
         <th>Cupon&nbsp;Code</th>
         <th>Quantity</th>
         <th>Unit&nbsp;Price[<?php echo CURRENCY_SYMBOL ?>]</th>
         <th><?php echo CURRENCY_LABEL ?>&nbsp;Tax[<?php echo CURRENCY_SYMBOL ?>]</th>
         <th>Shipping&nbsp;Cost[<?php echo CURRENCY_SYMBOL ?>]</th>
         <th>First&nbsp;Payment&nbsp;Dollar</th>
         <th>First&nbsp;Exchange&nbsp;Rate</th>
         <th>First&nbsp;Payment&nbsp;MMK</th>
         <th>Commission&nbsp;[%]</th>
         <th>Weight&nbsp;[lb]</th>
         <th>Weight&nbsp;Cost[<?php echo CURRENCY_SYMBOL ?>]</th>
         <th>MM&nbsp;Task[%]</th>
         <th>Second&nbsp;Payment&nbsp;Dollar</th>
         <th>Second&nbsp;Exchange&nbsp;Rate</th>
         <th>Second&nbsp;Payment&nbsp;MMK</th>
         <th>Delivery&nbsp;Fee&nbsp;MMK</th>
         <th>Order&nbsp;Status</th>
       </tr>
     </thead>
   </table>

   <table id="tb-cancel-js" class="order-tb-js">
     <thead>
       <tr>
         <th>Order&nbsp;Id</th>
         <th>Customer&nbsp;Name</th>
         <th>Product&nbsp;Link</th>
         <th>Remark</th>
         <th>Cupon&nbsp;Code</th>
         <th>Quantity</th>
         <th>Unit&nbsp;Price[<?php echo CURRENCY_SYMBOL ?>]</th>
         <th><?php echo CURRENCY_LABEL ?>&nbsp;Tax[<?php echo CURRENCY_SYMBOL ?>]</th>
         <th>Shipping&nbsp;Cost[<?php echo CURRENCY_SYMBOL ?>]</th>
         <th>First&nbsp;Payment&nbsp;Dollar</th>
         <th>First&nbsp;Exchange&nbsp;Rate</th>
         <th>First&nbsp;Payment&nbsp;MMK</th>
         <th>Order&nbsp;Status</th>
       </tr>
     </thead>
   </table>

    </div>
</div>

 <script src="<?php echo FILE_URL ?>/scripts/order.js" charset="utf-8"></script>
 <script src="<?php echo FILE_URL ?>/scripts/datatables.min.js" charset="utf-8"></script>
<?php
displayPageFooter();
?>
