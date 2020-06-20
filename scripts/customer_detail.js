$(document).ready(function(){
  $('.wp-change-customer-detail-container').validate({
    rules: {
      username: {
        required: true,
        minlength: 3
      },
      phone: {
        required: true,
        number: true
      },
      address: "required",
      point:{
        required: true,
        number: true
      }
    }
  });

  $('.wp-change-customer-password-container').validate({
    rules: {
      new_password: {
        required: true,
        minlength: 5
      }
    }
  });

  $('.wp-change-customer-detail-container').validate({
    rules: {
      amount: {
        required: true,
        number: true
      },
      about: "required"
    }
  });
});

$(document).on('click', '#btn-activate-js', function(){
  $('#btn-deactivate-js').show();
  $('#btn-activate-js').hide();
});
$(document).on('click', '#btn-deactivate-js', function(){
  $('#btn-deactivate-js').hide();
  $('#btn-activate-js').show();
});
$(document).on('click', '.detail-activate-toggle-js', function(){
  var id = $(this).data('id');
  changeActivateStatus(id);
});

$(document).on('click', '#change_password', function(){
    confirm("Do you really want to change Customer's Password?");
});
$(document).on('click', 'form #sn-add-amount', function(){
  var customer_id = $('#customer_id').val();
  var amount = $('#amount').val();
  var about = $('#about').val();
  $.ajax({
    url: PAGE_URL+'/customer/add_amount',
    method: "POST",
    data:{customer_id:customer_id, amount:amount, about:about},
    success:function(data)
    {
      $('#status').html(data);
      $('#amount').val('');
      $('#about').val('');
      $.ajax({
        url: PAGE_URL+'/customer/get_customer_balance',
        method: "POST",
        data:{customer_id:customer_id},
        success: function(data){
          const formatter = new Intl.NumberFormat('en-US',{
            minimumFractionDigits: 2,
            maximumFractionDigits: 2,
          });
          $('#balance').html(formatter.format(data));
          $.ajax({
            url: PAGE_URL+'/customer/get_history_table',
            method: "POST",
            data:{customer_id:customer_id},
            success: function(data){
              $('#statement_history').html(data);
            }
          })
        }
      })
    }
  })
});

$(document).on('click', 'form #sn-sub-amount', function(){
  var customer_id = $('#customer_id').val();
  var amount = $('#amount').val();
  var about = $('#about').val();
  $.ajax({
    url: PAGE_URL+'/customer/sub_amount',
    method: "POST",
    data:{customer_id:customer_id, amount:amount, about:about},
    success: function(data)
    {
      $('#amount').val('');
      $('#about').val('');
      $.ajax({
        url: PAGE_URL+'/customer/get_customer_balance',
        method: "POST",
        data:{customer_id:customer_id},
        success: function(data){
          const formatter = new Intl.NumberFormat('en-US',{
            minimumFractionDigits: 2,
            maximumFractionDigits: 2,
          });
          $('#balance').html(formatter.format(data));
          $.ajax({
            url: PAGE_URL+'/customer/get_history_table',
            method: "POST",
            data:{customer_id:customer_id},
            success: function(data){
              $('#statement_history').html(data);
            }
          })
        }
      })
    }
  })
});

function changeActivateStatus(id)
{
  $.ajax({
    url: PAGE_URL+'/customer/change_activate_status/',
    data: "id="+id,
    method:"POST",
  })
}
