<?php
  function updateHistoryTable($customer_statements){
    $table_output = '';
    foreach ($customer_statements as $customer_statement) {
      $table_output .= '<tr>';
      $table_output .= '<td>' . $customer_statement->getValue('created_date') . '</td>';
      $table_output .= '<td>' . $customer_statement->getValue('about') . '</td>';
      $table_output .= '<td>' . $customer_statement->getValue('amount') . '</td>';
      $table_output .= '</tr>';
    }
    return $table_output;
  }
?>
