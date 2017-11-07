<?php
require_once 'Database.php';

class Meal{

  private $db;
  private $table = 'meals';
  private $table_users = 'users';

  public function __construct()
  {
    $this->db = new Database();
  }

  public function getMeals()
  {
    $sql = "SELECT SUM(meal_num) as total_meal FROM $this->table";
    $stmt = $this->db->conn->prepare( $sql );
    $stmt->execute();

    $results = $stmt->fetch(PDO::FETCH_ASSOC);

    return $results ? $results : false;
  }

  public function getMealTable()
  {
    $sql = "SELECT * FROM $this->table ORDER BY meal_date ASC";
    $stmt = $this->db->conn->prepare( $sql );
    $stmt->execute();

    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $results ? $results : false;
  }

  public function getMealById($id)
  {
    $sql = "SELECT * FROM $this->table WHERE id = :id";
    $stmt = $this->db->conn->prepare( $sql );
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $stmt->execute();

    $results = $stmt->fetch(PDO::FETCH_ASSOC);

    return $results ? $results : false;
  }

  public function getMealsByDate($meal_date)
  {
    $sql = "SELECT * FROM $this->table WHERE meal_date = :meal_date";
    $stmt = $this->db->conn->prepare( $sql );
    $stmt->bindValue(':meal_date', $meal_date, PDO::PARAM_INT);
    $stmt->execute();

    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $results ? $results : false;
  }

  public function getMealByDate($meal_date)
  {
    $sql = "SELECT DISTINCT meal_date FROM $this->table WHERE meal_date = :meal_date";
    $stmt = $this->db->conn->prepare( $sql );
    $stmt->bindValue(':meal_date', $meal_date, PDO::PARAM_INT);
    $stmt->execute();

    $results = $stmt->fetch(PDO::FETCH_ASSOC);

    return $results ? $results : false;
  }

  public function getMemberNameByMeal($member_id)
  {
    $sql = "SELECT $this->table_users.name FROM $this->table JOIN $this->table_users ON $this->table.member_id = $this->table_users.id WHERE member_id = :member_id";
    $stmt = $this->db->conn->prepare( $sql );
    $stmt->bindValue(':member_id', $member_id, PDO::PARAM_INT);
    $stmt->execute();

    $results = $stmt->fetch(PDO::FETCH_ASSOC);

    return $results ? $results : false;
  }

  public function getMealByMember($member_id)
  {
    $sql = "SELECT SUM(meal_num) as member_meal FROM $this->table WHERE member_id = :member_id";
    $stmt = $this->db->conn->prepare( $sql );
    $stmt->bindValue(':member_id', $member_id, PDO::PARAM_INT);
    $stmt->execute();

    $results = $stmt->fetch(PDO::FETCH_ASSOC);

    return $results ? $results : false;
  }


  public function insertMealArr($meal_nums, $meal_date)
  {
    $sql = "INSERT INTO $this->table (member_id, meal_num, meal_date) VALUES ";
    $insertQuery = array();
    $insertData = array();
    foreach ($meal_nums as $memberid => $meal_num) {
        $insertQuery[] = '(?, ?, ?)';
        $insertData[] = $memberid;
        $insertData[] = $meal_num;
        $insertData[] = $meal_date;
    }

    if (!empty($insertQuery)) {
        $sql .= implode(', ', $insertQuery);
        $stmt = $this->db->conn->prepare($sql);
        $stmt->execute($insertData);
    }

    return ($stmt->rowCount() > 0) ? $stmt : false;
  }


  public function updateMeal($meal_num, $id)
  {
    $sql = "UPDATE $this->table SET meal_num = :meal_num WHERE id = :id";
    $stmt = $this->db->conn->prepare( $sql );
    $stmt->bindValue(':meal_num', $meal_num, PDO::PARAM_INT);
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $stmt->execute();

    return ($stmt->rowCount() > 0) ? $stmt : false;
  }



}
