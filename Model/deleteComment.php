<?php
  $path = dirname(__DIR__);
  include_once($path.'/Controller/Controller.php');
  $args = $_REQUEST['arg'];
  Controller::getControl('deleteComment', $args);
  echo '<div class="row" id="row0"></div></div>';
