<?php 

$conn= new mysqli("localhost","root","","hospital_database");
session_start();

$emri = $_POST["emri"];
$mbiemri = $_POST["mbiemri"];
$username = $_POST["username"];
$nr_telit = $_POST["nr_telit"];
$email = $_POST["email"];
$datelindja = $_POST["datelindja"];
$gjinia = $_POST["gjinia"];
$specializimi=$_POST['specializimi'];


$image = $_FILES['image']['name'];
$target = "http://localhost/hms-project/HMS-master/HMS-master/Admin/DoktorArea/image/" . basename($image);

if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
  $msg = "Fotoja u ngarkua me sukses!";
} else {
  $msg = "Deshtim ne insertimin e fotos";
}

  
$conn =new mysqli("localhost","root","","hospital_database");


	$val= $_SESSION["username"];
  $valId=$_SESSION["doktorProfilId"];
  
  $sql="SELECT d.id, d.username, r.image, d.emri,d.mbiemri,d.nr_telit,d.email,d.datelindja,d.gjinia,r.specializimi,r.status, s.emri as emerDep FROM users d 
  JOIN users_doc_spec r ON d.id=r.id 
  JOIN db_departament s  ON r.dep_id=s.dep_id
  WHERE d.username = '$val' ";

	$result=$conn->query($sql);

  if($result)
  {
  

$sql="UPDATE users SET emri = '$emri', mbiemri = '$mbiemri', username = '$username', nr_telit ='$nr_telit', email = '$email', datelindja = '$datelindja' , gjinia = '$gjinia' WHERE username = '$username'";

  $result=$conn->query($sql);
  if($result)
  {
    $edit="UPDATE users_doc_spec SET  specializimi ='$specializimi',image='$image' WHERE id='$valId' ";
$query=mysqli_query($conn, $edit);
if($query)
{
  	header('location:indexDoctor.php');
  }
  else{
      echo "Editimi i Profilit deshtoi!";
  }
}
}
