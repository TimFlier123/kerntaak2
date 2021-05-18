<?php
// Include config file
require_once "../config/crud.php";
 
// Define variables and initialize with empty values
$name = $insertion = $lastname = $school = "";
$name_err = $insertion_err = $lastname_err = $school = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate name
    $input_name = trim($_POST["name"]);
    if(empty($input_name)){
        $name_err = "Please enter a name.";
    } elseif(!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $name_err = "Please enter a valid name.";
    } else{
        $name = $input_name;
    }
    
    // Validate address
    $input_insertion = trim($_POST["insertion"]);
    if(empty($input_insertion)){
        $insertion_err = "insetion.";     
    } else{
        $insertion = $input_insertion;
    }
    
  // Validate address
  $input_lastname = trim($_POST["lastname"]);
  if(empty($input_insertion)){
      $lastname_err = "lastname.";     
  } else{
      $lastname = $input_lastname;
  }

   // Validate address
   $input_school = trim($_POST["school"]);
   if(empty($input_school)){
       $school_err = "school.";     
   } else{
       $school = $input_school;
   }
    
    // Check input errors before inserting in database
    if(empty($name_err) && empty($insertion_err) && empty($lastname_err) && empty($school_err)){
        // Prepare an insert statement
        
        $sql = "INSERT INTO speler (callsign, insertion, lastname, schoolID) VALUES (?, ?, ?, ?)";
      
        if($stmt = mysqli_prepare($link, $sql)){
            
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssss", $param_name, $param_insertion, $param_lastname, $param_school);
            
            // Set parameters
            $param_name = $name;
            $param_insertion = $insertion;
            $param_lastname = $lastname;
            $param_school = $school;

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                $message = "Speler Toegevoegd";
            echo "<script type='text/javascript'>alert('$message');</script>";
            } else{
                echo $sql;
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Record</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
    </style>
</head>
<body style="background-color:#ff9623;">
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5">Nieuwe Speler</h2>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group">
                            <label>Voornaam</label>
                            <input type="text" name="name" class="form-control <?php echo (!empty($name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $name; ?>">
                            <span class="invalid-feedback"><?php echo $name_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Tussenvoegsels</label>
                            <input type="text" name="insertion" class="form-control <?php echo (!empty($insertion_err)) ? 'is-invalid' : ''; ?>"><?php echo $insertion; ?></input>
                            <span class="invalid-feedback"><?php echo $insertion_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Achternaam</label>
                            <input type="text" name="lastname" class="form-control <?php echo (!empty($lastname_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $lastname; ?>">
                            <span class="invalid-feedback"><?php echo $lastname_err;?></span>
                        </div>

                        <div class="form-group">
                            <label>School</label>
                            <input type="text" name="school" class="form-control <?php echo (!empty($school_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $school; ?>">
                            <span class="invalid-feedback"><?php echo $school_err;?></span>
                        </div>
                     
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="../?page=spelers" class="btn btn-secondary ml-2">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>