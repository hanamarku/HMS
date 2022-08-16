<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Patient Area</title>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <!-- CSS only -->
        <script src='https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.5.2/bootbox.min.js'></script>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
		<li class="breadcrumb-item active">Feedback</li>
        </ol>
      </nav>
    </div>

    <section class="section dashboard">
<table id="feedback" class="cell-border hover" >
            <thead>
                <th width="10%">Username</th>
                <th width="10%">Feedback</th>
                <th width="40%">Eksperienca</th>
                <th width="5%">Aprovuar</th>
                <th width="5%">Post</th>
                <th width="55%"></th>
            </thead>
    <tbody>
      <?php
      $query = "SELECT  id, id_pacient,username,feedback,suggestions,aprovoj,post FROM poll ";
      $result = mysqli_query($con, $query);
      $count = 1;
      while ($row = mysqli_fetch_assoc($result)){
        $id = $row['id'];
        $id_pacient=$row['id_pacient'];
        $username = $row['username'];
        $feedback = $row['feedback'];
        $suggestions = $row['suggestions'];
        $aprovoj = $row['aprovoj'];
        $post=$row['post'];
        ?>
      <tr>
                        <td><?= $username?></td>
                        <td><?= $feedback  ?></td>
                        <td><?= $suggestions?></td>
                        <td><?= $aprovoj?></td>
                        <td><?= $post?></td>
                        <td >
                            <button class='edit btn btn-success' id='del_<?= $id ?>' data-id='<?= $id ?>' <?php if($aprovoj == 'Jo'){?> disabled <?php  } ?>  <?php if($post == 1){?> disabled <?php  } ?>>POSTO</button>
                            <button class='fshi btn btn-danger' id='del_<?= $id ?>' data-id='<?= $id ?>' >FSHI</button>
                            <button class='delete btn btn-success' id='del_<?= $id ?>' data-id='<?= $id ?>' <?php if($aprovoj == 'Jo'){?> disabled <?php  } ?> <?php if($post == 0){?> disabled <?php  } ?>>HIQ POST</button>
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
            $('#feedback').DataTable();
            
        });
        </script>

    </section>
  </main>

  <script>
            $(document).ready(function () {
                $('.edit').click(function () {
                    var el = this;
                    var editID = $(this).data('id');
                    Swal.fire({  
                        title: 'Jeni i sigurte qe deshironi ta ndryshoni ?',  
                        showDenyButton: true,  showCancelButton: false,  
                        confirmButtonText: `Po`,  
                        denyButtonText: `Jo`,
                        }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                                url: 'ajaxfile.php',
                                type: 'POST',
                                data: {id: editID},
                                success: function (response) {
                                    if (response == 1) {
                                        setTimeout(function () {

window.location.reload();

}, 100);
                                      
                     Swal.fire({
  position: 'top-center',
  icon: 'success',
  title: 'Te dhenat tuaja jane ndryshuar me sukses!',
  showConfirmButton: false,
  timer: 1500
})          

   
                                    } else {
                                        bootbox.alert('Deshtim !Te dhenat nuk u ndryshian!');
                                    }
                                }
                            });
                        }
                    });
                });
            });
        </script>
        <script>
            $(document).ready(function () {
                $('.fshi').click(function () {
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
                                url: 'ajaxfileFshi.php',
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
        <script>
            $(document).ready(function () {
                $('.delete').click(function () {
                    var el = this;
                    var editID = $(this).data('id');
                    Swal.fire({  
                        title: 'Jeni i sigurte qe deshironi ta ndryshoni ?',  
                        showDenyButton: true,  showCancelButton: false,  
                        confirmButtonText: `Po`,  
                        denyButtonText: `Jo`,
                        }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                                url: 'ajaxfileDeletePost.php',
                                type: 'POST',
                                data: {id: editID},
                                success: function (response) {
                                    if (response == 1) {
                                        setTimeout(function () {

window.location.reload();

}, 100);
                                        Swal.fire({
  position: 'top-center',
  icon: 'success',
  title: 'Te dhenat tuaja jane ndryshuar me sukses!',
  showConfirmButton: false,
  timer: 1500
})
                                    } else {
                                        bootbox.alert('Deshtim !Te dhenat nuk u ndryshian!');
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
