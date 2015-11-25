
<?php
  $path = dirname(__DIR__);
  include_once("$path/Controller/Controller.php");
  include_once("$path/index.php");
  include_once 'SqlConnection.php';
  $args = Array($_POST['comment'], $_POST['user_name'] );
  Controller::get_control('add_comment_to_file', $GLOBALS['c'], $args);
