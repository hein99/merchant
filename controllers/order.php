<?php
switch($action)
{
  case '':
  case 'display':
    require('./views/order/display.php');
    break;

  case 'get_new_orders_count':
    getNewOrdersCount();
    break;

  case 'get_total_orders_count':
    getTotalOrdersCount();
    break;

  case 'get_orders':
    getOrders();
    break;

  case 'change_first_payment_info':
    changeFirstPaymentInfo();
    break;

  case 'change_second_payment_info':
    changeSecondPaymentInfo();
    break;

  case 'change_third_payment_info':
    changeThirdPaymentInfo();
    break;

  case 'change_order_status':
    changeOrderStatus();
    break;

    break;
  default:
    $ERR_STATUS = ERR_ACTION;
    require('./views/error_display.php');
    exit();
}

function getNewOrdersCount()
{
  $total = CustomerOrder::getNewOrdersCount();
  echo $total;
}

function getTotalOrdersCount()
{
  $total = CustomerOrder::getTotalOrdersCount();
  echo number_format($total);
}

function getOrders()
{
  $order_status = isset($_GET['order_status']) ? $_GET['order_status'] : '' ;
  if ( $order_status >= 0 && $order_status <= 8) {
    $orders = CustomerOrder::getCustomerOrderArrayByOrderStatus($order_status);
    CustomerOrder::updateView($order_status);
  }
  else{
    $ERR_STATUS = ERR_URL;
    require('./views/error_display.php');
    exit();
  }
  require('./views/order/general.php');
  ordersJsonReturn($orders, $order_status);
}

function changeFirstPaymentInfo()
{
  $required_fields = array('id', 'us_tax', 'shipping_cost');
  $missing_fields = array();
  $error_messages = array();

  $order = new CustomerOrder(array(
    'id' => isset($_POST['id']) ? preg_replace('/[^0-9]/', '', $_POST['id']) : '',
    'us_tax' => isset($_POST['us_tax']) ? preg_replace('/[^.\0-9]/', '', $_POST['us_tax']) : '',
    'shipping_cost' => isset($_POST['shipping_cost']) ? preg_replace('/[^.\0-9]/', '', $_POST['shipping_cost']) : ''
  ));

  foreach($required_fields as $required_field)
  {
    if($order->getValue($required_field) == '' )
      $missing_fields[] = $required_field;
  }

  if($missing_fields)
  {
    $error_messages[] = 'Please fill all required field';
  }

  if($error_messages)
  {
    $ERR_STATUS = ERR_FORM;
    require('./views/error_display.php');
  }
  else
  {
    $order->updateFirstPaymentInfo();
  }
}

function changeSecondPaymentInfo()
{
  $required_fields = array('id', 'commission', 'product_weight', 'weight_cost', 'mm_tax', 'second_exchange_rate');
  $missing_fields = array();
  $error_messages = array();

  $order = new CustomerOrder(array(
    'id' => isset($_POST['id']) ? preg_replace('/[^0-9]/', '', $_POST['id']) : '',
    'commission' => isset($_POST['commission']) ? preg_replace('/[^.\0-9]/', '', $_POST['commission']) : '',
    'product_weight' => isset($_POST['product_weight']) ? preg_replace('/[^.\0-9]/', '', $_POST['product_weight']) : '',
    'weight_cost' => isset($_POST['weight_cost']) ? preg_replace('/[^.\0-9]/', '', $_POST['weight_cost']) : '',
    'second_exchange_rate' => isset($_POST['second_exchange_rate']) ? preg_replace('/[^.\0-9]/', '', $_POST['second_exchange_rate']) : '',
    'mm_tax' => isset($_POST['mm_tax']) ? preg_replace('/[^.\0-9]/', '', $_POST['mm_tax']) : ''
  ));

  foreach($required_fields as $required_field)
  {
    if($order->getValue($required_field) == '' )
      $missing_fields[] = $required_field;
  }

  if($missing_fields)
  {
    $error_messages[] = 'Please fill all required field';
  }

  if($error_messages)
  {
    $ERR_STATUS = ERR_FORM;
    require('./views/error_display.php');
  }
  else
  {
    $order->updateSecondPaymentInfo();
  }
}
function changeThirdPaymentInfo()
{
  $required_fields = array('id', 'delivery_fee');
  $missing_fields = array();
  $error_messages = array();

  $order = new CustomerOrder(array(
    'id' => isset($_POST['id']) ? preg_replace('/[^0-9]/', '', $_POST['id']) : '',
    'delivery_fee' => isset($_POST['delivery_fee']) ? preg_replace('/[^.\0-9]/', '', $_POST['delivery_fee']) : ''
  ));

  foreach($required_fields as $required_field)
  {
    if($order->getValue($required_field) == '' )
      $missing_fields[] = $required_field;
  }

  if($missing_fields)
  {
    $error_messages[] = 'Please fill all required field';
  }

  if($error_messages)
  {
    $ERR_STATUS = ERR_FORM;
    require('./views/error_display.php');
  }
  else
  {
    $order->updateThirdPaymentInfo();
  }
}

function changeOrderStatus()
{
  $required_fields = array('id', 'order_status');
  $missing_fields = array();
  $error_messages = array();

  $order = new CustomerOrder(array(
    'id' => isset($_POST['id']) ? preg_replace('/[^0-9]/', '', $_POST['id']) : '',
    'order_status' => isset($_POST['order_status']) ? preg_replace('/[^.\ \-\_a-zA-Z0-9]/', '', $_POST['order_status']) : ''
  ));

  foreach($required_fields as $required_field)
  {
    if($order->getValue($required_field) == '' )
      $missing_fields[] = $required_field;
  }

  if($missing_fields)
  {
    $error_messages[] = 'Please fill all required field';
  }

  if($error_messages)
  {
    $ERR_STATUS = ERR_FORM;
    require('./views/error_display.php');
  }
  else
  {
    $order->updateOrderStatus();
    header('location: ' . URL . '/customer/');
  }
}

 ?>
