<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Patient Area</title>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <!-- CSS only -->
        <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> -->
        <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> -->
        <script src='https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.5.2/bootbox.min.js'></script>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
        <!-- <script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"> -->
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <!-- // <script src='https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.5.2/bootbox.min.js'></script> -->
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
        tbody td{
            text-align: center;
        }

    </style>
        
  </head>
  <body>
<?php
        include "config.php";
        ?>
        <?php include "../headerAdmin.php"; ?>
<main id="main" class="main">
    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="../../index.php">Home</a></li>
		<li class="breadcrumb-item active"><a href="../indexAdmin.php">Dashboard</a></li>
		<li class="breadcrumb-item active">Pacientet</li>
        </ol>
      </nav>
    </div>

    <section class="section dashboard">
<table id="doctorList" class="cell-border hover" >
            <thead>
              <th>Id</th>
                <th>Emer</th>
                <th>Mbiemer</th>
                <th>Username</th>
                <th>Email</th>
                <th>Numri i celularit</th>
                <th>Mosha</th>
                <th></th>
            </thead>
    <tbody>
      <?php
      $query = "SELECT  id, emri, mbiemri, username, email, nr_telit,verify_status, TIMESTAMPDIFF(YEAR, datelindja, CURDATE()) AS age FROM users WHERE roleId = 0 AND verify_status=1";
      $result = mysqli_query($con, $query);
      $count = 1;
      while ($row = mysqli_fetch_assoc($result)){
        $id = $row['id'];
        $emri = $row['emri'];
        $mbiemri = $row['mbiemri'];
        $username = $row['username'];
        $email = $row['email'];
        $nr_tel = $row['nr_telit'];
        $datelindja = $row['age'];
        ?>
      <tr>
                        <td ><?= $id ?></td>
                        <td><?= $emri ?></td>
                        <td><?= $mbiemri ?></td>
                        <td><?= $username ?></td>
                        <td><?= $email ?></td>
                        <td><?= $nr_tel ?></td>
                        <td><?= $datelindja ?></td>
                        <td >
                            <button class='delete btn btn-danger' id='del_<?= $id ?>' data-id='<?= $id ?>' >Delete</button>
                        </td>
                    </tr>
                    <?php
                    $count++;
                }
                ?>
    </table>
        <script type="text/javascript" src="http://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script> 
        <script type="text/javascript">
            $(document).ready( function () {
            $('#doctorList').DataTable();
            
        });
        </script>

    </section>
  </main>

  <script>
            $(document).ready(function () {
                $('.delete').click(function () {
                    var el = this;
                    var deleteid = $(this).data('id');
                    Swal.fire({  
                        title: 'Jeni i sigurte qe deshironi ta fshini ?',  
                        showDenyButton: true,  showCancelButton: false,  
                        confirmButtonText: `Po`,  
                        denyButtonText: `Jo`,
                        }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                                url: 'ajaxfile.php',
                                type: 'POST',
                                data: {id: deleteid},
                                success: function (response) {
                                    if (response == 1) {
                                        $(el).closest('tr').css('background', 'tomato');
                                        $(el).closest('tr').fadeOut(800, function () {
                                            $(this).remove();
                                            //sendemail_verify();
                                        });
                                    } else {
                                        bootbox.alert('Deshtim !Pacienti nuk u fshi !');
                                    }
                                }
                            });
                        }
                    });
                });
            });
        </script>
  </body>
</html>
