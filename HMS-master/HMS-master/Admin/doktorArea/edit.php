<?php
include('db.php');


if(isset($_POST['submit']))
{
	$id = $_GET['id'];
	$emri = $_POST['emri'];
	$mbiemri = $_POST['mbiemri'];
	$username = $_POST['username'];
	$nr_telit = $_POST['nr_telit'];
	$email = $_POST['email'];
	$datelindja = $_POST['datelindja'];
	$gjinia  = $_POST['gjinia'];
	$roleId  = 1;
	$specializimi  = $_POST['specializimi'];
	$status  = $_POST['status'];



	$msg = "";
	$image = $_FILES['image']['name'];
	$target = "image/".basename($image);

	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
  		$msg = "Fotoja u ngarkua me sukses!";
  	}else{
  		$msg = "Deshtim ne ngarkimin e fotos!";
  	}

	$update = "UPDATE users SET emri = '$emri', mbiemri = '$mbiemri', 
	username = '$username', nr_telit = '$nr_telit',
	email = '$email',datelindja = '$datelindja',
	gjinia ='$gjinia' WHERE id= '$id'"; 
	$run_update = mysqli_query($con,$update);

	if($run_update){
		$edit=" UPDATE users_doc_spec SET  specializimi = '$specializimi', status ='$status', image = '$image' WHERE id= '$id' ";
	 $query=mysqli_query($con, $edit);
		header('location:index.php');
	}else{
		echo "Te dhenat nuk u ndryshuan!!";
	}
}

