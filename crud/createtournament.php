<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once "../includes/head.php"; ?>
    <link rel="stylesheet" href="../styling/style.css" type="text/css">
</head>

<?php
include_once('functions.php');
require_once "../config/crud.php";

// if user submits form  run function
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    createTournament();
}
?>


<body style="background-color:#ff9623;">
    <div class="wrapperpx">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5">Nieuw Toernooi</h2>
                    <!-- new tournament form -->
                    <form action="" method="post">
                        <div class="form-group">
                            <label>Naam</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Datum</label>
                            <input type="text" name="date" class="form-control">
                        </div>
                        <!-- submit form -->
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="../?page=toernooien" class="btn btn-secondary ml-2">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>