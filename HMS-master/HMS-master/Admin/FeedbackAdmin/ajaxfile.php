<?php 
include "config.php";

if(isset($_POST['id'])){
   $id=  $_POST['id'];

   $sql = "UPDATE poll SET post='1' WHERE id=".$id;
   mysqli_query($con,$sql);
   echo 1;
   exit;
}
echo 0;
exit;