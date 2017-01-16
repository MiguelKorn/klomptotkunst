<?php

// Get username, password from database
include 'includes/config.php';
// Load Smarty library
require 'libs/Smarty.class.php';
// Initialize
include 'includes/bootstrap.php';

// require helpers
require_once 'helpers/Database.php';
require_once 'helpers/Model.php';

// autoload php mailer
require_once 'libs/PHPMailer-5.2.22/PHPMailerAutoload.php';

include 'model/Landingspage.php';
$landingspage = new Landingspage();

// get action from url
$action = isset($_GET['action']) ? $_GET['action'] : 'home';

// get action from url
$lang = isset($_GET['lang']) ? $_GET['lang'] : 'nl';

// get location from url
$loc = isset($_GET['loc']) ? $_GET['loc'] : 'edam';

// display header, nav, search-bar
if ($action == 'agenda' || $action == 'profile' || $action == 'search') {
    //search only header
    if ($action == 'search') {
        $templateParser->display('partials/head.tpl');
    } else {
        $templateParser->display('partials/head.tpl');
        $templateParser->display('partials/nav.tpl');
    }
} else {
    $templateParser->display('partials/head.tpl');
    $templateParser->display('partials/search-bar.tpl');
    $templateParser->display('partials/nav.tpl');
}

switch ($action) {
    case 'home':
        $templateParser->display('index.tpl');
        break;
    case 'agenda':
        $templateParser->display('agenda.tpl');
        break;
    case 'contact':
        $templateParser->display('contact.tpl');
        break;
    case 'locations':
        switch ($loc) {
            case 'edam':

                break;
            case 'volendam':

                break;
            case 'warder':

                break;
            case 'kwadijk':

                break;
            case 'oosthuizen':

                break;
            case 'schardam':

                break;
            case 'beets':

                break;
            case 'middelie':

                break;
            case 'hobrede':

        }
        $templateParser->display('locations.tpl');
        break;
    case 'profile':
        $templateParser->display('profile.tpl');
        break;
    case 'search':
        $templateParser->display('search.tpl');
        break;
    default:
        $templateParser->display('404.tpl');

}

// display footer
include_once 'views/partials/footer.php';

