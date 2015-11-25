<?php
class SqlConnection
{
  private $conn;
  public function __construct()
  {
    $this->conn = new mysqli("localhost", "root", "root", "comments");
  }

  public function add($args){
    $text_comment = $args[0];
    $user_name  = $args[1];
    $text_comment = filter_var($text_comment, FILTER_SANITIZE_STRING);
    $user_name = filter_var($user_name, FILTER_SANITIZE_STRING);
    $sql = "INSERT INTO comments (username, text)
        VALUES ('$user_name', '$text_comment')";
    $this->conn->query($sql);
  }
  public function select($args){
    $sql = "SELECT username, text FROM comments";
    $result = $this->conn->query($sql);
    return $result;
  }
  public function delete($args){
    $sql = "DELETE FROM comments;";
    $this->conn->query($sql);
  }
  public function __toString()
  {
    $str ='';
    $str.=$this->conn->thread_id;
    return $str;
  }

  public function  __destruct()
  {
    $this->conn->close();
  }
}