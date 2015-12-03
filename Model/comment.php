<?php
include_once 'SqlConnection.php';
class Comment {
  public static function deleteComment($args){
      SqlConnection::delete($args);
    }
  public static function addCommentToDB($args){
      $args[0] = filter_var($args[0], FILTER_SANITIZE_STRING);
      $args[1] = filter_var($args[1], FILTER_SANITIZE_STRING);
      SqlConnection::add($args);
    }
  public static function getComments($args) {
    $result = SqlConnection::select('all');
    return $result;
  }
  }