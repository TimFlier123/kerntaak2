<?php
include_once('functions.php');
require_once "../config/crud.php";


if (isset($_POST["id"]) && !empty($_POST["id"])) {

    $id = $_POST["id"];
    $tournament = trim($_POST["tournament"]);
    $player1 = trim($_POST["player1"]);
    $player2 = trim($_POST["player2"]);
    $score1 = trim($_POST["score1"]);
    $score2 = trim($_POST["score2"]);
    $winnerID = trim($_POST["winnerID"]);
    


    if (empty($name_err) && empty($insertion_err) && empty($lastname_err) && empty($school_err)) {
        $sql = "UPDATE wedstrijd SET tournamentID=?, player1ID=?, player2ID=?, score1=?, score2=?, winnerID=? WHERE id=?";
        echo $sql;
        if ($stmt = mysqli_prepare($link, $sql)) {
            mysqli_stmt_bind_param($stmt, "sssssss", $tournament, $player1, $player2, $score1, $score2, $winnerID, $id);

            $param_tournament = $tournament;
            $param_player1 = $player1;
            $param_player2 = $player2;
            $param_score1 = $score1;
            $param_score2 = $score2;
            $param_winnerID = $winnerID;



            if (mysqli_stmt_execute($stmt)) {

                header("location: ../?page=uitslagenbeheren");
                exit();
            } else {
                echo "Mislukt. Probeer opnieuw.";
            }
        }
        mysqli_stmt_close($stmt);
    }
    mysqli_close($link);
} else {

    if (isset($_GET["id"]) && !empty(trim($_GET["id"]))) {

        $id =  trim($_GET["id"]);

        $sql = "SELECT * FROM wedstrijd WHERE id = ?";
        if ($stmt = mysqli_prepare($link, $sql)) {

            mysqli_stmt_bind_param($stmt, "i", $param_id);

            $param_id = $id;

            if (mysqli_stmt_execute($stmt)) {
                $result = mysqli_stmt_get_result($stmt);

                if (mysqli_num_rows($result) == 1) {

                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    $tournament = $row["tournamentID"];
                    $player1= $row["player1ID"];
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

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Uitslag beheren</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .wrapper {
            width: 600px;
            margin: 0 auto;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5">Uitslag beheren</h2>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                        <div class="form-group">
                            <label>Toernament</label>
                            <input type="text" name="tournament" class="form-control <?php echo (!empty($name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $tournament; ?>">
                            <span class="invalid-feedback"><?php echo $tournament_err; ?></span>
                        </div>
                        <div class="form-group">
                            <label>Speler 1</label>
                            <input type="text" name="player1" class="form-control <?php echo (!empty($player1_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $player1; ?>">
                            <span class="invalid-feedback"><?php echo $player1_err; ?></span>
                        </div>
                        <div class="form-group">
                            <label>Speler 2</label>
                            <input type="text" name="player2" class="form-control <?php echo (!empty($player2_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $player2; ?>">
                            <span class="invalid-feedback"><?php echo $player2_err; ?></span>
                        </div>

                        <div class="form-group">
                            <label>Score1</label>
                            <input type="text" name="score1" class="form-control <?php echo (!empty($score1_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $score1; ?>">
                            <span class="invalid-feedback"><?php echo $score1_err; ?></span>
                        </div>
                        
                        <div class="form-group">
                            <label>Score 2</label>
                            <input type="text" name="score2" class="form-control <?php echo (!empty($score2_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $score2; ?>">
                            <span class="invalid-feedback"><?php echo $score2_err; ?></span>
                        </div>
                        
                        <div class="form-group">
                            <label>Winner</label>
                            <input type="text" name="winnerID" class="form-control <?php echo (!empty($winner_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $winnerID; ?>">
                            <span class="invalid-feedback"><?php echo $winner_err; ?></span>
                        </div>

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