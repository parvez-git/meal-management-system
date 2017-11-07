<?php
require_once 'Database.php';

class User{

  private $db;
  private $table = 'users';
  private $role_table = 'roles';

  public function __construct()
  {
    $this->db = new Database();
  }

  public function getUsers()
  {
    $sql = "SELECT * FROM $this->table ORDER BY id DESC";
    $stmt = $this->db->conn->prepare( $sql );
    $stmt->execute();

    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $results ? $results : false;
  }

  public function getUserById($id)
  {
    $sql = "SELECT * FROM $this->table WHERE id = :id";
    $stmt = $this->db->conn->prepare( $sql );
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $stmt->execute();

    $results = $stmt->fetch(PDO::FETCH_ASSOC);

    return $results ? $results : false;
  }

  public function checkEmail($email)
  {
    $sql = "SELECT email FROM $this->table WHERE email = ?";
    $query = $this->db->conn->prepare( $sql );
    $query->bindParam(1, $email, PDO::PARAM_STR);
    $query->execute();

    return ($query->rowCount() > 0) ? $query : false;
  }

  public function checkUsername($username)
  {
    $sql = "SELECT username FROM $this->table WHERE username = ?";
    $query = $this->db->conn->prepare( $sql );
    $query->bindParam(1, $username, PDO::PARAM_STR);
    $query->execute();

    return ($query->rowCount() > 0) ? $query : false;
  }


  public function insertUser($name, $username, $email, $password)
  {
    $sql = "INSERT INTO $this->table (name, username, email, password) VALUES (:name, :username, :email, :password)";
    $stmt = $this->db->conn->prepare( $sql );
    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->bindValue(':password', md5($password), PDO::PARAM_STR);
    $stmt->execute();

    return ($stmt->rowCount() > 0) ? $stmt : false;
  }


  public function loginUser($username, $password)
  {
    $sql = "SELECT * FROM $this->table WHERE username = ? AND password = ? LIMIT 1";
    $query = $this->db->conn->prepare($sql);
    $query->bindValue(1, $username, PDO::PARAM_STR);
    $query->bindValue(2, md5($password), PDO::PARAM_STR);
    $query->execute();

    return $query->fetch();
  }


  public function userPasswordUpdate($email, $password, $oldpassword, $userid)
  {
    $sql = "UPDATE $this->table SET email = :email, password = :password WHERE password = :oldpassword AND id = :id LIMIT 1";
    $stmt = $this->db->conn->prepare( $sql );
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->bindValue(':password', md5($password), PDO::PARAM_STR);
    $stmt->bindValue(':oldpassword', md5($oldpassword), PDO::PARAM_STR);
    $stmt->bindParam(':id', $userid, PDO::PARAM_INT);
    $stmt->execute();

    return ($stmt->rowCount() > 0) ? $stmt : false;
  }


}
