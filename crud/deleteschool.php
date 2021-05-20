<?php

include_once('functions.php');
// if user clicks yes then run deleteSchool function, else give error
if (isset($_POST["id"]) && !empty($_POST["id"])) {
    deleteSchool();
} else {
    giveError();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Delete Record</title>
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
                    <h2 class="mt-5 mb-3">School Verwijderen</h2>
                    <!-- Delete school form -->
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="alert alert-danger">
                            <input type="hidden" name="id" value="<?php echo trim($_GET["id"]); ?>" />
                            <p>Wil je deze school verwijderen?</p>
                            <p>
                                <!-- submit deleting -->
                                <input type="submit" value="Yes" class="btn btn-danger">
                                <a href="../?page=schools" class="btn btn-secondary">No</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>