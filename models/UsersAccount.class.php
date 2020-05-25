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


  // public static function getAllAdmin()
  // {
  //   $conn = parent::connect();
  //   $sql = 'SELECT * FROM ' . TBL_ADMIN;
  //   try{
  //     $st = $conn->query($sql);
  //
  //     $admin_accounts = array();
  //     foreach ( $st->fetchAll() as $row ) {
  //       $admin_accounts[] = new Admin( $row );
  //     }
  //     parent::disconnect($conn);
  //     return $admin_accounts;
  //   } catch (PDOException $e) {
  //     parent::disconnect($conn);
  //     die('Query failed: ' . $e->getMessage());
  //   }
  //
  // }


}

 ?>
