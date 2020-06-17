<?php
class ExchangeRate extends DataObject
{
  protected $data = array(
    'id' => '',
    'mmk' => '',
    'created_date' => ''
  );

  public static function getAllExchangeRates()
  {
    $conn = parent::connect();
    $sql = 'SELECT * FROM '.TBL_EXCHANGE_RATE.' ORDER BY created_date DESC';
    try {
      $st = $conn->query($sql);
      $password_request = array();
      foreach($st->fetchAll() as $row)
      {
        $password_request[] = new ExchangeRate($row);
      }
      parent::disconnect($conn);
      return $password_request;
    }catch(PDOException $e) {
      parent::disconnect($conn);
      die('Query failed: '.$e->getMessage());
    }
  }

  public static function getLatestExchangeRate()
  {
    $conn = parent::connect();
    $sql = 'SELECT * FROM '.TBL_EXCHANGE_RATE.' ORDER BY created_date DESC LIMIT 1';
    try {
      $st = $conn->query($sql);
      $row = $st->fetch();
      parent::disconnect($conn);
      if($row) return new ExchangeRate($row);
    }catch(PDOException $e) {
      parent::disconnect($conn);
      die('Query failed: '.$e->getMessage());
    }
  }

  public function createExchangeRate()
  {
    $conn = parent::connect();
    $sql = 'INSERT INTO '.TBL_EXCHANGE_RATE.' (mmk, created_date) VALUES(:mmk, now())';
    try {
      $st = $conn->prepare($sql);
      $st->bindValue(':mmk', $this->data['mmk']);
      $st->execute();
      parent::disconnect($conn);
    }catch(PDOException $e) {
      parent::disconnect($conn);
      die('Query failed: ' . $e->getMessage());
    }
  }
}
 ?>
