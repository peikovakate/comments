
<?php
  $path = dirname(__DIR__);
  include_once("$path/Controller/Controller.php");
  include_once("SqlConnection.php");
  $args = Array($_POST['comment'], $_POST['user_name'] );
  Controller::getControl('addCommentToDB', $args);
  $id = SqlConnection::getLastComment();
  $comment = Array("id"=>$id, "username"=>$_POST["user_name"], "text"=>$_POST['comment']);
  echo View::buildTr($comment);



