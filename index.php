<?php

// Get username, password from database
include( 'includes/config.php' );
// Load Smarty library
require( 'libs/Smarty.class.php' );
// Initialize
include( 'includes/bootstrap.php' );
// Make database connection
include( 'includes/database.php' );

require('includes/functs.php');

$templateParser->assign('headerText', 'Dit is de header');

$templateParser->display('header.tpl');

// Assign value of page title to the smarty variable 'title', usually the value comes from a database
$templateParser->assign( 'title', 'Me First And The Gimme Gimmes' );

// Display template: output html
$templateParser->display( 'head.tpl' );

// Get newsarticles from database
include( 'model/select_newsarticles.php' );

$templateParser->assign('result', $result);

$templateParser->display('newsarticle.tpl');
//$templateParser->display('about.tpl');

$templateParser->assign('footerText', '&copy; Miguel Korn 2016');

$templateParser->display('footer.tpl');

