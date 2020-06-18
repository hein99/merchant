<?php
function ordersJsonReturn($orders, $order_status)
{
  $new_orders = array(); //Array Variable for json return
  switch($order_status)
  {
    case 0:
      foreach ($orders as $order) {
        $membership = chooseMembership($order['membership_id']);
        // $commission = Membership::getMembershipByID($order['membership_id']); // get commission percentage from Membership table
        $first_payment_dollar = ($order['quantity']*$order['price']) + $order['us_tax'] + $order['shipping_cost'];
        $first_payment_mmk = $first_payment_dollar * $order['first_exchange_rate'];

        $new_customer = (object)array(
          'order_id' => isNewOrder($order['has_viewed_admin']) . str_pad( $order['id'], 7, 0, STR_PAD_LEFT ),
          'customer_name' => '<a href="'.URL.'/customer/detail/'.$order['customer_id'].'">'.$membership . $order['username'].'</a>',
          'product_link' => '<a href="'.$order['product_link'].'" class="product-link" target="_blank">Check&nbsp;Product&nbsp;Link</a>',
          'remark' => $order['remark'],
          'cupon_code' => $order['cupon_code'],
          'quantity' => '<span class="qty-js" data-qty="'.$order['quantity'].'">'.$order['quantity'].'</span>',
          'unit_price' => '<span class="uprice-js" data-uprice="'.$order['price'].'">'.number_format($order['price'], 2).'&nbsp;$</span>',
          'us_tax' => '<input type="text" value="'.$order['us_tax'].'" class="us-tax-js" >',
          'shipping_cost' => '<input type="text" value="'.$order['shipping_cost'].'" class="us-shipping-cost-js" >',
          'first_payment_dollar' => '<span class="first-payment-dollar-js">'.number_format($first_payment_dollar, 2).'</span>&nbsp;$',
          'first_exchange_rate' => '<span class="first-exchange-rate-js" data-ferate="'.$order['first_exchange_rate'].'">'.number_format($order['first_exchange_rate'], 2).'</span>&nbsp;MMK',
          'first_payment_mmk' => '<span class="first-payment-mmk-js">'.number_format($first_payment_mmk, 2).'</span>&nbsp;$',
          'order_status' => '<select class="request-order-status-js" name="order_status" data-id="'.$order['id'].'">
            <option value="request" selected disabled>Request</option>
            <option value="pending">Pending</option>
            <option value="cancel">Cancel</option>
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
          'customer_name' => '<a href="'.URL.'/customer/detail/'.$order['customer_id'].'">'.$membership . $order['username'].'</a>',
          'product_link' => '<a href="'.$order['product_link'].'" class="product-link" target="_blank">Check&nbsp;Product&nbsp;Link</a>',
          'remark' => $order['remark'],
          'cupon_code' => $order['cupon_code'],
          'quantity' => $order['quantity'],
          'unit_price' => number_format($order['price'], 2) . '&nbsp;$',
          'us_tax' => $order['us_tax'] . '&nbsp;$',
          'shipping_cost' => $order['shipping_cost'] . '&nbsp;$',
          'first_payment_dollar' => number_format($first_payment_dollar, 2) . '&nbsp;$',
          'first_exchange_rate' => number_format($order['first_exchange_rate'], 2) . '&nbsp;$',
          'first_payment_mmk' => number_format($first_payment_mmk, 2) . '&nbsp;$',
          'order_status' => '<select class="order-status-js" name="order_status" data-id="'.$order['id'].'">
            <option value="request">Request</option>
            <option value="default" selected disabled>Pending</option>
            <option value="cancel">Cancel</option>
          </select>'
        );
        $new_orders[] = $new_customer;
      }
      break;
    case 2:
      foreach ($orders as $order) {
        $product_shipping_status = chooseProductShippingStatus($order['product_shipping_status'], $order['id']);
        $membership = chooseMembership($order['membership_id']);
        $first_payment_dollar = ($order['quantity']*$order['price']) + $order['us_tax'] + $order['shipping_cost'];
        $first_payment_mmk = $first_payment_dollar * $order['first_exchange_rate'];
        $new_customer = (object)array(
          'order_id' => isNewOrder($order['has_viewed_admin']) . str_pad( $order['id'], 7, 0, STR_PAD_LEFT ),
          'customer_name' => '<a href="'.URL.'/customer/detail/'.$order['customer_id'].'">'.$membership . $order['username'].'</a>',
          'product_link' => '<a href="'.$order['product_link'].'" class="product-link" target="_blank">Check&nbsp;Product&nbsp;Link</a>',
          'remark' => $order['remark'],
          'cupon_code' => $order['cupon_code'],
          'quantity' => $order['quantity'],
          'unit_price' => number_format($order['price'], 2) . '&nbsp;$',
          'us_tax' => $order['us_tax'] . '&nbsp;$',
          'shipping_cost' => $order['shipping_cost'] . '&nbsp;$',
          'first_payment_dollar' => number_format($first_payment_dollar, 2) . '&nbsp;$',
          'first_exchange_rate' => number_format($order['first_exchange_rate'], 2) . '&nbsp;$',
          'first_payment_mmk' => number_format($first_payment_mmk, 2) . '&nbsp;$',
          'order_status' => '<select class="order-status-js" name="order_status" data-id="'.$order['id'].'">
            <option value="request">Request</option>
            <option value="default" selected disabled>Confirm</option>
            <option value="cancel">Cancel</option>
          </select>',
          'product_shipping_status' => $product_shipping_status
        );
        $new_orders[] = $new_customer;
      }
      break;
    case 3:
      foreach ($orders as $order) {
        $membership = chooseMembership($order['membership_id']);
        $sub_total = ($order['quantity']*$order['price']) + ($order['product_weight']*$order['weight_cost']);
        $total_amount_dollar = $sub_total + (($order['mm_tax']+$order['us_tax']+$order['commission'])/100)*$sub_total;
        $total_amount_mmk = $total_amount_dollar * $order['exchange_rate'];
        $new_customer = (object)array(
          'order_id' => isNewOrder($order['has_viewed_admin']) . str_pad( $order['id'], 7, 0, STR_PAD_LEFT ),
          'customer_name' => '<a href="'.URL.'/customer/detail/'.$order['customer_id'].'">'.$membership . $order['username'].'</a>',
          'product_link' => '<a href="'.$order['product_link'].'" class="product-link" target="_blank">Check&nbsp;Product&nbsp;Link</a>',
          'remark' => $order['remark'],
          'quantity' => $order['quantity'],
          'unit_price' => number_format($order['price'], 2) . '&nbsp;$',
          'product_weight' => $order['product_weight'].'&nbsp;Kg',
          'weight_cost' => $order['weight_cost'] . '&nbsp;$',
          'sub_total' => '<span class="sub-total-js">'.number_format($sub_total, 2).'</span>&nbsp;$',
          'mm_tax' => $order['mm_tax'] . '&nbsp;%',
          'us_tax' => $order['us_tax'] . '&nbsp;%',
          'commission' => $order['commission'] . '&nbsp;%',
          'total_amount_dollar' => '<span class="total-dollar-js">'.number_format($total_amount_dollar, 2).'</span>&nbsp;$',
          'exchange_rate' => $order['exchange_rate']. '&nbsp;MMK',
          'total_amount_mmk' => '<span class="total-mmk-js">'.number_format($total_amount_mmk, 2).'</span>&nbsp;MMK',
          'order_status' => '<select class="order-status-js" name="order_status" data-id="'.$order['id'].'">
            <option value="request">Request</option>
            <option value="default" selected disabled>Cancel</option>
          </select>',
          'product_shipping_status' => 'undefined'
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

function chooseProductShippingStatus($product_shipping_status, $id)
{
  $status_name = '';
  // change from membership id to membership name
  switch($product_shipping_status)
  {
    case 0:
      $status_name = '<select class="product-shipping-status-js" name="product_shipping_status" data-id="'.$id.'">
        <option value="default" selected disabled>Undefined</option>
        <option value="us_warehouse">US Warehouse</option>
        <option value="transit">Transit</option>
        <option value="arrived">Arrived</option>
        <option value="delivered">Delivered</option>
      </select>';
      break;

    case 1:
      $status_name = '<select class="product-shipping-status-js" name="product_shipping_status" data-id="'.$id.'">
        <option value="undefined">Undefined</option>
        <option value="default" selected disabled>US Warehouse</option>
        <option value="transit">Transit</option>
        <option value="arrived">Arrived</option>
        <option value="delivered">Delivered</option>
      </select>';
      break;

    case 2:
      $status_name = '<select class="product-shipping-status-js" name="product_shipping_status" data-id="'.$id.'">
        <option value="undefined">Undefined</option>
        <option value="us_warehouse">US Warehouse</option>
        <option value="default" selected disabled>Transit</option>
        <option value="arrived">Arrived</option>
        <option value="delivered">Delivered</option>
      </select>';
      break;

    case 3:
      $status_name = '<select class="product-shipping-status-js" name="product_shipping_status" data-id="'.$id.'">
        <option value="undefined">Undefined</option>
        <option value="us_warehouse">US Warehouse</option>
        <option value="transit">Transit</option>
        <option value="default" selected disabled>Arrived</option>
        <option value="delivered">Delivered</option>
      </select>';
      break;

    case 4:
      $status_name = '<select class="product-shipping-status-js" name="product_shipping_status" data-id="'.$id.'">
        <option value="undefined">Undefined</option>
        <option value="us_warehouse">US Warehouse</option>
        <option value="transit">Transit</option>
        <option value="arrived">Arrived</option>
        <option value="default" selected disabled>Delivered</option>
      </select>';
      break;

    default:
      exit();
  }
  return $status_name;
}


 ?>
