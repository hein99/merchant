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

/*customer page*/
  $('.wp-customer-ac-de-buttons button').on('click', function(){
    $(this).addClass('active').siblings().removeClass('active');
  });

  $('.dataTable').wrap('<div class="customer-table-wrapper"></div>');
/*customer page*/

  $(document).on('click', '#btn-activate-js', function(){
    $('#tb-activate-js_wrapper').show();
    $('#tb-deactivate-js_wrapper').hide();
  });

  $(document).on('click', '#btn-deactivate-js', function(){
    $('#tb-activate-js_wrapper').hide();
    $('#tb-deactivate-js_wrapper').show();
  });

  $(document).on('click', '.activate-icon', function(){
    var parent = $(this).parent();
    var check_box = $('.activate-toggle-js', parent);
    var id = $('.activate-toggle-js', parent).data('id');

    changeActivateStatus(id);

    if($(check_box).prop('checked') == true)
        $(check_box).prop('checked', false);
      else
        $(check_box).prop('checked', true);
    });  
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
