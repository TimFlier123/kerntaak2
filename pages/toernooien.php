<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once "includes/head.php"; ?>
    <style>
        .wrapper {
            width: 600px;
            margin: 0 auto;
        }

        table tr td:last-child {
            width: 120px;
        }
    </style>
    <!-- show tooltips -->
    <script>
        $(document).ready(function() {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
</head>

<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="mt-5 mb-3 clearfix">
                        <h2 class="pull-left" style="color:blue">Toernooien</h2>
                        <a href="crud/createtournament.php" class="btn pull-right" style="background-color:#ff9623;"><i class="fa fa-plus"></i> Nieuw Toernooi</a>
                    </div>
                    <?php
                    // Include config file
                    require_once "config/crud.php";

                    // Select all data from tournaments table
                    $sql = "SELECT * FROM toernooi";
                    if ($result = mysqli_query($link, $sql)) {
                        if (mysqli_num_rows($result) > 0) {
                            echo '<table class="table table-bordered table-striped">';
                            echo "<thead>";
                            echo "<tr>";

                            echo "<th>Naam</th>";
                            echo "<th>Datum</th>";

                            echo "</tr>";
                            echo "</thead>";
                            echo "<tbody>";
                            while ($row = mysqli_fetch_array($result)) {
                                echo "<tr>";

                                echo "<td>" . $row['description'] . "</td>";
                                echo "<td>" . $row['date'] . "</td>";
                                echo "<td>";
                                echo '<a href="crud/edittournament.php?id=' . $row['ID'] . '" class="mr-3" title="Bewerk Toernooi" data-toggle="tooltip"><span class="fa fa-pencil"></span></a>';
                                echo '<a href="crud/deletetournament.php?id=' . $row['ID'] . '" title="Verwijder Toernooi" data-toggle="tooltip"><span class="fa fa-trash"></span></a>';
                                echo "</td>";
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

                    mysqli_close($link);
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>