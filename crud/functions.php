<?php

/**
 * Function to delete player from database
 * PARAM = ID, gives ID of player
 * Executes query or gives error
 */
function deletePlayer($id)
{
    require_once "../config/crud.php";
    $sql = "DELETE FROM speler WHERE id = ?";

    if ($stmt = mysqli_prepare($link, $sql)) {
        mysqli_stmt_bind_param($stmt, "i", $id);

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
 * PARAM = ID, gives ID of game
 * Executes query or gives error
 */
function deleteGame($id)
{
    require_once "../config/crud.php";
    $sql = "DELETE FROM wedstrijd WHERE id = ?";

    if ($stmt = mysqli_prepare($link, $sql)) {
        mysqli_stmt_bind_param($stmt, "i", $id);

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
 * PARAM = ID, gives ID of tournament
 * Executes query or gives error
 */
function editTournament($id)
{
    global $link;
    $name = trim($_POST["name"]);
    $date = trim($_POST["date"]);

    $sql = "UPDATE toernooi SET description=?, date=? WHERE id=?";

    if ($stmt = mysqli_prepare($link, $sql)) {
        mysqli_stmt_bind_param($stmt, "sss", $name, $date, $id);

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
 * PARAM = ID, gives ID of school
 * Executes query or gives error
 */
function deleteSchool($id)
{
    require_once "../config/crud.php";
    $sql = "DELETE FROM school WHERE id = ?";

    if ($stmt = mysqli_prepare($link, $sql)) {

        mysqli_stmt_bind_param($stmt, "i", $id);
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
 * PARAM = ID, gives ID of tournament
 * Executes query or gives error
 */
function deleteTournament($id)
{
    require_once "../config/crud.php";
    $sql = "DELETE FROM toernooi WHERE id = ?";

    if ($stmt = mysqli_prepare($link, $sql)) {

        mysqli_stmt_bind_param($stmt, "i", $id);
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
 * PARAM = ID, gives ID of player
 * Executes query or gives error
 */
function editPlayer($id)
{
    global $link;
    require_once "../config/crud.php";

    $name = trim($_POST["name"]);
    $insertion =  trim($_POST["insertion"]);
    $lastname = trim($_POST["lastname"]);
    $school = trim($_POST["school"]);

    $sql = "UPDATE speler SET callsign=?, insertion=?, lastname=?, schoolID=? WHERE id=?";

        if ($stmt = mysqli_prepare($link, $sql)) {
            mysqli_stmt_bind_param($stmt, "sssss", $name, $insertion, $lastname, $school, $id);

            if (mysqli_stmt_execute($stmt)) {

                header("location: ../?page=spelers");
                exit();
            } else {
                echo "Mislukt. Probeer opnieuw.";
            }
        }

        mysqli_stmt_close($stmt);
    mysqli_close($link);
}

/**
 * Function to edit game from database
 * PARAM = ID, gives ID of game
 * Executes query or gives error
 */
function editGame($id)
{
    global $link;
    $tournament = trim($_POST["tournament"]);
    $player1 = trim($_POST["player1"]);
    $player2 = trim($_POST["player2"]);
    $score1 = trim($_POST["score1"]);
    $score2 = trim($_POST["score2"]);
    $winnerID = trim($_POST["winnerID"]);
  
    $sql = "UPDATE wedstrijd SET tournamentID=?, player1ID=?, player2ID=?, score1=?, score2=?, winnerID=? WHERE id=?";

    if ($stmt = mysqli_prepare($link, $sql)) {
        mysqli_stmt_bind_param($stmt, "sssssss", $tournament, $player1, $player2, $score1, $score2, $winnerID, $id);

        if (mysqli_stmt_execute($stmt)) {
            header("location: ../?page=uitslagenbeheren");
            exit();
        } else {
             echo "Mislukt. Probeer opnieuw.";
            }
        }
        mysqli_stmt_close($stmt);
    mysqli_close($link);
}

/**
 * Function to edit school from database
 * PARAM = ID, gives ID of school
 * Executes query or gives error
 */
function editSchool($id)
{
    global $link;
    $name = trim($_POST["name"]);

    $sql = "UPDATE school SET name=? WHERE id=?";

    if ($stmt = mysqli_prepare($link, $sql)) {
        mysqli_stmt_bind_param($stmt, "ss", $name, $id,);

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
 * Function to create player and insert to database
 * Executes query or gives error
 */
function createPlayer()
{
    global $link;
    $name = trim($_POST["name"]);
    $insertion = trim($_POST["insertion"]);
    $lastname = trim($_POST["lastname"]);
    $school = trim($_POST["school"]);

    if (!empty($name) && !empty($lastname) && !empty($school)) {
        $sql = "INSERT INTO speler (callsign, insertion, lastname, schoolID) VALUES (?, ?, ?, ?)";

        if ($stmt = mysqli_prepare($link, $sql)) {
            mysqli_stmt_bind_param($stmt, "ssss", $name, $insertion, $lastname, $school);

            if (mysqli_stmt_execute($stmt)) {
                echo "<script type='text/javascript'>alert('Speler Toegevoegd');</script>";
                header("Refresh:0");
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
    $name = trim($_POST["name"]);

    if (!empty($name)) {
        $sql = "INSERT INTO school (name) VALUES (?)";
        if ($stmt = mysqli_prepare($link, $sql)) {
            mysqli_stmt_bind_param($stmt, "s", $name);
            
            if (mysqli_stmt_execute($stmt)) {
                echo "<script type='text/javascript'>alert('School Toegevoegd');</script>";
            } else {
                echo $sql;
            }
        }
        mysqli_stmt_close($stmt);
    }
    else{
        echo "<script type='text/javascript'>alert('Het veld Naam is niet ingevuld. Probeer opnieuw.');</script>";
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

    $name = trim($_POST["name"]);
    $date = trim($_POST["date"]);

    if (!empty($name) && !empty($date)) {
    
        $sql = "INSERT INTO toernooi (description, date) VALUES (?, ?)";

        if ($stmt = mysqli_prepare($link, $sql)) {
            mysqli_stmt_bind_param($stmt, "ss", $name, $date);
            if (mysqli_stmt_execute($stmt)) {
                header("location:../?page=toernooien");
            } else {
                echo $sql;
            }
        }
        mysqli_stmt_close($stmt);
    }
    else{
        echo "<script type='text/javascript'>alert('Niet alle velden zijn ingevuld. Probeer opnieuw.');</script>";
    }
    mysqli_close($link);
}

/**
 * Function to give error
 */
function giveError()
{
    // echo "<script type='text/javascript'>alert('Probeer opnieuw.');</script>";
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
 * Parameter $file: is filename
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
 * Parameter $file: is filename
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
 * Parameter $file: is filename
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
 * Parameter $file: is filename
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
 * Parameter $file: is filename
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

    $sql = "INSERT INTO aanmelding (playerID, tournamentID) VALUES (?, ?)";

        if ($stmt = mysqli_prepare($link, $sql)) {

            mysqli_stmt_bind_param($stmt, "ss", $playerID, $tournamentID);

            if (mysqli_stmt_execute($stmt)) {
                $message = "Aanmelding succesvol";
                echo "<script type='text/javascript'>alert('$message');</script>";
                header("Refresh:0");
            } else {
                echo "Mislukt. Probeer opnieuw";
            }
        }
        mysqli_stmt_close($stmt);
    mysqli_close($link);
}