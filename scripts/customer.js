$(document).ready(function(){
  getTotalCustomersCount();
  $('#tb-activate-js').DataTable( {
      "ajax": {
          "url": PAGE_URL + "/customer/get_activate_customers",
          "dataSrc": ""
      },
      "columns": [
          { "data": "membership_name" },
          { "data": "customer_id" },
          { "data": "customer_name" },
          { "data": "phone" },
          { "data": "balance" },
          { "data": "created_date" },
          { "data": "activate_status" }
      ]
  } );

  $('#tb-deactivate-js').DataTable( {
      "ajax": {
          "url": PAGE_URL + "/customer/get_deactivate_customers",
          "dataSrc": ""
      },
      "columns": [
          { "data": "membership_name" },
          { "data": "customer_id" },
          { "data": "customer_name" },
          { "data": "phone" },
          { "data": "balance" },
          { "data": "created_date" },
          { "data": "activate_status" }
      ]
  } );

  $('#tb-activate-js_wrapper').show();
  $('#tb-deactivate-js_wrapper').hide();

});

$(document).on('click', '#btn-activate-js', function(){
  $('#tb-activate-js_wrapper').show();
  $('#tb-deactivate-js_wrapper').hide();
});

$(document).on('click', '#btn-deactivate-js', function(){
  $('#tb-activate-js_wrapper').hide();
  $('#tb-deactivate-js_wrapper').show();
});

$(document).on('click', '.activate-toggle-js', function(){
  var id = $(this).data('id');
  changeActivateStatus(id);
});

function changeActivateStatus(id)
{
  $.ajax({
    url: PAGE_URL+'/customer/change_activate_status/',
    data: "id="+id,
    method:"POST",
  })
}

function getTotalCustomersCount()
{
  $.ajax({
    url: PAGE_URL+'/customer/get_customers_count',
    method:"POST",
    success:function(data){
      $('#customer-count-js').html(data);
    }
  })
}
