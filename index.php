<?php
ob_start();
session_start();

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
include 'model/Login.php';
include 'model/User.php';


// get action from url
$action = isset($_GET['action']) ? $_GET['action'] : 'home';

//$cms_action = isset($_GET['cms_action']) ? $_GET['cms_action'] : 'login';

if (isset($_SESSION['user_id'])) {
    if (isset($_GET['cms_action']) && $_GET['cms_action'] != 'login') {
        $cms_action = $_GET['cms_action'];
    } else {
        $cms_action = 'home';
    }
} else {
    $cms_action = 'login';
}


// get action from url
$lang = isset($_SESSION['lang']) ? $_SESSION['lang'] : 'nl';

// get location from url
$loc = isset($_GET['loc']) ? $_GET['loc'] : 'edam';

// display header, nav, search-bar
if ($action != 'cms') {
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
    $landingspage = new Landingspage();
    $headerInfo = $landingspage->getHeaderInfo();
} else {
    $templateParser->display('cms/partials/cms-head.tpl');
}

switch ($action) {
    case 'home':
        $templateParser->assign('headerInfo', $headerInfo);

        $templateParser->display('index.tpl');


        break;
    case 'register':
        $templateParser->display('register.tpl');

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            echo $_POST['voornaam'] . '<br>';
            echo $_POST['achternaam'] . '<br>';
            echo $_POST['telefoon'] . '<br>';
            echo $_POST['e-mail'] . '<br>';
            echo $_POST['naam-organisatie'] . '<br>';
            echo $_POST['website'] . '<br>';
            echo $_POST['type'] . '<br>';
            echo $_POST['plaats'] . '<br>';
        }

        break;
    case 'check_register':

        if (!isset($_POST['voornaam'], $_POST['achternaam'], $_POST['telefoon'], $_POST['e-mail'],
            $_POST['naam-organisatie'], $_POST['website'])
        ) {
            $message = 'Elk veld is verplicht!';
        } elseif (strlen($_POST['telefoon'] > 10)) {
            $message = 'Vul een geldig telefoon nummer in!';
        } else {
            $register = new Register();
        }

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
    case 'cms':
        if(isset($_SESSION['user_id'])) {
            $cms = new User();
            print_r($cms->checkUserRole($_SESSION['user_id']));
        }

        if($cms_action != 'login') {
            $templateParser->display('cms/partials/cms-head.tpl');
            $templateParser->display('cms/partials/cms-nav.tpl');
        }
        switch ($cms_action) {
            case 'login':
                $templateParser->display('cms/login.tpl');

                if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                    echo $_POST['usermail'];
                    echo $_POST['userpass'];

                    if (!isset($_POST['usermail'], $_POST['userpass'])) {
                        $message = 'Vul een geldig usermail en userpass in!';
                    } elseif (strlen($_POST['userpass']) > 20 || strlen($_POST['userpass']) < 4) {
                        $message = 'Ongeldige lengte voor userpass!';
                    } elseif (!filter_var($_POST['usermail'], FILTER_VALIDATE_EMAIL)) {
                        $message = 'usermail not valid!';
                    } elseif (ctype_alnum($_POST['userpass']) != true) {
                        $message = 'userpass mag alleen uit cijfers en letters bestaan!';
                    } else {
                        $login = new Login();

                        $usermail = filter_var($_POST['usermail'], FILTER_SANITIZE_STRING);
                        $userpass = filter_var($_POST['userpass'], FILTER_SANITIZE_STRING);

                        $usermail = $login->checkInput($usermail);
                        $userpass = $login->checkInput($userpass);

                        $userpass = sha1($userpass);

                        $user_id = $login->logUserIn($usermail, $userpass);

                        if ($user_id == false) {

                            echo "logged in";


                            //failed
                            $message = 'failed';

                        } else {
                            $message = 'not failed';
                            $_SESSION['user_id'] = $user_id['id'];
                            //logged in
                            $cms_action = 'home';
                            header("Refresh:0");
                        }
                    }

                    echo $message;
                }

                break;
            case 'home':

                $templateParser->display('cms/home.tpl');
                break;
            case 'logout':
                echo 'logout';
                unset($_SESSION['user_id']);
                break;
            default:

        }
        if($cms_action != 'login') {
            $templateParser->display('cms/partials/cms-footer.tpl');
        }
        break;
    default:
        $templateParser->display('404.tpl');

}

// display footer
if ($action != 'cms') {
    include_once 'views/partials/footer.php';
} else {
    $templateParser->display('cms/partials/cms-footer.tpl');
}

