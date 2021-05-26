<?php

/**
 * Function to delete player from database
 * Executes query or gives error
 */
function deletePlayer()
{

    require_once "../config/crud.php";
    $sql = "DELETE FROM speler WHERE id = ?";

    if ($stmt = mysqli_prepare($link, $sql)) {
        mysqli_stmt_bind_param($stmt, "i", $param_id);
        $param_id = trim($_POST["id"]);

        if (mysqli_stmt_execute($stmt)) {
            header("location: ../?page=spelers");
            exit();
        } else {
            echo "Oops! Something went wrong. Please try again later.";
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($link);
}

/**
 * Function to delete game from database
 * Executes query or gives error
 */
function deleteGame()
{
    require_once "../config/crud.php";
    $sql = "DELETE FROM wedstrijd WHERE id = ?";

    if ($stmt = mysqli_prepare($link, $sql)) {
        mysqli_stmt_bind_param($stmt, "i", $param_id);
        $param_id = trim($_POST["id"]);

        if (mysqli_stmt_execute($stmt)) {
            header("location: ../?page=uitslagenbeheren");
            exit();
        } else {
            echo "Oops! Something went wrong. Please try again later.";
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($link);
}

/**
 * Function to edit tournament from database
 * Executes query or gives error
 */
function editTournament()
{
    global $link;
    $id = $_POST["id"];
    $name = trim($_POST["name"]);
    $date = trim($_POST["date"]);

    $sql = "UPDATE toernooi SET description=?, date=? WHERE id=?";
    echo $sql;
    echo $name;
    echo $date;
    echo $id;
    if ($stmt = mysqli_prepare($link, $sql)) {
        mysqli_stmt_bind_param($stmt, "sss", $param_name, $param_date, $param_id);
        $param_name = $name;
        $param_date = $date;
        $param_id = $id;
        echo $name;
        echo $date;
        echo $id;

        if (mysqli_stmt_execute($stmt)) {

            header("location: ../?page=toernooien");
            exit();
        } else {
            echo "Mislukt. Probeer opnieuw.";
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($link);
}

/**
 * Function to delete school from database
 * Executes query or gives error
 */
function deleteSchool()
{
    require_once "../config/crud.php";
    $sql = "DELETE FROM school WHERE id = ?";

    if ($stmt = mysqli_prepare($link, $sql)) {

        mysqli_stmt_bind_param($stmt, "i", $param_id);
        $param_id = trim($_POST["id"]);

        if (mysqli_stmt_execute($stmt)) {
            header("location: ../?page=schools");
            exit();
        } else {
            echo "Oops! Something went wrong. Please try again later.";
        }
    }

    mysqli_stmt_close($stmt);
    mysqli_close($link);
}

/**
 * Function to delete tournament from database
 * Executes query or gives error
 */
function deleteTournament()
{
    require_once "../config/crud.php";
    $sql = "DELETE FROM toernooi WHERE id = ?";

    if ($stmt = mysqli_prepare($link, $sql)) {

        mysqli_stmt_bind_param($stmt, "i", $param_id);
        $param_id = trim($_POST["id"]);

        if (mysqli_stmt_execute($stmt)) {
            header("location: ../?page=toernooien");
            exit();
        } else {
            echo "Oops! Something went wrong. Please try again later.";
        }
    }

    mysqli_stmt_close($stmt);
    mysqli_close($link);
}

/**
 * Function to edit player from database
 * Executes query or gives error
 */
function editPlayer()
{

    global $link;
    require_once "../config/crud.php";
    $id = $_POST["id"];

    $input_name = trim($_POST["name"]);
    if (empty($input_name)) {
        $name_err = "Please enter a name.";
    } elseif (!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^[a-zA-Z\s]+$/")))) {
        $name_err = "Please enter a valid name.";
    } else {
        $name = $input_name;
    }

    $insertion =  trim($_POST["insertion"]);
    $lastname = trim($_POST["lastname"]);

    $input_school = trim($_POST["school"]);
    if (empty($input_school)) {
        $school_err = "school.";
    } else {
        $school = $input_school;
    }
    if (empty($name_err) && empty($insertion_err) && empty($lastname_err) && empty($school_err)) {
        $sql = "UPDATE speler SET callsign=?, insertion=?, lastname=?, schoolID=? WHERE id=?";

        if ($stmt = mysqli_prepare($link, $sql)) {
            mysqli_stmt_bind_param($stmt, "sssss", $param_name, $param_insertion, $param_lastname, $param_school, $param_id,);

            $param_name = $name;
            $param_insertion = $insertion;
            $param_lastname = $lastname;
            $param_school = $school;
            $param_id = $id;


            if (mysqli_stmt_execute($stmt)) {

                header("location: ../?page=spelers");
                exit();
            } else {
                echo "Mislukt. Probeer opnieuw.";
            }
        }
        mysqli_stmt_close($stmt);
    }
    mysqli_close($link);
}

/**
 * Function to edit game from database
 * Executes query or gives error
 */
function editGame()
{

    global $link;
    $id = $_POST["id"];
    $tournament = trim($_POST["tournament"]);
    $player1 = trim($_POST["player1"]);
    $player2 = trim($_POST["player2"]);
    $score1 = trim($_POST["score1"]);
    $score2 = trim($_POST["score2"]);
    $winnerID = trim($_POST["winnerID"]);



    if (empty($name_err) && empty($insertion_err) && empty($lastname_err) && empty($school_err)) {
        $sql = "UPDATE wedstrijd SET tournamentID=?, player1ID=?, player2ID=?, score1=?, score2=?, winnerID=? WHERE id=?";
        echo $sql;
        if ($stmt = mysqli_prepare($link, $sql)) {
            mysqli_stmt_bind_param($stmt, "sssssss", $tournament, $player1, $player2, $score1, $score2, $winnerID, $id);

            $param_tournament = $tournament;
            $param_player1 = $player1;
            $param_player2 = $player2;
            $param_score1 = $score1;
            $param_score2 = $score2;
            $param_winnerID = $winnerID;



            if (mysqli_stmt_execute($stmt)) {

                header("location: ../?page=uitslagenbeheren");
                exit();
            } else {
                echo "Mislukt. Probeer opnieuw.";
            }
        }
        mysqli_stmt_close($stmt);
    }
    mysqli_close($link);
}

/**
 * Function to edit school from database
 * Executes query or gives error
 */
function editSchool()
{
    global $link;
    $id = $_POST["id"];

    $input_name = trim($_POST["name"]);
    if (empty($input_name)) {
        $name_err = "Please enter a name.";
    } elseif (!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^[a-zA-Z\s]+$/")))) {
        $name_err = "Please enter a valid name.";
    } else {
        $name = $input_name;
    }

    if (empty($name_err) && empty($insertion_err) && empty($lastname_err) && empty($school_err)) {
        $sql = "UPDATE school SET name=? WHERE id=?";

        if ($stmt = mysqli_prepare($link, $sql)) {
            mysqli_stmt_bind_param($stmt, "ss", $param_name, $param_id,);
            $param_name = $name;
            $param_id = $id;

            if (mysqli_stmt_execute($stmt)) {
                header("location: ../?page=schools");
                exit();
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        mysqli_stmt_close($stmt);
    }
    mysqli_close($link);
}

/**
 * Function to create player and insert to database
 * Executes query or gives error
 */
function createPlayer()
{
    global $link;
    $input_name = trim($_POST["name"]);

    if (empty($input_name)) {
        $name_err = "Please enter a name.";
    } elseif (!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^[a-zA-Z\s]+$/")))) {
        $name_err = "Please enter a valid name.";
    } else {
        $name = $input_name;
    }

    $input_insertion = trim($_POST["insertion"]);
    if (empty($input_insertion)) {
        $insertion_err = "insetion.";
    } else {
        $insertion = $input_insertion;
    }

    $input_lastname = trim($_POST["lastname"]);
    if (empty($input_insertion)) {
        $lastname_err = "lastname.";
    } else {
        $lastname = $input_lastname;
    }
    $input_school = trim($_POST["school"]);
    if (empty($input_school)) {
        $school_err = "school.";
    } else {
        $school = $input_school;
    }

    if (empty($name_err) && empty($insertion_err) && empty($lastname_err) && empty($school_err)) {
        $sql = "INSERT INTO speler (callsign, insertion, lastname, schoolID) VALUES (?, ?, ?, ?)";

        if ($stmt = mysqli_prepare($link, $sql)) {
            mysqli_stmt_bind_param($stmt, "ssss", $param_name, $param_insertion, $param_lastname, $param_school);
            $param_name = $name;
            $param_insertion = $insertion;
            $param_lastname = $lastname;
            $param_school = $school;

            if (mysqli_stmt_execute($stmt)) {
                header("location:../?page=spelers");
            } else {
                echo $sql;
            }
        }
        mysqli_stmt_close($stmt);
    }
    mysqli_close($link);
}

/**
 * Function to create school and insert to database
 * Executes query or gives error
 */
function createSchool()
{
    global $link;
    $input_name = trim($_POST["name"]);

    if (empty($input_name)) {
        $name_err = "Please enter a name.";
    } elseif (!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^[a-zA-Z\s]+$/")))) {
        $name_err = "Please enter a valid name.";
    } else {
        $name = $input_name;
    }

    if (empty($name_err) && empty($insertion_err) && empty($lastname_err) && empty($school_err)) {
        $sql = "INSERT INTO school (name) VALUES (?)";
        if ($stmt = mysqli_prepare($link, $sql)) {

            mysqli_stmt_bind_param($stmt, "s", $param_name);
            $param_name = $name;

            if (mysqli_stmt_execute($stmt)) {
                $message = "School Toegevoegd";
                echo "<script type='text/javascript'>alert('$message');</script>";
            } else {
                echo $sql;
            }
        }
        mysqli_stmt_close($stmt);
    }
    mysqli_close($link);
}

/**
 * Function to create tournament and insert to database
 * Executes query or gives error
 */
function createTournament()
{
    global $link;
    global $tdate;

    $input_name = trim($_POST["name"]);
    if (empty($input_name)) {
        $name_err = "Please enter a name.";
    } elseif (!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^[a-zA-Z\s]+$/")))) {
        $name_err = "Please enter a valid name.";
    } else {
        $name = $input_name;
    }

    if (empty($name_err) && empty($insertion_err) && empty($lastname_err) && empty($school_err)) {
        $sql = "INSERT INTO toernooi (description, date) VALUES (?, ?)";

        if ($stmt = mysqli_prepare($link, $sql)) {

            mysqli_stmt_bind_param($stmt, "ss", $param_name, $param_tdate);
            $param_name = $name;
            $param_tdate = $tdate;

            if (mysqli_stmt_execute($stmt)) {
                header("location:../?page=toernooien");
            } else {
                echo $sql;
            }
        }
        mysqli_stmt_close($stmt);
    }
    mysqli_close($link);
}

/**
 * Function to give error
 */
function giveError()
{
    if (empty(trim($_GET["id"]))) {
        header("location: error.php");
        exit();
    }
}
/**
 * Function to check if imported file is xml to database
 * Parameter $file: is filename
 * Executes query or gives error
 */
function checkXML($file){
    $search = 'xml';

    if(!preg_match("/{$search}/i", $file)) {
        echo 'Geen geldig XML bestand';
        die();
    }
}
/**
 * Function to import player from XML file to database
 * Executes query or gives error
 */
function spelersImporteren($file, $conn)
{
    checkXML($_FILES['xmlPlayers']['name']);
    $file = $_FILES['xmlPlayers']['tmp_name'];
    $content = utf8_encode(file_get_contents($file));
    $xml = simplexml_load_string($content);

    foreach ($xml as $syn) {
        $stmt = $conn->prepare("INSERT INTO speler (ID, callsign, insertion, lastname, schoolID) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $playerID, $callSign, $insertion, $lastName, $schoolID);

        $playerID   = htmlspecialchars($syn->ID);
        $callSign   = htmlspecialchars($syn->Voornaam);
        $insertion  = htmlspecialchars($syn->Tussenvoegsels);
        $lastName   = htmlspecialchars($syn->Achternaam);
        $schoolID   = htmlspecialchars($syn->SchoolID);
        $stmt->execute();
    }
}

/**
 * Function to import school from XML file to database
 * Executes query or gives error
 */
function schoolImporteren($file, $conn)
{
    checkXML($_FILES['xmlSchools']['name']);
    $file = $_FILES['xmlSchools']['tmp_name'];
    $content = utf8_encode(file_get_contents($file));
    $xml = simplexml_load_string($content);

    foreach ($xml as $syn) {
        $stmt = $conn->prepare("INSERT INTO school (ID, name) VALUES (?, ?)");
        $stmt->bind_param("ss", $ID, $schoolName);

        $ID           = htmlspecialchars($syn->ID);
        $schoolName   = htmlspecialchars($syn->Naam);
        $stmt->execute();
    }
}

/**
 * Function to import tournament from XML file to database
 * Executes query or gives error
 */
function tournamentImporteren($file, $conn)
{
    checkXML($_FILES['xmlTournaments']['name']);
    $file = $_FILES['xmlTournaments']['tmp_name'];
    $content = utf8_encode(file_get_contents($file));
    $xml = simplexml_load_string($content);

    foreach ($xml as $syn) {
        $stmt = $conn->prepare("INSERT INTO toernooi (ID, description, date) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $tournamentID, $tournamentDesc, $tournamentDate);

        $tournamentID   = htmlspecialchars($syn->ID);
        $tournamentDesc = htmlspecialchars($syn->Omschrijving);
        $tournamentDate = htmlspecialchars($syn->Datum);
        $stmt->execute();
    }
}

/**
 * Function to import registration from XML file to database
 * Executes query or gives error
 */
function aanmeldingenImporteren($file, $conn)
{
    checkXML($_FILES['xmlRegistrations']['name']);
    $file = $_FILES['xmlRegistrations']['tmp_name'];
    $content = utf8_encode(file_get_contents($file));
    $xml = simplexml_load_string($content);

    foreach ($xml as $syn) {
        $stmt = $conn->prepare("INSERT INTO aanmelding (ID, playerID, tournamentID) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $registrationID, $playerID, $tournamentID);

        $registrationID   = htmlspecialchars($syn->ID);
        $playerID = htmlspecialchars($syn->SpelerID);
        $tournamentID = htmlspecialchars($syn->ToernooiID);
        $stmt->execute();
    }
}

/**
 * Function to import game from XML file to database
 * Executes query or gives error
 */
function wedstrijdImporteren($file, $conn)
{
    checkXML($_FILES['xmlGames']['name']);
    $file = $_FILES['xmlGames']['tmp_name'];
    $content = utf8_encode(file_get_contents($file));
    $xml = simplexml_load_string($content);

    foreach ($xml as $syn) {
        $stmt = $conn->prepare("INSERT INTO wedstrijd (ID, tournamentID, player1ID, round, player2ID, score1, score2, winnerID) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssssss", $gameID, $tournamentID, $player1ID, $round, $player2ID, $score1, $score2, $winnerID);

        $gameID   = htmlspecialchars($syn->ID);
        $tournamentID = htmlspecialchars($syn->ToernooiID);
        $round = htmlspecialchars($syn->Ronde);
        $player1ID = htmlspecialchars($syn->Speler1ID);
        $player2ID = htmlspecialchars($syn->Speler2ID);
        $score1 = htmlspecialchars($syn->Score1);
        $score2 = htmlspecialchars($syn->Score2);
        $winnerID = htmlspecialchars($syn->WinnaarID);
        $stmt->execute();
    }
}

/**
 * Function to manually import registration to database
 * Executes query or gives error
 */
function aanmeldingHandmatig()
{
    global $link;
    $playerID = trim($_POST["player"]);
    $tournamentID = trim($_POST["tournament"]);

    if (empty($tournament_err) && empty($tournament_err)) {

        $sql = "INSERT INTO aanmelding (playerID, tournamentID) VALUES (?, ?)";

        if ($stmt = mysqli_prepare($link, $sql)) {

            mysqli_stmt_bind_param($stmt, "ss", $param_playerID, $param_tournamentID);
            $param_playerID = $playerID;
            $param_tournamentID = $tournamentID;

            if (mysqli_stmt_execute($stmt)) {
                $message = "Aanmelding succesvol";
                echo "<script type='text/javascript'>alert('$message');</script>";
                header("Refresh:0");
            } else {
                echo "Mislukt. Probeer opnieuw";
            }
        }
        mysqli_stmt_close($stmt);
    }
    mysqli_close($link);
}
