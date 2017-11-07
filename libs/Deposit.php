<?php
require_once 'Database.php';

class Deposit{

  private $db;
  private $table = 'deposit';

  public function __construct()
  {
    $this->db = new Database();
  }

  public function getDeposit()
  {
    $sql = "SELECT * FROM $this->table ORDER BY `date` ASC";
    $stmt = $this->db->conn->prepare( $sql );
    $stmt->execute();

    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $results ? $results : false;
  }

  public function getTotalDeposit()
  {
    $sql = "SELECT SUM(amount) as total_amount FROM $this->table";
    $stmt = $this->db->conn->prepare( $sql );
    $stmt->execute();

    $results = $stmt->fetch(PDO::FETCH_ASSOC);

    return $results ? $results : false;
  }

  public function getDepositById($id)
  {
    $sql = "SELECT * FROM $this->table WHERE id = :id";
    $stmt = $this->db->conn->prepare( $sql );
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $stmt->execute();

    $results = $stmt->fetch(PDO::FETCH_ASSOC);

    return $results ? $results : false;
  }

  public function getDepositAmountsById($member_id)
  {
    $sql = "SELECT SUM(amount) as amounts FROM $this->table WHERE member_id = :member_id";
    $stmt = $this->db->conn->prepare( $sql );
    $stmt->bindValue(':member_id', $member_id, PDO::PARAM_INT);
    $stmt->execute();

    $results = $stmt->fetch(PDO::FETCH_ASSOC);

    return $results ? $results : false;
  }


  public function insertDeposit($member_id, $amount, $comments)
  {
    $sql = "INSERT INTO $this->table (member_id, amount, comments) VALUES (:member_id, :amount, :comments)";
    $stmt = $this->db->conn->prepare( $sql );
    $stmt->bindParam(':member_id', $member_id, PDO::PARAM_INT);
    $stmt->bindParam(':amount', $amount, PDO::PARAM_INT);
    $stmt->bindParam(':comments', $comments, PDO::PARAM_STR);
    $stmt->execute();

    return ($stmt->rowCount() > 0) ? $stmt : false;
  }


  public function updateDeposit($member_id, $amount, $comments, $id)
  {
    $sql = "UPDATE $this->table SET member_id = :member_id, amount = :amount, comments = :comments WHERE id = :id";
    $stmt = $this->db->conn->prepare( $sql );
    $stmt->bindParam(':member_id', $member_id, PDO::PARAM_INT);
    $stmt->bindParam(':amount', $amount, PDO::PARAM_INT);
    $stmt->bindParam(':comments', $comments, PDO::PARAM_STR);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();

    return ($stmt->rowCount() > 0) ? $stmt : false;
  }




}
