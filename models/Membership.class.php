<?php
class Membership extends DataObject
{
  protected $data = array(
    'id' => '',
    'name' => '',
    'definition' => '',
    'percentage' => '',
    'modified_date' => ''
  );

  public static function getMembershipByID($id)
  {
    $conn = parent::connect();
    $sql = 'SELECT * FROM ' . TBL_MEMBERSHIP . ' WHERE id = :id';

    try {
      $st = $conn->prepare($sql);
      $st->bindValue(':id', $id, PDO::PARAM_INT);
      $st->execute();
      $row = $st->fetch();
      return $row;
    } catch(PDOException $e) {
      parent::disconnect($conn);
      die('Query failed: ' . $e->getMessage());
    }
  }

  public static function getAllMembership()
  {
    $conn = parent::connect();
    $sql = 'SELECT * FROM ' . TBL_MEMBERSHIP;

    try {
      $st = $conn->query($sql);
      $orders = array();
      foreach ( $st->fetchAll() as $row ) {
        $orders[] = new Membership($row);
      }
      parent::disconnect($conn);
      return $orders;
    } catch(PDOException $e) {
      parent::disconnect($conn);
      die('Query failed: ' . $e->getMessage());
    }
  }

  public function updatePercentage()
  {
    $conn = parent::connect();
    $sql = 'UPDATE '. TBL_MEMBERSHIP .' SET percentage = :percentage WHERE id = :id';
    try {
      $st = $conn->prepare($sql);
      $st->bindValue(':id', $this->data['id'], PDO::PARAM_INT);
      $st->bindValue(':percentage', $this->data['percentage']);
      $st->execute();
      parent::disconnect($conn);
    } catch(PDOException $e) {
      parent::disconnect($conn);
      die('Query failed: ' . $e->getMessage());
    }
  }

  public function updateDefinition()
  {
    $conn = parent::connect();
    $sql = 'UPDATE '. TBL_MEMBERSHIP .' SET definition = :definition WHERE id = :id';

    try {
      $st = $conn->prepare($sql);
      $st->bindValue(':id', $this->data['id'], PDO::PARAM_INT);
      $st->bindValue(':definition', $this->data['definition'], PDO::PARAM_STR);
      $st->execute();
      parent::disconnect($conn);
    } catch(PDOException $e) {
      parent::disconnect($conn);
      die('Query failed: ' . $e->getMessage());
    }
  }


}
 ?>
