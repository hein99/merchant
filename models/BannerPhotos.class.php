<?php
class BannerPhotos extends DataObject
{
  protected $data = array(
    'id' => '',
    'photo_name' => '',
    'link' => '',
    'order_no' => ''
  );


  public static function getAllPhotos()
  {
    $conn = parent::connect();
    $sql = 'SELECT * FROM ' . TBL_BANNER_PHOTOS . ' ORDER BY order_no';
    try {
      $st = $conn->query($sql);
      $photos = array();
      foreach ($st->fetchAll() as $row) {
        $photos[] = new BannerPhotos($row);
      }
      parent::disconnect($conn);
      return $photos;
    }catch(PDOException $e) {
      parent::disconnect($conn);
      die('Query failed: '.$e->getMessage());
    }
  }

  public static function getPhotoById($id)
  {
    $conn = parent::connect();
    $sql = 'SELECT * FROM ' . TBL_BANNER_PHOTOS . ' WHERE id=:id';
    try {
      $st = $conn->prepare($sql);
      $st->bindValue(':id', $id, PDO::PARAM_INT);
      $st->execute();
      $row = $st->fetch();
      parent::disconnect($conn);
      if($row) return new BannerPhotos($row);
    }catch(PDOException $e) {
      parent::disconnect($conn);
      die('Query failed: '.$e->getMessage());
    }
  }

  public function insertPhoto()
  {
    $conn = parent::connect();
    $sql = 'INSERT INTO ' . TBL_BANNER_PHOTOS . ' (photo_name, link, order_no) VALUES( :photo_name, :link, 0)';
    try {
      $st = $conn->prepare($sql);
      $st->bindValue(':photo_name', $this->data['photo_name']);
      $st->bindValue(':link', $this->data['link']);
      $st->execute();
      parent::disconnect($conn);
      return $conn->lastInsertId();
    }catch(PDOException $e) {
      parent::disconnect($conn);
      die('Query failed: ' . $e->getMessage());
    }
  }

  public function UpdateLinkById()
  {
    $conn = parent::connect();
    $sql = 'UPDATE ' . TBL_BANNER_PHOTOS . ' SET link = :link WHERE id = :id';
    try {
      $st = $conn->prepare($sql);
      $st->bindValue(':id', $this->data['id']);
      $st->bindValue(':link', $this->data['link']);
      $st->execute();
      parent::disconnect($conn);
    }catch(PDOException $e) {
      parent::disconnect($conn);
      die('Query failed: ' . $e->getMessage());
    }
  }

  public function UpdateOrderById()
  {
    $conn = parent::connect();
    $sql = 'UPDATE ' . TBL_BANNER_PHOTOS . ' SET order_no = :order_no WHERE id = :id';
    try {
      $st = $conn->prepare($sql);
      $st->bindValue(':order_no', $this->data['order_no']);
      $st->bindValue(':id', $this->data['id']);
      $st->execute();
      parent::disconnect($conn);
    }catch(PDOException $e) {
      parent::disconnect($conn);
      die('Query failed: ' . $e->getMessage());
    }
  }

  public static function DeleteById($id)
  {
    $conn = parent::connect();
    $sql = 'DELETE FROM ' . TBL_BANNER_PHOTOS . ' WHERE id = :id';
    try {
      $st = $conn->prepare($sql);
      $st->bindValue(':id', $id, PDO::PARAM_INT);
      $st->execute();
      parent::disconnect($conn);
    }catch(PDOException $e) {
      parent::disconnect($conn);
      die('Query failed: ' . $e->getMessage());
    }
  }
}
 ?>
