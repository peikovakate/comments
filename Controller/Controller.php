<?php
  $path = dirname(__DIR__);
  include_once $path . '/Model/Comment.php';
  include_once $path.'/View/View.php';

class Controller {
  public static function get_control($function_name, $args){
    Comment::$function_name($args);
    header("Location: ../index.php");
  }
  public static function returnView(){
    $str = Comment::getComments('');
    return View::run($str);
  }

}