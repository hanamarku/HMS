<?php 
$conn= new mysqli("localhost","root","","hospital_database");
$emri = $_POST["emri"];
$mbiemri = $_POST["mbiemri"];
$username = $_POST["username"];
$nr_telit = $_POST["nr_telit"];
$email = $_POST["email"];
$datelindja = $_POST["datelindja"];
$gjinia = $_POST["gjinia"];

  $sql="UPDATE users SET emri = '$emri', mbiemri = '$mbiemri', username = '$username', nr_telit = '$nr_telit', email = '$email', datelindja = '$datelindja' , gjinia = '$gjinia' WHERE username = '$username'";

  $result=$conn->query($sql);
  if($result)
  {
  	header('location:indexPatient.php');
  }
  else{
      echo "Editimi i Profilit deshtoi!";
  }
?>