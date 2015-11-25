<?php
class View {
  static private function _form_add_comment(){
    $form = '<form method="post" action="/comments/Model/add_comment_to_file.php" id="post_comment">';
    $form .= '<input type="text" name="user_name" placeholder="User name" size="6">';
    $form .= '<input type="text" style="font-family: Verdana, Arial, Helvetica, sans-serif" name="comment" placeholder="Comment..."/>';
    $form .= '<input  type="submit" value="Send">
     </form>';
    return $form;
  }

  static private function _form_delete_comments(){
    $form = '<form method="post" action="/comments/Model/delete_all_comments.php" id="delete_comments">';
    $form .= '<input  type="submit" name="delete" value="Delete">
    </form>';
    return $form;
  }

  static private function _build_head() {
    $head = '<html lang="en">
    <head>
    <meta charset="UTF-8">
    <title>Add Your Comment!</title>
    </head>';
    return $head;
  }

  static private function _build_body($str){
    $body = '<body>';
    $body .= $str;
    $body .= self::_form_add_comment();
    $body .= self::_form_delete_comments();
    $body .= '</body></html>';
    return $body;
  }



  static public function run($str){
    $html =  self::_build_head();
    $html .= self::_build_body($str);
    return $html;
  }

}