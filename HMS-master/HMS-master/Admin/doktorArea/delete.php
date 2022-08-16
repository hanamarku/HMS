<?php
include('db.php');

$id = $_GET['id'];

$tables = array("users_doc_spec","users");
foreach($tables as $table) {
  $query = "DELETE FROM $table WHERE id='$id'";
  mysqli_query($con,$query);
}
		header('location:index.php');
?>