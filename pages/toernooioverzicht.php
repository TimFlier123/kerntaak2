<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once "includes/head.php"; ?>
    <link rel="stylesheet" href="styling/style.css" type="text/css">
</head>

<body>
    <div class="container" style="max-width: 1400px;">
        <div class="row">
            <div class="col-md-12">
                <?php
                require_once "config/crud.php";

                // for loop to show all rounds
                for ($x = 1; $x <= 5; $x++) {
                    echo "<b>Ronde:</b> $x <br>";

                    $sql = "SELECT * FROM wedstrijd  WHERE round = '" . $x . "'";
                    if ($result = mysqli_query($link, $sql)) {
                        if (mysqli_num_rows($result) > 0) {
                            echo '<table style="float:left; width:19%;" class="table table-bordered table-striped">';
                            echo "<thead>";
                            echo "<tr>";

                            echo "<th>Speler1</th>";
                            echo "<th>Speler2</th>";
                            echo "<th>1</th>";
                            echo "<th>2</th>";

                            echo "</tr>";
                            echo "</thead>";
                            echo "<tbody>";

                            while ($row = mysqli_fetch_array($result)) {
                                echo "<tr>";

                                echo "<td>"; if ($row['player1ID'] == $row['winnerID']) echo "<p style='color:green'> " . $row['player1ID'] . "</p>"; else echo $row['player1ID'];"</td>";
                                echo "<td>"; if ($row['player2ID'] == $row['winnerID']) echo "<p style='color:green'> " . $row['player2ID'] . "</p>"; else echo $row['player2ID'];"</td>";
                                echo "<td>"  . $row['score1'] . "</td>";
                                echo "<td>" . $row['score2'] . "</td>";

                                echo "</tr>";
                            }
                            echo "</tbody>";
                            echo "</table>";
                            mysqli_free_result($result);
                        } else {
                            // if table contains no data
                            echo '<div class="alert alert-danger"><em>Geen toernooien gevonden.</em></div>';
                        }
                    } else {
                        echo "Fout. Probeer opnieuw.";
                    }
                }
                mysqli_close($link);
                ?>
            </div>
        </div>
    </div>
</body>
</html>