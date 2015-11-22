<?php
  $path = dirname(__DIR__);
  include $path.'/Model/Model.php';
  include $path.'/View/View.php';
class Controller {
  public static function get_control($function_name, $args){
    Model::$function_name($args);
    header("Location: ../index.php");
  }
  public static function returnView(){
    return View::run();
  }

}