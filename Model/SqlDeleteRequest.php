<?php
include_once('SqlRequest.php');
class SqlDeleteRequest implements SqlRequest
{
  private $conn;
  public function __construct(){
    $this->conn = new mysqli("localhost", "root", "root", "comments");
  }
  public function doRequest($args)
  {
    $sql = "DELETE FROM comments;";
    $this->conn->query($sql);
  }
  public function  __destruct()
  {
    $this->conn->close();
  }
}