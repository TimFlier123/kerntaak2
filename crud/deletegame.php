<?php
include_once('functions.php');
// if user clicks yes then run deleteGame function, else give error
$id = $_GET["id"];
if (isset($_POST["id"]) && !empty($_POST["id"])) {
    deleteGame($id);
} else {
    giveError();
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
                    <h2 class="mt-5 mb-3">Wedstrijd Verwijderen</h2>
                    <!-- Delete game form -->
                    <form action="" method="post">
                        <div class="alert alert-danger">
                            <input type="hidden" name="id" value="<?php echo trim($_GET["id"]); ?>" />
                            <p>Wil je deze wedstrijd verwijderen?</p>
                            <p>
                                <!-- submit deleting -->
                                <input type="submit" value="Yes" class="btn btn-danger">
                                <a href="../?page=uitslagenbeheren" class="btn btn-secondary">No</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>