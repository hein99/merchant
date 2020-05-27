<?php

  class MessageRecord extends AnotherClass
  {
    protected $data = array(
      'id' => '',
      'to_user_id' => '',
      'from_user_id' => '',
      'messages' => '',
      'image' => '',
      'arrived_time' => '',
      'status' => ''
    );
    public static function getAllMessage($from_user_id, $to_user_id, $row)
    {
      $conn = parent::connect();
      $sql = 'SELECT * FROM (SELECT * FROM '.TBL_MESSAGE_RECORD.' WHERE (from_user_id = :from_user_id AND to_user_id = :to_user_id)
              OR (from_user_id = :to_user_id AND to_user_id = :from_user_id)
              ORDER BY arrived_time DESC LIMIT row = :row, 7) lastmessage ORDER BY id ASC';
      try {
        $st = $conn->prepare($sql);
        $st->bindValue(':from_user_id', $from_user_id, PDO::PARAM_INT);
        $st->bindValue(':to_user_id', $to_user_id, PDO::PARAM_INT);
        $st->bindValue(':row', $row, PDO::PARAM_INT);
        $st->execute();
        $message = array();
        foreach( $st->fetchAll() as $row)
        {
          $message[] = new MessageRecord($row);
        }
        parent::disconnect($conn);
        return $message;
      } catch(PDOException $e) {
        parent::disconnect($conn);
        die('Query failed: ' . $e->getMessage());
      }
    }
    public function addMessage()
    {
      $conn = parent::connect();
      $sql = 'INSERT INTO '.TBL_MESSAGE_RECORD.' (to_user_id, from_user_id, messages, image, arrived_time, status)
              VALUES (:to_user_id, :from_user_id, :messages, :image, NOW(), 0)';
      try {
        $st = $conn->prepare($sql);
        $st->bindValue(':to_user_id', $this->data['to_user_id'], PDO::PARAM_INT);
        $st->bindValue(':from_user_id', $this->data['from_user_id'], PDO::PARAM_INT);
        $st->bindValue(':messages', $this->data['messages'], PDO::PARAM_STR);
        $st->bindValue(':image', $this->data['image'], PDO::PARAM_STR);
        $st->execute();
        parent::disconnect($conn);
      }catch (PDOException $e) {
        parent::disconnect($conn);
        die('Query failed: ' . $e->getMessage());
      }
    }
    public static function countUnseenMessage($from_user_id, $to_user_id)
    {
      $conn = parent::connect();
      $sql = 'SELECT * FROM '.TBL_MESSAGE_RECORD.' WHERE from_user_id = :from_user_id AND to_user_id = :to_user_id AND status = 0';
      try {
        $st = $conn->prepare($sql);
        $st->bindValue(':from_user_id', $from_user_id, PDO::PARAM_INT);
        $st->bindValue(':to_user_id', $to_user_id, PDO::PARAM_INT);
        $row = $st->fetchAll();
        $count = $row->rowCount();
        if($count > 0) return $count;
      }
    }
  }

?>
