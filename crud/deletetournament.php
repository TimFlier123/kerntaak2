<?php
include_once('functions.php');
// if user clicks yes then run deleteTournament function, else give error
if (isset($_POST["id"]) && !empty($_POST["id"])) {

    deleteTournament();
} else {

    giveError();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Verwijder Toernament</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .wrapper {
            width: 600px;
            margin: 0 auto;
        }
    </style>
</head>

<body style="background-color:#ff9623;">
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5 mb-3">Toernament Verwijderen</h2>
                    <!-- Delete tournament form -->
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="alert alert-danger">
                            <input type="hidden" name="id" value="<?php echo trim($_GET["id"]); ?>" />
                            <p>Wil je dit toernament verwijderen?</p>
                            <p>
                                <!-- Submit Deleting -->
                                <input type="submit" value="Ja" class="btn btn-warning">
                                <a href="../?page=toernooien" class="btn btn-light">Nee</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>