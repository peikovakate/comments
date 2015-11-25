<?php
  $path = dirname(__DIR__);
  include_once $path.'/Model/Model.php';
  include_once $path.'/View/View.php';
  include_once $path."/Model/SqlConnection.php";
class Controller {
  public static function get_control($function_name, $conn, $args){
    $model = new Model($conn);
    $model->$function_name($args);
    header("Location: ../index.php");
  }
  public static function returnView($conn){
    return View::run($conn);
  }

}