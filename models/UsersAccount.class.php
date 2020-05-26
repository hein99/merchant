<?php

class UsersAccount extends DataObject
{
  protected $data = array(
    'id' => '',
    'username' => '',
    'password' => '',
    'user_status' => '',
    'phone' => '',
    'address' => '',
    'activate_status' => '',
    'point' => '',
    'membership_id' => '',
    'created_date' => '',
    'modified_date' => ''
  );

  public static function getAdminAccount(){
    $conn = parent::connect();
    $sql = 'SELECT * FROM '.TBL_USERS_ACCOUNT.' WHERE user_status = :user_status';

    try {
      $st = $conn->prepare($sql);
      $st->bindValue(':user_status','1', PDO::PARAM_INT);
      $st->execute();
      $row = $st->fetch();
      parent::disconnect($conn);
      if($row) return new UsersAccount($row);
    } catch(PDOException $e) {
      parent::disconnect($conn);
      die('Query failed: ' . $e->getMessae());
    }
  }

  public static function getAdminAccountById($id)
  {
    $conn = parent::connect();
    $sql = 'SELECT * FROM '.TBL_USERS_ACCOUNT.' WHERE id = :id AND user_status = :user_status';
    try {
      $st = $conn->prepare($sql);
      $st->bindValue(':id', $id, PDO::PARAM_STR);
      $st->bindValue(':user_status','1', PDO::PARAM_INT);
      $st->execute();
      $row = $st->fetch();
      parent::disconnect($conn);
      if($row) return new UsersAccount($row);
    } catch (PDOException $e) {
      parent::disconnect($conn);
      die('Query failed: ' . $e->getMessage());
    }
  }

  public function authenticateAdminAccount()
  {
    $conn = parent::connect();
    $sql = 'SELECT * FROM '.TBL_USERS_ACCOUNT.' WHERE name = :username AND password = :password AND user_status = :user_status';
    try {
      $st = $conn->prepare($sql);
      $st->bindValue(':username', $this->data['username'], PDO::PARAM_STR);
      $st->bindValue(':password', $this->data['password'], PDO::PARAM_STR);
      $st->bindValue(':user_status','1', PDO::PARAM_INT);
      $st->execute();
      $row = $st->fetch();
      parent::disconnect($conn);
      if($row) return new UsersAccount($row);
    }catch(PDOException $e){
      parent::disconnect($conn);
      die('Query failed: ' . $e->getMessage());
    }
  }
}
?>
