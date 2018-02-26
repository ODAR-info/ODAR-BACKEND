<?php
/*
Database Constants
*/
date_default_timezone_set('America/New_York'); 
define('STATUS', 'local');
define("siteName", "ODAR");
switch(STATUS)
{
case "local":
define("DB_HOST", 'localhost');
define("DB_USER", 'root');
error_reporting(E_ALL);
define("DB_PASS", '');
define("DB_NAME", "odar");
break;
}
?>