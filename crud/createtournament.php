<?php
include_once('functions.php');
require_once "../config/crud.php";


$name = $tdate = "";
$name_err = $tdate = "";

// if user submits form  run function
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    createTournament();
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

<body style="background-color:#ff9623;">
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5">Nieuw Toernooi</h2>
                    <!-- new tournament form -->
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group">
                            <label>Naam</label>
                            <input type="text" name="name" class="form-control <?php echo (!empty($name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $name; ?>">
                            <span class="invalid-feedback"><?php echo $name_err; ?></span>
                        </div>
                        <div class="form-group">
                            <label>Datum</label>
                            <input type="text" name="tdate" class="form-control <?php echo (!empty($tdate_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $tdate; ?>">
                            <span class="invalid-feedback"><?php echo $tdate_err; ?></span>
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