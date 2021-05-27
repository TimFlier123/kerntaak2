<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once "includes/head.php"; ?>
    <link rel="stylesheet" href="styling/style.css" type="text/css">
</head>

<body>
    <div class="wrapperpx">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="mt-5 mb-3 clearfix">
                        <h2 class="pull-left" style="color:blue">Scholen</h2>
                        <a href="crud/createschool.php" class="btn pull-right" style="background-color:#ff9623;"><i class="fa fa-plus"></i> Nieuwe School</a>
                    </div>
                    <?php
                    // Include config file
                    require_once "config/crud.php";

                    // Select all data from schools table
                    $sql = "SELECT * FROM school";
                    if ($result = mysqli_query($link, $sql)) {
                        if (mysqli_num_rows($result) > 0) {
                            echo '<table class="table table-bordered table-striped">';
                            echo "<thead>";
                            echo "<tr>";
                            echo "<th>Name</th>";
                            echo "</tr>";
                            echo "</thead>";
                            echo "<tbody>";
                            while ($row = mysqli_fetch_array($result)) {
                                echo "<tr>";
                                echo "<td>" . $row['name'] . "</td>";
                                echo "<td>";
                                echo '<a href="crud/editschool.php?id=' . $row['ID'] . '" class="mr-3" title="School Bewerken" data-toggle="tooltip"><span class="fa fa-pencil"></span></a>';
                                echo '<a href="crud/deleteschool.php?id=' . $row['ID'] . '" title="School Verwijderen" data-toggle="tooltip"><span class="fa fa-trash"></span></a>';
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
                        echo "Fout. Probeer opnieuw.";
                    }
                    mysqli_close($link);
                    ?>
                </div>
            </div>
        </div>
    </div>
    <script src="includes/js/functions.js"></script>
</body>
</html>