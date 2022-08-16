  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php

include('db.php');

include("function.php");

if(isset($_POST["dep_id"]))
{
 $image = get_image_name($_POST["dep_id"]);
 if($image != '')
 {
  unlink("upload/" . $image);
 }
 $statement = $connection->prepare(
  "DELETE FROM db_departament WHERE dep_id = :dep_id"
  // "DELETE FROM users WHERE dep_id = :dep_id" ;
 );
 
//  $statement = $connection->prepare(
//   "DELETE FROM users_doc_spec WHERE id IN (SELECT id FROM users WHERE dep_id = :dep_id)"
//  );
 $result = $statement->execute(
  array(
   ':dep_id' => $_POST["dep_id"]
  )
 );
 
 if(isset($_POST["id"])){
     $statement = $connection->prepare(
  "DELETE FROM users_doc_spec WHERE id IN (SELECT id FROM users WHERE id = :id)"
 );
 $result = $statement->execute(
  array(
   ':id' => $_POST["id"]
  )
 );
    }
}

?>

