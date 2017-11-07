<?php
require_once 'Database.php';

class Cost{

  private $db;
  private $table = 'costs';

  public function __construct()
  {
    $this->db = new Database();
  }


  public function getCosts()
  {
    $sql = "SELECT SUM(meal_cost) as total_cost FROM $this->table";
    $stmt = $this->db->conn->prepare( $sql );
    $stmt->execute();

    $results = $stmt->fetch(PDO::FETCH_ASSOC);

    return $results ? $results : false;
  }

  public function getCostsTable()
  {
    $sql = "SELECT * FROM $this->table ORDER BY cost_date ASC";
    $stmt = $this->db->conn->prepare( $sql );
    $stmt->execute();

    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $results ? $results : false;
  }

  public function getCostById($id)
  {
    $sql = "SELECT * FROM $this->table WHERE id = :id";
    $stmt = $this->db->conn->prepare( $sql );
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $stmt->execute();

    $results = $stmt->fetch(PDO::FETCH_ASSOC);

    return $results ? $results : false;
  }

  public function getCostByMember($member_id)
  {
    $sql = "SELECT SUM(meal_cost) as single_cost FROM $this->table WHERE member_id = :member_id";
    $stmt = $this->db->conn->prepare( $sql );
    $stmt->bindValue(':member_id', $member_id, PDO::PARAM_INT);
    $stmt->execute();

    $results = $stmt->fetch(PDO::FETCH_ASSOC);

    return $results ? $results : false;
  }


  public function insertCost($cost, $member_id, $comments, $cost_date)
  {
    $sql = "INSERT INTO $this->table (meal_cost, member_id, comments, cost_date) VALUES (?, ?, ?, ?)";
    $stmt = $this->db->conn->prepare( $sql );
    $stmt->bindParam(1, $cost, PDO::PARAM_INT);
    $stmt->bindParam(2, $member_id, PDO::PARAM_INT);
    $stmt->bindParam(3, $comments, PDO::PARAM_STR);
    $stmt->bindParam(4, $cost_date, PDO::PARAM_INT);
    $stmt->execute();

    return ($stmt->rowCount() > 0) ? $stmt : false;
  }


  public function updateCost($member_id, $meal_cost, $comments, $id)
  {
    $sql = "UPDATE $this->table SET member_id = :member_id, meal_cost = :meal_cost, comments = :comments WHERE id = :id";
    $stmt = $this->db->conn->prepare( $sql );
    $stmt->bindParam(':member_id', $member_id, PDO::PARAM_INT);
    $stmt->bindParam(':meal_cost', $meal_cost, PDO::PARAM_INT);
    $stmt->bindParam(':comments', $comments, PDO::PARAM_STR);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();

    return ($stmt->rowCount() > 0) ? $stmt : false;
  }





}
