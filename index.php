<?php
  include_once("Model/SqlConnection.php");
  include_once("View/View.php");
  require 'vendor/slim/slim/Slim/Slim.php';
  \Slim\Slim::registerAutoloader();

  $app = new \Slim\Slim();

  $app->get('/', 'view');
  $app->post('/', 'addComment');
  $app->delete('/:id', 'deleteComment');
  $app->get('/', 'selectComment');
  $app->run();

  function view() {
      $arrayOfComments = SqlConnection::select('all');
      echo View::run($arrayOfComments);
  }
  function addComment() {
//    $request = \Slim\Slim::getInstance()->request();
//    $args = ($request->getBody());
    $id = SqlConnection::getLastComment();
    $comment = Array("id"=>$id, "username"=>$_POST['user_name'], "text"=>$_POST['comment']);
    $_POST['comment'] = filter_var($comment, FILTER_SANITIZE_STRING);
    $_POST['user_name'] = filter_var($comment, FILTER_SANITIZE_STRING);
    SqlConnection::add($comment);
    echo View::buildTr($comment);
  }

  function deleteComment($id) {
    SqlConnection::delete($id);
    if($id=="Delete all") {
      echo '<div class="row" id="row0"></div>';
    } else {
      echo '';
    }
  }
  function selectComment() {
    $result = SqlConnection::select('all');
    return $result;
  }

