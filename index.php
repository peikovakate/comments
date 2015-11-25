<?php
  include_once "Controller/Controller.php";
  include_once "Model/SqlConnection.php";
  $conn = SqlConnection::getConnection();
  echo Controller::returnView($conn);
