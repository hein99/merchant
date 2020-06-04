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

  case 'change_order_info':
    changeOrderInfo();
    break;

  case 'change_order_status':
    changeOrderStatus();
    break;

  case 'change_product_status':
    changeProductStatus();
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
  if ( $order_status >= 0 && $order_status <= 3) {
    $orders = CustomerOrder::getCustomerOrderArrayByOrderStatus($order_status);
    CustomerOrder::updateView();
  }
  else{
    $ERR_STATUS = ERR_URL;
    require('./views/error_display.php');
    exit();
  }
  require('./views/order/general.php');
  ordersJsonReturn($orders, $order_status);
}

function changeOrderInfo()
{
  $required_fields = array('id', 'us_tax', 'mm_tax', 'commission', 'weight_cost', 'order_status');
  $missing_fields = array();
  $error_messages = array();

  $order = new CustomerOrder(array(
    'id' => isset($_POST['id']) ? preg_replace('/[^0-9]/', '', $_POST['id']) : '',
    'us_tax' => isset($_POST['us_tax']) ? preg_replace('/[^.\0-9]/', '', $_POST['us_tax']) : '',
    'mm_tax' => isset($_POST['mm_tax']) ? preg_replace('/[^.\0-9]/', '', $_POST['mm_tax']) : '',
    'commission' => isset($_POST['commission']) ? preg_replace('/[^.\0-9]/', '', $_POST['commission']) : '',
    'weight_cost' => isset($_POST['weight_cost']) ? preg_replace('/[^.\0-9]/', '', $_POST['weight_cost']) : '',
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
    $order->updateInformation();
    header('location: ' . URL . '/customer/');
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

function changeProductStatus()
{
  $required_fields = array('id', 'product_shipping_status');
  $missing_fields = array();
  $error_messages = array();

  $order = new CustomerOrder(array(
    'id' => isset($_POST['id']) ? preg_replace('/[^0-9]/', '', $_POST['id']) : '',
    'product_shipping_status' => isset($_POST['product_shipping_status']) ? preg_replace('/[^.\ \-\_a-zA-Z0-9]/', '', $_POST['product_shipping_status']) : ''
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
    $order->updateProductShippingStatus();
    header('location: ' . URL . '/customer/');
  }
}


 ?>
