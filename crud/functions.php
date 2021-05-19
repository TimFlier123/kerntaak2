<?php
function deletePlayer(){

    require_once "../config/crud.php";

    $sql = "DELETE FROM speler WHERE id = ?";
    
    if($stmt = mysqli_prepare($link, $sql)){

        mysqli_stmt_bind_param($stmt, "i", $param_id);
        $param_id = trim($_POST["id"]);
        
        if(mysqli_stmt_execute($stmt)){
            header("location: ../?page=spelers");
            exit();
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }

    }

    mysqli_stmt_close($stmt);
    mysqli_close($link);
}

function deleteSchool(){

     require_once "../config/crud.php";

     $sql = "DELETE FROM school WHERE id = ?";
     
     if($stmt = mysqli_prepare($link, $sql)){

         mysqli_stmt_bind_param($stmt, "i", $param_id);
         $param_id = trim($_POST["id"]);

         if(mysqli_stmt_execute($stmt)){
             header("location: ../?page=schools");
             exit();
         } else{
             echo "Oops! Something went wrong. Please try again later.";
         }
     }
      

     mysqli_stmt_close($stmt);
     mysqli_close($link);
}

function deleteTournament(){

    require_once "../config/crud.php";
  
    $sql = "DELETE FROM toernooi WHERE id = ?";
    
    if($stmt = mysqli_prepare($link, $sql)){

        mysqli_stmt_bind_param($stmt, "i", $param_id);
        $param_id = trim($_POST["id"]);
  
        if(mysqli_stmt_execute($stmt)){
            header("location: ../?page=toernooien");
            exit();
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }
    }

    mysqli_stmt_close($stmt);
    mysqli_close($link);
}

function editPlayer(){

    global $link;
    require_once "../config/crud.php";
      $id = $_POST["id"];
   

      $input_name = trim($_POST["name"]);
      if(empty($input_name)){
          $name_err = "Please enter a name.";
      } elseif(!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
          $name_err = "Please enter a valid name.";
      } else{
          $name = $input_name;
      }
      
      $input_insertion = trim($_POST["insertion"]);
      if(empty($input_insertion)){
          $insertion_err = "insetion.";     
      } else{
          $insertion = $input_insertion;
      }
      
      $input_lastname = trim($_POST["lastname"]);
      if(empty($input_insertion)){
          $lastname_err = "lastname.";     
      } else{
          $lastname = $input_lastname;
      }
  
     $input_school = trim($_POST["school"]);
     if(empty($input_school)){
         $school_err = "school.";     
     } else{
         $school = $input_school;
     }
      
      if(empty($name_err) && empty($insertion_err) && empty($lastname_err) && empty($school_err)){
          $sql = "UPDATE speler SET callsign=?, insertion=?, lastname=?, schoolID=? WHERE id=?";
           
          if($stmt = mysqli_prepare($link, $sql)){

              mysqli_stmt_bind_param($stmt, "sssss", $param_name, $param_insertion, $param_lastname, $param_school, $param_id,);
               $param_name = $name;
               $param_insertion = $insertion;
               $param_lastname = $lastname;
               $param_school = $school;
               $param_id = $id;
              
              if(mysqli_stmt_execute($stmt)){
                  header("location: ../?page=spelers");
                  exit();
              } else{
                  echo "Oops! Something went wrong. Please try again later.";
              }
          }
          mysqli_stmt_close($stmt);
      }
      mysqli_close($link);
}

function editSchool(){
     global $link;
     $id = $_POST["id"];
   
     $input_name = trim($_POST["name"]);
     if(empty($input_name)){
         $name_err = "Please enter a name.";
     } elseif(!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
         $name_err = "Please enter a valid name.";
     } else{
         $name = $input_name;
     }
     
     if(empty($name_err) && empty($insertion_err) && empty($lastname_err) && empty($school_err)){
         $sql = "UPDATE school SET name=? WHERE id=?";
          
         if($stmt = mysqli_prepare($link, $sql)){
             mysqli_stmt_bind_param($stmt, "ss", $param_name, $param_id,);
              $param_name = $name;
              $param_id = $id;
     
             if(mysqli_stmt_execute($stmt)){
                 header("location: ../?page=schools");
                 exit();
             } else{
                 echo "Oops! Something went wrong. Please try again later.";
             }
         }
         mysqli_stmt_close($stmt);
     }

     mysqli_close($link);
}

function selectFromPlayers(){
    
}
function giveError(){
    if (empty(trim($_GET["id"]))) {
        header("location: error.php");
        exit();
    }
}
