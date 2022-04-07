<?php
session_start();
$connect = mysqli_connect("localhost", "root", "hana22", "hms");
?>
    <html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width-device-width, initial-scale-1">
        <title>Ruislip GYM</title>
        <link rel="stylesheet" href="css/cards.css">
        <link href="https://fonts.googleapis.com/css?family Open+Sans:100, 300,400&display=swap" rel="stylesheet">
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    </head>

    <body>
    <?php include "header.html"?>
        <section id="facilities">
            <div class="container">
                <div class="title">
                    <h4>STAFI MJEKESOR</h4>
                    <p>"Besoni shendetin tuaj te Specialistët tanë"</p>
                </div>
                    <div class="row">
                    <?php
			$query = "SELECT * FROM user_doctor  ORDER BY id ASC";
			$result = mysqli_query($connect, $query);
			if (mysqli_num_rows($result) > 0) {
				while ($row = mysqli_fetch_array($result)) {
			?>
                        <div class="col-md-3">
                            <div class="card text-center">
                                <img src="<?php echo $row["image"]; ?>" class="card-img-top ">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        <?php echo $row["emri"]; ?>
                                        <?php echo $row["mbiemri"]; ?>
                                    </h5>
                                    <h5  class="card-spec">
                                        <?php echo $row["specializimi"]; ?>
                                    </h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <a href="#">Rezervo takim</a>
                                </div>
                            </div>
                </div>
                <?php
				}
			}
			?>
                    </div>
            </div>
          
                </div>
        </section>
        <?php include "footer.html"?>
    </body>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/glightbox/js/glightbox.min.js"></script>
    <script src="vendor/php-email-form/validate.js"></script>
    <script src="vendor/purecounter/purecounter.js"></script>
    <script src="vendor/swiper/swiper-bundle.min.js"></script>
    <script src="js/jquery-1.11.2.min.js"></script>
    <script src="js/bootstrap.min.js"></script>


    <!-- Template Main JS File -->
    <script src="js/main.js"></script>
    </html>