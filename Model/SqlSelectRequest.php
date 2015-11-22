<?php
include_once 'SqlRequest.php';
class SqlSelectRequest implements SqlRequest
{
  private $conn;
  public function __construct(){
    $this->conn = new mysqli("localhost", "root", "root", "comments");
  }
  public function doRequest($args)
  {
    $sql = "SELECT username, text FROM comments";
    $result = $this->conn->query($sql);

    return $result;
  }
  public function  __destruct()
  {
    $this->conn->close();
  }
}