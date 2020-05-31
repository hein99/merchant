$(document).ready(function(){

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
