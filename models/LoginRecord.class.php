<?php

class LoginRecord extends DataObject
{
  protected $data = array(
    'id' => '',
    'user_id' => '',
    'active_activity' => '',
    'is_type' => ''
  );

  // public static function getUserLoginRecord($user_id) // i have no idea why i added this function :3
  // {
  //   $conn = parent::connect();
  //   $sql = 'SELECT * FROM '.TBL_LOGIN_RECORD.' WHERE user_id = :user_id';
  //   try {
  //     $st = $conn->prepare($sql);
  //     $st->bindValue(':user_id', $user_id, PDO::PARAM_INT);
  //     $st->execute();
  //     $row = $st->fetch();
  //     parent::disconnect($conn);
  //     if($row) return new LoginRecord($row);
  //   }catch(PDOException $e){
  //     parent::disconnect($conn);
  //     die('Query failed: ' . $e->getMessage());
  //   }
  // }
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
  public static function getUsersActiveActivity($user_id) // get to know user active or not
  {
    $conn = parent::connect();
    $sql = 'SELECT active_activity FROM ' . TBL_LOGIN_RECORD . ' WHERE user_id = :user_id';
    try {
      $st = $conn->prepare($sql);
      $st->bindValue(':user_id', $user_id, PDO::PARAM_INT);
      $st->execute();
      $row = $st->fetch();
      parent::disconnect($conn);
      if($row) return $row;
    }catch (PDOException $e) {
      parent::disconnect($conn);
      die('Query failed: '.$e->getMessage());
    }
  }
  public static function getIsType($user_id) // get to know user is typing... or not
  {
    $conn = parent::connect();
    $sql = 'SELECT is_type FROM ' . TBL_LOGIN_RECORD . ' WHERE user_id = :user_id';
    try {
      $st = $conn->prepare($sql);
      $st->bindValue(':user_id', $user_id, PDO::PARAM_INT);
      $st->execute();
      $row = $st->fetch();
      parent::disconnect($conn);
      if($row) return $row;
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
  public static function updateIsType($is_type, $user_id) //update is typing... when onclick or onblur on textarea
  {
    $conn = parent::connect();
    $sql = 'UPDATE '.TBL_LOGIN_RECORD. ' SET is_type = :is_type WHERE id = :user_id';
    try {
      $st = $conn->prepare($sql);
      $st->bindValue(':is_type', $is_type, PDO::PARAM_STR);
      $st->bindValue(':user_id', $user_id, PDO::PARAM_INT);
      $st->execute();
      parent::disconnect($conn);
    }catch (PDOException $e) {
      parent::disconnect($conn);
      die('Query failed: '.$e->getMessage());
    }
  }
}
?>
