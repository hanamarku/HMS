

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<script scr="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css"></script>
	<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
	<script src="https://code.jquery.com/jquery-3.2.1.js"></script>

<?php include "headerPatient.php"; ?>
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
	<div class="container-fluid">
		<div class="container">
			<table class="table" style="animation-delay: .5s; margin-top: 10px; ">
				<thead>
					<?php
					$conn = new mysqli("localhost", "root", "", "hospital_database");

					$val = $_SESSION["username"];

					$sql = "SELECT * FROM users WHERE username='$val'";

					$result = $conn->query($sql);

					if ($result) {
						while ($row = $result->fetch_assoc()) {
					?>
							<form action="patient_update.php" id='edit_form2' method="POST" enctype="multipart/form-data">
								<tr>
									<td><label>Username</label></td>
									<td><input style=" background-color: #01CBC6;" type="text" name="username" value="<?= $row["username"] ?>" readonly></td>
								</tr>
								<tr>
									<td><label>Emri<span class="text-danger">*</span></label></td>
									<td><input type="text" name="emri" id='emri2' required  value="<?= $row["emri"] ?>">
										<span class="text-danger" id='message000'></span>
									</td>

								</tr>
								<tr>
									<td><label>Mbiemri<span class="text-danger">*</span></label></td>
									<td><input type="text" name="mbiemri" id='mbiemri2' required value="<?php echo $row["mbiemri"] ?>">
										</label><span class='error' id='message111'></span></span>
									</td>
								</tr>
								<tr>
									<td><label>Numri i celularit<span class="text-danger">*</span></label></td>
									<td><input type="text" name="nr_telit" id='nr_telit2' required value="<?php echo $row["nr_telit"] ?>">
									</label><span class='error' id='message222'></span></span>
								</td>
									
								</tr>

								<tr>
									<td><label>Email</label></td>
									<td><input style=" background-color: #01CBC6;" type="email" name="email" value="<?php echo $row["email"] ?>" readonly></td>
								</tr>
								<tr>
								<tr>
									<td><label>Datelindja<span class="text-danger">*</span></label></td>
									<td><input type="date" name="datelindja" id='datelindja2' required value="<?php echo $row["datelindja"] ?>" style='padding:3px; width:34%'></td>
									<!-- </label><span class='error' id='message333'></span></span> -->
								</tr>
								<tr>
								<tr>
									<td><label>Gjinia<span class="text-danger">*</span></label></td>
									<td>
										<select name='gjinia' class='form-select' value="<?php echo $row["gjinia"] ?>" style='padding:3px; width:34%'>
											<option value='Femer'>Femer</option>
											<option value='Mashkull'>Mashkull</option>
										</select>
									</td>

								</tr>
								<tr>
								<tr>
									<td></td>
									<td> <input type="submit" class="btn btn-danger " id='edit' name="edit" value="MODIFIKO">
							</form>
							</td>
							</tr>
					<?php
						}
					}
					?>
			</table>
		</div>
	</div>
	<script type="text/javascript">
		$(function() {
			$("#message000").hide();
			$("#message111").hide();
			$("#message222").hide();
			$("#message333").hide();

			var message_emri1 = false;
			var message_mbiemri1 = false;
			var message_tel1 = false;
			

			$("#emri2").keyup(function() {
				checkName();
			});

			$("#mbiemri2").keyup(function() {
				checkLastName();
			});

			$("#nr_telit2").keyup(function() {
				checkPhoneNumber();
			});

		

			function checkName() {
				var pattern = /^[a-zA-Z]*$/;
				var emri = $("#emri2").val().trim();
				if (emri === '') {
					$("#message000").html("Emri nuk duhet te jete bosh !").css('color', '#890F0D');
					$("#message000").show();
					$("#emri2").css("border", "2px solid #F90A0A");
					message_emri2 = true;
				} else if (!pattern.test(emri)) {
					$("#message000").html("Emri duhet te permbaje vetem karaktere-shkronja !").css('color', '#890F0D');
					$("#message000").show();
					$("#emri2").css("border", "2px solid #F90A0A");
					message_emri2 = true;
				} else {
					$("#message000").hide();
					$("#emri2").css("border", "2px solid #34F458");

				}
			}

			function checkLastName() {
				var pattern = /^[a-zA-Z]*$/;
				var mbiemri = $("#mbiemri2").val().trim();
				if (mbiemri === '') {
					$("#message111").html("Mbiemri nuk duhet te jete bosh !").css('color', '#890F0D');
					$("#message111").show();
					$("#mbiemri2").css("border", "2px solid #F90A0A");
					message_mbiemri2 = true;
				} else if (!pattern.test(mbiemri)) {
					$("#message111").html("Mbiemri duhet te permbaje vetem karaktere-shkronja !").css('color', '#890F0D');
					$("#message111").show();
					$("#mbiemri2").css("border", "2px solid #F90A0A");
					message_mbiemri2 = true;
				} else {
					$("#message111").hide();
					$("#mbiemri2").css("border", "2px solid #34F458");

				}
			}

			function checkPhoneNumber() {
				var phoneNumber = $("#nr_telit2").val().trim();
				var phoneno = /^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/im;
				if (phoneNumber === '') {
					$("#message222").html("Numri i celularit nuk mund te jete bosh !").css('color', '#890F0D');
					$("#message222").show();
					$("#nr_telit2").css("border", "2px solid #F90A0A");
					message_tel2 = true;
				} else if (!phoneNumber.match(phoneno)) {
					$("#message222").html("Formati i numrit tuaj te celularit nuk eshte i sakte !").css('color', '#890F0D');
					$("#message222").show();
					$("#nr_telit2").css("border", "2px solid #F90A0A");
					message_tel2 = true;
				} else {
					$("#message222").hide();
					$("#nr_telit2").css("border", "2px solid #34F458");
				}
			}


			$("#edit_form2").submit(function() {
				message_emri2 = false;
				message_mbiemri2 = false;
				message_tel2 = false;
				// message_dt = false;

				checkName();
				checkLastName();
				checkPhoneNumber();
				

				if (message_emri2 === false && message_mbiemri2 === false && message_tel2 === false ) {
					swal({
						title: "Modifikimi u krye me sukses !",
						text: " ",
						icon: "success",
						buttons: false,
						timer: 8000
					});
					return true;
				} else {
					swal("Kujdes!", "Plotesoni te gjitha fushat sic duhet !", "warning");
					return false;
				}
			});

		});
	</script>
</main>