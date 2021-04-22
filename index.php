<link rel="stylesheet" href="styling/style.css" type="text/css">

<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// checking for minimum PHP version
if (version_compare(PHP_VERSION, '5.3.7', '<')) {
    exit("Sorry, Simple PHP Login does not run on a PHP version smaller than 5.3.7 !");
} else if (version_compare(PHP_VERSION, '5.5.0', '<')) {
    require_once("libraries/password_compatibility_library.php");
}

// include the database connection
require_once("config/db.php");

// load the login class
require_once("classes/Login.php");

// create a login object.
$login = new Login();

// ... ask if we are logged in here:
if ($login->isUserLoggedIn() == true) {
    // the user is logged in.
    include("includes/header.php");

    switch (@$_GET['page']) {
        case "":
            include("views/logged_in.php");
            break;
        case "page1":
            include("pages/page1.php");
            break;
        case "page2":
            include("pages/page2.php");
            break;
        case "csv":
            include("pages/csv.php");
            break;
    }

    include("includes/footer.php");
} else {
    // the user is not logged in.
    include("views/not_logged_in.php");
}
