$(document).ready(function(){
  getTotalOrdersCount();
  $('#tb-request-js').DataTable( {
      "ajax": {
          "url": PAGE_URL + "/order/get_orders/?order_status=0",
          "dataSrc": ""
      },
      "columns": [
          { "data": "order_id" },
          { "data": "customer_name"},
          { "data": "product_link" },
          { "data": "remark" },
          { "data": "quantity" },
          { "data": "unit_price" },
          { "data": "product_weight" },
          { "data": "weight_cost" },
          { "data": "sub_total" },
          { "data": "mm_tax" },
          { "data": "us_tax" },
          { "data": "commission" },
          { "data": "total_amount_dollar" },
          { "data": "exchange_rate" },
          { "data": "total_amount_mmk" },
          { "data": "order_status" },
          { "data": "product_shipping_status" }
      ]
  } );
  $('#tb-pending-js').DataTable( {
      "ajax": {
          "url": PAGE_URL + "/order/get_orders/?order_status=1",
          "dataSrc": ""
      },
      "columns": [
        { "data": "order_id" },
        { "data": "customer_name"},
        { "data": "product_link" },
        { "data": "remark" },
        { "data": "quantity" },
        { "data": "unit_price" },
        { "data": "product_weight" },
        { "data": "weight_cost" },
        { "data": "sub_total" },
        { "data": "mm_tax" },
        { "data": "us_tax" },
        { "data": "commission" },
        { "data": "total_amount_dollar" },
        { "data": "exchange_rate" },
        { "data": "total_amount_mmk" },
        { "data": "order_status" },
        { "data": "product_shipping_status" }
      ]
  } );
  $('#tb-confirm-js').DataTable( {
      "ajax": {
          "url": PAGE_URL + "/order/get_orders/?order_status=2",
          "dataSrc": ""
      },
      "columns": [
        { "data": "order_id" },
        { "data": "customer_name"},
        { "data": "product_link" },
        { "data": "remark" },
        { "data": "quantity" },
        { "data": "unit_price" },
        { "data": "product_weight" },
        { "data": "weight_cost" },
        { "data": "sub_total" },
        { "data": "mm_tax" },
        { "data": "us_tax" },
        { "data": "commission" },
        { "data": "total_amount_dollar" },
        { "data": "exchange_rate" },
        { "data": "total_amount_mmk" },
        { "data": "order_status" },
        { "data": "product_shipping_status" }
      ]
  } );
  $('#tb-cancel-js').DataTable( {
      "ajax": {
          "url": PAGE_URL + "/order/get_orders/?order_status=3",
          "dataSrc": ""
      },
      "columns": [
        { "data": "order_id" },
        { "data": "customer_name"},
        { "data": "product_link" },
        { "data": "remark" },
        { "data": "quantity" },
        { "data": "unit_price" },
        { "data": "product_weight" },
        { "data": "weight_cost" },
        { "data": "sub_total" },
        { "data": "mm_tax" },
        { "data": "us_tax" },
        { "data": "commission" },
        { "data": "total_amount_dollar" },
        { "data": "exchange_rate" },
        { "data": "total_amount_mmk" },
        { "data": "order_status" },
        { "data": "product_shipping_status" }
      ]
  } );

  $('#tb-request-js_wrapper').show();
  $('#tb-pending-js_wrapper').hide();
  $('#tb-confirm-js_wrapper').hide();
  $('#tb-cancel-js_wrapper').hide();

  $('.order-status-buttons button').on('click', function(){
    $(this).addClass('active').siblings().removeClass('active');
  });

  $('.dataTable').wrap('<div class="order-table-wrapper"></div>');
});

$(document).on('click', '#btn-request-js', function(){
  $('#tb-request-js_wrapper').show();
  $('#tb-pending-js_wrapper').hide();
  $('#tb-confirm-js_wrapper').hide();
  $('#tb-cancel-js_wrapper').hide();
});

$(document).on('click', '#btn-pending-js', function(){
  $('#tb-request-js_wrapper').hide();
  $('#tb-pending-js_wrapper').show();
  $('#tb-confirm-js_wrapper').hide();
  $('#tb-cancel-js_wrapper').hide();
});

$(document).on('click', '#btn-confirm-js', function(){
  $('#tb-request-js_wrapper').hide();
  $('#tb-pending-js_wrapper').hide();
  $('#tb-confirm-js_wrapper').show();
  $('#tb-cancel-js_wrapper').hide();
});

$(document).on('click', '#btn-cancel-js', function(){
  $('#tb-request-js_wrapper').hide();
  $('#tb-pending-js_wrapper').hide();
  $('#tb-confirm-js_wrapper').hide();
  $('#tb-cancel-js_wrapper').show();
});

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

$(document).on('change', '.weight-js', function(){
  var sub_total = calculateSubTotal($(this));
  var total_dollar = calculateTotalDollar($(this), sub_total);
  calculateTotalMMK($(this), total_dollar);
});


function getTotalOrdersCount()
{
  $.ajax({
    url: PAGE_URL+'/order/get_total_orders_count',
    method:"POST",
    success:function(data){
      $('#order-count-js').html(data);
    }
  })
}

function calculateSubTotal(currentObj)
{
  var parent = currentObj.parent().parent();

  var qty = $('.qty-js', parent).data('qty');
  var unit_price = $('.uprice-js', parent).data('uprice');
  var product_weight = $('.pweight-js', parent).data('pweight');
  var weight_cost = currentObj.val();
  var sub_total = (qty * unit_price)+(product_weight * weight_cost);
  $('.sub-total-js', parent).html(currencyFormat(sub_total));
  return sub_total;
}

function calculateTotalDollar(currentObj, sub_total)
{
  var parent = currentObj.parent().parent();

  var mm_tax = Number($('.mm-tax-js', parent).val());
  var us_tax = Number($('.us-tax-js', parent).val());
  var commission = Number($('.commission-js', parent).val());

  var total_dollar = sub_total + ((mm_tax + us_tax + commission)/100)*sub_total;
  $('.total-dollar-js', parent).html(currencyFormat(total_dollar));
  return total_dollar;
}

function calculateTotalMMK(currentObj, total_dollar)
{
  var parent = currentObj.parent().parent();

  var rate = Number($('.exchange-rate-js', parent).data('erate'));

  $('.total-mmk-js', parent).html(currencyFormat(total_dollar * rate));
}

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
  })
}

function currencyFormat(num) {
  return num.toFixed(2).replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')
}
