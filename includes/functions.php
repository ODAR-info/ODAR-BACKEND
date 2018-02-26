<?php
function __autoload($className) {
	$dir = dirname(__FILE__);
	$file = $dir."/".$className.".php";
	#echo "{$file}";
      if (file_exists($file)) {
          require_once($file);
          return true;
      }else
	  {
		  die("Class {$className} Not Found");
	  }
      return false;
}
?>