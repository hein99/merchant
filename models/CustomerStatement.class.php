<?php
class CustomerStatement extends DataObject
{
  protected $data = array(
    'id' => '',
    'customer_id' => '',
    'amount' => '',
    'about' => '',
    'created_date' => ''
  );

  public static function getCustomerStatement($customer_id)
  {
    $conn = parent::connect();
    $sql = 'SELECT * FROM '.TBL_CUSTOMER_STATEMENT.' WHERE customer_id = :customer_id';
    try {
      $st = $conn->prepare($sql);
      $st->bindValue(':customer_id', $customer_id, PDO::PARAM_INT);
      $st->execute();
      $row = $st->fetch();
      parent::disconnect($conn);
      if($row) return new CustomerStatement($row);
    } catch (PDOException $e) {
      parent::disconnect($conn);
      die('Query failed: ' . $e->getMessage());
    }
  }

  public function addCustomerStatement()
  {
    $conn = parent::connect();
    $sql = 'INSERT INTO ' .TBL_CUSTOMER_STATEMENT . '(customer_id, amount, about, created_date)
            VALUES (:customer_id, :amount, :about, NOW())';

    try{
      $st = $conn->prepare($sql);
      $st->bindValue(':customer_id', $this->data['customer_id'], PDO::PARAM_INT);
      $st->bindValue(':amount', $this->data['amount'], PDO::PARAM_STR);
      $st->bindValue(':about', $this->data['about'], PDO::PARAM_STR);
      $st->execute();
      parent::disconnect($conn);
    }catch (PDOException $e) {
      parent::disconnect($conn);
      die('Query failed: ' . $e->getMessage());
    }
  }

}
 ?>
