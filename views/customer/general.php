<?php
  function updateHistoryTable($customer_statements){
    $table_output = '';
    foreach ($customer_statements as $customer_statement) {
      $table_output .= '<tr>';
      $table_output .= '<td>' . $customer_statement->getValueEncoded('created_date') . '</td>';
      $table_output .= '<td>' . $customer_statement->getValueEncoded('about') . '</td>';
      $table_output .= '<td><span>';
      $table_output .= $customer_statement->getValueEncoded('amount_status') ? '+' : '-' ;
      $table_output .= '</span>' . $customer_statement->getValueEncoded('amount') . '</td>';
      $table_output .= '</tr>';
    }
    return $table_output;
  }
?>
