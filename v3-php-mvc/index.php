<?php

session_start();
error_reporting(0);

require('config/config.php');
require(config.'classLoader.php');
require(config.'BDD.php');


//Setup routing
$controller = (isset($_GET['c'])) ? $_GET['c'] : false;
$method = (isset($_GET['m'])) ? $_GET['m'] : false;
$parameter = (isset($_GET['p'])) ? $_GET['p'] : false;


if($controller !== false AND is_file(controller.$controller.'.php'))
{
  $constr = ucfirst(strtolower($controller));
  $OBcontroler = new $constr();
  if($methode !== false AND method_exists($OBcontroler,$method))
  {
    $OBcontroler->$method($param);
  }
  else
  {
    $OBcontroler->index($parameter);
  }
}
else
{
  $OBcontroler = new $DefaultController();
  $OBcontroler->$DefaultMethod($parameter);
}
