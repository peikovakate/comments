<?php
  $path = dirname(__DIR__);
  include_once $path.'/Model/Model.php';
  include_once $path.'/View/View.php';
class Controller {
  public static function get_control($function_name, $args){
    Model::$function_name($args);
    header("Location: ../index.php");
  }
  public static function returnView(){
    return View::run();
  }

}