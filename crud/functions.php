<?php
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

function giveError()
{
    if (empty(trim($_GET["id"]))) {
        header("location: error.php");
        exit();
    }
}

function spelersImporteren($file, $conn)
{
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

function schoolImporteren($file, $conn)
{
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

function tournamentImporteren($file, $conn)
{
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

function aanmeldingenImporteren($file, $conn)
{
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

function wedstrijdImporteren($file, $conn)
{
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