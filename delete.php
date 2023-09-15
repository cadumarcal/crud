<?php

include 'connect.php';

if(isset($_GET['deletenome'])){
     $nome = $_GET['deletenome'];
     // Evitando consulta sql injection
     $sql = "DELETE FROM `users` WHERE nome = ?";
     $stmt = mysqli_prepare($con, $sql);
     if($stmt){
          mysqli_stmt_bind_param($stmt, "s", $nome);
          if(mysqli_stmt_execute($stmt)){
               header('location:display.php');
          } else{
               die(mysqli_error($con));
          }
          mysqli_stmt_close($stmt);
     } else {
          die(mysqli_error($con));
     }
}

?>
