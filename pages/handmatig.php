<?php
include_once('crud/functions.php');
require_once "config/crud.php";

// If user has submitted form run aanmeldingHandmatig() function
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    aanmeldingHandmatig();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once "includes/head.php"; ?>
    <link rel="stylesheet" href="styling/style.css" type="text/css">
</head>

<body>
    <div class="wrapperpx">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5 text-primary">Aanmelden - Handmatig</h2>
                    <!-- Form to insert registration to database -->
                    <form action="" method="post">
                        
                        <div class="form-group">
                            <label>Naam</label>
                            <!-- Select all players to fill dropdown -->
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
                            <!-- Select all tournaments to fill dropdown -->
                            <select name="tournament">
                                <?php
                                $sql = mysqli_query($link, "SELECT * FROM toernooi");
                                while ($row = $sql->fetch_assoc()) {
                                    echo "<option value=\"{$row['ID']}\">{$row['description']}</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <!-- Submit Form -->
                        <input type="submit" class="btn btn-primary" value="Aanmelden">
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>