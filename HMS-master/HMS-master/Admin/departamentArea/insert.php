
<?php
include('db.php');
include('function.php');
include('Connection.php');

if(!empty($_POST["emri"])) {
	$query = "SELECT * FROM db_departament WHERE emri ='" . $_POST["emri"] . "'";
	$result = mysqli_query($con,$query);
	$count = mysqli_num_rows($result);
	if($count>0) {
	  echo "<span style='color:red'>Ky departament egziston tashmë. Provoni një emer tjetër .</span>";
    // "<script>if($('#action').val() == 'Modifiko'){</script>";
	  // echo "<script>$('#action').prop('disabled',true);</script>";
    //     "<script>}</script>";
	}

	else{echo "<script>$('#action').prop('disabled',false);</script>";}
}

if(isset($_POST["operation"]))
{
 if($_POST["operation"] == "Add")
{
    $image = '';
    if($_FILES["user_image"]["name"] != '')
    {
    $image = upload_image();
    }
    $statement = $connection->prepare("
    INSERT INTO db_departament(emri, info, image) 
    VALUES (:emri, :info, :image)
    ");
    $result = $statement->execute(
    array(
        ':emri' => $_POST["emri"],
        ':info' => $_POST["info"],
        ':image'  => $image
    )
    );
  if(!empty($result))
  {
    echo 'Shtimi u krye me sukses!';
  }
 }
 if($_POST["operation"] == "Edit")
 {
  echo '<script>alert("Welcome to Geeks for Geeks")</script>';
  $image = '';
  if($_FILES["user_image"]["name"] != '')
  {
   $image = upload_image();
  }
  else
  {
   $image = $_POST["hidden_user_image"];
  }
  $statement = $connection->prepare(
   "UPDATE db_departament
   SET emri = :emri, info = :info, image = :image  
   WHERE dep_id = :dep_id
   "
  );
  $result = $statement->execute(
   array(
    ':emri' => $_POST["emri"],
    ':info' => $_POST["info"],
    ':image'  => $image,
    ':dep_id'   => $_POST["dep_id"]
   )
  );
  if(!empty($result))
  {
   echo 'Modifikimi u krye me sukses!';
  }
 }
}

?>
   