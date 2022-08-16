<!DOCTYPE html>

<body>

<?php include "headerPatient.php"; ?>
  <main id="main" class="main">
    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="http://localhost/hms-project/HMS-master/HMS-master/index.php">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div>



	<!-- <div class="container-fluid">
	<div class="container"> -->
	<section class="section dashboard">
    <div class="col d-flex justify-content-center">
    <div class="card" style="width: 40rem;text-align:center;">
      <img class="card-img-top center" src="images\profilepic.png" style="width:80px;height:80px;margin-left:44%;" alt="Card image cap">
        <div class="card-body">
          <p class="card-text" style="color: red;font-size:30px">Mirësevini <?php echo strtoupper($_SESSION['emri_rol']) ?>! </p>
	
		<table class="table  " style="animation-delay: .5s; margin-top: 10px; ">
	<thead>
<?php

$conn =new mysqli("localhost","root","","hospital_database");


	$val= $_SESSION["username"];
     
	$sql="SELECT * FROM users WHERE username='$val'";

	$result=$conn->query($sql);
   
	if($result)
	{
		while($row=$result->fetch_assoc())
		{
			?><form action="editProfil.php" method="post">
		<tr>
			<td><label style="color:blue; font:bolder">Username</label></td><td><?php echo $_SESSION["username"];?></td></tr><tr>
			<td><label style="color:blue; font:bolder">Emri</label></td><td><?= $row['emri']?></td></tr><tr>
			<td><label style="color:blue; font:bolder">Mbiemri</label></td><td><?= $row['mbiemri']?></td></tr><tr>
			<td><label style="color:blue; font:bolder">Numri i celularit</label></td><td><?= $row['nr_telit']?></td></tr><tr>
			<td><label style="color:blue; font:bolder">Email</label></td><td><?= $row['email']?></td></tr><tr><tr>
			<td><label style="color:blue; font:bolder">Datelindja</label></td><td><?= $newDate = date("d-m-Y", strtotime($row['datelindja'])); ?></td></tr><tr>
			<td><label style="color:blue; font:bolder">Gjinia</label></td><td><?= $row['gjinia']?></td></tr><tr>	
		</tr>
<?php
		}
	}


?>
</table>
</div></div>
</div>
    </div>
    </div>
    </section>



  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


  <script src="assets/js/main.js"></script>

</body>

</html>