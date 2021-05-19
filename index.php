<link rel="stylesheet" href="styling/style.css" type="text/css">

<?php
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
        case "toernooioverzicht":
            include("pages/toernooioverzicht.php");
           break;
    }

    include("includes/footer.php");