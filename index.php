<?php
  include_once('Model/SqlConnection.php');
  require ('vendor/slim/slim/Slim/Slim.php');
  include_once('lib/vendor/autoload.php');
  \Slim\Slim::registerAutoloader();

  $app = new \Slim\Slim();

  $app->get('/', 'view');
  $app->post('/', 'addComment');
  $app->delete('/:id', 'deleteComment');
  $app->get('/', 'selectComment');
  $app->run();

  function view() {
    $arrayOfComments = SqlConnection::select('all');
    $loader = new Twig_Loader_Filesystem('View');
    $twig = new Twig_Environment($loader);
    $template = $twig->loadTemplate('view.html');
    echo $template->render(array(
      'arrayOfComments' => $arrayOfComments
    ));
  }

  function addComment() {
    $request = \Slim\Slim::getInstance()->request();
    $args = ($request->getBody());
    parse_str($args, $args);
    $id = SqlConnection::select('');
    $comment = array('id' => $id,
        'username' => $args['user_name'],
        'text' => $args['comment']);
    $comment['comment'] = filter_var($comment, FILTER_SANITIZE_STRING);
    $comment['user_name'] = filter_var($comment, FILTER_SANITIZE_STRING);
    SqlConnection::add($comment);
    $str = '<div class="row" id="row' . $comment['id'] . '">';
    $str .= '<div class = "col-md-10"><div class="well well-sm">' . $comment['username'] . ': ' . $comment['text'] . '</div></div>';
    $str .= '<div class = "col-md-2"><button class="btn btn-warning" id="' . $comment['id'] . '"onclick="deleteComment(this.id)">Delete</button></div>';
    $str .= '</div>';
    echo $str;
  }

  function deleteComment($id) {
    SqlConnection::delete($id);
    if($id=='Delete all') {
      echo '<div class="row" id="row0"></div>';
    } else {
      echo '';
    }
  }
  function selectComment() {
    return SqlConnection::select('all');
  }

