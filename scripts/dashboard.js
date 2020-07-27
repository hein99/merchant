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

  function changeExchangeRateAjax()
  {
    var mmk = $('#mmk-input-js').val();
    $.ajax({
      url: PAGE_URL+'/dashboard/created_exchange_rate',
      method:"POST",
      data: "mmk=" + mmk
    })
  }

  function changeFloatTextareaAjax()
  {
    var text = $('#float-textarea-js').val();
    $.ajax({
      url: PAGE_URL+'/dashboard/edit_float_text',
      method:"POST",
      data: {text: text}
    })
  }

  $('#customer-create-form-js').validate({
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
      }
    }
  });

  $(document).on('click', '#edit-currency-rate-btn-js', function(){
    $('#mmk-input-js').prop('disabled', false).focus().select();
    $(this).hide();
    $('#save-currency-rate-btn-js').show();
  });
  $(document).on('click', '#save-currency-rate-btn-js', function(){
    $('#mmk-input-js').prop('disabled', true).blur();
    $(this).hide();
    $('#edit-currency-rate-btn-js').show();
    changeExchangeRateAjax();
  });

  $(document).on('click', '#edit-float-text-btn-js', function(){
    $('#float-textarea-js').prop('disabled', false).focus().select();
    $(this).hide();
    $('#save-float-text-btn-js').show();
  });
  $(document).on('click', '#save-float-text-btn-js', function(){
    $('#float-textarea-js').prop('disabled', true).blur();
    $(this).hide();
    $('#edit-float-text-btn-js').show();
    changeFloatTextareaAjax();
  });


});
