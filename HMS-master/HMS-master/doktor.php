<?php
// Lidhja me databazen
$connect = mysqli_connect("localhost", "root", "", "hospital_database");
?>
<?php

$get_data = ("SELECT u.emri, u.mbiemri, u.username, u.nr_telit, u.email, TIMESTAMPDIFF(YEAR, datelindja, CURDATE()) AS age, u.fjalekalimi, u.gjinia , d.* , dep.emri as dep_name
FROM users u , users_doc_spec d, db_departament dep
WHERE u.id=d.id AND d.dep_id=dep.dep_id");
$run_data = mysqli_query($connect, $get_data);

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
}
?>

<?php include "header.php" ?>
<section id="facilities">
    <div class="container">
        <div class="title">
            <h4>STAFI MJEKESOR</h4>
            <p>"Besoni shendetin tuaj te Specialistët tanë"</p>
        </div>
        <div class="row">
            <?php
            $query = ("SELECT u.* , d.*
            FROM users u , users_doc_spec d
            WHERE u.id=d.id");
            $result = mysqli_query($connect, $query);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_array($result)) {
            ?>
                    <div class="col-md-3">
                        <div class="card text-center">
                            <img src="Admin/doktorArea/image/<?php echo $row["image"]; ?>" class="card-img-top ">
                            <div class="card-body">
                                <h5 class="card-title">
                                    <?php echo $row["emri"]; ?>
                                    <?php echo $row["mbiemri"]; ?>
                                </h5>
                                <h5 class="card-spec">
                                    <?php echo $row["specializimi"]; ?>
                                </h5>
                                <h6 class="card-text" ><?php echo "Departamenti:$dep_id" ?></h6>
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
<?php include "footer.html" ?>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="vendor/glightbox/js/glightbox.min.js"></script>
<script src="vendor/php-email-form/validate.js"></script>
<script src="vendor/purecounter/purecounter.js"></script>
<script src="vendor/swiper/swiper-bundle.min.js"></script>
<script src="js/jquery-1.11.2.min.js"></script>
<script src="js/bootstrap.min.js"></script>


<!-- Template Main JS File -->
<script src="js/main.js"></script>
<link rel="stylesheet" href="css/cards.css">
<link href="https://fonts.googleapis.com/css?family Open+Sans:100, 300,400&display=swap" rel="stylesheet">
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>