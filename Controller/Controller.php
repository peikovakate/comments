<?php
  $path = dirname(__DIR__);
  include_once $path.'/Model/Comment.php';
  include_once $path.'/View/View.php';

class Controller {
  public static function getControl($function_name, $args){
    Comment::$function_name($args);
  }
  public static function returnView(){
    $arrayOfComments = Comment::getComments('');
    return View::run($arrayOfComments);
  }
  public static function returnLastComment(){

}
}