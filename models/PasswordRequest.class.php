<?php
class PasswordRequest extends DataObject
{
  protected $data = array(
    'id' => '',
    'phone' => '',
    'requested_date' => '',
    'status' => ''
  );

  public static function getAllPasswordRequest()
  {
    $conn = parent::connect();
    $sql = 'SELECT * FROM '.TBL_PASSWORD_REQUEST.' WHERE status = 0';
    try {
      $st = $conn->query($sql);
      $password_request = array();
      foreach($st->fetchAll() as $row)
      {
        $password_request[] = new PasswordRequest($row);
      }
      parent::disconnect($conn);
      return $password_request;
    }catch(PDOException $e) {
      parent::disconnect($conn);
      die('Query failed: '.$e->getMessage());
    }
  }
  public static function donePasswordChanged($phone)
  {
    $conn = parent::connect();
    $sql = 'UPDATE '.TBL_PASSWORD_REQUEST.' SET status = 1 WHERE phone = :phone';
    try {
      $st = $conn->prepare($sql);
      $st->bindValue(':phone', $phone, PDO::PARAM_INT);
      $st->execute();
      parent::disconnect($conn);
    }catch(PDOException $e) {
      parent::disconnect($conn);
      die('Query failed: ' . $e->getMessage());
    }
  }
}
 ?>
