<?php

// In this file initialisation takes place

// Settings for production and test environment
switch (PROJECT_STATUS) {
	case 'production': {
		ini_set('display_errors','Off');
		// and more....
	}
	default :
		//test environment
	{
		ini_set('display_errors','1');
		ini_set('error_reporting', E_ALL);
        ini_set('date.timezone', 'Europe/Amsterdam');
	}
}


// Initialise template parser
$templateParser = new Smarty();
$templateParser->template_dir = "views"; 
$templateParser->compile_dir = "views/compiled"; //Place for compiled templates
//$templateParser->cache_dir = "views/cache";


?>