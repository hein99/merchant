$(document).ready(function(){

  $(document).on('click', '#btn-activate-js', function(){
    $('#btn-deactivate-js').show();
    $('#btn-activate-js').hide();
  });
  $(document).on('click', '#btn-deactivate-js', function(){
    $('#btn-deactivate-js').hide();
    $('#btn-activate-js').show();
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
        $('#amount').val('');
        $('#about').val('');
        $.ajax({
          url: PAGE_URL+'/customer/get_customer_balance',
          method: "POST",
          data:{customer_id:customer_id},
          success: function(data){
            $('#balance').html(data);
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
            $('#balance').html(data);
          }
        })
      }
    })
  });

});
