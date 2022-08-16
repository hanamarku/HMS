<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <style>
        .table td {
        text-align: center;
        } 
        table{
            font-size:16px;  
        }

        table th{
            color:#051367;
        }

    </style>
    </head>

    <body>
    <?php include "headerPatient.php"; ?>
<main id="main" class="main">
    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
        <li class="breadcrumb-item active"><a href="indexPatient.php">Dashboard</a></li>
        <li class="breadcrumb-item active">doktoret</li>
        </ol>
      </nav>
    </div>

    <section class="section dashboard">
    <!-- <div class="col d-flex justify-content-center"> -->
    
    <table id="doctorList" class="cell-border hover" >
            <thead>
                <th>Emer</th>
                <th>Mbiemer</th>
                <th>Mosha</th>
                <th>Email</th>
                <th>Specializimi</th>
                <th>Departamenti</th>
            </thead>
            <tbody>
                <?php
                require "Connection.php";
                $query = mysqli_query($con, "SELECT  user_doctor.emriD, user_doctor.mbiemri, user_doctor.mosha, user_doctor.email, user_doctor.specializimi, db_departament.emri FROM user_doctor INNER JOIN db_departament ON user_doctor.dep_id = db_departament.dep_id ORDER BY user_doctor.id");
                $count = 1;
                while($result = mysqli_fetch_assoc($query)){
                    echo "<tr align='center'>
                    <td>".$result['emriD']."</td>
                    <td>".$result['mbiemri']."</td>
                    <td>".$result['mosha']."</td>
                    <td>".$result['email']."</td>
                    <td>".$result['specializimi']."</td>
                    <td>".$result['emri']."</td>
                    </tr>";
                }
                ?>
            </tbody>
        </table>
        
        <script type="text/javascript" src="http://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    
        
        <script type="text/javascript">
            $(document).ready( function () {
            $('#doctorList').DataTable();
        } );
        </script>

    <!-- </div> -->
    </section>
  </main>

    </body>
</html>
