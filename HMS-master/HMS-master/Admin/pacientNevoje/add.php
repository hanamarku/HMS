<?php
include('db.php');

if (!empty($_POST["image"])) {
    $allowed = array('png', 'PNG', 'jpg', 'jpeg');
	$image = $_POST['image'];
	$ext = pathinfo($image, PATHINFO_EXTENSION);
	if (!in_array($ext, $allowed)) {
		echo "<span style='color:red'>Formati i fotos nuk pranohet</span>";
		echo "<script>$('#submit1').prop('disabled',true);</script>";
	}
	else{echo "<script>$('#submit1').prop('disabled',false);</script>";}

}

if(isset($_POST['submit1'])){

	$roleId  = 1;
	$nr_llogarise_bankare = $_POST['nr_llogarise_bankare'];
	$pershkrimi = $_POST['pershkrimi'];
	$id = $_POST['pac_list'];


	
	// upload i imazhit 


	$msg = "";
	$image = $_FILES['image']['name'];
	$target = "images/".basename($image);

	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
  		$msg = "Fotoja u ngarkua me sukses!";
  	}else{
  		$msg = "Deshtim ne insertimin e fotos";
  	}
	  
  	$insert_data = "INSERT INTO pacient_ne_nevoje(id,nr_llogarise_bankare,pershkrimi,image) 
	  VALUES('$id','$nr_llogarise_bankare','$pershkrimi','$image')";
	  $run_data=mysqli_query($con, $insert_data);
	 
	  if($run_data ){ 
	 header('location:index.php');
}
else{
	// echo '<script>alert("Thank You..! Your Feedback is Valuable to Us"); location.replace(document.referrer);</script>';

	header('location:http://localhost/hms-project/HMS-master/HMS-master/Admin/pacientNevoje/index.php');

}
}

?>

