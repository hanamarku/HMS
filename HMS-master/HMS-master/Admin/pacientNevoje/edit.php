<?php
include('db.php');
// $id = $_GET['id'];


// $allowed = array('gif', 'PNG', 'jpg');
// $image = $_POST['image'];
// $ext = pathinfo($image, PATHINFO_EXTENSION);
// if (!in_array($ext, $allowed)) {
// 	echo "<span style='color:red'>Formati i fotos nuk pranohet</span>";
// 	echo "<script>$('#submit2').prop('disabled',true);</script>";
// }
// else{echo "<script>$('#submit2').prop('disabled',false);</script>";}

if(isset($_POST['submit2']))
{
	$nr_llogarise_bankare = $_POST['nr_llogarise_bankare'];
	$pershkrimi = $_POST['pershkrimi'];
	$id = $_POST['id'];

	
	$msg = "";
	$image = $_FILES['image']['name'];
	$target = "images/".basename($image);

	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
  		$msg = "Fotoja u ngarkua me sukses!";
  	}else{
  		$msg = "Deshtim ne ngarkimin e fotos!";
  	}

	$update = "UPDATE pacient_ne_nevoje SET nr_llogarise_bankare = '$nr_llogarise_bankare', pershkrimi = '$pershkrimi', image = '$image'
	 WHERE id = '$id' "; 
	$run_update = mysqli_query($con,$update);

	if($run_update){
		header('location:index.php');
	}else{
		echo "Te dhenat nuk u ndryshuan!!";
	}
}


?>