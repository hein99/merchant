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

  $('.edit-rate').on('click', function(){
    if($('#mmk').prop('disabled') == true){
      $('#mmk').removeAttr('disabled');
    }

    $('#mmk').focus().select();
    $(this).hide();
    $('.done-edit').show();
  });

  $('.done-edit').on('click', function(){
    if($('#mmk').prop('disabled') == false){
      $('#mmk').prop('disabled', true);
    }

    $(this).hide();
    $('.edit-rate').show();
  });

  $('.customer-create-form-js').validate({
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
        equalTo: "#password1"
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

