<?php
include_once('functions.php');
require_once "../config/crud.php";

// if user submits form  run function
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    createPlayer();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once "../includes/head.php"; ?>
    <link rel="stylesheet" href="../styling/style.css" type="text/css">
</head>

<body style="background-color:#ff9623;">
    <div class="wrapperpx">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <!-- new player form -->
                    <h2 class="mt-5">Nieuwe Speler</h2>
                    <form action="" method="post">
                        <div class="form-group">
                            <label>Voornaam</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Tussenvoegsels</label>
                            <input type="text" name="insertion" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Achternaam</label>
                            <input type="text" name="lastname" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>School</label>
                            <!-- select schools to fill dropdown -->
                            <select name="school">
                                <?php
                                $sql = mysqli_query($link, "SELECT * FROM school");
                                while ($row = $sql->fetch_assoc()) {
                                    echo "<option value=\"{$row['ID']}\">{$row['name']}</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <!-- submit form -->
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="../?page=spelers" class="btn btn-secondary ml-2">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>