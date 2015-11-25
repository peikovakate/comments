<?php
include_once 'SqlConnection.php';
class Model {
  public static function delete_all_comments($args){
      SqlConnection::delete('');
    }
  public static function add_comment_to_file($args){
      $args[0] = filter_var($args[0], FILTER_SANITIZE_STRING);
      $args[1] = filter_var($args[1], FILTER_SANITIZE_STRING);
      SqlConnection::add($args);
    }
  static private function buildComment($comment){
    return '<span style="font-weight: bold; font-family: Verdana, Arial, Helvetica, sans-serif;"> '.$comment['username'].':</span> '.$comment['text'].'<br />';
  }
  public static function getComments($args) {
    $result = SqlConnection::select('');
    $str='';
    foreach ($result as $comment) {
      $str .= self::buildComment($comment);
    }
    return $str;
  }
  }