<?php  
require 'config.php';
session_start();


$feedback = $_POST['feedback'];
$suggestions = $_POST['suggestions'];
$aprovoj=$_POST['aprovoj'];


					$conn = new mysqli("localhost", "root", "", "hospital_database");

					$val = $_SESSION["username"];
$queryId = "SELECT id FROM users  WHERE username = '$val'";
$queryId_run = mysqli_query($conn, $queryId);
        while($row = mysqli_fetch_array($queryId_run)){
            
                $id = $row['id'];
				$_SESSION['doktorProfilId']=$id;
		}
    $valId=$_SESSION['doktorProfilId'];

  $query = mysqli_query($con, "INSERT INTO `poll`(`id`, `id_pacient`, `username`,`feedback`, `suggestions`,`aprovoj`,`post`) VALUES ('','$valId','$val','$feedback','$suggestions','$aprovoj','')");
 if( $query ){

  $_SESSION['succes']="Te dhenat tuaja u kryen me sukses.";
 header('location:index.php');
  }


?>
