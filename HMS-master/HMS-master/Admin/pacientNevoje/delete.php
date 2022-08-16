<?php
include('db.php');
$id = $_GET['id'];
$delete = "DELETE  FROM pacient_ne_nevoje 
WHERE id= '$id' ";
$run_data = mysqli_query($con,$delete);
if($run_data){
	echo "Bravo Eva";
	header('location:index.php');
}else{
	echo "Do not Delete";
}
?>