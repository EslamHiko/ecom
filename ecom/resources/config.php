<?php
  include 'dbconnect.php';
  ob_start();
  session_start();
  defined("DS") ? null : define("DS", DIRECTORY_SEPARATOR);
  defined("TEMP_FRONT") ? null : define("TEMP_FRONT", __DIR__ . DS . "templates/front");
  defined("TEMP_BACK") ? null : define("TEMP_BACK", __DIR__ . DS . "templates/back");

  require_once("functions.php");
  require_once("cart.php");

 ?>
