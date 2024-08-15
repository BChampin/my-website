<?php
$ENV = parse_ini_file('.env');
// Call de tous les crons
define('RELATIVE_PATH', 'Bot_Twitter_NASA/');
include_once('Bot_Twitter_NASA/index.php');
