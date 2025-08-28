<?php

session_start();
//error_reporting(0);

require('config/config.php');
require(controller.'controller.php');

if(isset($_GET['p']))
{
  $page = $_GET['p'];
  if($page == 'Homepage'){Homepage();}
  if($page == 'Projects'){Projects();}
  if($page == 'Skills'){Skills();}
  if($page == 'Contact'){Contact();}
  if($page == 'Legals'){Legals();}
  if($page == 'Bookmarks'){Bookmarks();}
  if($page == 'ajax_Homepage'){ajax_Homepage();}
  if($page == 'ajax_Projects'){ajax_Projects();}
  if($page == 'ajax_Skills'){ajax_Skills();}
  if($page == 'ajax_Contact'){ajax_Contact();}
  if($page == 'ajax_Legals'){ajax_Legals();}
  if($page == 'envoi_mail'){envoi_mail();}
  if($page == 'Error'){Error();}
  if($page == 'Video'){Video();}

}
else {
  Homepage();
}
