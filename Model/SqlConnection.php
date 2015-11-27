<?php
class SqlConnection
{
  private static $conn;
  public static function getConnection(){
    if (null === self::$conn)
    {
      self::$conn = new mysqli("localhost", "root", "root", "comments");
    }
    return self::$conn;
  }
  public static function add($args){
    $sql = "INSERT INTO comments (username, text)
        VALUES ('$args[0]', '$args[1];')";
    self::getConnection()->query($sql);
  }
  public static function select($args){
    $sql = "SELECT username, text FROM comments";
    $result = self::getConnection()->query($sql);
    return $result;
  }
  public static function delete($args){
    $sql = "DELETE FROM comments;";
    self::getConnection()->query($sql);
  }
   private function __clone()
  {

  }
  private function  __destruct()
  {
    self::$conn->close();
  }
}