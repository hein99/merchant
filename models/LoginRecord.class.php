<?php

class LoginRecord extends DataObject
{
  protected $data = array(
    'id' => '',
    'user_id' => '',
    'active_activity' => '',
    'is_type' => ''
  );

  public static function getUserLoginRecord($user_id)
  {
    $conn = parent::connect();
    $sql = 'SELECT * FROM '.TBL_LOGIN_RECORD.' WHERE user_id = :user_id';
    try {
      $st = $conn->prepare($sql);
      $st->bindValue(':user_id', $user_id, PDO::PARAM_INT);
      $st->execute();
      $row = $st->fetch();
      parent::disconnect($conn);
      if($row) return new LoginRecord($row);
    }catch(PDOException $e){
      parent::disconnect($conn);
      die('Query failed: ' . $e->getMessage());
    }
  }
  public function addUserLoginRecord()
  {
    $conn = parent::connect();
    $sql = 'INSERT INTO '.TBL_LOGIN_RECORD.' (user_id, active_activity, is_type)
            VALUES (:user_id, NOW(), no)';
    $st->bindValue(':user_id', $this->data['user_id'], PDO::PARAM_INT);
    $st->execute();
    parent::disconnect($conn);
  }catch (PDOException $e) {
    parent::disconnect($conn);
    die('Query failed: '.$e->getMessage());
  }
?>
