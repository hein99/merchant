<?php

class LoginRecord extends DataObject
{
  protected $data = array(
    'id' => '',
    'user_id' => '',
    'active_activity' => '',
    'is_type' => ''
  );

  public static function addUserLoginRecord($user_id) //add to login record when admin create a user
  {
    $conn = parent::connect();
    $sql = 'INSERT INTO '.TBL_LOGIN_RECORD.' (user_id, active_activity, is_type)
            VALUES (:user_id, NOW(), "no")';
    try {
      $st = $conn->prepare($sql);
      $st->bindValue(':user_id', $user_id, PDO::PARAM_INT);
      $st->execute();
      parent::disconnect($conn);
    }catch (PDOException $e) {
      parent::disconnect($conn);
      die('Query failed: '.$e->getMessage());
    }
  }
  public static function getUsersActiveActivity($admin_id) // get all users' active activity except from admin
  {
    $conn = parent::connect();
    $sql = 'SELECT * FROM ' . TBL_LOGIN_RECORD . ' WHERE user_id <> :admin_id';
    try {
      $st = $conn->prepare($sql);
      $st->bindValue(':admin_id', $admin_id, PDO::PARAM_INT);
      $st->execute();
      $login_records = array();
      foreach ($st->fetchAll() as $row) {
        $login_records[] = new LoginRecord($row);
      }
      parent::disconnect($conn);
      return $login_records;
    }catch (PDOException $e) {
      parent::disconnect($conn);
      die('Query failed: '.$e->getMessage());
    }
  }
  public static function getIsType($admin_id) // get all users' is_type is 1 except from admin
  {
    $conn = parent::connect();
    $sql = 'SELECT * FROM ' . TBL_LOGIN_RECORD . ' WHERE user_id <> :admin_id AND is_type = \'yes\'';
    try {
      $st = $conn->prepare($sql);
      $st->bindValue(':admin_id', $admin_id, PDO::PARAM_INT);
      $st->execute();
      $login_records = array();
      foreach ($st->fetchAll() as $row) {
        $login_records[] = new LoginRecord($row);
      }
      parent::disconnect($conn);
      return $login_records;
    }catch (PDOException $e) {
      parent::disconnect($conn);
      die('Query failed: '.$e->getMessage());
    }
  }
  public static function updateUsersActiveActivity($activity, $user_id) // update activity time during user login
  {
    $conn = parent::connect();
    $sql = 'UPDATE '.TBL_LOGIN_RECORD. ' SET active_activity = :activity WHERE id = :user_id';
    try {
      $st = $conn->prepare($sql);
      $st->bindValue(':activity', $activity, PDO::PARAM_STR);
      $st->bindValue(':user_id', $user_id, PDO::PARAM_INT);
      $st->execute();
      parent::disconnect($conn);
    }catch (PDOException $e) {
      parent::disconnect($conn);
      die('Query failed: '.$e->getMessage());
    }
  }
  public function updateIsType() //update is typing... when onclick or onblur on textarea
  {
    $conn = parent::connect();
    $sql = 'UPDATE '.TBL_LOGIN_RECORD. ' SET is_type = :is_type WHERE user_id = :user_id';
    try {
      $st = $conn->prepare($sql);
      $st->bindValue(':user_id', $this->data['user_id'], PDO::PARAM_INT);
      $st->bindValue(':is_type', $this->data['is_type'], PDO::PARAM_STR);
      $st->execute();
      parent::disconnect($conn);
    }catch (PDOException $e) {
      parent::disconnect($conn);
      die('Query failed: '.$e->getMessage());
    }
  }
}
?>
