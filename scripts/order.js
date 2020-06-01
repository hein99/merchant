$(document).ready(function(){
  getTotalOrdersCount();
  $('#tb-request-js').DataTable( {
      "ajax": {
          "url": PAGE_URL + "/order/get_orders/?order_status=1",
          "dataSrc": ""
      },
      "columns": [
          { "data": "order_id" },
          { "data": "product_link" },
          { "data": "remark" },
          { "data": "quantity" },
          { "data": "price" },
          { "data": "amount" },
          { "data": "mm_tax" },
          { "data": "us_tax" },
          { "data": "commission" },
          { "data": "weight" },
          { "data": "net_weight" },
          { "data": "order_status" },
          { "data": "product_shipping_status" }
      ]
  } );
  $('#tb-pending-js').DataTable( {
      "ajax": {
          "url": PAGE_URL + "/order/get_orders/?order_status=2",
          "dataSrc": ""
      },
      "columns": [
          { "data": "order_id" },
          { "data": "product_link" },
          { "data": "remark" },
          { "data": "quantity" },
          { "data": "price" },
          { "data": "amount" },
          { "data": "mm_tax" },
          { "data": "us_tax" },
          { "data": "commission" },
          { "data": "weight" },
          { "data": "net_weight" },
          { "data": "order_status" },
          { "data": "product_shipping_status" }
      ]
  } );
  $('#tb-confirm-js').DataTable( {
      "ajax": {
          "url": PAGE_URL + "/order/get_orders/?order_status=3",
          "dataSrc": ""
      },
      "columns": [
          { "data": "order_id" },
          { "data": "product_link" },
          { "data": "remark" },
          { "data": "quantity" },
          { "data": "price" },
          { "data": "amount" },
          { "data": "mm_tax" },
          { "data": "us_tax" },
          { "data": "commission" },
          { "data": "weight" },
          { "data": "net_weight" },
          { "data": "order_status" },
          { "data": "product_shipping_status" }
      ]
  } );
  $('#tb-cancel-js').DataTable( {
      "ajax": {
          "url": PAGE_URL + "/order/get_orders/?order_status=4",
          "dataSrc": ""
      },
      "columns": [
          { "data": "order_id" },
          { "data": "product_link" },
          { "data": "remark" },
          { "data": "quantity" },
          { "data": "price" },
          { "data": "amount" },
          { "data": "mm_tax" },
          { "data": "us_tax" },
          { "data": "commission" },
          { "data": "weight" },
          { "data": "net_weight" },
          { "data": "order_status" },
          { "data": "product_shipping_status" }
      ]
  } );

  $('#tb-request-js_wrapper').show();
  $('#tb-pending-js_wrapper').hide();
  $('#tb-confirm-js_wrapper').hide();
  $('#tb-cancel-js_wrapper').hide();

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

// $(document).on('click', '.activate-toggle-js', function(){
//   var id = $(this).data('id');
//   changeActivateStatus(id);
// });
//
// function changeActivateStatus(id)
// {
//   $.ajax({
//     url: PAGE_URL+'/customer/change_activate_status/',
//     data: "id="+id,
//     method:"POST",
//   })
// }

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
