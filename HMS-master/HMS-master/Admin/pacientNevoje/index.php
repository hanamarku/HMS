<?php
include('db.php');
$error_username = $error_fjalekalimi = $error_konfirmo_fjalekalimin = $rregj_sukses = "";
?>
<!DOCTYPE html>
<html>

<head>
	<title>Crud</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<script scr="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css"></script>
	<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
	<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
	<!-- CSS only -->

	<style>
		* {
			font-size: 10px;
		}

		th {
			font-size: 10px;
		}
	</style>



</head>

<body>
	<?php include "../headerAdmin.php"; ?>
	<main id="main" class="main">
		<div class="pagetitle">
			<nav>
				<ol class="breadcrumb"  >
					<li class="breadcrumb-item"><a href="../../index.php">Home</a></li>
					<li class="breadcrumb-item active"><a href="../indexAdmin.php">Dashboard</a></li>
					<li class="breadcrumb-item active">Pacient ne nevoje</li>
				</ol>
			</nav>
		</div>
		<section class="section dashboard">
			<div class="container jumbotron">
				<h1 class="text-center text-primary "> 
					Modifikimi i te dhenave te Pacienteve ne nevoje
					
	
	</h1>
					<span style="margin-left: 500px; font-size:x-large ">
						<a href="#"><button button class='add btn btn-success'  data-bs-toggle="modal" data-bs-target="#myModal">Shtoni Pacient </button></a>
					</span>



				<table id="pacient" class="table  table-bordered  table-striped table-hover">
				
					<thead>
						<tr>
							<th class="text-center"width="8%">Emri</th>
							<th class="text-center"width="8%">Mbiemri</th>
							<th class="text-center"width="5%">Mosha</th>
							<th class="text-center"width="10%">Nr llogaris bankare</th>
							<th class="text-center"width="35%">Informacion</th> 
							<th class="text-center"width="10%">Imazh</th>
							<th class="text-center"width="10%">Edit</th>
							<th class="text-center"width="10%">Delete</th>
						</tr>
					</thead>
					<tbody>


	
						<?php

						$get_data = ("SELECT  p.*, u.id, u.emri, u.mbiemri, TIMESTAMPDIFF(YEAR, datelindja, CURDATE()) AS age
					FROM users u , pacient_ne_nevoje p
					WHERE u.id = p.id");
						$run_data = mysqli_query($con, $get_data);

						while ($row = mysqli_fetch_array($run_data)) {
							$id = $row['id'];
							$emri = $row['emri'];
							$mbiemri = $row['mbiemri'];
							$datelindja = $row['age'];
							$nr_llogarise_bankare = $row['nr_llogarise_bankare'];
							$pershkrimi = $row['pershkrimi'];
							$image = $row['image'];

							echo "

        		<tr>
				<td class='text-center'>$emri</td>
				<td class='text-center'>$mbiemri</td>
				<td class='text-center'>$datelindja</td>
				<td class='text-center'>$nr_llogarise_bankare</td>				
				<td class='text-center'>$pershkrimi</td>
				<td class='text-center'><img src='images/$image' style='width:50px; height:50px;'></td>
				<td class='text-center'>
					<span>
					     <a href='#'>
					         <button class='edit btn btn-warning' data-bs-toggle='modal' data-bs-target='#edit$id' style='' aria-hidden='true'>Modifiko</button>
					    </a>
					</span>
					
				</td>
				<td class='text-center'>
					<span>
						<a href='#'>
						     <button class='delete btn btn-danger' data-bs-toggle='modal' data-bs-target='#delete$id' style='' aria-hidden='true'>Fshij</button>
						</a>
					</span>
					
				</td>
			</tr>


        		";
						}

						?>


					</tbody>
				</table>
				<script type="text/javascript">
					$(document).ready(function() {
						$('#pacient').DataTable();

					});
				</script>
			</div>
<!-- Fshirja -->
			<?php
			$get_data =  ("SELECT  p.*, u.id, u.emri, u.mbiemri, TIMESTAMPDIFF(YEAR, datelindja, CURDATE()) AS age
			FROM users u , pacient_ne_nevoje p
			WHERE u.id = p.id");
			$run_data = mysqli_query($con, $get_data);

			while ($row = mysqli_fetch_array($run_data)) {
				$id = $row['id'];
				$emri = $row['emri'];
				$mbiemri = $row['mbiemri'];
				echo "
			<div id='delete$id' class='modal fade' role='dialog'>
			<div class='modal-dialog' >
				<div class='modal-content'>
				<div class='modal-header'>
					<h4 class='modal-title text-center'>A jeni i sigurte qe deshironi ta fshini  $emri $mbiemri ?</h4>
				</div>
				<div class='modal-body'>
					<a href='delete.php?id=$id' class='btn btn-danger' style='margin-left:185px'>Po</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<button type='button' class='btn btn-warning' data-bs-dismiss='modal'>Jo</button>
				</div>
				<div class='modal-footer'>
					
				</div>
				
				</div>

			</div>
			</div>
			";
			}


			?>


			<!---shtimi---->
			<div class="container">
				<div id="myModal" class="modal fade" role="dialog">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<h4 class="modal-title text-center">Shto Pacient</h4>
							</div>
							<div class="modal-body">
								<form id="add_form" action="add.php" method="POST" enctype="multipart/form-data">
									<div class="row">
										<div class="col">
											<div class="form-group">
												
											</div>
											<div class="form-group">
											<label class="form-label" for="nr_llogarise_bankare">Nr llogaris bankare</label>
												<input type="text" name="nr_llogarise_bankare" id="nr_llogarise_bankare" required class="form-control" placeholder="eg: XXXX-XXXX-XX-XXXXXXXXXX (4+4+2+10)" required oninvalid="this.setCustomValidity('Ju lutem plotësoni numrin e llogaris bankare  !')" oninput="this.setCustomValidity('')">
												</label><span class="error" id='message7'></span></span>
											</div>
											<div class="form-group">
											
											
											<div class="form-group">
												<label class="form-label" for="pershkrimi">Informacion</label>
												<textarea tyle="text" rows="4" cols="50" name="pershkrimi" id="pershkrimi" required class="form-control" placeholder="Pershkrimi"></textarea>
											</div>
											<div class="form-group">
											<?php


													$sql = "SELECT * FROM users WHERE id NOT IN( SELECT id FROM pacient_ne_nevoje) AND roleId=0 ORDER BY emri";
													$all_patient_names = mysqli_query($con, $sql);
													?>
													<label class="form-label" for="pac_list">Emri Pacientit</label>
													<select name="pac_list" id="pac_list" class="form-select " aria-label="Default select example " required style="padding:5px;" required>
														<?php
														while ($pac_list = mysqli_fetch_array(
															$all_patient_names,
															MYSQLI_ASSOC
														)) :;
														?>
															<option style="font-size:13px;" value="<?php echo $pac_list["id"]; ?>">
																<?php echo $pac_list["emri"]; ?>
																<?php echo $pac_list["mbiemri"]; ?>
																<p><?php echo  $pac_list["username"]; ?>
															</option>
														<?php
														endwhile;
														?>
													</select>
													</label><span class="error" id='check-id'></span></span>

													
											</div>
										</div>
										<div class="col">
											<div class="form-group">
												
											</div>
											    <div class="form-group">
													
											    </div>
												
												<div class="form-group">
													<label class="form-label" for="image">Image</label>
													<input type="file" accept='image/*' required name="image" id="image" class="form-control" onInput="imageValid()">
													<span id="check-image"></span>
												</div>
										    
										</div>
									</div>
									<br>
									<div class="row">
										
										<div class="d-flex justify-content-center">
											<input type="submit" name="submit1" id="submit1" class="btn btn-success btn-lg " value="Shto">
										</div>
										
										<div class="modal-footer">
											<button type="button" class="btn btn-danger btn-lg" data-bs-dismiss="modal">Mbyll</button>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>

			
			
			<script type="text/javascript">
				$(function() {
					
					$("#message7").hide();
					var message_nr_lloaris = false;

					$("#nr_llogarise_bankare").keyup(function() {
						checkNrLLogarisBankare();
					});

				

					function checkNrLLogarisBankare() {
						var llogaria = $("#nr_llogarise_bankare").val().trim();

						if (llogaria === '') {
							$("#message7").html("Numri i celularit nuk mund te jete bosh !").css('color', '#890F0D');
							$("#message7").show();
							$("#nr_llogarise_bankare").css("border", "2px solid #F90A0A");
							message_nr_lloaris  = true;
						} else {
							$("#message7").hide();
							$("#nr_llogarise_bankare").css("border", "2px solid #34F458");
						}
					}

					

					$("#add_form").submit(function() {
						// $('#submit').prop('disabled',false);
					
						message_nr_lloaris  = false;
					
						checkNrLLogarisBankare();
	
						if (  message_nr_lloaris === false) {
							swal({
                        title: "Llogaria u krijua me sukses !",
                        text: "DOKTOR",
                        icon: "success",
                        buttons: false,
                        timer: 8000,
                          });
								return true;
							}else{
								swal("Kujdes!", "Plotesoni te gjitha fushat sic duhet !", "warning");
               					return false;
						}
					});

				});
			</script>
<!-- Modifikimi -->
			<?php
			$get_data =  ("SELECT  p.*, u.id, u.emri, u.mbiemri, TIMESTAMPDIFF(YEAR, datelindja, CURDATE()) AS age
			FROM users u , pacient_ne_nevoje p
			WHERE u.id = p.id");
			$run_data = mysqli_query($con, $get_data);

			while ($row = mysqli_fetch_array($run_data)) {
				$id = $row['id'];
				$nr_llogarise_bankare = $row['nr_llogarise_bankare'];
							$pershkrimi = $row['pershkrimi'];
							$image = $row['image'];
				echo "
				
<div id='edit$id' class='modal fade' role='dialog'>
    <div class='container'>
	    <div class='modal-dialog'>
			<div class='modal-content'>
					<div class='modal-header'>
							<h4 class='modal-title text-center'>Modifiko Doktor</h4> 
					</div>
					<div class='modal-body'>
						<form action='edit.php?id=$id' method='post' id='edit_form' enctype='multipart/form-data'>
							<div class='row'>
								<div class='col'>
								    <div class='col-sm'>
										<label>Numri i llogarise bankare</label>
										<input type='text' name='nr_llogarise_bankare' class='form-control' value='$nr_llogarise_bankare'>
									</div>
									<div class='col-sm'>
									    <label class='form-label' for='pershkrimi'>Pershkrimi</label>
									    <textarea tyle='text' rows='4' cols='50' name='pershkrimi' id='pershkrimi' class='form-control' placeholder='Pershkrimi' value=''>$pershkrimi</textarea>
									</div>	
								</div>
							</div>
							<div class='row'>
								<div class='col'>
								    <div class='col-sm'>	
									    <label>Image</label>
									    <input type='file' name='image' class='form-control' onInput='imageValidEdit()'>
									    <img src = 'images/$image' style='width:50px; height:50px'>
									    <span id='check-imageEdit'></span>
								    </div>
							    </div>
							    <br>
							    <div class='d-flex justify-content-center'>
							        <input type='submit' name='submit2' id='submit2' class='btn btn-success btn-lg' value='Modifiko'>
							    </div>
							    <div class='modal-footer'>
										<button type='button' class='btn btn-danger btn-lg' data-bs-dismiss='modal'>Mbyll</button>
							    </div>
						    </div>
					    </form>
				    </div>
			    </div>
		    </div>
        </div>
    </div>
</div>

";

	
			}
			?>
			<script type="text/javascript" src="http://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

		
			<script type="text/javascript">
				$(function() {
					$("#message10").hide();
					$("#message11").hide();
					$("#message12").hide();
					$("#message13").hide();

					var message_emri = false;
					var message_mbiemri = false;
					var message_tel = false;
					var message_dt = false;

					$("#emri1").keyup(function() {
						checkName();
					});

					$("#mbiemri1").keyup(function() {
						checkLastName();
					});

					$("#nr_telit1").keyup(function() {
						checkPhoneNumber();
					});

					$("#birthday1").keyup(function() {
						checkAge();
					});

					function checkName() {
						var pattern = /^[a-zA-Z]*$/;
						var emri = $("#emri1").val().trim();
						if (emri === '') {
							$("#message10").html("Emri nuk duhet te jete bosh !").css('color', '#890F0D');
							$("#message10").show();
							$("#emri1").css("border", "2px solid #F90A0A");
							message_emri = true;
						} else if (!pattern.test(emri)) {
							$("#message10").html("Emri duhet te permbaje vetem karaktere-shkronja !").css('color', '#890F0D');
							$("#message10").show();
							$("#emri1").css("border", "2px solid #F90A0A");
							message_emri = true;
						} else {
							$("#message10").hide();
							$("#emri1").css("border", "2px solid #34F458");

						}
					}

					function checkLastName() {
						var pattern = /^[a-zA-Z]*$/;
						var mbiemri = $("#mbiemri1").val().trim();
						if (mbiemri === '') {
							$("#message11").html("Mbiemri nuk duhet te jete bosh !").css('color', '#890F0D');
							$("#message11").show();
							$("#mbiemri1").css("border", "2px solid #F90A0A");
							message_mbiemri = true;
						} else if (!pattern.test(mbiemri)) {
							$("#message11").html("Mbiemri duhet te permbaje vetem karaktere-shkronja !").css('color', '#890F0D');
							$("#message11").show();
							$("#mbiemri1").css("border", "2px solid #F90A0A");
							message_mbiemri = true;
						} else {
							$("#message11").hide();
							$("#mbiemri1").css("border", "2px solid #34F458");

						}
					}


					function checkAge() {
						var today = new Date();
						var userBirthDate = new Date($("#datelindja1").val());
						if (userBirthDate >= today) {
							$("#message13").html("Kujdes! Datelindja duhet te jete me e vogel/barabarte se data aktuale").css('color', '#890F0D');
							$("#message13").show();
							$("#datelindja1").css("border", "2px solid #F90A0A");
							message_tel = true;
						} else {
							$("#message13").hide();
							$("#datelindja1").css("border", "2px solid #34F458");
						}
					}

					$("#edit_form").submit(function() {
						message_emri = false;
						message_mbiemri = false;
						message_tel = false;
						message_dt = false;

						checkName();
						checkLastName();
						checkPhoneNumber();
						checkAge();

						if (message_emri === false && message_mbiemri === false && message_tel === false && message_dt === false) {
							swal({
								title: "Modifikimi u krye me sukses !",
								text: " ",
								icon: "success",
								buttons: false,
								timer: 1000,
							});
								return true;
							}else{
								swal("Kujdes!", "Plotesoni te gjitha fushat sic duhet !", "warning");
               					return false;
						}
					});

				});

			</script>



<script>
function imageValid() {	
	jQuery.ajax({
	url: "add.php",
	data:'image='+$("#image").val(),
	type: "POST",
	success:function(data){
		$("#check-image").html(data);
	},
	error:function (){}
	});
}
function idValid() {	
	jQuery.ajax({
	url: "add.php",
	data:'pac_list='+$("#pac_list").val(),
	type: "POST",
	success:function(data){
		$("#check-id").html(data);
	},
	error:function (){}
	});
}
function imageValidEdit() {	
	jQuery.ajax({
	url: "edit.php",
	data:'image='+$("#image").val(),
	type: "POST",
	success:function(data){
		$("#check-imageEdit").html(data);
	},
	error:function (){}
	});
}
</script>
</section>

</main>
</body>

<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> -->


<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->

<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->


</html>