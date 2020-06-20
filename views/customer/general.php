<?php
function customersJsonReturn($customers, $activate)
{
  $new_customers = array(); //Array Variable for json return
  foreach ($customers as $customer) {
    $membership_name = '';
    // change from membership id to membership name
    switch($customer['membership_id'])
    {
      case 1:
        $membership_name = '<div class="wp-membership-logo sliver-status" dataholder="Silver">
          <i class="fas fa-award"></i>
          <span id="membership-level"></span>
        </div>';
        break;

      case 2:
        $membership_name = '<div class="wp-membership-logo gold-status" dataholder="Gold">
          <i class="fas fa-award"></i>
          <span id="membership-level"></span>
        </div>';
        break;

      case 3:
        $membership_name = '<div class="wp-membership-logo platinum-status" dataholder="Platinum">
          <i class="fas fa-award"></i>
          <span id="membership-level"></span>
        </div>';
        break;

      case 4:
        $membership_name = '<div class="wp-membership-logo diamond-status" dataholder="Diamond">
          <i class="fas fa-gem"></i>
        </div>';
        break;

      default:
        exit();
    }

    $new_customer = (object)array(
      'customer_id' => str_pad( $customer['id'], 7, 0, STR_PAD_LEFT ),
      'customer_name' => '<a href="'.URL.'/customer/detail/'.$customer['id'].'" class ="customer-detail">'.$customer['username'].'</a>',
      'membership_name' => $membership_name,
      'phone' => $customer['phone'],
      'balance' => number_format($customer['balance'], 2) . 'Ks',
      'created_date' => $customer['created_date'],
      'activate_status' => $activate ? '<input type="checkbox" class="activate-toggle-js" data-id="'. $customer['id'] .'" checked><span class="activate-icon"></span>' : '<input type="checkbox" class="activate-toggle-js" data-id="'. $customer['id'] .'"><span class="activate-icon"></span>'
    );
    $new_customers[] = $new_customer;
  }

  echo json_encode($new_customers);
}

function updateHistoryTable($customer_statements){
  $table_output = '';
  foreach ($customer_statements as $customer_statement) {
    $table_output .= '<tr>';
    $table_output .= '<td>' . $customer_statement->getValueEncoded('created_date') . '</td>';
    $table_output .= '<td>' . $customer_statement->getValueEncoded('about') . '</td>';
    $table_output .= '<td class="';
    $table_output .= $customer_statement->getValueEncoded('amount_status') ? 'plus' : 'minus';
    $table_output .= '"><span>';
    $table_output .= $customer_statement->getValueEncoded('amount_status') ? '+' : '-' ;
    $table_output .= '</span>' . $customer_statement->getValueEncoded('amount') . '&nbsp;Ks</td>';
    $table_output .= '</tr>';
  }
  return $table_output;
}
?>
