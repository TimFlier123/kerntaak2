<link rel="stylesheet" href="styling/style.css" type="text/css">

<?php
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
        case "spelers":
            include("pages/spelers.php");
            break;
        case "schools":
            include("pages/schools.php");
            break;
        case "toernooien":
            include("pages/toernooien.php");
            break;
        case "handmatig":
            include("pages/handmatig.php");
            break;
        case "importeren":
            include("pages/import.php");
            break;
        case "updateplayer":
            include("pages/update/updateplayer.php");
            break;
    }

    include("includes/footer.php");
} else {
    // the user is not logged in.
    include("views/not_logged_in.php");
}
