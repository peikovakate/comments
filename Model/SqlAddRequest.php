<?php
include_once 'SqlRequest.php';
class SqlAddRequest implements SqlRequest
{
  private $conn;
  public function __construct(){
    $this->conn = new mysqli("localhost", "root", "root", "comments");
  }
  public function doRequest($args)
  {
    $text_comment = $args[0];
    $user_name  = $args[1];
    $text_comment = filter_var($text_comment, FILTER_SANITIZE_STRING);
    $user_name = filter_var($user_name, FILTER_SANITIZE_STRING);
    $sql = "INSERT INTO comments (username, text)
        VALUES ('$user_name', '$text_comment')";
    $this->conn->query($sql);
  }
  public function  __destruct()
  {
    $this->conn->close();
  }
}