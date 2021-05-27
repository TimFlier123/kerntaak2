<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once "../includes/head.php"; ?>
    <link rel="stylesheet" href="../styling/style.css" type="text/css">
</head>

<?php
include_once('functions.php');
require_once "../config/crud.php";

// if form is submitted then run the function editTournament, else show values
if (isset($_POST["id"]) && !empty($_POST["id"])) {
    $id = $_POST["id"];
    editTournament($id);
    
} else {

    if (isset($_GET["id"]) && !empty(trim($_GET["id"]))) {
        $id =  trim($_GET["id"]);
        $sql = "SELECT * FROM toernooi WHERE id = ?";

        if ($stmt = mysqli_prepare($link, $sql)) {

            mysqli_stmt_bind_param($stmt, "i", $id);

            if (mysqli_stmt_execute($stmt)) {
                $result = mysqli_stmt_get_result($stmt);

                if (mysqli_num_rows($result) == 1) {
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    $name = $row["description"];
                    $date = $row["date"];
                } else {
                    header("location: error.php");
                    exit();
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        mysqli_stmt_close($stmt);
        mysqli_close($link);
    } else {
        header("location: error.php");
        exit();
    }
}
?>

<body style="background-color:#ff9623;">
    <div class="wrapperpx">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5">Toernooi Bewerken</h2>
                    <!-- Edit game form -->
                    <form action="" method="post">
                        <div class="form-group">
                            <label>Naam</label>
                            <input type="text" name="name" class="form-control" value="<?php echo $name; ?>">
                        </div>
                        <div class="form-group">
                            <label>Datum</label>
                            <input type="text" name="date" class="form-control" value="<?php echo $date; ?>">
                        </div>
                        <!-- submit form -->
                        <input type="hidden" name="id" value="<?php echo $id; ?>" />
                        <input type="submit" class="btn btn-primary" value="Bewerken">
                        <a href="../?page=toernooien" class="btn btn-secondary ml-2">Annuleren</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>