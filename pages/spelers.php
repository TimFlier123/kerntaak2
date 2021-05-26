<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once "includes/head.php"; ?>
    <style>
        .wrapper {
            width: 100%;
            margin: 0 auto;
        }

        table tr td:last-child {
            width: 120px;
        }
    </style>
    <!-- show tooltips and search trough table -->
    <script>
        $(document).ready(function() {
            $('[data-toggle="tooltip"]').tooltip();
            $("#search").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#spelers tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>
</head>

<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="mt-5 mb-3 clearfix">
                        <h2 class="pull-left" style="color:blue">Spelers</h2>
                        <a href="crud/createplayer.php" class="btn pull-right" style="background-color:#ff9623;"><i class="fa fa-plus"></i> Nieuwe Speler</a>
                    </div>
                    <input id="search" type="text" placeholder="Zoeken naar speler">
                    <?php

                    // Include config file
                    require_once "config/crud.php";

                    $sql = "SELECT speler.ID, speler.callsign, speler.insertion, speler.lastname, speler.schoolID, school.name
                    FROM speler 
                    INNER JOIN school ON speler.schoolID=school.ID;";

                    if ($result = mysqli_query($link, $sql)) {
                        if (mysqli_num_rows($result) > 0) {
                            echo '<table class="table table-bordered table-striped">';
                            echo "<thead>";
                            echo "<tr>";
                            echo "<th>Voornaam</th>";
                            echo "<th>Tussenvoegsels</th>";
                            echo "<th>Achternaam</th>";
                            echo "<th>School</th>";
                            echo "</tr>";
                            echo "</thead>";
                            echo "<tbody id='spelers'>";
                            while ($row = mysqli_fetch_array($result)) {
                                echo "<tr>";

                                echo "<td id='start'>" . $row['callsign'] . "</td>";
                                echo "<td>" . $row['insertion'] . "</td>";
                                echo "<td>" . $row['lastname'] . "</td>";
                                echo "<td>" . $row['name'] . "</td>";
                                echo "<td>";
                                echo '<a href="crud/editplayer.php?id=' . $row['ID'] . '" class="mr-3" title="Speler Bewerken" data-toggle="tooltip"><span class="fa fa-pencil"></span></a>';
                                echo '<a href="crud/deleteplayer.php?id=' . $row['ID'] . '" title="Speler Verwijderen" data-toggle="tooltip"><span class="fa fa-trash"></span></a>';
                                echo "</td>";
                                echo "</tr>";
                            }
                            echo "</tbody>";
                            echo "</table>";
                            // Free result set
                            mysqli_free_result($result);
                        } else {
                            // if table contains no data
                            echo '<div class="alert alert-danger"><em>Geen data gevonden.</em></div>';
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