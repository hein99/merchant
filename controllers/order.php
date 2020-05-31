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

  case 'change_product_status':
    changeProductStatus();
  default:
    $ERR_STATUS = ERR_ACTION;
    require('./views/error_display.php');
    exit();
}

function getNewOrdersCount()
{
  $total = CustomerOrder::getNewOrdersCount();
  echo json_encode($total);
}

function getTotalOrdersCount()
{
  $total = CustomerOrder::getTotalOrdersCount();
  echo number_format($total);
}

function getOrders()
{
  $order_status = isset($_GET['order_status']) ? $_GET['order_status'] : '' ;
  if ( $order_status && $order_status < 4) {
    $orders = CustomerOrder::getCustomerOrderArrayByOrderStatus($order_status);
  }
  else{
    $ERR_STATUS = ERR_URL;
    require('./views/error_display.php');
    exit();
  }

  $new_orders = array(); //Array Variable for json return
  switch($order_status)
  {
    case 1:
      foreach ($orders as $order) {
        $commission = Membership::getMembershipByID($order['membership_id']); // get commission percentage from Membership table
        $new_customer = (object)array(
          'order_id' => str_pad( $order['id'], 7, 0, STR_PAD_LEFT ),
          'product_link' => $order['product_link'],
          'remark' => $order['remark'],
          'quantity' => $order['quantity'],
          'price' => number_format($order['price'], 2) . '$',
          'amount' => number_format($order['price']*$order['quantity'], 2) . '$',
          'mm_tax' => '<input type="text" value="'.$order['mm_tax'].'" class="mm-tax-js" >',
          'us_tax' => '<input type="text" value="'.$order['us_tax'].'" class="us-tax-js" >',
          'commission' => '<input type="text" value="'.$commission['percentage'].'" class="commission-js" >',
          'weight' => '<input type="text" value="'.$order['weight_cost'].'" class="weight-js" >',
          'net_weight' => '<span class="net-weight-js>'.$order['weight_cost']*$order['quantity'].'</span>"',
          'order_status' => '<select class="order-status-js" name="order_status">
            <option value="request" selected disabled>Request</option>
            <option value="pending">Pending</option>
            <option value="cancel">Cancel</option>
          </select>',
          'product_shipping_status' => 'undefined'
        );
        $new_orders[] = $new_customer;
      }
      break;
    case 2:
      foreach ($orders as $order) {
        $new_customer = (object)array(
          'order_id' => str_pad( $order['id'], 7, 0, STR_PAD_LEFT ),
          'product_link' => $order['product_link'],
          'remark' => $order['remark'],
          'quantity' => $order['quantity'],
          'price' => number_format($order['price'], 2) . '$',
          'amount' => number_format($order['price']*$order['quantity'], 2) . '$',
          'mm_tax' => '<input type="text" value="'.$order['mm_tax'].'" class="mm-tax-js" >',
          'us_tax' => '<input type="text" value="'.$order['us_tax'].'" class="us-tax-js" >',
          'commission' => '<input type="text" value="'.$order['commission'].'" class="commission-js" >',
          'weight' => '<input type="text" value="'.$order['weight_cost'].'" class="weight-js" >',
          'net_weight' => '<span class="net-weight-js>'.$order['weight_cost']*$order['quantity'].'</span>"',
          'order_status' => '<select class="order-status-js" name="order_status">
            <option value="pending" selected disabled>Pending</option>
            <option value="cancel">Cancel</option>
          </select>',
          'product_shipping_status' => 'undefined'
        );
        $new_orders[] = $new_customer;
      }
      break;
    case 3:
      foreach ($orders as $order) {
        $new_customer = (object)array(
          'order_id' => str_pad( $order['id'], 7, 0, STR_PAD_LEFT ),
          'product_link' => $order['product_link'],
          'remark' => $order['remark'],
          'quantity' => $order['quantity'],
          'price' => number_format($order['price'], 2) . '$',
          'amount' => number_format($order['price']*$order['quantity'], 2) . '$',
          'mm_tax' => $order['mm_tax'].'%',
          'us_tax' => $order['us_tax'].'%',
          'commission' => $order['commission'].'%',
          'weight' => $order['weight_cost'].'$',
          'net_weight' => $order['weight_cost']*$order['quantity'].'$',
          'order_status' => '<select class="order-status-js" name="order_status">
            <option value="pending">Pending</option>
            <option value="confirm" selected disabled>Confirm</option>
            <option value="cancel">Cancel</option>
          </select>',
          'product_shipping_status' => 'undefined'
        );
        $new_orders[] = $new_customer;
      }
      break;
    case 4:
      foreach ($orders as $order) {
        $new_customer = (object)array(
          'order_id' => str_pad( $order['id'], 7, 0, STR_PAD_LEFT ),
          'product_link' => $order['product_link'],
          'remark' => $order['remark'],
          'quantity' => $order['quantity'],
          'price' => number_format($order['price'], 2) . '$',
          'amount' => number_format($order['price']*$order['quantity'], 2) . '$',
          'mm_tax' => $order['mm_tax'].'%',
          'us_tax' => $order['us_tax'].'%',
          'commission' => $order['commission'].'%',
          'weight' => $order['weight_cost'].'$',
          'net_weight' => $order['weight_cost']*$order['quantity'].'$',
          'order_status' => '<select class="order-status-js" name="order_status">
            <option value="pending">Pending</option>
            <option value="cancel" selected disabled>Cancel</option>
          </select>',
          'product_shipping_status' => '<select class="product-shipping-status-js" name="product_shipping_status">
            <option value="us_warehouse">US Warehouse</option>
            <option value="transit" selected disabled>Transit</option>
            <option value="arrived" selected disabled>Arrived</option>
            <option value="delivered" selected disabled>Delivered</option>
          </select>'
        );
        $new_orders[] = $new_customer;
      }
      break;
  }
  echo json_encode($new_orders);
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
