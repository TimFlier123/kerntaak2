<?php
include_once('crud/functions.php');
require_once "config/crud.php";

$playerID = $tournamentID = "";
$playerID_err = $tournamentID_err = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    aanmeldingHandmatig();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Create Record</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .wrapper {
            width: 600px;
            margin: 0 auto;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5 text-primary">Aanmelden - Handmatig</h2>
                    <form action="" method="post">

                        <div class="form-group">
                            <label>Naam</label>
                            <select name="player">
                                <?php
                                $sql = mysqli_query($link, "SELECT * FROM speler");
                                while ($row = $sql->fetch_assoc()) {
                                    echo "<option value=\"{$row['ID']}\">{$row['callsign']} {$row['lastname']}</option>";
                                }
                                ?>
                            </select>
                        </div>
    
                        <div class="form-group">
                            <label>Toernooi</label>
                            <select name="tournament">
                                <?php
                                $sql = mysqli_query($link, "SELECT * FROM toernooi");
                                while ($row = $sql->fetch_assoc()) {
                                    echo "<option value=\"{$row['ID']}\">{$row['description']}</option>";
                                }
                                ?>
                            </select>
                        </div>

                        <input type="submit" class="btn btn-primary" value="Aanmelden">
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>