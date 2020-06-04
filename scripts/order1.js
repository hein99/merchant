$(document).ready(function(){
  $(document).on('change', '.request-order-status-js', function(){
    var text =$('option:selected', this).val();
    switch(text)
    {
      case 'pending':
      if (confirm("Do you want to change order status(Pending)?\nAre you sure!")) {
        changeOrderInfoRequest($(this));
      } else {
        $(this).val('request');
      }
      break;
      case 'cancel':
      if (confirm("Do you want to change order status(Cancel)?\nAre you sure!")) {
        changeOrderStatus($(this), 3);
      } else {
        $(this).val('request');
      }
      break;
    }
  });
  $(document).on('change', '.order-status-js', function(){
    var text =$('option:selected', this).val();
    switch(text)
    {
      case 'request':
      if (confirm("Do you want to change order status(Request)?\nAre you sure!")) {
        changeOrderStatus($(this), 0);
      } else {
        $(this).val('default');
      }
      break;
      case 'cancel':
      if (confirm("Do you want to change order status(Cancel)?\nAre you sure!")) {
        changeOrderStatus($(this), 3);
      } else {
        $(this).val('default');
      }
      break;
    }
  });
  $(document).on('change', '.product-shipping-status-js', function(){
    var text =$('option:selected', this).val();
    switch(text)
    {
      case 'undefined':
      if (confirm("Do you want to change Product Shipping Status(Undefined)?\nAre you sure!")) {
        changeProductShippingStatus($(this), 0);
      } else {
        $(this).val('default');
      }
      break;

      case 'us_warehouse':
      if (confirm("Do you want to change Product Shipping Status(US Warehouse)?\nAre you sure!")) {
        changeProductShippingStatus($(this), 1);
      } else {
        $(this).val('default');
      }
      break;

      case 'transit':
      if (confirm("Do you want to change Product Shipping Status(Transit)?\nAre you sure!")) {
        changeProductShippingStatus($(this), 2);
      } else {
        $(this).val('default');
      }
      break;

      case 'arrived':
      if (confirm("Do you want to change Product Shipping Status(Arrived)?\nAre you sure!")) {
        changeProductShippingStatus($(this), 3);
      } else {
        $(this).val('default');
      }
      break;

      case 'delivered':
      if (confirm("Do you want to change Product Shipping Status(Delivered)?\nAre you sure!")) {
        changeProductShippingStatus($(this), 4);
      } else {
        $(this).val('default');
      }
      break;
    }
  });

  $('.order-status-buttons button').on('click', function(){
    $(this).addClass('active').siblings().removeClass('active');
  });

  $('.dataTable').wrap('<div class="order-table-wrapper"></div>');

});

function changeOrderInfoRequest(currentObj)
{
  var parent = currentObj.parent().parent();

  var id = currentObj.data('id');
  var us_tax = $('.us-tax-js', parent).val();
  var mm_tax = $('.mm-tax-js', parent).val();
  var commission = $('.commission-js', parent).val();
  var weight_cost = $('.weight-js', parent).val();

  $.ajax({
    method:"POST",
    url: PAGE_URL+'/order/change_order_info',
    data: {id: id, us_tax: us_tax, mm_tax: mm_tax, commission: commission, weight_cost: weight_cost, order_status: 1}
  }).done(function(e){
    parent.hide();
  });
}
function changeOrderStatus(currentObj, order_status)
{
  var parent = currentObj.parent().parent();

  var id = currentObj.data('id');
  console.log('id: '+ id + ', order_status: '+ order_status)
  $.ajax({
    method:"POST",
    url: PAGE_URL+'/order/change_order_status',
    data: {id: id, order_status: order_status}
  }).done(function(e){
    parent.hide();
  });
}
function changeProductShippingStatus(currentObj, product_shipping_status)
{
  var parent = currentObj.parent().parent();

  var id = currentObj.data('id');
  console.log('id: '+ id + ', product_shipping_status: '+ product_shipping_status)
  $.ajax({
    method:"POST",
    url: PAGE_URL+'/order/change_product_status',
    data: {id: id, product_shipping_status: product_shipping_status}
  }).done(function(e){
    parent.hide();
  });
}
