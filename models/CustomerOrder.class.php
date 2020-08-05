<?php
class CustomerOrder extends DataObject
{
  protected $data = array(
    'id' => '',
    'customer_id' => '',
    'product_link' => '',
    'remark' => '',
    'cupon_code' => '',
    'quantity' => '',
    'price' => '',
    'us_tax' => '',
    'shipping_cost' => '',
    'first_exchange_rate' => '',
    'commission' => '',
    'product_weight' => '',
    'weight_cost' => '',
    'mm_tax' => '',
    'second_exchange_rate' => '',
    'is_deliver' => '',
    'delivery_fee' => '',
    'order_status' => '',
    'has_viewed_admin' => '',
    'has_viewed_customer' => '',
    'created_date' => ''
  );

  public static function getTotalOrdersCount()
  {
    $conn = parent::connect();
    $sql = 'SELECT COUNT(*) FROM ' . TBL_CUSTOMER_ORDER;

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

  public static function getCustomerOrderArrayByOrderStatus($order_status)
  {
    $conn = parent::connect();
    $sql = 'SELECT '. TBL_CUSTOMER_ORDER .'.*, ' .TBL_USERS_ACCOUNT. '.username, '.TBL_USERS_ACCOUNT.'.membership_id FROM ' . TBL_CUSTOMER_ORDER . ' LEFT JOIN '.TBL_USERS_ACCOUNT.' ON ' .TBL_CUSTOMER_ORDER. '.customer_id = '.TBL_USERS_ACCOUNT.'.id WHERE order_status = :order_status';
    try {
      $st = $conn->prepare($sql);
      $st->bindValue(':order_status', $order_status, PDO::PARAM_INT);
      $st->execute();
      $orders = array();
      $result = $st->setFetchMode(PDO::FETCH_NAMED);
      foreach ( $st->fetchAll() as $row ) {
        $orders[] = $row;
      }
      parent::disconnect($conn);
      return $orders;
    } catch(PDOException $e) {
      parent::disconnect($conn);
      die('Query failed: ' . $e->getMessage());
    }
  }

  public static function getNewOrdersCount()
  {
    $conn = parent::connect();
    $sql = 'SELECT COUNT(*) FROM ' . TBL_CUSTOMER_ORDER . ' WHERE has_viewed_admin = 0';

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

  public static function getCustomerOrderById($id)
  {
    $conn = parent::connect();
    $sql = 'SELECT * FROM ' . TBL_CUSTOMER_ORDER . ' WHERE id = :id';
    try {
      $st = $conn->prepare($sql);
      $st->bindValue(':id', $id, PDO::PARAM_INT);
      $st->execute();
      $row =$st->fetch();
      parent::disconnect($conn);
      if($row) return new CustomerOrder($row);;
    } catch(PDOException $e) {
      parent::disconnect($conn);
      die('Query failed: ' . $e->getMessage());
    }
  }

#update for has_viewed_admin
  public static function updateView($order_status)
  {
    $conn = parent::connect();
    $sql = 'UPDATE '. TBL_CUSTOMER_ORDER .' SET has_viewed_admin = 1 WHERE order_status = :order_status';

    try {
      $st = $conn->prepare($sql);
      $st->bindValue(':order_status', $order_status, PDO::PARAM_INT);
      $st->execute();
      parent::disconnect($conn);
    } catch(PDOException $e) {
      parent::disconnect($conn);
      die('Query failed: ' . $e->getMessage());
    }
  }

  public function updateFirstPaymentInfo()
  {
    $conn = parent::connect();
    $sql = 'UPDATE '. TBL_CUSTOMER_ORDER .' SET us_tax = :us_tax, shipping_cost = :shipping_cost, order_status = 1, has_viewed_customer = 0, has_viewed_admin = 0 WHERE id = :id';

    try {
      $st = $conn->prepare($sql);
      $st->bindValue(':id', $this->data['id'], PDO::PARAM_INT);
      $st->bindValue(':us_tax', $this->data['us_tax']);
      $st->bindValue(':shipping_cost', $this->data['shipping_cost']);
      $st->execute();
      parent::disconnect($conn);
    } catch(PDOException $e) {
      parent::disconnect($conn);
      die('Query failed: ' . $e->getMessage());
    }
  }

  public function updateSecondPaymentInfo()
  {
    $conn = parent::connect();
    $sql = 'UPDATE '. TBL_CUSTOMER_ORDER .' SET commission = :commission, product_weight = :product_weight, weight_cost = :weight_cost, mm_tax = :mm_tax, second_exchange_rate = :second_exchange_rate, order_status = 6, has_viewed_customer = 0, has_viewed_admin = 0 WHERE id = :id';

    try {
      $st = $conn->prepare($sql);
      $st->bindValue(':id', $this->data['id'], PDO::PARAM_INT);
      $st->bindValue(':commission', $this->data['commission']);
      $st->bindValue(':product_weight', $this->data['product_weight']);
      $st->bindValue(':weight_cost', $this->data['weight_cost']);
      $st->bindValue(':mm_tax', $this->data['mm_tax']);
      $st->bindValue(':second_exchange_rate', $this->data['second_exchange_rate']);
      $st->execute();
      parent::disconnect($conn);
    } catch(PDOException $e) {
      parent::disconnect($conn);
      die('Query failed: ' . $e->getMessage());
    }
  }

  public function updateThirdPaymentInfo()
  {
    $conn = parent::connect();
    $sql = 'UPDATE '. TBL_CUSTOMER_ORDER .' SET delivery_fee = :delivery_fee, order_status = 7, has_viewed_customer = 0, has_viewed_admin = 0 WHERE id = :id';

    try {
      $st = $conn->prepare($sql);
      $st->bindValue(':id', $this->data['id'], PDO::PARAM_INT);
      $st->bindValue(':delivery_fee', $this->data['delivery_fee']);
      $st->execute();
      parent::disconnect($conn);
    } catch(PDOException $e) {
      parent::disconnect($conn);
      die('Query failed: ' . $e->getMessage());
    }
  }

#update for product_shipping_status
  public function updateOrderStatus()
  {
    $conn = parent::connect();
    $sql = 'UPDATE '. TBL_CUSTOMER_ORDER .' SET order_status = :order_status, has_viewed_admin=0, has_viewed_customer=0 WHERE id = :id';

    try {
      $st = $conn->prepare($sql);
      $st->bindValue(':id', $this->data['id'], PDO::PARAM_INT);
      $st->bindValue(':order_status', $this->data['order_status'], PDO::PARAM_INT);
      $st->execute();
      parent::disconnect($conn);
    } catch(PDOException $e) {
      parent::disconnect($conn);
      die('Query failed: ' . $e->getMessage());
    }
  }


}
 ?>
