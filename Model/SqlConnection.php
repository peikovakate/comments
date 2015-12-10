<?php
require(dirname(__DIR__).'/lib/Medoo-master/medoo.php');
class SqlConnection
{
  private static $conn;
  public static function getConnection() {
    if (null === self::$conn)
    {
      self::$conn = new medoo([
        'database_type' => 'mysql',
        'database_name' => 'comments',
        'username' => 'root',
        'password' => 'root',
        'charset' => 'utf8'
      ]);
    }
    return self::$conn;
  }

  public static function add($args) {
    self::getConnection()->insert('comments',[
      'username' => $args['username'],
      'text' => $args['text']
    ]);
  }

  public static function select($args) {
    if ($args == 'all'){
      return self::getConnection()->select('comments', '*', [
          'ORDER' => ['id DESC']
      ]);
    }else{
      $result = self::getConnection()->select('comments', '*', [
          'ORDER' => ['id DESC'],
          'LIMIT' => [0,1]
      ]);
      return $result[0]['id'];
    }

  }

  public static function delete($args) {
    if ($args == 'Delete all'){
      self::getConnection()->delete('comments', '*');
    }else {
      self::getConnection()->delete('comments', [
        'id' => $args
      ]);
    }
  }
}