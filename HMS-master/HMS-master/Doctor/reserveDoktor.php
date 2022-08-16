<!DOCTYPE html>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<script scr="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css"></script>
	<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
	<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
 
<body>

    <?php include "headerDoktor.php"; ?>
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Takimet</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
                    <li class="breadcrumb-item active">Reservations</li>
                </ol>
            </nav>
        </div>



<div class="container-fluid">
	<div class="container">
        <section class="section dashboard">
            <div class="col d-flex justify-content-center">
                <?php
                include "Connection.php";

                $host = "localhost"; 
                $user = "root"; 
                $password = "";
                $dbname = "hospital_database";

                $con = mysqli_connect($host, $user, $password, $dbname);

                // Check connection
                if (!$con) {
                    die("Connection failed: " . mysqli_connect_error());
                }

                $username = $_SESSION['username'];

                $sql = "SELECT * FROM users WHERE username='$username'";
                $mysqli = $con->query($sql);

                if ($mysqli->num_rows > 0) {
                    while ($row = $mysqli->fetch_assoc()) {
                        $doctor = $row['emri'] . ' ' . $row['mbiemri'];
                    }
                }

                $sql = "SELECT * FROM rezervimet WHERE doctor='$doctor'";
                $mysqli = $con->query($sql);








                ?>
                <table id="doctor" class="table  table-bordered  table-striped table-hover">
				
                <thead>
                    <tr>
                        <th class="text-center">Emri</th>
                        <th class="text-center">Mbiemri</th>
                        <th class="text-center">Data</th>
                        <th class="text-center">Ora</th>

                    </tr>
                </thead>
                <tbody>



                    <?php

                    $get_data = ("SELECT * FROM rezervimet WHERE doctor='$doctor'");
                    $run_data = mysqli_query($con, $get_data);

                    while ($row = mysqli_fetch_array($run_data)) {
                        $id = $row['id'];
                        $name = $row['name'];
                        $surname = $row['surname'];
                        $doctor = $row['doctor'];
                        $date = $row['date'];
                        $hour = $row['hour'];
                        $_SESSION['appointmentID'] = $id;
                        echo "

            <tr>
    
            <td class='text-center'>$name</td>
            <td class='text-center'>$surname</td>
            <td class='text-center'>$date </td>
            <td class='text-center'>$hour</td>
            </td>
            <td class='text-center'>
                <span>
                    <a href='#'>
                         <button class='delete btn btn-danger' data-bs-toggle='modal' data-bs-target='#delete$id' style='' aria-hidden='true'>Anulo</button>
                    </a>
                </span>
            </td>
            <td class='text-center'>
            <span>
                <a href='receta.php'>
                    <button class='receta btn btn-warning'  style='' aria-hidden='true'>Lesho Recete</button>
                </a>
            </span>
        </td>
        </tr>


            ";
                    }

                    ?>


                    </tbody>
                </div>
            </section>
        </table>
          
            <script type="text/javascript">
                $(document).ready(function() {
                    $('#doctor').DataTable();

                });
            </script>
        </div>

                <?php
			$get_data =  ("SELECT * FROM rezervimet WHERE doctor='$doctor'");
			$run_data = mysqli_query($con, $get_data);

			while ($row = mysqli_fetch_array($run_data)) {
				$id = $row['id'];
                $emri = $row['name'];
                $mbiemri = $row['surname'];
                $_SESSION['emriP'] = $emri;
                $_SESSION['mbiemriP'] = $mbiemri;

				echo "
			<div id='delete$id' class='modal fade' role='dialog'>
			<div class='modal-dialog' >
				<div class='modal-content'>
				<div class='modal-header'>
					<h4 class='modal-title text-center'>A jeni i sigurte qe deshironi ta anuloni takimin me pacientin $emri $mbiemri?</h4>
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
            </div>
        </section>


        <!-- ======= Footer ======= -->
        <footer id="footer" class="footer">
            <div class="copyright">
                &copy; Copyright <strong><span>Heal & Health</span></strong>. All Rights Reserved
            </div>
        </footer><!-- End Footer -->
        <script type="text/javascript" src="http://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
</body>

<script src="assets/vendor/apexcharts/apexcharts.min.js"></script> 
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

	
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</body>

</html>