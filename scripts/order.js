var has_order_tb = new Array(true, false, false, false, false, false, false, false);
$(document).ready(function(){
  getTotalOrdersCount();

  //hide all tables except from Request Table And request server For Request Table data by ajax
  $('.order-tb-js').hide();
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
          { "data": "cupon_code" },
          { "data": "quantity" },
          { "data": "unit_price" },
          { "data": "us_tax" },
          { "data": "shipping_cost" },
          { "data": "first_payment_dollar" },
          { "data": "first_exchange_rate" },
          { "data": "first_payment_mmk" },
          { "data": "order_status" }
      ]
  } );
  $('#tb-request-js').show().wrap('<div class="order-table-wrapper"></div>');
  $('#tb-request-js_wrapper').show();
});

$(document).on('click', '.order-btn-js', function(){
  var number = $(this).data('no');
  switch(number)
  {
    case 0:
      $('.dataTable').parent().parent().hide();
      $('#tb-request-js').parent().parent().show();
      break;

    case 1:
      if(!has_order_tb[1])
      {
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
              { "data": "cupon_code" },
              { "data": "quantity" },
              { "data": "unit_price" },
              { "data": "us_tax" },
              { "data": "shipping_cost" },
              { "data": "first_payment_dollar" },
              { "data": "first_exchange_rate" },
              { "data": "first_payment_mmk" },
              { "data": "order_status" }
            ]
        } );
        $('#tb-pending-js').show().wrap('<div class="order-table-wrapper"></div>');
        has_order_tb[1] = true;
      }
      $('.dataTable').parent().parent().hide();
      $('#tb-pending-js').parent().parent().show();
      break;

    case 2:
      if(!has_order_tb[2])
      {
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
              { "data": "cupon_code" },
              { "data": "quantity" },
              { "data": "unit_price" },
              { "data": "us_tax" },
              { "data": "shipping_cost" },
              { "data": "first_payment_dollar" },
              { "data": "first_exchange_rate" },
              { "data": "first_payment_mmk" },
              { "data": "order_status" }
            ]
        } );
        $('#tb-confirm-js').show().wrap('<div class="order-table-wrapper"></div>');
        has_order_tb[2] = true;
      }
      $('.dataTable').parent().parent().hide();
      $('#tb-confirm-js').parent().parent().show();
      break;

    case 3:
      if(!has_order_tb[3])
      {
        $('#tb-ship-to-us-js').DataTable( {
            "ajax": {
                "url": PAGE_URL + "/order/get_orders/?order_status=3",
                "dataSrc": ""
            },
            "columns": [
              { "data": "order_id" },
              { "data": "customer_name"},
              { "data": "product_link" },
              { "data": "remark" },
              { "data": "cupon_code" },
              { "data": "quantity" },
              { "data": "unit_price" },
              { "data": "us_tax" },
              { "data": "shipping_cost" },
              { "data": "first_payment_dollar" },
              { "data": "first_exchange_rate" },
              { "data": "first_payment_mmk" },
              { "data": "order_status" }
            ]
        } );
        $('#tb-ship-to-us-js').show().wrap('<div class="order-table-wrapper"></div>');
        has_order_tb[3] = true;
      }
      $('.dataTable').parent().parent().hide();
      $('#tb-ship-to-us-js').parent().parent().show();
      break;

    case 4:
      if(!has_order_tb[4])
      {
        $('#tb-arrived-at-us-js').DataTable( {
            "ajax": {
                "url": PAGE_URL + "/order/get_orders/?order_status=4",
                "dataSrc": ""
            },
            "columns": [
              { "data": "order_id" },
              { "data": "customer_name"},
              { "data": "product_link" },
              { "data": "remark" },
              { "data": "cupon_code" },
              { "data": "quantity" },
              { "data": "unit_price" },
              { "data": "us_tax" },
              { "data": "shipping_cost" },
              { "data": "first_payment_dollar" },
              { "data": "first_exchange_rate" },
              { "data": "first_payment_mmk" },
              { "data": "order_status" }
            ]
        } );
        $('#tb-arrived-at-us-js').show().wrap('<div class="order-table-wrapper"></div>');
        has_order_tb[4] = true;
      }
      $('.dataTable').parent().parent().hide();
      $('#tb-arrived-at-us-js').parent().parent().show();
      break;

    case 5:
      if(!has_order_tb[5])
      {
        $('#tb-ship-to-mm-js').DataTable( {
            "ajax": {
                "url": PAGE_URL + "/order/get_orders/?order_status=5",
                "dataSrc": ""
            },
            "columns": [
              { "data": "order_id" },
              { "data": "customer_name"},
              { "data": "product_link" },
              { "data": "remark" },
              { "data": "cupon_code" },
              { "data": "quantity" },
              { "data": "unit_price" },
              { "data": "us_tax" },
              { "data": "shipping_cost" },
              { "data": "first_payment_dollar" },
              { "data": "first_exchange_rate" },
              { "data": "first_payment_mmk" },
              { "data": "commission" },
              { "data": "weight" },
              { "data": "weight_cost" },
              { "data": "mm_tax" },
              { "data": "second_payment_dollar" },
              { "data": "second_exchange_rate" },
              { "data": "second_payment_mmk" },
              { "data": "order_status" }
            ]
        } );
        $('#tb-ship-to-mm-js').show().wrap('<div class="order-table-wrapper"></div>');
        has_order_tb[5] = true;
      }
      $('.dataTable').parent().parent().hide();
      $('#tb-ship-to-mm-js').parent().parent().show();
      break;

    case 6:
      if(!has_order_tb[6])
      {
        $('#tb-arrived-at-mm-js').DataTable( {
            "ajax": {
                "url": PAGE_URL + "/order/get_orders/?order_status=6",
                "dataSrc": ""
            },
            "columns": [
              { "data": "order_id" },
              { "data": "customer_name"},
              { "data": "product_link" },
              { "data": "remark" },
              { "data": "cupon_code" },
              { "data": "quantity" },
              { "data": "unit_price" },
              { "data": "us_tax" },
              { "data": "shipping_cost" },
              { "data": "first_payment_dollar" },
              { "data": "first_exchange_rate" },
              { "data": "first_payment_mmk" },
              { "data": "commission" },
              { "data": "weight" },
              { "data": "weight_cost" },
              { "data": "mm_tax" },
              { "data": "second_payment_dollar" },
              { "data": "second_exchange_rate" },
              { "data": "second_payment_mmk" },
              { "data": "delivery_fee" },
              { "data": "order_status" }
            ]
        } );
        $('#tb-arrived-at-mm-js').show().wrap('<div class="order-table-wrapper"></div>');
        has_order_tb[6] = true;
      }
      $('.dataTable').parent().parent().hide();
      $('#tb-arrived-at-mm-js').parent().parent().show();
      break;

    case 7:
      if(!has_order_tb[7])
      {
        $('#tb-complete-js').DataTable( {
            "ajax": {
                "url": PAGE_URL + "/order/get_orders/?order_status=7",
                "dataSrc": ""
            },
            "columns": [
              { "data": "order_id" },
              { "data": "customer_name"},
              { "data": "product_link" },
              { "data": "remark" },
              { "data": "cupon_code" },
              { "data": "quantity" },
              { "data": "unit_price" },
              { "data": "us_tax" },
              { "data": "shipping_cost" },
              { "data": "first_payment_dollar" },
              { "data": "first_exchange_rate" },
              { "data": "first_payment_mmk" },
              { "data": "commission" },
              { "data": "weight" },
              { "data": "weight_cost" },
              { "data": "mm_tax" },
              { "data": "second_payment_dollar" },
              { "data": "second_exchange_rate" },
              { "data": "second_payment_mmk" },
              { "data": "delivery_fee" },
              { "data": "order_status" }
            ]
        } );
        $('#tb-complete-js').show().wrap('<div class="order-table-wrapper"></div>');
        has_order_tb[7] = true;
      }
      $('.dataTable').parent().parent().hide();
      $('#tb-complete-js').parent().parent().show();
      break;

    case 8:
      if(!has_order_tb[8])
      {
        $('#tb-cancel-js').DataTable( {
            "ajax": {
                "url": PAGE_URL + "/order/get_orders/?order_status=8",
                "dataSrc": ""
            },
            "columns": [
              { "data": "order_id" },
              { "data": "customer_name"},
              { "data": "product_link" },
              { "data": "remark" },
              { "data": "cupon_code" },
              { "data": "quantity" },
              { "data": "unit_price" },
              { "data": "us_tax" },
              { "data": "shipping_cost" },
              { "data": "first_payment_dollar" },
              { "data": "first_exchange_rate" },
              { "data": "first_payment_mmk" },
              { "data": "order_status" }
            ]
        } );
        $('#tb-cancel-js').show().wrap('<div class="order-table-wrapper"></div>');
        has_order_tb[8] = true;
      }
      $('.dataTable').parent().parent().hide();
      $('#tb-cancel-js').parent().parent().show();
      break;
  }
});

$(document).on('click', '.order-status-buttons button', function(){
  $(this).addClass('active').siblings().removeClass('active');
});

$(document).on('change', '.us-tax-js', function(){
  changeFirstPayment($(this));
});

$(document).on('change', '.us-shipping-cost-js', function(){
  changeFirstPayment($(this));
});

$(document).on('change', '.us-shipping-cost-js', function(){
  changeFirstPayment($(this));
});

$(document).on('change', '.percentage-js', function(){
  changeSecondPayment($(this));
});

$(document).on('change', '.product-weight-js', function(){
  changeSecondPayment($(this));
});

$(document).on('change', '.weight-cost-js', function(){
  changeSecondPayment($(this));
});

$(document).on('change', '.mm-tax-js', function(){
  changeSecondPayment($(this));
});

$(document).on('change', '.order-status-js', function(){
  changeOrderStatus($(this));
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

function changeFirstPayment(selectedObj)
{
  var parent = selectedObj.parent().parent();
  var qty = $('.qty-js', parent).data('qty');
  var price = $('.uprice-js', parent).data('uprice');
  var us_tax = Number($('.us-tax-js', parent).val());
  var shipping_cost = Number($('.us-shipping-cost-js', parent).val());
  var rate = $('.first-exchange-rate-js', parent).data('ferate');

  var total_dollar = (qty * price) + us_tax + shipping_cost;
  var total_mmk = total_dollar * rate;

  $('.first-payment-dollar-js', parent).html(currencyFormat(total_dollar));
  $('.first-payment-mmk-js', parent).html(currencyFormat(total_mmk));
}

function changeSecondPayment(selectedObj)
{
  var parent = selectedObj.parent().parent();
  var first_payment = $('.first-payment-dollar-js', parent).data('fpayment')
  var commission = Number($('.percentage-js', parent).val());
  var weight = Number($('.product-weight-js', parent).val());
  var weight_cost = Number($('.weight-cost-js', parent).val());
  var mm_tax = Number($('.mm-tax-js', parent).val());
  var rate = $('.second-exchange-rate-js', parent).data('serate');
  var total_dollar = (first_payment * commission/100) + (weight * weight_cost) + (first_payment * mm_tax/100);
  var total_mmk = total_dollar * rate;

  $('.second-payment-dollar-js', parent).html(currencyFormat(total_dollar));
  $('.second-payment-mmk-js', parent).html(currencyFormat(total_mmk));
}

function currencyFormat(num)
{
  return num.toFixed(2).replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')
}

function changeOrderStatus(selectedObj)
{
  var status = $('option:selected', selectedObj).val();
  var order_id = selectedObj.data('id');
  switch(status)
  {
    case 'no0':
      if(confirm("Do you want to change order status(Request)?\nAre you sure!"))
        changeJustOrderStaus(order_id, '0', selectedObj);
      else
        selectedObj.val('default');
    break;

    case 'no1':
      var has_info = $('option:selected', selectedObj).data('has_info');
      if(confirm("Do you want to change order status(Pending)?\nAre you sure!"))
        if(has_info)
          postFirstPaymentInfo(selectedObj);
        else
          changeJustOrderStaus(order_id, '1', selectedObj);
      else
        selectedObj.val('default');
    break;

    case 'no2':
      if(confirm("Do you want to change order status(Confirm)?\nAre you sure!"))
        changeJustOrderStaus(order_id, '2', selectedObj);
      else
        selectedObj.val('default');
    break;

    case 'no3':
      if(confirm("Do you want to change order status(Shipping to US Warehouse)?\nAre you sure!"))
        changeJustOrderStaus(order_id, '3', selectedObj);
      else
        selectedObj.val('default');
    break;

    case 'no4':
      if(confirm("Do you want to change order status(Arrived at US Warehouse)?\nAre you sure!"))
        changeJustOrderStaus(order_id, '4', selectedObj);
      else
        selectedObj.val('default');
    break;

    case 'no5':
      if(confirm("Do you want to change order status(Shipping to Myanmar)?\nAre you sure!"))
        changeJustOrderStaus(order_id, '5', selectedObj);
      else
        selectedObj.val('default');
    break;

    case 'no6':
      var has_info = $('option:selected', selectedObj).data('has_info');
      if(confirm("Do you want to change order status(Arrived at Myanmar)?\nAre you sure!"))
        if(has_info)
          postSecondPaymentInfo(selectedObj);
        else
          changeJustOrderStaus(order_id, '6', selectedObj);
      else
        selectedObj.val('default');
    break;

    case 'no7':
      var has_info = $('option:selected', selectedObj).data('has_info');
      if(confirm("Do you want to change order status(Complete)?\nAre you sure!"))
        if(has_info)
          postThirdPaymentInfo(selectedObj);
        else
          changeJustOrderStaus(order_id, '7', selectedObj);
      else
        selectedObj.val('default');
    break;

    case 'no8':
      if(confirm("Do you want to change order status(Cancel)?\nAre you sure!"))
        changeJustOrderStaus(order_id, '8', selectedObj);
      else
        selectedObj.val('default');
    break;

  }
}

function changeJustOrderStaus(id, order_status, selectedObj)
{
  var parent = selectedObj.parent().parent();
  $.ajax({
    method: 'POST',
    url: PAGE_URL+'/order/change_order_status/',
    data: {id: id, order_status: order_status}
  }).done(function(e){
    parent.hide();
    console.log(e);
  });
}

function postFirstPaymentInfo(selectedObj)
{
  var parent = selectedObj.parent().parent();
  var id = selectedObj.data('id');
  var us_tax = $('.us-tax-js', parent).val();
  var shipping_cost = $('.us-shipping-cost-js', parent).val();
  if(confirm('Please confirm the following values.\n  US Tax = ' + us_tax + ' $\n  Shippping cost = ' + shipping_cost + ' $'))
    $.ajax({
      method: 'POST',
      url: PAGE_URL+'/order/change_first_payment_info/',
      data: {id: id, us_tax: us_tax, shipping_cost: shipping_cost}
    }).done(function(e){
      parent.hide();
      console.log(e);
    });
  else
    selectedObj.val('default');
}

function postSecondPaymentInfo(selectedObj)
{
  var parent = selectedObj.parent().parent();
  var id = selectedObj.data('id');
  var commission = $('.percentage-js', parent).val();
  var weight = $('.product-weight-js', parent).val();
  var weight_cost = $('.weight-cost-js', parent).val();
  var mm_tax = $('.mm-tax-js', parent).val();
  var rate = $('.second-exchange-rate-js', parent).data('serate');
  if(confirm('Please confirm the following values.\n  Commission = ' + commission + ' $\n  Product weight = ' + weight + ' $\n  Weight cost = ' + weight_cost + ' $\n  MM Tax = ' + mm_tax + ' $'))
    $.ajax({
      method: 'POST',
      url: PAGE_URL+'/order/change_second_payment_info/',
      data: {id: id, commission: commission, product_weight: weight, weight_cost: weight_cost, mm_tax: mm_tax, second_exchange_rate: rate}
    }).done(function(e){
      parent.hide();
      console.log(e);
    });
  else
    selectedObj.val('default');
}

function postThirdPaymentInfo(selectedObj)
{
  var parent = selectedObj.parent().parent();
  var id = selectedObj.data('id');
  var delivery_fee = $('.deli-fee-js', parent).val();
  $.ajax({
    method: 'POST',
    url: PAGE_URL+'/order/change_third_payment_info/',
    data: {id: id, delivery_fee: delivery_fee}
  }).done(function(e){
    parent.hide();
  });
}
