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
            width: 600px;
            margin: 0 auto;
        }
        th td{
            width: 10% !important;
        }
       
     
    </style>
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
</head>
<body>
<div class="container" style="max-width: 1400px;">
  <div class="row">
  <div class="col-md-12">
                    <?php
                   
                    require_once "config/crud.php";
                    
                    
                    for ($x = 1; $x <= 5; $x++) {
                        echo "<b>Ronde:</b> $x <br>";
                      
                    // Attempt select query execution
                    $sql = "SELECT * FROM wedstrijd  WHERE round = '" . $x . "'";
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
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
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                 
                                        echo "<td>" . $row['player1ID'] . "</td>";
                                        echo "<td>"; if($row['player1ID'] == $row['winnerID']) echo "<p style='color:green'> " . $row['player2ID'] . "</p>"; else echo $row['player2ID']; "</td>";
                                        echo "<td>"  . $row['score1'] . "</td>";
                                        echo "<td>" . $row['score2'] . "</td>";
                                            // echo '<a href="read.php?id='. $row['ID'] .'" class="mr-3" title="View Record" data-toggle="tooltip"><span class="fa fa-eye"></span></a>';
                                            // echo '<a href="crud/editschool.php?id='. $row['ID'] .'" class="mr-3" title="School Bewerken" data-toggle="tooltip"><span class="fa fa-pencil"></span></a>';
                                            // echo '<a href="crud/deleteschool.php?id='. $row['ID'] .'" title="School Verwijderen" data-toggle="tooltip"><span class="fa fa-trash"></span></a>';
                                        echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            // Free result set
                            mysqli_free_result($result);
                        } else{
                            ;
                        }
                    } else{
                        echo "Oops! Something went wrong. Please try again later.";
                    }
                }
                    // Close connection
                    mysqli_close($link);
                    ?>
                </div>
            </div> 
            </div>      
      
 
</body>
</html>