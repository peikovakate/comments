<?php
require_once 'SqlConnection.php';

class Model {
    private $sqlConn;
    public function __construct($conn)
    {
      $this->sqlConn = $conn;
    }

  public function delete_all_comments($args){
      $this->sqlConn->delete('');
    }

    public function add_comment_to_file($args){
      $this->sqlConn->add($args);
    }

  }