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

<script>

window.setTimeout(function () {
    $(".alert").fadeTo(700, 0).slideUp(700, function () {
        $(this).remove();
    });
}, 3000);

</script>


</head>

<body>
	<?php include "../headerAdmin.php"; ?>
	<?php $_SESSION['test'] = 'teeeest'?>
	<main id="main" class="main">
		<div class="pagetitle">
			<nav>
				<ol class="breadcrumb"  >
					<li class="breadcrumb-item"><a href="../../index.php">Home</a></li>
					<li class="breadcrumb-item active"><a href="../indexAdmin.php">Dashboard</a></li>
					<li class="breadcrumb-item active">Doktoret</li>
				</ol>
			</nav>
		</div>
		<section class="section dashboard">
			<div class="container jumbotron">
				<h1 class="text-center text-primary "> Modifikimi i te dhenave te doktorit	</h1>
					<?php
                        if(isset($_SESSION['status_doctor'])){
                            ?>
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <h5 class="msg"><?= $_SESSION['status_doctor']; ?></h5>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>

                            <?php
                            unset($_SESSION['status_doctor']);
                        }
                	?>
					<span style="margin-left: 500px; font-size:x-large ">
						<a href="#"><button button class='add btn btn-success'  data-bs-toggle="modal" data-bs-target="#myModal">Shtoni Doktor </button></a>
					</span>



				<table id="doctor" class="table  table-bordered  table-striped table-hover">
				
					<thead>
						<tr>
							<th class="text-center">Emri</th>
							<th class="text-center">Mbiemri</th>
							<th class="text-center">Username</th>
							<th class="text-center">Nr_tel</th>
							<th class="text-center">Email</th>
							<th class="text-center">Mosha</th>
							<th class="text-center">Gjinia</th>
							<th class="text-center">Specializimi</th>
							<th class="text-center">Status</th>
							<th class="text-center">Departamenti</th>
							<th class="text-center">Imazh</th>
							<th class="text-center">Edit</th>
							<th class="text-center">Delete</th>
						</tr>
					</thead>

					<tbody>
					<?php
					$query = '';
					$query .= "SELECT * FROM users , users_doc_spec";
					if(isset($_POST["search"]["value"]))
					{
						$query .= 'WHERE emri LIKE "%'.$_POST["search"]["value"].'%" ';
						$query .= 'OR mbiemri LIKE "%'.$_POST["search"]["value"].'%" ';
						$query .= 'OR username LIKE "%'.$_POST["search"]["value"].'%" ';
						$query .= 'OR Email LIKE "%'.$_POST["search"]["value"].'%" ';
						$query .= 'OR nr_telit LIKE "%'.$_POST["search"]["value"].'%" ';
						$query .= 'OR mosha LIKE "%'.$_POST["search"]["value"].'%" ';
						$query .= 'OR specializimi LIKE "%'.$_POST["search"]["value"].'%" ';
						$query .= 'OR departamenti LIKE "%'.$_POST["search"]["value"].'%" ';
					}


					?>


						<?php
						$get_data = ("SELECT u.emri,u.verify_status, u.mbiemri, u.username, u.nr_telit, u.email, TIMESTAMPDIFF(YEAR, datelindja, CURDATE()) AS age, u.fjalekalimi, u.gjinia , d.* , dep.emri as dep_name
					FROM users u , users_doc_spec d, db_departament dep
					WHERE u.id=d.id AND d.dep_id=dep.dep_id AND u.verify_status=1");
						$run_data = mysqli_query($con, $get_data);

						while ($row = mysqli_fetch_array($run_data)) {
							$id = $row['id'];
							$emri = $row['emri'];
							$mbiemri = $row['mbiemri'];
							$username = $row['username'];
							$nr_telit = $row['nr_telit'];
							$email = $row['email'];
							$datelindja = $row['age'];
							$fjalekalimi = $row['fjalekalimi'];
							$gjinia = $row['gjinia'];
							$roleId = 1;
							$specializimi = $row['specializimi'];
							$status = $row['status'];
							$dep_id = $row['dep_name'];
							$image = $row['image'];
							echo "

        		<tr>
		
				<td class='text-center'>$emri</td>
				<td class='text-center'>$mbiemri</td>
				<td class='text-center'>$username </td>
				<td class='text-center'>$nr_telit</td>
				<td class='text-center'>$email</td>
				<td class='text-center'>$datelindja</td>
				<td class='text-center'>$gjinia </td>				
				<td class='text-center'>$specializimi </td>
				<td class='text-center'>$status</td>
				<td class='text-center'>$dep_id </td>
				<td class='text-center'><img src='image/$image' style='width:50px; height:50px;'></td>
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
						$('#doctor').DataTable();

					});
				</script>
			</div>
		<!-- Fshirja -->
			<?php
			$get_data =  ("SELECT u.* , d.* FROM users u , users_doc_spec d WHERE u.id=d.id");
			$run_data = mysqli_query($con, $get_data);

			while ($row = mysqli_fetch_array($run_data)) {
				$id = $row['id'];
				$emriD = $row['emri'];
				$mbiemriD = $row['mbiemri'];
				echo "
			<div id='delete$id' class='modal fade' role='dialog'>
			<div class='modal-dialog' >
				<div class='modal-content'>
				<div class='modal-header'>
					<h4 class='modal-title text-center'>A jeni i sigurte qe deshironi ta fshini doktorin $emriD $mbiemriD ?</h4>
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
								<h4 class="modal-title text-center">Shto Doktor</h4>
							</div>
							<div class="modal-body">
								<form id="add_form" action="add.php" method="POST" enctype="multipart/form-data">
									<div class="row">
										<div class="col">
											<div class="form-group">
												<label class="form-label" for="emri">Emri</label>
												<input type="text" name="emri" id="emri" class="form-control" placeholder="Emri" required oninvalid="this.setCustomValidity('Ju lutem plotësoni emrin !')" onInput="this.setCustomValidity('')">
												</label><span class="error" id='message4'></span></span>
											</div>
											<div class="form-group">
											<label class="form-label" for="username">Username</label>
												<input type="text" name="username" id="username" class="form-control" placeholder="Username" onInput="checkUsernameValid()"  required/>
												<span id="check-username"></span>
												</label><span class="error" id='message6'></span></span>
											</div>
											<div class="form-group">
												<label class="form-label" for="email">Email</label>
												<input type="email" name="email" id="email"  class="form-control" placeholder="Email" onInput="checkEmailValid()" required>
												<span id="check-email"></span>
												</label><span class="error" id='message3'></span></span>
											</div>
											<div class="form-group">
												<label class="form-label" for="datelindja">Datelindja</label>
												<input type="date" name="datelindja" id="datelindja"  class="form-control" placeholder="Datelindja"  oninvalid="this.setCustomValidity('Ju lutem plotësoni datelindjen !')" onInput="checkAge()">
												</label><span class="error" id='message8'></span></span>
											</div>
											<div class="form-group">
												<label class="form-label" for="specializimi">Specializimi</label>
												<textarea tyle="text" rows="4" cols="50" name="specializimi" id="specializimi" class="form-control" placeholder="Specializimi"></textarea>
											</div>
											<div class="form-group">
													<label class="form-label" for="status">Status</label>
													<select style="padding:8px;"  type="text" name="status" id="status" class="form-select" placeholder="Status" required>
														<option value="staf">Staf</option>
														<option value="pergjegjes">Pergjegjes</option>
													</select>
											</div>
										</div>
										<div class="col">
											<div class="form-group">
												<label class="form-label" for="mbiemri">Mbiemri</label>
												<input type="text" name="mbiemri" id="mbiemri" class="form-control" placeholder="Mbiemri" required oninvalid="this.setCustomValidity('Ju lutem plotësoni mbiemrin !')" oninput="this.setCustomValidity('')">
												</label><span class="error" id='message5'></span></span>
											</div>
											<div class="form-group">
												<label class="form-label" for="nr_telit">Numer Celulari</label>
												<input type="tel" name="nr_telit" id="nr_telit" class="form-control" placeholder="Numer celulari" required oninvalid="this.setCustomValidity('Ju lutem plotësoni numrin tuaj te celularit !')" oninput="this.setCustomValidity('')">
												</label><span class="error" id='message7'></span></span>
											</div>
											<div class="form-group" >
												<label class="form-label" for="fjalekalimi">Fjalekalimi</label>
												<input type="password" name="fjalekalimi" id="fjalekalimi" class="form-control" placeholder="Fjalekalimi" required oninvalid="this.setCustomValidity('Ju lutem plotësoni konfirmimin e fjalëkalimit  !')" oninput="this.setCustomValidity('')">
												</label><span class="errors"><?php echo $error_fjalekalimi; ?></span>
												</label><span class="error" id='message1'></span></span>
											</div>
											<div class="form-group">
												<label class="form-label" for="konfirmo_fjalekalim">Konfirmo Fjalekalim</label>
												<input type="password" class="form-control"  id="konfirmo_fjalekalim" placeholder="Konfirmo Password " name="konfirmo_fjalekalim" onkeyup='checkPassword();' required oninvalid="this.setCustomValidity('Ju lutem plotësoni konfirmimin e fjalëkalimit  !')" oninput="this.setCustomValidity('')" /></span>
												</label><span class="error" id='message'></span></span>
											</div>
											
											<div class="form-group">
												<label class="form-label" for="gjinia">Gjinia</label>
												<select  type="text" name="gjinia" id="gjinia" class="form-select" placeholder="Status" style="padding:8px;" required>
													<option value="Mashkull">Mashkull</option>
													<option value="Femer">Femer</option>
												</select>
											</div>
											    <div class="form-group">
													<?php
													$sql = "SELECT * FROM `db_departament`";
													$all_dep_names = mysqli_query($con, $sql);
													?>
													<label class="form-label" for="dep_list">Departamenti</label>
													<select name="dep_list" id="dep_list" class="form-select " aria-label="Default select example " style="padding:5px;" required>
														<?php
														while ($dep_list = mysqli_fetch_array(
															$all_dep_names,
															MYSQLI_ASSOC
														)) :;
														?>
															<option style="font-size:13px;" value="<?php echo $dep_list["dep_id"]; ?>">
																<?php echo $dep_list["emri"]; ?>
															</option>
														<?php
														endwhile;
														?>
													</select>
											    </div>
												
												<div class="form-group">
													<label class="form-label" for="image">Image</label>
													<input type="file" name="image" id="image" class="form-control" onInput="imageValid()">
													<span id="check-image"></span>
												</div>
										    
										</div>
									</div>
									<br>
									<div class="row">
										
										<div class="d-flex justify-content-center">
											<input type="submit" name="submit" id="submit" class="btn btn-success btn-lg " value="Shto">
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
					$("#message").hide();
					$("#message1").hide();
					$("#message4").hide();
					$("#message5").hide();
					$("#message6").hide();
					$("#message7").hide();
					$("#message8").hide();
				

					var message_emri = false;
					var message_mbiemri = false;
					var message_fjalekalim = false;
					var message_konf_fjalekalim = false;
					var message_email = false;
					var message_username = false;
					var message_tel = false;
					var message_dt = false;
					// var message_gender = false;

					$("#emri").keyup(function() {
						checkName();
					});

					$("#mbiemri").keyup(function() {
						checkLastName();
					});

					$("#fjalekalimi").keyup(function() {
						checkPasswordValidation();
					});

					$("#konfirmo_fjalekalim").keyup(function(){
						checkPassword();
					});
         
					$("#email").keyup(function() {
						checkEmailValidation();
					});

					$("#username").keyup(function() {
						checkUserName();
					});

					$("#nr_telit").keyup(function() {
						checkPhoneNumber();
					});

					$("#datelidja").keyup(function() {
						checkAge();
					});

					$("#gender").keyup(function() {
						checkGender();
					});

					function checkPasswordValidation() {
						var upperCaseLetters = /[A-Z]/g;
						var lowerCaseLetters = /[a-z]/g;
						var numbers = /[0-9]/g;
						var specialCharacter = /[`!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?~]/;
						var pass = $("#fjalekalimi").val().trim();
						if (pass === '') {
							$("#message1").html("Fjalëkalimi nuk mund te jete bosh !").css('color', '#890F0D');
							$("#message1").show();
							$("#fjalekalimi").css("border", "2px solid #F90A0A");
							message_fjalekalim = true;
						} else
						if (!pass.match(upperCaseLetters) || !pass.match(upperCaseLetters) || !pass.match(numbers) ||
							!pass.match(specialCharacter) || pass.length < 8) {
							$("#message1").html("Fjalëkalimi nuk është i saktë. Ai duhet të përmbajë jo më pak se 8 karaktere nga të cilat minimumi 1 gërmë të madhe, 1 numër dhe 1 karakter special.").css('color', '#890F0D');
							$("#message1").show();
							$("#fjalekalimi").css("border", "2px solid #F90A0A");
							message_fjalekalim = true;
						} else {
							$("#message1").hide();
							$("#fjalekalimi").css("border", "2px solid #34F458");
						}
					}


					const isValidEmail = email => {
						const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
						return re.test(String(email).toLowerCase());
					}

					function checkEmailValidation() {
						var email = $("#email").val().trim();
						if (email === '') {
							$("#message3").html("Emaili-i nuk mund te jete bosh !").css('color', '#890F0D');
							$("#message3").show();
							$("#email").css("border", "2px solid #F90A0A");
							message_email = true;
						} else if (!isValidEmail(email)) {
							$("#message3").html("Formati i emailit nuk eshte i sakte !").css('color', '#890F0D');
							$("#message3").show();
							$("#email").css("border", "2px solid #F90A0A");
							message_email = true;
						} else {
							$("#message3").hide();
							$("#email").css("border", "2px solid #34F458");
						}
					}

					function checkPassword() {
						if ($("#fjalekalimi").val().trim() == $("#konfirmo_fjalekalim").val().trim()) {
							$("#message").html("Fjalëkalimi përshtatet !").css('color', '#5dd05d');
							$("#message").show();
							$("#konfirmo_fjalekalim").css("border", "2px solid #34F458");
						} else {
							$("#message").html("Fjalëkalimi nuk përshtatet !").css('color', '#890F0D');
							$("#message").show();
							$("#konfirmo_fjalekalim").css("border", "2px solid #F90A0A");
							message_konf_fjalekalim = true;
						}
					}

					function checkName() {
						var pattern = /^[a-zA-Z]*$/;
						var emri = $("#emri").val().trim();
						if (emri === '') {
							$("#message4").html("Emri nuk duhet te jete bosh !").css('color', '#890F0D');
							$("#message4").show();
							$("#emri").css("border", "2px solid #F90A0A");
							message_emri = true;
						} else if (!pattern.test(emri)) {
							$("#message4").html("Emri duhet te permbaje vetem karaktere-shkronja !").css('color', '#890F0D');
							$("#message4").show();
							$("#emri").css("border", "2px solid #F90A0A");
							message_emri = true;
						} else {
							$("#message4").hide();
							$("#emri").css("border", "2px solid #34F458");

						}
					}

					function checkLastName() {
						var pattern = /^[a-zA-Z]*$/;
						var mbiemri = $("#mbiemri").val().trim();
						if (mbiemri === '') {
							$("#message5").html("Mbiemri nuk duhet te jete bosh !").css('color', '#890F0D');
							$("#message5").show();
							$("#mbiemri").css("border", "2px solid #F90A0A");
							message_mbiemri = true;
						} else if (!pattern.test(mbiemri)) {
							$("#message5").html("Mbiemri duhet te permbaje vetem karaktere-shkronja !").css('color', '#890F0D');
							$("#message5").show();
							$("#mbiemri").css("border", "2px solid #F90A0A");
							message_mbiemri = true;
						} else {
							$("#message5").hide();
							$("#mbiemri").css("border", "2px solid #34F458");

						}
					}

					function checkUserName() {
						var username = $("#username").val().trim();
						if (username === '') {
							$("#message6").html("Username nuk duhet te jete bosh !").css('color', '#890F0D');
							$("#message6").show();
							$("#username").css("border", "2px solid #F90A0A");
							message_username = true;
						} else if (username.length < 5) {
							$("#message6").html("Username duhet te permbaje te pakten 5 karaktere !").css('color', '#890F0D');
							$("#message6").show();
							$("#username").css("border", "2px solid #F90A0A");
							message_username = true;
						} else if (/\s/.test(username)) {
							$("#message6").html("Username nuk mund te permbaje karakter bosh-hapesire!").css('color', '#890F0D');
							$("#message6").show();
							$("#username").css("border", "2px solid #F90A0A");
							message_username = true;
						} else {
							$("#message6").hide();
							$("#username").css("border", "2px solid #34F458");
						}
					}

					function checkPhoneNumber() {
						var phoneNumber = $("#nr_telit").val().trim();
						var phoneno = /^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/im;
						if (phoneNumber === '') {
							$("#message7").html("Numri i celularit nuk mund te jete bosh !").css('color', '#890F0D');
							$("#message7").show();
							$("#nr_telit").css("border", "2px solid #F90A0A");
							message_tel = true;
						} else if (!phoneNumber.match(phoneno)) {
							$("#message7").html("Formati i numrit tuaj te celularit nuk eshte i sakte !").css('color', '#890F0D');
							$("#message7").show();
							$("#nr_telit").css("border", "2px solid #F90A0A");
							message_tel = true;
						} else {
							$("#message7").hide();
							$("#nr_telit").css("border", "2px solid #34F458");
						}
					}

					function checkAge() {
						var today = new Date();
						var userBirthDate = new Date($("#datelindja").val());
						var age = today - userBirthDate;
						if (userBirthDate >= today ) {
							$("#message8").html("Kujdes! Datelindja duhet te jete me e vogel/barabarte se data aktuale").css('color', '#890F0D');
							$("#message8").show();
							$("#datelindja").css("border", "2px solid #F90A0A");
							message_dt = true;
						}
						
						else if (age<18 ) {
							$("#message88").html("Kujdes! Datelindja duhet te jete me e vogel/barabarte se data aktuale").css('color', '#890F0D');
							$("#message88").show();
							$("#datelindja").css("border", "2px solid #F90A0A");
							message_dt = true;
							
						} else {
							$("#message8").hide();
							$("#datelindja").css("border", "2px solid #34F458");
						}
					}

					$("#add_form").submit(function() {
						// $('#submit').prop('disabled',false);
						message_emri = false;
						message_mbiemri = false;
						message_fjalekalim = false;
						message_konf_fjalekalim = false;
						message_email = false;
						message_username = false;
						message_tel = false;
						message_dt = false;

						checkName();
						checkLastName();
						checkPassword();
						checkPasswordValidation();
						checkEmailValidation();
						checkUserName();
						checkPhoneNumber();
						checkAge();
	
						if (message_emri === false && message_mbiemri === false  && message_fjalekalim === false && message_konf_fjalekalim === false && message_email === false && message_username === false && message_tel === false && message_dt === false) {
							swal({
								title: "Llogaria eshte krijuar me sukses !",
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
			$get_data =  ("SELECT u.* , d.* FROM users u , users_doc_spec d WHERE u.id=d.id");
			$run_data = mysqli_query($con, $get_data);

			while ($row = mysqli_fetch_array($run_data)) {
				$id = $row['id'];
				$emri = $row['emri'];
				$mbiemri = $row['mbiemri'];
				$username = $row['username'];
				$nr_telit = $row['nr_telit'];
				$email = $row['email'];
				$datelindja = $row['datelindja'];	
				$gjinia = $row['gjinia'];
				$specializimi = $row['specializimi'];
				$status = $row['status'];
				$dep_id = $row['dep_id'];
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
										<label>Username</label>
										<input type='text' name='username' class='form-control' value='$username' readonly>
									</div>
									<div class='col-sm'>
										<label>Email</label>
										<input type='email' name='email' class='form-control' value='$email' readonly>
									</div>
								</div>
								<div class='col'>
								<div class='col-sm'>
									<div class='form-group'>
									<label class='form-label' for='emri'>Emri</label>
										<label>Emri</label>
										<input type='text' name='emri' id='emri1' class='form-control' value='$emri' 
										required oninvalid='this.setCustomValidity('Ju lutem plotësoni emrin !')' >
										</label><span class='error' id='message10'></span></span>
									</div>
									<div class='form-group'>
										<label>Mbiemri</label>
										<input type='text' name='mbiemri' id='mbiemri1' class='form-control' value='$mbiemri' required>
										</label><span class='error' id='message11'></span></span>
									</div>
										
								</div>
								</div>
							</div>
							<div class='row'>
									<div class='col'>
										<div class='form-group'>
										<label>Nr_tel</label>
										<input type='text' name='nr_telit' id='nr_telit1' class='form-control' value='$nr_telit' required>
										</label><span class='error' id='message12'></span></span>
									</div>
									<div class='form-group'>
										<label>Datelindja</label>
										<input type='date' name='datelindja' id='datelindja1' class='form-control' value='$datelindja' required>
										</label><span class='error' id='message13'></span></span>
									</div>
								</div>
								<div class='col'>
									<div class='col-sm'>
									</div>
									<div class='form-group'>
										<label for=''>Gjinia</label>
										<select name='gjinia' class='form-select' aria-label='Default select example' style='padding:8px;'>	
											<option value='Femer'>Femer</option>
											<option value='Mashkull'>Mashkull</option>
										</select>
									</div>
									<div class='form-group'>
										<label for=''>Status</label>
										<select  name='status' class='form-select' aria-label='Default select example' style='padding:8px;'>
										<option value='Pergjegjes'>Pergjegjes</option>
										<option value='Staf'>Staf</option>
										
										</select>
									</div>
								</div>
							</div>
							<div class='row'>
								<div class='col'>
								<div class='form-group'>
									<label class='form-label' for='specializimi'>Specializimi</label>
									<textarea tyle='text' rows='4' cols='50' name='specializimi' id='specializimi' class='form-control' placeholder='Specializimi' required value=''>$specializimi</textarea>
								</div>
									
								</div>
								
								<div class='col'>
									<div class='col-sm'>	
								</div>
								<div class='form-group'>
										<label>Image</label>
										<input type='file' accept='image/*' id='image' required name='image' class='form-control' onInput='imageValid()' >
										<img src = 'image/$image' style='width:50px; height:50px'>
										<span id='check-image'></span>
										</div>
								</div>
							</div>
							<br>
							<div class='d-flex justify-content-center'>
							<input type='submit' name='submit' class='btn btn-success btn-lg' value='Modifiko'>
							</div>
							<div class='modal-footer'>
										<button type='button' class='btn btn-danger btn-lg' data-bs-dismiss='modal'>Mbyll</button>
									</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	";
			} ?>
		
			

		
			<script type="text/javascript">

				
				$(function() {
					$("#message10").hide();
					$("#message11").hide();
					$("#message12").hide();
					

					var message_emri1 = false;
					var message_mbiemri1 = false;
					var message_tel1 = false;
					
					

					$("#emri1").keyup(function() {
						checkName();
					});

					$("#mbiemri1").keyup(function() {
						checkLastName();
					});

					$("#nr_telit1").keyup(function() {
						checkPhoneNumber();
					});


					function checkName() {
						var pattern = /^[a-zA-Z]*$/;
						var emri = $("#emri1").val().trim();
						if (emri === '') {
							$("#message10").html("Emri nuk duhet te jete bosh !").css('color', '#890F0D');
							$("#message10").show();
							$("#emri1").css("border", "2px solid #F90A0A");
							message_emri1 = true;
						} else if (!pattern.test(emri)) {
							$("#message10").html("Emri duhet te permbaje vetem karaktere-shkronja !").css('color', '#890F0D');
							$("#message10").show();
							$("#emri1").css("border", "2px solid #F90A0A");
							message_emri1 = true;
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
							message_mbiemri1 = true;
						} else if (!pattern.test(mbiemri)) {
							$("#message11").html("Mbiemri duhet te permbaje vetem karaktere-shkronja !").css('color', '#890F0D');
							$("#message11").show();
							$("#mbiemri1").css("border", "2px solid #F90A0A");
							message_mbiemri1 = true;
						} else {
							$("#message11").hide();
							$("#mbiemri1").css("border", "2px solid #34F458");

						}
					}

					function checkPhoneNumber() {
						var phoneNumber = $("#nr_telit1").val().trim();
						var phoneno = /^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/im;
						if (phoneNumber === '') {
							$("#message12").html("Numri i celularit nuk mund te jete bosh !").css('color', '#890F0D');
							$("#message12").show();
							$("#nr_telit1").css("border", "2px solid #F90A0A");
							message_tel1 = true;
						} else if (!phoneNumber.match(phoneno)) {
							$("#message12").html("Formati i numrit tuaj te celularit nuk eshte i sakte !").css('color', '#890F0D');
							$("#message12").show();
							$("#nr_telit1").css("border", "2px solid #F90A0A");
							message_tel1 = true;
						} else {
							$("#message12").hide();
							$("#nr_telit1").css("border", "2px solid #34F458");
						}
					}

				

					$("#edit_form").submit(function() {
						message_emri1 = false;
						message_mbiemri1 = false;
						message_tel1 = false;
						
						checkName();
						checkLastName();
						checkPhoneNumber();
						

						if (message_emri1 === false && message_mbiemri1 === false && message_tel1 === false ) {
							
							Swal.fire({
  position: 'top-end',
  icon: 'success',
  title: 'Modifikimi u krye me sukses !',
  showConfirmButton: false,
//   timer: 8000
})
							
							
								return true;
							}else{
								swal("Kujdes!", "Plotesoni te gjitha fushat sic duhet !", "warning");
               					return false;
						}
					});

				});

			</script>



<script>
function checkUsernameValid() {	
	jQuery.ajax({
	url: "add.php",
	data:'username='+$("#username").val(),
	type: "POST",
	success:function(data){
		$("#check-username").html(data);
	},
	error:function (){}
	});
}

function checkEmailValid() {	
	jQuery.ajax({
	url: "add.php",
	data:'email='+$("#email").val(),
	type: "POST",
	success:function(data){
		$("#check-email").html(data);
	},
	error:function (){}
	});
}
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
</script>

			
</section>

</main>
<script type="text/javascript" src="http://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
</body>


	
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


</html>