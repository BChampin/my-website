<?php
include('config/env.php');

//Define
define("view","view/");
define("controller","controller/");
define("core","core/");
define("config","config/");
define("css",core."css/");
define("js",core."js/");
define("img",core."img/");
define("template",view."template/");
define("nav",img.'nav/');
define("port",img.'portfolio/');
define("slider",img.'slider/');
define("urlLocale","http://localhost/bastienchampin/");
define("urlOnline",$ENV['HOSTED_URL']);


//Default Options
$DefaultPage = 'Homepage';
