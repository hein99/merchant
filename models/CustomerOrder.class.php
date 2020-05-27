<?php
class CustomerOrder extends DataObject
{
  protected $data = array(
    'id' => '',
    'customer_id' => '',
    'product_link' => '',
    'remark' => '',
    'quantity' => '',
    'price' => '',
    'us_tax' => '',
    'mm_tax' => '',
    'commission' => '',
    'weight_cost' => '',
    'order_status' => '',
    'product_shipping_status' => '',
    'is_view' => '',
    'created_date' => ''
  );

  public static function getAllCustomerOrder()
  {
    $conn = parent::connect();
    $sql = 'SELECT * FROM '.TBL_CUSTOMER_ORDER;

    try {
      $st = $conn->query($sql);
      $order = array();
      foreach ( $st->fetchAll() as $row ) {
        $order[] = new CustomerOrder( $row );
      }
      parent::disconnect($conn);
      return $order;
    } catch(PDOException $e) {
      parent::disconnect($conn);
      die('Query failed: ' . $e->getMessage());
    }
  }

  public static function getNewOrderCount()
  {
    $conn = parent::connect();
    $sql = 'SELECT COUNT(*) FROM '. TBL_CUSTOMER_ORDER . ' WHERE is_view = 0';

    try {
      $st = $conn->query($sql);
      $row = $st->fetch();
      parent::disconnect($conn);
      return $row[0];
    } catch(PDOException $e) {
      parent::disconnect($conn);
      die('Query failed: ' . $e->getMessage());
    }
  }

}
 ?>
