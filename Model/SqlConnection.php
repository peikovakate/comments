<?php
class SqlConnection
{
  private static $conn;
  public static function getConnection(){
    if (null === self::$conn)
    {
      self::$conn = new mysqli("localhost", "root", "root", "comments");
      return self::$conn;
    }
    return self::$conn;
  }
  public static function add($args){
    $sql = "INSERT INTO comments (username, text)
        VALUES ('$args[1]', '$args[0]')";
    self::getConnection()->query($sql);
  }

  public static function getLastComment(){
    $sql = "SELECT * FROM comments ORDER BY id DESC LIMIT 0, 1";
    $result = self::getConnection()->query($sql);
    $a = $result->fetch_row();
    $a = $a[0];
    return $a;
  }

  public static function select($args){
    $sql = '';
    if ($args=='all'){
      $sql .= "SELECT * FROM comments ORDER BY id DESC";
    }else{
      $sql .= "SELECT * FROM comments ORDER BY id DESC LIMIT 0, 1";
    }
    $result = self::getConnection()->query($sql);
    return $result;
  }
  public static function delete($args){
    if ($args=="Delete all"){
      $sql = "DELETE FROM comments;";
    }else {
      $sql = "DELETE FROM comments WHERE id = ".$args." ;";
    }
    self::getConnection()->query($sql);
  }

}