<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once "../includes/head.php"; ?>
    <link rel="stylesheet" href="../styling/style.css" type="text/css">
</head>

<?php
include_once('functions.php');
require_once "../config/crud.php";

// if form is submitted then run the function editGame, else show values

if (isset($_POST["id"]) && !empty($_POST["id"])) {
    $id = $_POST["id"];
    editGame($id);
} else {
    if (isset($_GET["id"]) && !empty(trim($_GET["id"]))) {

        $id =  trim($_GET["id"]);

        $sql = "SELECT * FROM wedstrijd WHERE id = ?";
        if ($stmt = mysqli_prepare($link, $sql)) {

            mysqli_stmt_bind_param($stmt, "i", $id);
            if (mysqli_stmt_execute($stmt)) {
                $result = mysqli_stmt_get_result($stmt);

                if (mysqli_num_rows($result) == 1) {

                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    $tournament = $row["tournamentID"];
                    $player1 = $row["player1ID"];
                    $player2 = $row["player2ID"];
                    $score1 = $row["score1"];
                    $score2 = $row["score2"];
                    $winnerID = $row["winnerID"];
                } else {
                    header("location: error.php");
                    exit();
                }
            } else {
                echo "Fout. Probeer opnieuw.";
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
                    <h2 class="mt-5">Uitslag beheren</h2>
                    <!-- Edit game form -->
                    <form action="" method="post">
                        <div class="form-group">
                            <label>Toernament</label>
                            <input type="text" name="tournament" class="form-control" value="<?php echo $tournament; ?>">
                        </div>

                        <div class="form-group">
                            <label>Speler 1</label>
                            <input type="text" name="player1" class="form-control" value="<?php echo $player1; ?>">
                        </div>
                        
                        <div class="form-group">
                            <label>Speler 2</label>
                            <input type="text" name="player2" class="form-control" value="<?php echo $player2; ?>">
                        </div>

                        <div class="form-group">
                            <label>Score1</label>
                            <input type="text" name="score1" class="form-control" value="<?php echo $score1; ?>">
                        </div>

                        <div class="form-group">
                            <label>Score 2</label>
                            <input type="text" name="score2" class="form-control" value="<?php echo $score2; ?>">
                        </div>

                        <div class="form-group">
                            <label>Winner</label>
                            <input type="text" name="winnerID" class="form-control" value="<?php echo $winnerID; ?>">
                        </div>
                        <!-- submit form -->
                        <input type="hidden" name="id" value="<?php echo $id; ?>" />
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="../?page=spelers" class="btn btn-secondary ml-2">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>