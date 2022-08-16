<?php

$dep_emri = $_GET['emri'];

require "Connection.php";
?>
    <html>

    <head>
        
        <meta charset="utf-8">
        <meta name="viewport" content="width-device-width, initial-scale-1">
        <link rel="stylesheet" href="css/cards.css">
        <!-- <link href="https://fonts.googleapis.com/css?family Open+Sans:100, 300,400&display=swap" rel="stylesheet"> -->
        <!-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet"> -->
        
       
    </head>

    <body>
    <?php include "header.php"?>
     <section id="facilities">
        <div class="container" >  
                    <div class="title">
                    <h4>Departamenti : <?php echo $dep_emri ?></h4>
                    

                    <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo"><b>Kliko ketu per te shfaqur doktoret e ketij departamenti :</b></button>
<br><br>
                        <div class="row">
                                    <?php 
                                    $query =( "SELECT * FROM db_departament WHERE emri = '$dep_emri'");
                                    $res = mysqli_query($con, $query);
                                    //if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_array($res)){?>
                            <div class="col-md-12" >
                            <div class="card-group text-center" style="background-color:white;width:100%" >
                                <img src="http://localhost/hms-project/HMS-master/HMS-master/Admin/DepartamentArea/upload/<?php echo $row["image"]; ?>" class="card-img-top " style="height: 450px">
                                    <div class="card-body">
                                        <h5 class="card-title">
                                        <?php echo $row["emri"]; ?></h5>
                                        <h5 class="card-spec">
                                        <?php echo $row["info"]; ?></h5>
                                    
                     
                                 <div id="demo" class="collapse">  
                                     <div class="row">
                                     

                                             <?php
                                             $dep_id = $row['dep_id'];
                                             $query = ("SELECT d.emri,d.mbiemri,r.specializimi, r.image, email, nr_telit FROM users d 
                                             JOIN users_doc_spec r ON d.id=r.id 
                                             JOIN db_departament s  ON r.dep_id=s.dep_id
                                             WHERE r.dep_id = '$dep_id' ");
                                          
                                             $result = mysqli_query($con, $query);
                                             //if (mysqli_num_rows($result) > 0) {
                                             while ($row = mysqli_fetch_array($result)) {
                                             ?>

                                                <div class="card mb-3" style="max-width: 540px;">
                                                <div class="row g-0">
                                                    <div class="col-md-4">
                                                    <img src="http://localhost/hms-project/HMS-master/HMS-master/Admin/DoktorArea/image/<?php echo $row["image"]; ?>" class="img-fluid rounded-start" alt="...">
                                                    </div>
                                                    <div class="col-md-8">
                                                    <div class="card-body">
                                                        <h5 class="card-title"><?php echo $row["emri"];?>  <?php echo $row["mbiemri"];?></h5>
                                                        <p class="card-text"><?php echo $row["specializimi"]; ?></p>
                                                        <p class="card-text">Email : <small class="text-muted"><?php echo $row["email"]; ?></small></p>
                                                        <p class="card-text">Kontakt : <small class="text-muted"><?php echo $row["nr_telit"]; ?></small></p>
                                                    </div>
                                                    </div>
                                                </div>
                                                </div>
                                <?php } ?>
                                </div>
                         </div>
                         </div>           
                         </div>
                         </div>
                         <?php
            } ?></div></div></div>
            
    </section>
    <div >
    <?php include "footer.html" ?>
    </div>
    </body>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <!-- <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script> -->
    <!-- <script src="vendor/glightbox/js/glightbox.min.js"></script> -->
    <!-- <script src="vendor/php-email-form/validate.js"></script> -->
    <!-- <script src="vendor/purecounter/purecounter.js"></script> -->
    <!-- <script src="vendor/swiper/swiper-bundle.min.js"></script> -->
    <!-- <script src="js/jquery-1.11.2.min.js"></script> -->
    <!-- <script src="js/bootstrap.min.js"></script> -->


    <!-- Template Main JS File -->
    <!-- <script src="js/main.js"></script> -->
    </html>