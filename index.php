<?php

session_start();
error_reporting(0);

require('config/config.php');
require(controller.'controller.php');

if(isset($_GET['p']))
{
  $page = $_GET['p'];
  if($page == 'Homepage'){Homepage();}
  if($page == 'Portfolio'){Portfolio();}
  if($page == 'Contact'){Contact();}
  if($page == 'Legals'){Legals();}
  if($page == 'ajax_Homepage'){ajax_Homepage();}
  if($page == 'ajax_Portfolio'){ajax_Portfolio();}
  if($page == 'ajax_Contact'){ajax_Contact();}
  if($page == 'ajax_Legals'){ajax_Legals();}
  if($page == 'envoi_mail'){envoi_mail();}
  if($page == 'Error'){Error();}

}
else {
  Portfolio();
}
