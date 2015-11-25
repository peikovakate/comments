<?php
  $path = dirname(__DIR__);
  include_once $path.'/Controller/Controller.php';
  include_once "SqlConnection.php";
  include_once("$path/index.php");
  $args = Array();
  Controller::get_control('delete_all_comments',$GLOBALS['c'], $args);
