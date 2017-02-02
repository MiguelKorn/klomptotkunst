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

//include "mode/CMS.php";
include 'model/Landingspage.php';
include 'model/Login.php';
include 'model/Register.php';
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
    $bodyInfo = $landingspage->getBodyInfo();
}

switch ($action) {
    case 'home':
        $templateParser->assign('headerInfo', $headerInfo);
        $templateParser->assign('bodyInfo', $bodyInfo);

        $templateParser->display('index.tpl');


        break;
    case 'register':
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $register = new Register();
            $key = md5(uniqid(rand(), true));

            $fname = ucfirst(strtolower(filter_var($_POST['voornaam'], FILTER_SANITIZE_STRING)));
            $lname = ucfirst(strtolower(filter_var($_POST['achternaam'], FILTER_SANITIZE_STRING)));
            $tel = filter_var($_POST['telefoon'], FILTER_SANITIZE_STRING);
            $email = filter_var($_POST['e-mail'], FILTER_SANITIZE_EMAIL);
            $organisation = filter_var($_POST['naam-organisatie'], FILTER_SANITIZE_STRING);
            $site = filter_var($_POST['website'], FILTER_SANITIZE_URL);
            $type = filter_var($_POST['type'], FILTER_SANITIZE_STRING);
            $location = filter_var($_POST['plaats'], FILTER_SANITIZE_STRING);

            $fullName = $fname . ' ' . $lname;

            $subject = 'Activate Request KTK';
            $message = '<p>Click the following link to validate your request</p>
                        <p>http://miguelkorn.nl/klomptotkunst/index.php?action=validate&key=' . $key . '</p>';

            $data['msg'] = $register->sendActivation($email, $fullName, $subject, $message);
            $data['adduser'] = $register->addUser($fname, $lname, $tel, $email, $site, $key);

            $templateParser->assign('data', $data);
        }


        $templateParser->display('register.tpl');
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
        if (isset($_SESSION['user_id'])) {
            $cms = new User();
            $role = $cms->checkUserRole($_SESSION['user_id']);
        }

        if ($cms_action != 'login' && $cms_action != 'logout') {
            $templateParser->display('cms/partials/cms-head.tpl');
            $templateParser->display('cms/partials/' . $role['role_name'] . '/cms-nav.tpl');
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

                        $usermail = filter_var($_POST['usermail'], FILTER_SANITIZE_EMAIL);
                        $userpass = filter_var($_POST['userpass'], FILTER_SANITIZE_STRING);

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
                if ($cms_action != 'login' && $cms_action != 'logout') {
                    $templateParser->display('cms/partials/' . $role['role_name'] . '/cms-home.tpl');
                }
                break;
            case 'logout':
                echo 'logout';
                unset($_SESSION['user_id']);
                break;
            case 'request':

                $templateParser->assign($result, 'result');
                $templateParser->display('request.tpl');

            default:

        }
        if ($cms_action != 'login') {
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

