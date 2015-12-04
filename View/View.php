<?php

class View
{
  static public function run($arrayOfComments) {
    $html = self::buildHead();
    $html .= self::buildBody($arrayOfComments);
    return $html;
  }

  static private function buildHead() {
    $head = '<html lang="en">';
    $head .= '<head>';
    $head .= '<script src="../lib/jquery/jquery-2.1.4.js"></script>';
    $head .= '<link href="../lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">';
    $head .= '<script src="../lib/bootstrap/js/bootstrap.js"></script>';
    $head .= '<script src="../js/commentActions.js"></script>';
    $head .= '<meta charset="UTF-8">';
    $head .= '<title>Add Your Comment!</title>';
    $head .= '</head>';
    return $head;
  }

  static private function buildBody($arrayOfComments) {
    $body = '<body>';
    $body .= '<div class="container">';
    $body .= '<div class="panel panel-success">';
    $body .= '<h3 div class="panel-heading">Add your comment here!</h3><div>';
    $body .= '<div class="panel-body">';
    $body .= '<div class="row">';
    $body .= '<div class = "col-md-5">';
    $body .= self::modalAddComment();
    $body .= '<br>';
    $body .= '<button id="Delete all" class="btn btn-warning" onclick="deleteComment(this.id)">Delete All</button>';
    $body .= self::buildColumnWithComments($arrayOfComments);
    $body .= '</div></div></div></body></html>';
    return $body;
  }

  static private function modalAddComment() {
    $form = '<button type="button" class="btn btn-success" data-toggle="modal" data-target="#addCommentModal">Add your comment!</button>';
    $form .= '<div class="modal fade" id="addCommentModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">';
    $form .= '<div class="modal-dialog" role="document">';
    $form .= '<div class="modal-content">';
    $form .= '<div class="modal-header">';
    $form .= '<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
    $form .= '<h4 class="modal-title" id="addCommentModal">Fill form</h4></div>';
    $form .= '<div class="modal-body">';
    $form .= '<form method="post" id="postComment" onsubmit="addComm();return false;">';
    $form .= '<input type="text" id="username" class="input-sm" name="user_name" placeholder="Username" size="6">';
    $form .= '<input type="text" id="text" name="comment" class="input-sm" placeholder="Comment..." size="50">';
    $form .= '<input  type="submit" value="Send" class="btn btn-success btn-sm" id="addComment">';
    $form .= '</form></div></div></div></div>';
    return $form;
  }

  static private function buildColumnWithComments($arrayOfComments) {
    $str = '</div><div class = "col-md-7" id="column">';
    $str .= '<div class="row" id="row0"></div>';
    foreach ($arrayOfComments as $c) {
      $str .= self::buildTr($c);
    }
    $str .= '<button id="showMoreBtn" class="btn btn-default" style="display: none">Show more</button>';
    $str .= '<button id="showLessBtn" class="btn btn-default" style="display: none">Show less</button>';
    $str .= '</div>';
      return $str;
    }

  static public function buildTr($comment) {
    $str = '<div class="row" id="row' . $comment["id"] . '">';
    $str .= '<div class = "col-md-10"><div class="well well-sm">' . $comment["username"] . ': ' . $comment["text"] . '</div></div>';
    $str .= '<div class = "col-md-2"><button class="btn btn-warning" id="' . $comment["id"] . '"onclick="deleteComment(this.id)">Delete</button></div>';
    $str .= '</div>';
    return $str;
  }



}
