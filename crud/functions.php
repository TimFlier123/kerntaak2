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

function giveError(){
    if (empty(trim($_GET["id"]))) {
        header("location: error.php");
        exit();
    }
}
