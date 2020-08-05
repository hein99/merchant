<?php
function ordersJsonReturn($orders, $order_status)
{
  $new_orders = array(); //Array Variable for json return
  switch($order_status)
  {
    case 0:
      foreach ($orders as $order) {
        $membership = chooseMembership($order['membership_id']);
        $first_payment_dollar = ($order['quantity']*$order['price']) + $order['us_tax'] + $order['shipping_cost'];
        $first_payment_mmk = $first_payment_dollar * $order['first_exchange_rate'];

        $new_customer = (object)array(
          'order_id' => isNewOrder($order['has_viewed_admin']) . str_pad( $order['id'], 7, 0, STR_PAD_LEFT ),
          'customer_name' => '<a href="'.URL.'/customer/detail/'.$order['customer_id'].'" target="_blank">'.$membership . $order['username'].'</a>',
          'product_link' => '<a href="'.$order['product_link'].'" class="product-link" target="_blank">Check&nbsp;Product&nbsp;Link</a>',
          'remark' => '<span>' . $order['remark'] . '</span>',
          'cupon_code' => $order['cupon_code'],
          'quantity' => '<span class="qty-js" data-qty="'.$order['quantity'].'">'.$order['quantity'].'</span>',
          'unit_price' => '<span class="uprice-js" data-uprice="'.$order['price'].'">'.number_format($order['price'], 2).'&nbsp;' . CURRENCY_SYMBOL . '</span>',
          'us_tax' => '<input type="text" value="'.$order['us_tax'].'" class="us-tax-js" placeholder="0.00">',
          'shipping_cost' => '<input type="text" value="'.$order['shipping_cost'].'" class="us-shipping-cost-js" placeholder="0.00">',
          'first_payment_dollar' => '<span class="first-payment-dollar-js">'.number_format($first_payment_dollar, 2).'</span>&nbsp;' . CURRENCY_SYMBOL,
          'first_exchange_rate' => '<span class="first-exchange-rate-js" data-ferate="'.$order['first_exchange_rate'].'">'.number_format($order['first_exchange_rate'], 2).'</span>&nbsp;MMK',
          'first_payment_mmk' => '<span class="first-payment-mmk-js">'.number_format($first_payment_mmk, 2).'</span>&nbsp;MMK',
          'order_status' => '<select class="order-status-js" name="order_status" data-id="'.$order['id'].'">
            <option value="default" selected disabled>'.ORDER_STATUS_0.'</option>
            <option value="no1" data-has_info="2">'.ORDER_STATUS_1.'</option>
            <option value="no8">'.ORDER_STATUS_8.'</option>
          </select>'
        );
        $new_orders[] = $new_customer;
      }
      break;
    case 1:
      foreach ($orders as $order) {
        $membership = chooseMembership($order['membership_id']);
        $first_payment_dollar = ($order['quantity']*$order['price']) + $order['us_tax'] + $order['shipping_cost'];
        $first_payment_mmk = $first_payment_dollar * $order['first_exchange_rate'];
        $new_customer = (object)array(
          'order_id' => isNewOrder($order['has_viewed_admin']) . str_pad( $order['id'], 7, 0, STR_PAD_LEFT ),
          'customer_name' => '<a href="'.URL.'/customer/detail/'.$order['customer_id'].'" target="_blank">'.$membership . $order['username'].'</a>',
          'product_link' => '<a href="'.$order['product_link'].'" class="product-link" target="_blank">Check&nbsp;Product&nbsp;Link</a>',
          'remark' => '<span>' . $order['remark'] . '</span>',
          'cupon_code' => $order['cupon_code'],
          'quantity' => $order['quantity'],
          'unit_price' => number_format($order['price'], 2) . '&nbsp;' . CURRENCY_SYMBOL,
          'us_tax' => $order['us_tax'] . '&nbsp;' . CURRENCY_SYMBOL,
          'shipping_cost' => $order['shipping_cost'] . '&nbsp;' . CURRENCY_SYMBOL,
          'first_payment_dollar' => number_format($first_payment_dollar, 2) . '&nbsp;' . CURRENCY_SYMBOL,
          'first_exchange_rate' => number_format($order['first_exchange_rate'], 2) . '&nbsp;MMK',
          'first_payment_mmk' => number_format($first_payment_mmk, 2) . '&nbsp;MMK',
          'order_status' => '<select class="order-status-js" name="order_status" data-id="'.$order['id'].'">
            <option value="no0">'.ORDER_STATUS_0.'</option>
            <option value="default" selected disabled>'.ORDER_STATUS_1.'</option>
            <option value="no2">'.ORDER_STATUS_2.'</option>
            <option value="no8">'.ORDER_STATUS_8.'</option>
          </select>'
        );
        $new_orders[] = $new_customer;
      }
      break;
    case 2:
      foreach ($orders as $order) {
        $membership = chooseMembership($order['membership_id']);
        $first_payment_dollar = ($order['quantity']*$order['price']) + $order['us_tax'] + $order['shipping_cost'];
        $first_payment_mmk = $first_payment_dollar * $order['first_exchange_rate'];
        $new_customer = (object)array(
          'order_id' => isNewOrder($order['has_viewed_admin']) . str_pad( $order['id'], 7, 0, STR_PAD_LEFT ),
          'customer_name' => '<a href="'.URL.'/customer/detail/'.$order['customer_id'].'" target="_blank">'.$membership . $order['username'].'</a>',
          'product_link' => '<a href="'.$order['product_link'].'" class="product-link" target="_blank">Check&nbsp;Product&nbsp;Link</a>',
          'remark' => '<span>' . $order['remark'] . '</span>',
          'cupon_code' => $order['cupon_code'],
          'quantity' => $order['quantity'],
          'unit_price' => number_format($order['price'], 2) . '&nbsp;' . CURRENCY_SYMBOL,
          'us_tax' => $order['us_tax'] . '&nbsp;' . CURRENCY_SYMBOL,
          'shipping_cost' => $order['shipping_cost'] . '&nbsp;' . CURRENCY_SYMBOL,
          'first_payment_dollar' => number_format($first_payment_dollar, 2) . '&nbsp;' . CURRENCY_SYMBOL,
          'first_exchange_rate' => number_format($order['first_exchange_rate'], 2) . '&nbsp;MMK',
          'first_payment_mmk' => number_format($first_payment_mmk, 2) . '&nbsp;MMK',
          'order_status' => '<select class="order-status-js" name="order_status" data-id="'.$order['id'].'">
            <option value="no1">'.ORDER_STATUS_1.'</option>
            <option value="default" selected disabled>'.ORDER_STATUS_2.'</option>
            <option value="no3">'.ORDER_STATUS_3.'</option>
            <option value="no8">'.ORDER_STATUS_8.'</option>
          </select>'
        );
        $new_orders[] = $new_customer;
      }
      break;
    case 3:
      foreach ($orders as $order) {
        $membership = chooseMembership($order['membership_id']);
        $first_payment_dollar = ($order['quantity']*$order['price']) + $order['us_tax'] + $order['shipping_cost'];
        $first_payment_mmk = $first_payment_dollar * $order['first_exchange_rate'];
        $new_customer = (object)array(
          'order_id' => isNewOrder($order['has_viewed_admin']) . str_pad( $order['id'], 7, 0, STR_PAD_LEFT ),
          'customer_name' => '<a href="'.URL.'/customer/detail/'.$order['customer_id'].'" target="_blank">'.$membership . $order['username'].'</a>',
          'product_link' => '<a href="'.$order['product_link'].'" class="product-link" target="_blank">Check&nbsp;Product&nbsp;Link</a>',
          'remark' => '<span>' . $order['remark'] . '</span>',
          'cupon_code' => $order['cupon_code'],
          'quantity' => $order['quantity'],
          'unit_price' => number_format($order['price'], 2) . '&nbsp;' . CURRENCY_SYMBOL,
          'us_tax' => $order['us_tax'] . '&nbsp;' . CURRENCY_SYMBOL,
          'shipping_cost' => $order['shipping_cost'] . '&nbsp;' . CURRENCY_SYMBOL,
          'first_payment_dollar' => number_format($first_payment_dollar, 2) . '&nbsp;' . CURRENCY_SYMBOL,
          'first_exchange_rate' => number_format($order['first_exchange_rate'], 2) . '&nbsp;MMK',
          'first_payment_mmk' => number_format($first_payment_mmk, 2) . '&nbsp;MMK',
          'order_status' => '<select class="order-status-js" name="order_status" data-id="'.$order['id'].'">
          <option value="no2">'.ORDER_STATUS_2.'</option>
            <option value="default" selected disabled>'.ORDER_STATUS_3.'</option>
            <option value="no4">'.ORDER_STATUS_4.'</option>
            <option value="no8">'.ORDER_STATUS_8.'</option>
          </select>'
        );
        $new_orders[] = $new_customer;
      }
      break;
    case 4:
      foreach ($orders as $order) {
        $membership = chooseMembership($order['membership_id']);
        $first_payment_dollar = ($order['quantity']*$order['price']) + $order['us_tax'] + $order['shipping_cost'];
        $first_payment_mmk = $first_payment_dollar * $order['first_exchange_rate'];
        $new_customer = (object)array(
          'order_id' => isNewOrder($order['has_viewed_admin']) . str_pad( $order['id'], 7, 0, STR_PAD_LEFT ),
          'customer_name' => '<a href="'.URL.'/customer/detail/'.$order['customer_id'].'" target="_blank">'.$membership . $order['username'].'</a>',
          'product_link' => '<a href="'.$order['product_link'].'" class="product-link" target="_blank">Check&nbsp;Product&nbsp;Link</a>',
          'remark' => '<span>' . $order['remark'] . '</span>',
          'cupon_code' => $order['cupon_code'],
          'quantity' => $order['quantity'],
          'unit_price' => number_format($order['price'], 2) . '&nbsp;' . CURRENCY_SYMBOL,
          'us_tax' => $order['us_tax'] . '&nbsp;' . CURRENCY_SYMBOL,
          'shipping_cost' => $order['shipping_cost'] . '&nbsp;' . CURRENCY_SYMBOL,
          'first_payment_dollar' => number_format($first_payment_dollar, 2) . '&nbsp;' . CURRENCY_SYMBOL,
          'first_exchange_rate' => number_format($order['first_exchange_rate'], 2) . '&nbsp;MMK',
          'first_payment_mmk' => number_format($first_payment_mmk, 2) . '&nbsp;MMK',
          'order_status' => '<select class="order-status-js" name="order_status" data-id="'.$order['id'].'">
          <option value="no3">'.ORDER_STATUS_3.'</option>
            <option value="default" selected disabled>'.ORDER_STATUS_4.'</option>
            <option value="no5">'.ORDER_STATUS_5.'</option>
            <option value="no8">'.ORDER_STATUS_8.'</option>
          </select>'
        );
        $new_orders[] = $new_customer;
      }
      break;
    case 5:
      foreach ($orders as $order) {
        $membership = chooseMembership($order['membership_id']);
        $commission = Membership::getMembershipByID($order['membership_id']); // get commission percentage from Membership table
        $current_rate = ExchangeRate::getLatestExchangeRate();

        $first_payment_dollar = ($order['quantity']*$order['price']) + $order['us_tax'] + $order['shipping_cost'];
        $first_payment_mmk = $first_payment_dollar * $order['first_exchange_rate'];

        $second_payment_dollar = ($first_payment_dollar*$commission['percentage']/100) + ($order['product_weight']*$order['weight_cost']) + ($first_payment_dollar*$order['mm_tax']/100) ;
        $second_payment_mmk = $second_payment_dollar * $current_rate->getValue('mmk');

        $new_customer = (object)array(
          'order_id' => isNewOrder($order['has_viewed_admin']) . str_pad( $order['id'], 7, 0, STR_PAD_LEFT ),
          'customer_name' => '<a href="'.URL.'/customer/detail/'.$order['customer_id'].'" target="_blank">'.$membership . $order['username'].'</a>',
          'product_link' => '<a href="'.$order['product_link'].'" class="product-link" target="_blank">Check&nbsp;Product&nbsp;Link</a>',
          'remark' => '<span>' . $order['remark'] . '</span>',
          'cupon_code' => $order['cupon_code'],
          'quantity' => $order['quantity'],
          'unit_price' => number_format($order['price'], 2) . '&nbsp;' . CURRENCY_SYMBOL,
          'us_tax' => $order['us_tax'] . '&nbsp;' . CURRENCY_SYMBOL,
          'shipping_cost' => $order['shipping_cost'] . '&nbsp;' . CURRENCY_SYMBOL,
          'first_payment_dollar' => '<span class="first-payment-dollar-js" data-fpayment="'.$first_payment_dollar.'">'.number_format($first_payment_dollar, 2).'</span>&nbsp;' . CURRENCY_SYMBOL,
          'first_exchange_rate' => number_format($order['first_exchange_rate'], 2) . '&nbsp;MMK',
          'first_payment_mmk' => number_format($first_payment_mmk, 2) . '&nbsp;MMK',

          'commission' => '<input type="text" value="'.$commission['percentage'].'" class="percentage-js" placeholder="0.0">',
          'weight' => '<input type="text" value="'.$order['product_weight'].'" class="product-weight-js" placeholder="0.0">',
          'weight_cost' => '<input type="text" value="'.$order['weight_cost'].'" class="weight-cost-js" placeholder="0.0">',
          'mm_tax' => '<input type="text" value="'.$order['mm_tax'].'" class="mm-tax-js" >',

          'second_payment_dollar' => '<span class="second-payment-dollar-js">'.number_format($second_payment_dollar, 2).'</span>&nbsp;' . CURRENCY_SYMBOL,
          'second_exchange_rate' => '<span class="second-exchange-rate-js" data-serate="'.$current_rate->getValue('mmk').'">'.number_format($current_rate->getValue('mmk'), 2).'</span>&nbsp;MMK',
          'second_payment_mmk' => '<span class="second-payment-mmk-js">'.number_format($second_payment_mmk, 2).'</span>&nbsp;MMK',

          'order_status' => '<select class="order-status-js" name="order_status" data-id="'.$order['id'].'">
          <option value="no4">'.ORDER_STATUS_4.'</option>
            <option value="default" selected disabled>'.ORDER_STATUS_5.'</option>
            <option value="no6" data-has_info="6">'.ORDER_STATUS_6.'</option>
            <option value="no8">'.ORDER_STATUS_8.'</option>
          </select>'
        );
        $new_orders[] = $new_customer;
      }
      break;
    case 6:
      foreach ($orders as $order) {
        $membership = chooseMembership($order['membership_id']);

        $first_payment_dollar = ($order['quantity']*$order['price']) + $order['us_tax'] + $order['shipping_cost'];
        $first_payment_mmk = $first_payment_dollar * $order['first_exchange_rate'];

        $second_payment_dollar = ($first_payment_dollar*$order['commission']/100) + ($order['product_weight']*$order['weight_cost']) + ($first_payment_dollar*$order['mm_tax']/100) ;
        $second_payment_mmk = $second_payment_dollar * $order['second_exchange_rate'];

        $new_customer = (object)array(
          'order_id' => isNewOrder($order['has_viewed_admin']) . str_pad( $order['id'], 7, 0, STR_PAD_LEFT ),
          'customer_name' => '<a href="'.URL.'/customer/detail/'.$order['customer_id'].'" target="_blank">'.$membership . $order['username'].'</a>',
          'product_link' => '<a href="'.$order['product_link'].'" class="product-link" target="_blank">Check&nbsp;Product&nbsp;Link</a>',
          'remark' => '<span>' . $order['remark'] . '</span>',
          'cupon_code' => $order['cupon_code'],
          'quantity' => $order['quantity'],
          'unit_price' => number_format($order['price'], 2) . '&nbsp;' . CURRENCY_SYMBOL,
          'us_tax' => $order['us_tax'] . '&nbsp;' . CURRENCY_SYMBOL,
          'shipping_cost' => $order['shipping_cost'] . '&nbsp;' . CURRENCY_SYMBOL,
          'first_payment_dollar' => number_format($first_payment_dollar, 2) . '&nbsp;' . CURRENCY_SYMBOL,
          'first_exchange_rate' => number_format($order['first_exchange_rate'], 2) . '&nbsp;MMK',
          'first_payment_mmk' => number_format($first_payment_mmk, 2) . '&nbsp;MMK',

          'commission' => $order['commission'] . '&nbsp;%',
          'weight' => $order['product_weight'] . '&nbsp;lb',
          'weight_cost' => $order['weight_cost'] . '&nbsp;' . CURRENCY_SYMBOL,
          'mm_tax' => $order['mm_tax'] . '&nbsp;%',

          'second_payment_dollar' => number_format($second_payment_dollar, 2) . '&nbsp;' . CURRENCY_SYMBOL,
          'second_exchange_rate' => number_format($order['second_exchange_rate'], 2) . '&nbsp;MMK',
          'second_payment_mmk' => number_format($second_payment_mmk, 2) . '&nbsp;MMK',

          'delivery_fee' => '<input type="text" value="'.$order['delivery_fee'].'" placeholder="0.00" class="deli-fee-js">',

          'order_status' => '<select class="order-status-js" name="order_status" data-id="'.$order['id'].'">
          <option value="no5">'.ORDER_STATUS_5.'</option>
            <option value="default" selected disabled>'.ORDER_STATUS_6.'</option>
            <option value="no7" data-has_info="1">'.ORDER_STATUS_7.'</option>
            <option value="no8">'.ORDER_STATUS_8.'</option>
          </select>'
        );
        $new_orders[] = $new_customer;
      }
      break;
    case 7:
      foreach ($orders as $order) {
        $membership = chooseMembership($order['membership_id']);

        $first_payment_dollar = ($order['quantity']*$order['price']) + $order['us_tax'] + $order['shipping_cost'];
        $first_payment_mmk = $first_payment_dollar * $order['first_exchange_rate'];

        $second_payment_dollar = ($first_payment_dollar*$order['commission']/100) + ($order['product_weight']*$order['weight_cost']) + ($first_payment_dollar*$order['mm_tax']/100) ;
        $second_payment_mmk = $second_payment_dollar * $order['second_exchange_rate'];

        $new_customer = (object)array(
          'order_id' => isNewOrder($order['has_viewed_admin']) . str_pad( $order['id'], 7, 0, STR_PAD_LEFT ),
          'customer_name' => '<a href="'.URL.'/customer/detail/'.$order['customer_id'].'" target="_blank">'.$membership . $order['username'].'</a>',
          'product_link' => '<a href="'.$order['product_link'].'" class="product-link" target="_blank">Check&nbsp;Product&nbsp;Link</a>',
          'remark' => '<span>' . $order['remark'] . '</span>',
          'cupon_code' => $order['cupon_code'],
          'quantity' => $order['quantity'],
          'unit_price' => number_format($order['price'], 2) . '&nbsp;' . CURRENCY_SYMBOL,
          'us_tax' => $order['us_tax'] . '&nbsp;' . CURRENCY_SYMBOL,
          'shipping_cost' => $order['shipping_cost'] . '&nbsp;' . CURRENCY_SYMBOL,
          'first_payment_dollar' => number_format($first_payment_dollar, 2) . '&nbsp;' . CURRENCY_SYMBOL,
          'first_exchange_rate' => number_format($order['first_exchange_rate'], 2) . '&nbsp;MMK',
          'first_payment_mmk' => number_format($first_payment_mmk, 2) . '&nbsp;MMK',

          'commission' => $order['commission'] . '&nbsp;%',
          'weight' => $order['product_weight'] . '&nbsp;lb',
          'weight_cost' => $order['weight_cost'] . '&nbsp;' . CURRENCY_SYMBOL,
          'mm_tax' => $order['mm_tax'] . '&nbsp;%',

          'second_payment_dollar' => number_format($second_payment_dollar, 2) . '&nbsp;' . CURRENCY_SYMBOL,
          'second_exchange_rate' => number_format($order['second_exchange_rate'], 2) . '&nbsp;MMK',
          'second_payment_mmk' => number_format($second_payment_mmk, 2) . '&nbsp;MMK',

          'delivery_fee' => number_format($order['delivery_fee']) . '&nbsp;MMK',

          'order_status' => '<select class="order-status-js" name="order_status" data-id="'.$order['id'].'">
          <option value="no6">'.ORDER_STATUS_6.'</option>
            <option value="default" selected disabled>'.ORDER_STATUS_7.'</option>
            <option value="no8">'.ORDER_STATUS_8.'</option>
          </select>'
        );
        $new_orders[] = $new_customer;
      }
      break;
    case 8:
      foreach ($orders as $order) {
        $membership = chooseMembership($order['membership_id']);
        $first_payment_dollar = ($order['quantity']*$order['price']) + $order['us_tax'] + $order['shipping_cost'];
        $first_payment_mmk = $first_payment_dollar * $order['first_exchange_rate'];
        $new_customer = (object)array(
          'order_id' => isNewOrder($order['has_viewed_admin']) . str_pad( $order['id'], 7, 0, STR_PAD_LEFT ),
          'customer_name' => '<a href="'.URL.'/customer/detail/'.$order['customer_id'].'" target="_blank">'.$membership . $order['username'].'</a>',
          'product_link' => '<a href="'.$order['product_link'].'" class="product-link" target="_blank">Check&nbsp;Product&nbsp;Link</a>',
          'remark' => '<span>' . $order['remark'] . '</span>',
          'cupon_code' => $order['cupon_code'],
          'quantity' => $order['quantity'],
          'unit_price' => number_format($order['price'], 2) . '&nbsp;' . CURRENCY_SYMBOL,
          'us_tax' => $order['us_tax'] . '&nbsp;' . CURRENCY_SYMBOL,
          'shipping_cost' => $order['shipping_cost'] . '&nbsp;' . CURRENCY_SYMBOL,
          'first_payment_dollar' => number_format($first_payment_dollar, 2) . '&nbsp;' . CURRENCY_SYMBOL,
          'first_exchange_rate' => number_format($order['first_exchange_rate'], 2) . '&nbsp;MMK',
          'first_payment_mmk' => number_format($first_payment_mmk, 2) . '&nbsp;MMK',
          'order_status' => '<select class="order-status-js" name="order_status" data-id="'.$order['id'].'">
            <option value="no0">'.ORDER_STATUS_0.'</option>
            <option value="no7">'.ORDER_STATUS_7.'</option>
            <option value="default" selected disabled>'.ORDER_STATUS_8.'</option>
          </select>'
        );
        $new_orders[] = $new_customer;
      }
      break;
  }
  echo json_encode($new_orders);
}

function isNewOrder($has_viewed_admin)
{
  if ($has_viewed_admin)
    return '';
  else
    return '<span class="new-order" dataholder="new order"></span>';
}

function chooseMembership($membership_id)
{
  $membership_name = '';
  // change from membership id to membership name
  switch($membership_id)
  {
    case 1:
      $membership_name = '<div class="wp-membership-logo order-list sliver-status" dataholder="Silver">
        <i class="fas fa-award"></i>
        <span id="membership-level"></span>
      </div>';
      break;

    case 2:
      $membership_name = '<div class="wp-membership-logo order-list gold-status" dataholder="Gold">
        <i class="fas fa-award"></i>
        <span id="membership-level"></span>
      </div>';
      break;

    case 3:
      $membership_name = '<div class="wp-membership-logo order-list platinum-status" dataholder="Platinum">
        <i class="fas fa-award"></i>
        <span id="membership-level"></span>
      </div>';
      break;

    case 4:
      $membership_name = '<div class="wp-membership-logo order-list diamond-status" dataholder="Diamond">
        <i class="fas fa-gem"></i>
      </div>';
      break;

    default:
      exit();
  }
  return $membership_name;
}

 ?>
