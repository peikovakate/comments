<?php

class View {
  static private function formAddComment(){
    $form = '<form method="post" id="postComment" onsubmit="addComm(); return false;">';
    $form .= '<input type="text" id="username" name="user_name" placeholder="Username" size="6">';
    $form .= '<input type="text" id="text" name="comment" placeholder="Comment..."/>';
    $form .= '<input  type="submit" value="Send" class="btn-success" id="addComment">';
    $form .= '</form>';
    return $form;
  }

  static private function buildTable($arrayOfComments){
    $str = '<table class = "table table-striped table-hover" id="table"><tbody>';
    $str .= '<tr id="tr0"></tr>';
     foreach($arrayOfComments as $c){
      $str .= self::buildTr($c);
    }
    $str .= '</tbody></table>';
    return $str;
  }

  static public function buildTr($comment){
    $str = '<tr id="tr'.$comment["id"].'"><td>'.$comment["username"].':</td><td>'.$comment["text"].'</td><td>';
    $str .= '<button class="btn-warning" id="'.$comment["id"].'" onclick="deleteComment(this.id)">Delete</button></td></tr>';
    return $str;
  }
  static private function buildHead() {
    $head = '<html lang="en">';
    $head .= '<head>';
    $head .= '<link href="../lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">';
    $head .= '<script src="../lib/jquery/jquery-2.1.4.js"></script>';
    $head .= '<script src="../js/commentActions.js"></script>';
    $head .= '<meta charset="UTF-8">';
    $head .= '<title>Add Your Comment!</title>';
    $head .= '</head>';
    return $head;
  }

  static private function buildBody($arrayOfComments){
    $body = '<body>';
    $body .= '<div class="row">';
    $body .= '<div class = "col-md-5">';
    $body .= self::formAddComment();
    $body .= '<button id="Delete all" class="btn-warning" onclick="deleteComment(this.id)">Delete All</button>';
    $body .= '</div><div class = "col-md-7">';
    $body .= self::buildTable($arrayOfComments);
    $body .= '</div></div></body></html>';
    return $body;
  }

  static public function run($arrayOfComments){
    $html =  self::buildHead();
    $html .= self::buildBody($arrayOfComments);
    return $html;
  }



}