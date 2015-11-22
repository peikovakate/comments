<?php
  $path = dirname(__DIR__);
  include $path.'/Controller/Controller.php';
  $args = Array();
  Controller::get_control('delete_all_comments', $args);
