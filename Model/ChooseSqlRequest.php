<?php
include_once 'SqlRequest.php';
class ChooseSqlRequest
{
  public static function choose($nameOfRequest){
    require_once ($nameOfRequest . '.php');
    $object = new $nameOfRequest;
    return $object;
  }
}