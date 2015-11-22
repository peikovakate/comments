<?php
class Model {
    static function delete_all_comments($argc){
      $servername = "localhost";
      $username = "root";
      $password = "root";
      $databaseName = "comments";

      $conn = new mysqli($servername, $username, $password, $databaseName);

      $sql = "DELETE FROM comments;";
      $conn->query($sql);
      $conn->close();
    }

    static public function add_comment_to_file($args){
      $text_comment = $args[0];
      $user_name  = $args[1];

      $text_comment = filter_var($text_comment, FILTER_SANITIZE_STRING);
      $user_name = filter_var($user_name, FILTER_SANITIZE_STRING);

      $servername = "localhost";
      $username = "root";
      $password = "root";
      $databaseName = "comments";
      $conn = new mysqli($servername, $username, $password, $databaseName);

      $sql = "INSERT INTO comments (username, text)
        VALUES ('$user_name', '$text_comment')";
      $conn->query($sql);
      $conn->close();
    }

  }