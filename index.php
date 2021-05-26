<link rel="stylesheet" href="styling/style.css" type="text/css">

<?php
include("includes/header.php");

// switch to get current page
switch (@$_GET['page']) {
    case "":
        include("pages/home.php");
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
    case "aanmeldingen":
        include("pages/aanmeldingen.php");
        break;
    case "handmatig":
        include("pages/handmatig.php");
        break;
    case "importeren":
        include("pages/import.php");
        break;
    case "toernooioverzicht":
        include("pages/toernooioverzicht.php");
        break;
    case "uitslagenbeheren":
        include("pages/uitslagenbeheren.php");
        break;
}

include("includes/footer.php");
