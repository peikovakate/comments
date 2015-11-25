<?php
  include_once "Controller/Controller.php";
  include_once "Model/SqlConnection.php";
  $conn = new SqlConnection();
  $GLOBALS['c']=$conn;
  echo Controller::returnView($conn);




