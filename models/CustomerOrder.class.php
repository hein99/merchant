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
    $sql = 'SELECT COUNT(*) FROM ' . TBL_CUSTOMER_ORDER . ' WHERE is_view = 0';

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

#update for is_view
  public function updateView()
  {
    $conn = parent::connect();
    $sql = 'UPDATE '. TBL_CUSTOMER_ORDER .' is_view = !is_view WHERE id = :id';

    try {
      $st = $conn->prepare($sql);
      $st->bindValue(':id', $this->data['id'], PDO::PARAM_INT);
      $st->execute();
      parent::disconnect($conn);
    } catch(PDOException $e) {
      parent::disconnect($conn);
      die('Query failed: ' . $e->getMessage());
    }
  }

#update for us_tax, mm_tax, commission, weight_cost, order_status
  public function updateInformation()
  {
    $conn = parent::connect();
    $sql = 'UPDATE '. TBL_CUSTOMER_ORDER .' us_tax = :us_tax, mm_tax = :mm_tax, commission = :commission, weight_cost = :weight_cost, order_status = :order_status WHERE id = :id';

    try {
      $st = $conn->prepare($sql);
      $st->bindValue(':id', $this->data['id'], PDO::PARAM_INT);
      $st->bindValue(':us_tax', $this->data['us_tax']);
      $st->bindValue(':mm_tax', $this->data['mm_tax']);
      $st->bindValue(':commission', $this->data['commission']);
      $st->bindValue(':weight_cost', $this->data['weight_cost']);
      $st->bindValue(':order_status', $this->data['order_status'], PDO::PARAM_INT);
      $st->execute();
      parent::disconnect($conn);
    } catch(PDOException $e) {
      parent::disconnect($conn);
      die('Query failed: ' . $e->getMessage());
    }
  }
#update for product_shipping_status
  public function updateProductShippingStatus()
  {
    $conn = parent::connect();
    $sql = 'UPDATE '. TBL_CUSTOMER_ORDER .' product_shipping_status = product_shipping_status WHERE id = :id';

    try {
      $st = $conn->prepare($sql);
      $st->bindValue(':id', $this->data['id'], PDO::PARAM_INT);
      $st->bindValue(':product_shipping_status', $this->data['product_shipping_status'], PDO::PARAM_INT);
      $st->execute();
      parent::disconnect($conn);
    } catch(PDOException $e) {
      parent::disconnect($conn);
      die('Query failed: ' . $e->getMessage());
    }
  }
}
 ?>
