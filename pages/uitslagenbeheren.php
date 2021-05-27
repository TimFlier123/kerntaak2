<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once "includes/head.php"; ?>
    <link rel="stylesheet" href="styling/style.css" type="text/css">
</head>

<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="mt-5 mb-3 clearfix">
                        <h2 class="pull-left" style="color:blue">Uitslagen</h2>
                    </div>
                    <?php
                    // Include config file
                    require_once "config/crud.php";

                    // Select all data from games table
                    $sql = "SELECT * FROM wedstrijd";
                    if ($result = mysqli_query($link, $sql)) {
                        if (mysqli_num_rows($result) > 0) {
                            echo '<table class="table table-bordered table-striped">';
                            echo "<thead>";
                            echo "<tr>";
                            echo "<th>TournamentID</th>";
                            echo "<th>Ronde</th>";
                            echo "<th>player1ID</th>";
                            echo "<th>player2ID</th>";
                            echo "<th>score1</th>";
                            echo "<th>score2</th>";
                            echo "<th>winnerID</th>";
                            echo "</tr>";
                            echo "</thead>";
                            echo "<tbody>";
                            while ($row = mysqli_fetch_array($result)) {
                                echo "<tr>";

                                echo "<td>" . $row['tournamentID'] . "</td>";
                                echo "<td>" . $row['round'] . "</td>";
                                echo "<td>" . $row['player1ID'] . "</td>";
                                echo "<td>" . $row['player2ID'] . "</td>";
                                echo "<td>" . $row['score1'] . "</td>";
                                echo "<td>" . $row['score2'] . "</td>";
                                echo "<td>" . $row['winnerID'] . "</td>";
                                echo "<td>";
                                echo '<a href="crud/editgame.php?id=' . $row['ID'] . '" class="mr-3" title="Uitslag Bewerken" data-toggle="tooltip"><span class="fa fa-pencil"></span></a>';
                                echo '<a href="crud/deletegame.php?id=' . $row['ID'] . '" title="Uitslag Verwijderen" data-toggle="tooltip"><span class="fa fa-trash"></span></a>';
                                echo "</td>";
                                echo "</tr>";
                            }
                            echo "</tbody>";
                            echo "</table>";

                            mysqli_free_result($result);
                        } else {
                            // if table contains no data
                            echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
                        }
                    } else {
                        echo "Error. Probeer opnieuw";
                    }

                    mysqli_close($link);
                    ?>

                </div>
            </div>
        </div>
    </div>
</body>

</html>
<script src="includes/js/functions.js"></script>