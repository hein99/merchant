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
});
