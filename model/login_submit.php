<?php /*** begin our session ***/
session_start();
/*** check if the users is already logged in ***/
if (isset($_SESSION['user_id'])) {
    $message = 'Users is already logged in';
}
/*** check that both the username, password have been submitted ***/
if (!isset($_POST['username'], $_POST['password'])) {
    $message = 'Please enter a valid username and password';
} /*** check the username is the correct length ***/
elseif (strlen($_POST['username']) > 20 || strlen($_POST['username']) < 4) {
    $message = 'Incorrect Length for Username';
} /*** check the password is the correct length ***/
elseif (strlen($_POST['password']) > 20 || strlen($_POST['password']) < 4) {
    $message = 'Incorrect Length for Password';
} /*** check the username has only alpha numeric characters ***/
elseif (ctype_alnum($_POST['username']) != true) {
    /*** if there is no match ***/
    $message = "Username must be alpha numeric";
} /*** check the password has only alpha numeric characters ***/
elseif (ctype_alnum($_POST['password']) != true) {
    /*** if there is no match ***/
    $message = "Password must be alpha numeric";
} else {
    /*** if we are here the data is valid and we can insert it into database ***/
    $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
    $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
    $password = sha1($password);
    /*** connect to database ***/
    /*** mysql hostname ***/
    $mysql_hostname = 'localhost';
    /*** mysql username ***/
    $mysql_username = '';
    /*** mysql password ***/
    $mysql_password = '';
    /*** database name ***/
    $mysql_dbname = '';
    try {
        $dbh = new PDO("mysql:host=$mysql_hostname;dbname=$mysql_dbname", $mysql_username, $mysql_password);
        /*** $message = a message saying we have connected ***/
        /*** set the error mode to excptions ***/
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        /*** prepare the select statement ***/
        $stmt = $dbh->prepare("SELECT , ,  FROM 
 WHERE  AND ");
        $stmt->bindParam(':username', $username, PDO::PARAM_STR, 40);
        $stmt->bindParam(':password', $password, PDO::PARAM_STR, 40);
        /*** execute the prepared statement ***/
        $stmt->execute();
        /*** check for a result ***/
        $user_id = $stmt->fetchColumn();
        /*** if we have no result then fail boat ***/

        if ($user_id == false) {
            $message = 'Login Failed';
        } /*** if we do have a result, all is well ***/
        else {
            /*** set the session user_id variable ***/
            $_SESSION['user_id'] = $user_id;
            /*** tell the user we are logged in ***/
            $message = 'You are now logged in';
        }
    } catch (Exception $e) {
        /*** if we are here, something has gone wrong with the database ***/
        $message = 'We are unable to process your request. Please try again later"';
    }
}
?>
<html>
<head>
    <title>PHPRO Login</title>
</head>
<body>
<?php echo $message; ?>
<a href="logout.php">Logout</a>
</body>
</html>