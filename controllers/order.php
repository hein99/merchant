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
    $before_update_order = CustomerOrder::getCustomerOrderById($order->getValue('id'));
    $customer_id = $before_update_order->getValue('customer_id');
    $customer = UsersAccount::getCustomerAccountById($customer_id);
    $balance = $customer->getValue('balance');
    $point = $customer->getValue('point');
    $forcalc_order = new CustomerOrder(array(
      'quantity' => $before_update_order->getValue('quantity'),
      'price' => $before_update_order->getValue('price'),
      'us_tax' => $before_update_order->getValue('us_tax'),
      'shipping_cost' => $before_update_order->getValue('shipping_cost'),
      'first_exchange_rate' => $before_update_order->getValue('first_exchange_rate'),
      'commission' => $order->getValue('commission'),
      'product_weight' => $order->getValue('product_weight'),
      'weight_cost' => $order->getValue('weight_cost'),
      'mm_tax' => $order->getValue('mm_tax'),
      'second_exchange_rate' => $order->getValue('second_exchange_rate')
    ));
    $sub_amount = calculateMMK(calculateSecondPaymentDollar($forcalc_order), $forcalc_order->getValue('second_exchange_rate'));
    $result_balance = $balance - $sub_amount;
    $result_point = $point + (int)$sub_amount;
    if( $result_balance > 0.0 )
    {
      $customer_statement = new CustomerStatement(array(
        'customer_id' => $customer_id,
        'amount' => $sub_amount,
        'about' => 'Second Payment of order no [ ' . str_pad( $order->getValue('id'), 7, 0, STR_PAD_LEFT ) . ' ]'
      ));
      $customer_statement->addCustomerStatement($customer_statement->getValue('amount'), 0);
      UsersAccount::updateCustomerBalanceAndPoint($customer_id, $result_balance, $result_point);
      $order->updateSecondPaymentInfo();
    }
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
    $before_update_order = CustomerOrder::getCustomerOrderById($order->getValue('id'));
    $customer_id = $before_update_order->getValue('customer_id');
    $customer = UsersAccount::getCustomerAccountById($customer_id);
    $balance = $customer->getValue('balance');
    $point = $customer->getValue('point');
    $sub_amount = $order->getValue('delivery_fee');
    $result_balance = $balance - $sub_amount;
    $result_point = $point + (int)$sub_amount;
    if( $result_balance > 0.0 )
    {
      $customer_statement = new CustomerStatement(array(
        'customer_id' => $customer_id,
        'amount' => $sub_amount,
        'about' => 'Third Payment of order no [ ' . str_pad( $order->getValue('id'), 7, 0, STR_PAD_LEFT ) . ' ]'
      ));
      $customer_statement->addCustomerStatement($customer_statement->getValue('amount'), 0);
      UsersAccount::updateCustomerBalanceAndPoint($customer_id, $result_balance, $result_point);
      $order->updateThirdPaymentInfo();
    }
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
    $before_update_order = CustomerOrder::getCustomerOrderById($order->getValue('id'));

    if($order->getValue('order_status') == 1){
      if($before_update_order->getValue('order_status') == 2)
      {
        $customer_id = $before_update_order->getValue('customer_id');
        $customer = UsersAccount::getCustomerAccountById($customer_id);
        $balance = $customer->getValue('balance');
        $point = $customer->getValue('point');
        $add_amount = calculateMMK(calculateFirstPaymentDollar($before_update_order), $before_update_order->getValue('first_exchange_rate'));
        $result_balance = $balance + $add_amount;
        $result_point = $point - (int)$add_amount;
          $customer_statement = new CustomerStatement(array(
            'customer_id' => $customer_id,
            'amount' => $add_amount,
            'about' => 'Cancel Paid First Payment of order no [ ' . str_pad( $order->getValue('id'), 7, 0, STR_PAD_LEFT ) . ' ]'
          ));
          $customer_statement->addCustomerStatement($customer_statement->getValue('amount'), 1);
          UsersAccount::updateCustomerBalanceAndPoint($customer_id, $result_balance, $result_point);
      }
      $order->updateOrderStatus();
    }
    else if($order->getValue('order_status') == 2){
      if($before_update_order->getValue('order_status') == 1){
        $customer_id = $before_update_order->getValue('customer_id');
        $customer = UsersAccount::getCustomerAccountById($customer_id);
        $balance = $customer->getValue('balance');
        $point = $customer->getValue('point');
        $sub_amount = calculateMMK(calculateFirstPaymentDollar($before_update_order), $before_update_order->getValue('first_exchange_rate'));
        $result_balance = $balance - $sub_amount;
        $result_point = $point + (int)$sub_amount;
        if( $result_balance > 0.0 )
        {
          $customer_statement = new CustomerStatement(array(
            'customer_id' => $customer_id,
            'amount' => $sub_amount,
            'about' => 'First Payment of order no [ ' . str_pad( $order->getValue('id'), 7, 0, STR_PAD_LEFT ) . ' ]'
          ));
          $customer_statement->addCustomerStatement($customer_statement->getValue('amount'), 0);
          UsersAccount::updateCustomerBalanceAndPoint($customer_id, $result_balance, $result_point);
          $order->updateOrderStatus();
        }
      }
      else if($before_update_order->getValue('order_status') == 3){
        $order->updateOrderStatus();
      }
    }
    else if($order->getValue('order_status') == 5){
      if($before_update_order->getValue('order_status') == 6)
      {
        $customer_id = $before_update_order->getValue('customer_id');
        $customer = UsersAccount::getCustomerAccountById($customer_id);
        $balance = $customer->getValue('balance');
        $point = $customer->getValue('point');
        $add_amount = calculateMMK(calculateSecondPaymentDollar($before_update_order), $before_update_order->getValue('second_exchange_rate'));
        $result_balance = $balance + $add_amount;
        $result_point = $point - (int)$add_amount;
          $customer_statement = new CustomerStatement(array(
            'customer_id' => $customer_id,
            'amount' => $add_amount,
            'about' => 'Cancel Paid Second Payment of order no [ ' . str_pad( $order->getValue('id'), 7, 0, STR_PAD_LEFT ) . ' ]'
          ));
          $customer_statement->addCustomerStatement($customer_statement->getValue('amount'), 1);
          UsersAccount::updateCustomerBalanceAndPoint($customer_id, $result_balance, $result_point);
      }
      $order->updateOrderStatus();
    }
    else if($order->getValue('order_status') == 6){
      if($before_update_order->getValue('order_status') == 7)
      {
        $customer_id = $before_update_order->getValue('customer_id');
        $customer = UsersAccount::getCustomerAccountById($customer_id);
        $balance = $customer->getValue('balance');
        $point = $customer->getValue('point');
        $add_amount = $before_update_order->getValue('delivery_fee');
        $result_balance = $balance + $add_amount;
        $result_point = $point - (int)$add_amount;
          $customer_statement = new CustomerStatement(array(
            'customer_id' => $customer_id,
            'amount' => $add_amount,
            'about' => 'Cancel Paid Third Payment of order no [ ' . str_pad( $order->getValue('id'), 7, 0, STR_PAD_LEFT ) . ' ]'
          ));
          $customer_statement->addCustomerStatement($customer_statement->getValue('amount'), 1);
          UsersAccount::updateCustomerBalanceAndPoint($customer_id, $result_balance, $result_point);
      }
      $order->updateOrderStatus();
    }

    else {
      $order->updateOrderStatus();
    }
  }
}

function calculateFirstPaymentDollar($order)
{
  return calculateProductPrice($order) + $order->getValue('us_tax') + $order->getValue('shipping_cost');
}

function calculateProductPrice($order)
{
  return ($order->getValue('quantity')*$order->getValue('price'));
}

function calculateSecondPaymentDollar($order)
{
  $first_payment_dollar = calculateFirstPaymentDollar($order);
  return calculateCommission($order) + calculateWeightCost($order) + calculateMMTax($order);
}

function calculateMMK($amount, $rate)
{
  return $amount * $rate;
}

function calculateCommission($order)
{
  $first_payment_dollar = calculateFirstPaymentDollar($order);
  return ($first_payment_dollar*$order->getValue('commission')/100);
}

function calculateMMTax($order)
{
  $first_payment_dollar = calculateFirstPaymentDollar($order);
  return ($first_payment_dollar*$order->getValue('mm_tax')/100);
}

function calculateWeightCost($order)
{
  return ($order->getValue('product_weight')*$order->getValue('weight_cost'));
}

function calculateTotalAmountMMK($order)
{
  $first_payment_dollar = calculateFirstPaymentDollar($order);
  $first_payment_mmk = calculateMMK($first_payment_dollar, $order->getValue('first_exchange_rate'));

  $second_payment_dollar = calculateSecondPaymentDollar($order);
  $second_payment_mmk = calculateMMK($second_payment_dollar, $order->getValue('second_exchange_rate'));

  return $first_payment_mmk + $second_payment_mmk + $order->getValue('delivery_fee');
}
 ?>
