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
    'balance' => '',
    'membership_id' => '',
    'created_date' => '',
    'modified_date' => ''
  );

#Admin Account Fuction
  public static function getAdminAccount()
  {
    $conn = parent::connect();
    $sql = 'SELECT * FROM '.TBL_USERS_ACCOUNT.' WHERE user_status = 1';

    try {
      $st = $conn->query($sql);
      $row = $st->fetch();
      parent::disconnect($conn);
      if($row) return new UsersAccount($row);
    } catch(PDOException $e) {
      parent::disconnect($conn);
      die('Query failed: ' . $e->getMessage());
    }
  }

  public static function getAdminAccountById($id)
  {
    $conn = parent::connect();
    $sql = 'SELECT * FROM '.TBL_USERS_ACCOUNT.' WHERE id = :id AND user_status = 1';
    try {
      $st = $conn->prepare($sql);
      $st->bindValue(':id', $id, PDO::PARAM_STR);
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
    $sql = 'SELECT * FROM '.TBL_USERS_ACCOUNT.' WHERE phone = :phone AND password = PASSWORD(:password) AND user_status = 1';
    try {
      $st = $conn->prepare($sql);
      $st->bindValue(':phone', $this->data['phone'], PDO::PARAM_STR);
      $st->bindValue(':password', $this->data['password'], PDO::PARAM_STR);
      $st->execute();
      $row = $st->fetch();
      parent::disconnect($conn);
      if($row) return new UsersAccount($row);
    }catch(PDOException $e){
      parent::disconnect($conn);
      die('Query failed: ' . $e->getMessage());
    }
  }

  public function updateAdminAccount($id)
  {
    $conn = parent::connect();
    $sql = 'UPDATE ' . TBL_USERS_ACCOUNT .' SET username = :username, password = password(:password) WHERE id = :id';
    try {
      $st = $conn->prepare($sql);
      $st->bindValue(':id', $id, PDO::PARAM_INT);
      $st->bindValue(':username', $this->data['username'], PDO::PARAM_STR);
      $st->bindValue(':password', $this->data['password'], PDO::PARAM_STR);
      $st->execute();
      parent::disconnect($conn);
    } catch (PDOException $e) {
      parent::disconnect($conn);
      die("Query failed: ".$e->getMessage());
    }

  }

#Customer Account Function
  public static function getTotalCustomersCount()
  {
    $conn = parent::connect();
    $sql = 'SELECT COUNT(*) FROM ' . TBL_USERS_ACCOUNT .' WHERE user_status = 0';

    try {
      $st = $conn->query($sql);
      $row = $st->fetch();
      parent::disconnect($conn);
      return $row[0];
    } catch (PDOException $e) {
      parent::disconnect($conn);
      die('Query failed: ' . $e->getMessage());
    }

  }

  public static function getActivateCustomerAccount()
  {
    $conn = parent::connect();
    $sql = 'SELECT * FROM '.TBL_USERS_ACCOUNT.' WHERE user_status = 0 AND activate_status = 1';

    try {
      $st = $conn->query($sql);
      $customer = array();
      $result = $st->setFetchMode(PDO::FETCH_NAMED);
      foreach ( $st->fetchAll() as $row ) {
        $customer[] = $row;
      }
      parent::disconnect($conn);
      return $customer;
    } catch(PDOException $e) {
      parent::disconnect($conn);
      die('Query failed: ' . $e->getMessage());
    }
  }

  public static function getDeactivateCustomerAccount()
  {
    $conn = parent::connect();
    $sql = 'SELECT * FROM '.TBL_USERS_ACCOUNT.' WHERE user_status = 0 AND activate_status = 0';

    try {
      $st = $conn->query($sql);
      $customer = array();
      $result = $st->setFetchMode(PDO::FETCH_NAMED);
      foreach ( $st->fetchAll() as $row ) {
        $customer[] = $row;
      }
      parent::disconnect($conn);
      return $customer;
    } catch(PDOException $e) {
      parent::disconnect($conn);
      die('Query failed: ' . $e->getMessage());
    }
  }

  public static function getCustomerAccountByID($id)
  {
    $conn = parent::connect();
    $sql = 'SELECT * FROM '.TBL_USERS_ACCOUNT.' WHERE id = :id AND user_status = 0';
    try {
      $st = $conn->prepare($sql);
      $st->bindValue(':id', $id, PDO::PARAM_STR);
      $st->execute();
      $row = $st->fetch();
      parent::disconnect($conn);
      if($row) return new UsersAccount($row);
    } catch (PDOException $e) {
      parent::disconnect($conn);
      die('Query failed: ' . $e->getMessage());
    }
  }

  public static function getCustomerAccountByPhone($phone)
  {
    $conn = parent::connect();
    $sql = 'SELECT * FROM '.TBL_USERS_ACCOUNT.' WHERE phone = :phone AND user_status = 0';
    try {
      $st = $conn->prepare($sql);
      $st->bindValue(':phone', $phone, PDO::PARAM_STR);
      $st->execute();
      $row = $st->fetch();
      parent::disconnect($conn);
      if($row) return new UsersAccount($row);
    } catch (PDOException $e) {
      parent::disconnect($conn);
      die('Query failed: ' . $e->getMessage());
    }
  }

  public function authenticateCustomerAccount()
  {
    $conn = parent::connect();
    $sql = 'SELECT * FROM '.TBL_USERS_ACCOUNT.' WHERE username = :username AND password = PASSWORD(:password) AND id = :id';
    try {
      $st = $conn->prepare($sql);
      $st->bindValue(':id', $this->data['id'], PDO::PARAM_INT);
      $st->bindValue(':username', $this->data['username'], PDO::PARAM_STR);
      $st->bindValue(':password', $this->data['password'], PDO::PARAM_STR);
      $st->execute();
      $row = $st->fetch();
      parent::disconnect($conn);
      if($row) return new UsersAccount($row);
    }catch(PDOException $e){
      parent::disconnect($conn);
      die('Query failed: ' . $e->getMessage());
    }
  }

  public function createCustomerAccount()
  {
    $conn = parent::connect();
    $sql = 'INSERT INTO ' .TBL_USERS_ACCOUNT . ' (username, password, user_status, phone, address, activate_status, point, balance, membership_id, created_date, modified_date)
    VALUES (:username, PASSWORD(:password), 0, :phone, :address, 0, 0, 0, 1, NOW(), NOW())';

    try{
      $st = $conn->prepare($sql);
      $st->bindValue(':username', $this->data['username'], PDO::PARAM_STR);
      $st->bindValue(':password', $this->data['password'], PDO::PARAM_STR);
      $st->bindValue(':phone', $this->data['phone'], PDO::PARAM_STR);
      $st->bindValue(':address', $this->data['address'], PDO::PARAM_STR);
      $st->execute();
      $id = $conn->lastInsertId();
      parent::disconnect($conn);
      return $id;
    }catch (PDOException $e) {
      parent::disconnect($conn);
      die('Query failed: ' . $e->getMessage());
    }
  }

  public function editCustomerActivateStatus()
  {
    $conn = parent::connect();
    $sql = 'UPDATE ' . TBL_USERS_ACCOUNT .' SET activate_status = !activate_status, modified_date = NOW() WHERE id = :id';

    try {
      $st = $conn->prepare($sql);
      $st->bindValue(':id', $this->data['id'], PDO::PARAM_INT);
      $st->execute();
      parent::disconnect($conn);
    } catch (PDOException $e) {
      parent::disconnect($conn);
      die("Query failed: ". $e->getMessage());
    }
  }
  public static function getPhoneNumberCheck($phone, $id)
  {
    $conn = parent::connect();
    $sql = 'SELECT * FROM '.TBL_USERS_ACCOUNT.' WHERE phone = :phone AND id != :id AND user_status = 0';
    try {
      $st = $conn->prepare($sql);
      $st->bindValue(':phone', $phone, PDO::PARAM_STR);
      $st->bindValue(':id', $id, PDO::PARAM_INT);
      $st->execute();
      $row = $st->fetch();
      parent::disconnect($conn);
      if($row) return new UsersAccount($row);
    } catch (PDOException $e) {
      parent::disconnect($conn);
      die('Query failed: ' . $e->getMessage());
    }
  }
  public function editCustomerInfo()
  {
    $conn = parent::connect();
    $sql = 'UPDATE ' . TBL_USERS_ACCOUNT .' SET username = :username, phone = :phone, address = :address, point = :point, membership_id = :membership_id, modified_date = NOW() WHERE id = :id';

    try {
      $st = $conn->prepare($sql);
      $st->bindValue(':id', $this->data['id'], PDO::PARAM_INT);
      $st->bindValue(':username', $this->data['username'], PDO::PARAM_STR);
      $st->bindValue(':phone', $this->data['phone'], PDO::PARAM_STR);
      $st->bindValue(':address', $this->data['address'], PDO::PARAM_STR);
      $st->bindValue(':point', $this->data['point'], PDO::PARAM_STR);
      $st->bindValue(':membership_id', $this->data['membership_id'], PDO::PARAM_INT);
      $st->execute();
      parent::disconnect($conn);
    } catch (PDOException $e) {
      parent::disconnect($conn);
      die("Query failed: ". $e->getMessage());
    }
  }

  public function editCustomerPassword()
  {
    $conn = parent::connect();
    $sql = 'UPDATE ' . TBL_USERS_ACCOUNT .' SET password = PASSWORD(:password), modified_date = NOW() WHERE id = :id';

    try {
      $st = $conn->prepare($sql);
      $st->bindValue(':id', $this->data['id'], PDO::PARAM_INT);
      $st->bindValue(':password', $this->data['password'], PDO::PARAM_STR);
      $st->execute();
      parent::disconnect($conn);
    } catch (PDOException $e) {
      parent::disconnect($conn);
      die("Query failed: ". $e->getMessage());
    }
  }
  public static function getCustomerBalance($id)
  {
    $conn = parent::connect();
    $sql = 'SELECT * FROM ' . TBL_USERS_ACCOUNT . ' WHERE id = :id AND user_status = 0';

    try {
      $st = $conn->prepare($sql);
      $st->bindValue('id', $id, PDO::PARAM_INT);
      $st->execute();
      $row = $st->fetch();
      parent::disconnect($conn);
      if($row) return new UsersAccount($row);
    } catch (PDOException $e) {
      parent::disconnect($conn);
      die('Query failed: ' . $e->getMessage());
    }
  }
  public static function updateCustomerBalance($id, $balance)
  {
    $conn = parent::connect();
    $sql = 'UPDATE ' . TBL_USERS_ACCOUNT .' SET balance = :balance WHERE id = :id';

    try {
      $st = $conn->prepare($sql);
      $st->bindValue(':id', $id, PDO::PARAM_INT);
      $st->bindValue(':balance', $balance);
      $st->execute();
      parent::disconnect($conn);
    } catch (PDOException $e) {
      parent::disconnect($conn);
      die("Query failed: ". $e->getMessage());
    }
  }

  public static function updateCustomerBalanceAndPoint($id, $balance, $point)
  {
    $conn = parent::connect();
    $sql = 'UPDATE ' . TBL_USERS_ACCOUNT .' SET balance = :balance, point = :point WHERE id = :id';

    try {
      $st = $conn->prepare($sql);
      $st->bindValue(':id', $id, PDO::PARAM_INT);
      $st->bindValue(':balance', $balance);
      $st->bindValue(':point', $point, PDO::PARAM_INT);
      $st->execute();
      parent::disconnect($conn);
    } catch (PDOException $e) {
      parent::disconnect($conn);
      die("Query failed: ". $e->getMessage());
    }
  }
}
?>
