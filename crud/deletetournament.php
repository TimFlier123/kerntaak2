<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once "../includes/head.php"; ?>
    <link rel="stylesheet" href="../styling/style.css" type="text/css">
</head>

<?php
include_once('functions.php');
// if user clicks yes then run deleteTournament function, else give error
$id = $_GET["id"];
if (isset($_POST["id"]) && !empty($_POST["id"])) {
    deleteTournament($id);
} else {
    giveError();
}
?>

<body style="background-color:#ff9623;">
    <div class="wrapperpx">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5 mb-3">Toernament Verwijderen</h2>
                    <!-- Delete tournament form -->
                    <form action="" method="post">
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