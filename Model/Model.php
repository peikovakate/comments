<?php
include_once 'ChooseSqlRequest.php';
class Model {
    static function delete_all_comments($args){
      $request = ChooseSqlRequest::choose('SqlDeleteRequest');
      $request -> doRequest($args);
    }

    static public function add_comment_to_file($args){
      $request = ChooseSqlRequest::choose('SqlAddRequest');
      $request -> doRequest($args);
    }

  }