<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        .wrapper{
            width: 100%;
            margin: 0 auto;
        }
        table tr td:last-child{
            width: 120px;
        }
    </style>
    <script>
        $(document).ready(function(){
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
                        <h2 class="pull-left" style="color:blue">Spelers</h2>
                        <a href="crud/createplayer.php" class="btn pull-right" style="background-color:#ff9623;"><i class="fa fa-plus"></i> Nieuwe Speler</a>
                    </div>
                    <?php
                    // Include config file
                    require_once "config/crud.php";
                    
                    // Attempt select query execution
                    $sql = "SELECT speler.ID, speler.callsign, speler.insertion, speler.lastname, speler.schoolID, school.name
                    FROM speler
                    INNER JOIN school ON speler.schoolID=school.ID;";
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo '<table class="table table-bordered table-striped">';
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>Voornaam</th>";
                                        echo "<th>Tussenvoegsels</th>";
                                        echo "<th>Achternaam</th>";
                                        echo "<th>School</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                        
                                        echo "<td>" . $row['callsign'] . "</td>";
                                        echo "<td>" . $row['insertion'] . "</td>";
                                        echo "<td>" . $row['lastname'] . "</td>";
                                        echo "<td>" . $row['name'] . "</td>";
                                        echo "<td>";
                                            // echo '<a href="read.php?id='. $row['ID'] .'" class="mr-3" title="View Record" data-toggle="tooltip"><span class="fa fa-eye"></span></a>';
                                            echo '<a href="crud/editplayer.php?id='. $row['ID'] .'" class="mr-3" title="Speler Bewerken" data-toggle="tooltip"><span class="fa fa-pencil"></span></a>';
                                            echo '<a href="crud/deleteplayer.php?id='. $row['ID'] .'" title="Speler Verwijderen" data-toggle="tooltip"><span class="fa fa-trash"></span></a>';
                                        echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            // Free result set
                            mysqli_free_result($result);
                        } else{
                            echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
                        }
                    } else{
                        echo "Oops! Something went wrong. Please try again later.";
                    }
 
                    // Close connection
                    mysqli_close($link);
                    ?>
                    
                </div>
            </div>        
        </div>
    </div>
</body>
</html>