<?php
function ordersJsonReturn($orders, $order_status)
{
  $new_orders = array(); //Array Variable for json return
  switch($order_status)
  {
    case 0:
      foreach ($orders as $order) {
        $membership = chooseMembership($order['membership_id']);
        $commission = Membership::getMembershipByID($order['membership_id']); // get commission percentage from Membership table
        $new_customer = (object)array(
          'order_id' => str_pad( $order['id'], 7, 0, STR_PAD_LEFT ),
          'customer_name' => '<a href="'.URL.'/customer/detail/'.$order['customer_id'].'">'.$membership . $order['username'].'</a>',
          'product_link' => '<a href="'.$order['product_link'].'" class="product-link" target="_blank">Check&nbsp;Product&nbsp;Link</a>',
          'remark' => $order['remark'],
          'quantity' => $order['quantity'],
          'price' => number_format($order['price'], 2) . '$',
          'amount' => number_format($order['price']*$order['quantity'], 2) . '$',
          'mm_tax' => '<input type="text" value="'.$order['mm_tax'].'" class="mm-tax-js" >',
          'us_tax' => '<input type="text" value="'.$order['us_tax'].'" class="us-tax-js" >',
          'commission' => '<input type="text" value="'.$commission['percentage'].'" class="commission-js" >',
          'weight' => '<input type="text" value="'.$order['weight_cost'].'" class="weight-js" >',
          'net_weight' => '<span class="net-weight-js">'.$order['weight_cost']*$order['quantity'].'</span>',
          'order_status' => '<select class="request-order-status-js" name="order_status" data-id="'.$order['id'].'">
            <option value="request" selected disabled>Request</option>
            <option value="pending">Pending</option>
            <option value="cancel">Cancel</option>
          </select>',
          'product_shipping_status' => 'undefined'
        );
        $new_orders[] = $new_customer;
      }
      break;
    case 1:
      foreach ($orders as $order) {
        $membership = chooseMembership($order['membership_id']);
        $new_customer = (object)array(
          'order_id' => str_pad( $order['id'], 7, 0, STR_PAD_LEFT ),
          'customer_name' => '<a href="'.URL.'/customer/detail/'.$order['customer_id'].'">'.$membership . $order['username'].'</a>',
          'product_link' => '<a href="'.$order['product_link'].'" class="product-link" target="_blank">Check&nbsp;Product&nbsp;Link</a>',
          'remark' => $order['remark'],
          'quantity' => $order['quantity'],
          'price' => number_format($order['price'], 2) . '$',
          'amount' => number_format($order['price']*$order['quantity'], 2) . '$',
          'mm_tax' => $order['mm_tax'].'%',
          'us_tax' => $order['us_tax'].'%',
          'commission' => $order['commission'].'%',
          'weight' => $order['weight_cost'].'$',
          'net_weight' => $order['weight_cost']*$order['quantity'].'$',
          'order_status' => '<select class="order-status-js" name="order_status" data-id="'.$order['id'].'">
            <option value="request">Request</option>
            <option value="default" selected disabled>Pending</option>
            <option value="cancel">Cancel</option>
          </select>',
          'product_shipping_status' => 'undefined'
        );
        $new_orders[] = $new_customer;
      }
      break;
    case 2:
      foreach ($orders as $order) {
        $membership = chooseMembership($order['membership_id']);
        $product_shipping_status = chooseProductShippingStatus($order['product_shipping_status'], $order['id']);
        $new_customer = (object)array(
          'order_id' => str_pad( $order['id'], 7, 0, STR_PAD_LEFT ),
          'customer_name' => '<a href="'.URL.'/customer/detail/'.$order['customer_id'].'">'.$membership . $order['username'].'</a>',
          'product_link' => '<a href="'.$order['product_link'].'" class="product-link" target="_blank">Check&nbsp;Product&nbsp;Link</a>',
          'remark' => $order['remark'],
          'quantity' => $order['quantity'],
          'price' => number_format($order['price'], 2) . '$',
          'amount' => number_format($order['price']*$order['quantity'], 2) . '$',
          'mm_tax' => $order['mm_tax'].'%',
          'us_tax' => $order['us_tax'].'%',
          'commission' => $order['commission'].'%',
          'weight' => $order['weight_cost'].'$',
          'net_weight' => $order['weight_cost']*$order['quantity'].'$',
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
        $new_customer = (object)array(
          'customer_name' => '<a href="'.URL.'/customer/detail/'.$order['customer_id'].'">'.$membership . $order['username'].'</a>',
          'order_id' => str_pad( $order['id'], 7, 0, STR_PAD_LEFT ),
          'product_link' => '<a href="'.$order['product_link'].'" class="product-link" target="_blank">Check&nbsp;Product&nbsp;Link</a>',
          'remark' => $order['remark'],
          'quantity' => $order['quantity'],
          'price' => number_format($order['price'], 2) . '$',
          'amount' => number_format($order['price']*$order['quantity'], 2) . '$',
          'mm_tax' => $order['mm_tax'].'%',
          'us_tax' => $order['us_tax'].'%',
          'commission' => $order['commission'].'%',
          'weight' => $order['weight_cost'].'$',
          'net_weight' => $order['weight_cost']*$order['quantity'].'$',
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
