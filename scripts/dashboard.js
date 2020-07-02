$(document).ready(function(){

  getTotalCustomersCount();
  getNewOrdersCount();
  getNewMessagesCount();

  setInterval(function(){
    getTotalCustomersCount();
    getNewOrdersCount();
    getNewMessagesCount();
  }, 3000);

  function getTotalCustomersCount()
  {
    $.ajax({
      url: PAGE_URL+'/customer/get_customers_count',
      method:"POST",
      success:function(data){
        $('#customers_count').html(data);
      }
    })
  }
  function getNewOrdersCount()
  {
    $.ajax({
      url: PAGE_URL+'/order/get_new_orders_count',
      method:"POST",
      success:function(data){
        $('#orders_count').html(data);
      }
    })
  }
  function getNewMessagesCount()
  {
    $.ajax({
      url: PAGE_URL+'/conversation/get_all_new_messages_count',
      method:"POST",
      success:function(data){
        $('#messages_count').html(data);
      }
    })
  }

  $(document).on('click', '.edit-rate', function(){
    if($('#mmk').prop('disabled') == true){
      $('#mmk').removeAttr('disabled');
    }

    $('#mmk').focus().select();
    $(this).hide();
    $('.done-edit').show();
  });

  $(document).on('click', '.done-edit', function(){
    if($('#mmk').prop('disabled') == false){
      $('#mmk').prop('disabled', true);
    }
    $(this).hide();
    $('.edit-rate').show();
    changeExchangeRateAjax();
  });


  $('.ky-create-customer-form').validate({
    rules: {
      username: {
        required: true,
        minlength: 2
      },
      password1: {
        required: true,
        minlength: 6
      },
      password2: {
        required: true,
        minlength: 6,
        equalTo: "#password1-js"
      },
      phone: {
        required: true,
        number: true
      },
      address: {
        required: true
      },
    }
  });

  function changeExchangeRateAjax()
  {
    var mmk = $('#mmk').val();
    $.ajax({
      url: PAGE_URL+'/dashboard/created_exchange_rate',
      method:"POST",
      data: "mmk=" + mmk
    })
  }
});
