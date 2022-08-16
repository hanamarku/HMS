<!DOCTYPE html>

<body>

<?php include "headerDoktor.php"; ?>
  <main id="main" class="main">
    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div>



	<!-- <div class="container-fluid">
	<div class="container"> -->

<?php

$conn =new mysqli("localhost","root","","hospital_database");


	$val= $_SESSION["username"];
  
     
	// $sql="SELECT * FROM users WHERE username='$val'";
  $sql="SELECT d.username, r.image, d.emri,d.mbiemri,d.nr_telit,d.email,d.datelindja,d.gjinia,r.specializimi,r.status, s.emri as emerDep FROM users d 
  JOIN users_doc_spec r ON d.id=r.id 
  JOIN db_departament s  ON r.dep_id=s.dep_id
  WHERE d.username = '$val' ";

	$result=$conn->query($sql);
	if($result)
	{
		while($row=$result->fetch_assoc())
		{
			?>
      	<section class="section dashboard">
    <div class="justify-content-center">
    <div class="card" style="width: 40rem;text-align:center;">
      <img src="http://localhost/hms-project/HMS-master/HMS-master/Admin/DoktorArea/image/<?php echo $row["image"]; ?>" class="card-img-top center" style="width:100px;height:100px;margin-left:44%;">
        <div class="card-body">
          <p class="card-text" style="color: red;font-size:30px">Mirësevini <?php echo strtoupper($_SESSION['emri_rol']) ?>! </p>
	
		<table class="table " style="animation-delay: .5s; margin-top: 10px; ">
	<thead>
      <form action="editProfil.php" method="post">
		<tr>
			<td><label style="color:blue; font:bolder">Username</label></td><td><?php echo $_SESSION["username"];?></td></tr><tr>
			<td><label style="color:blue; font:bolder">Emri</label></td><td><?= $row['emri']?></td></tr><tr>
			<td><label style="color:blue; font:bolder">Mbiemri</label></td><td><?= $row['mbiemri']?></td></tr><tr>
			<td><label style="color:blue; font:bolder">Numri i celularit</label></td><td><?= $row['nr_telit']?></td></tr><tr>
			<td><label style="color:blue; font:bolder">Email</label></td><td><?= $row['email']?></td></tr><tr><tr>
			<td><label style="color:blue; font:bolder">Datelindja</label></td><td><?= $newDate = date("d-m-Y", strtotime($row['datelindja'])); ?></td></tr><tr>
			<td><label style="color:blue; font:bolder">Gjinia</label></td><td><?= $row['gjinia']?></td></tr><tr>	
      <td><label style="color:blue; font:bolder">Specializimi</label></td><td><?= $row['specializimi']?></td></tr><tr>
      <td><label style="color:blue; font:bolder">Status</label></td><td><?= $row['status']?></td></tr><tr>		
      <td><label style="color:blue; font:bolder">Departamenti</label></td><td><?= $row['emerDep']?></td></tr><tr>	
		</tr>
<?php
		}
	}


?>
</table>
</div>
</div>
</div>
    </div>
    </div>

    </main>
  


  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>