
<?php
  $path = dirname(__DIR__);
  include ("$path/Controller/Controller.php");
  $args = Array($_POST['comment'], $_POST['user_name'] );
  Controller::get_control('add_comment_to_file', $args);
