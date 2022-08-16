
<!DOCTYPE html>
<html lang="en">

<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.0.2/dist/css/splide.min.css">
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.0.2/dist/js/splide.min.js" integrity="sha256-esNVkEwsSpRc+USDUy7gWsyTZprX+CtOFMUgVq9JYnE=" crossorigin="anonymous"></script>
    <!-- librarite per sponsors  -->
    <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>
    <script src="js/javascript.js"></script>
    
    <title>Health & Heal</title>


    <style>
        .my-slider-progress {
            background: #ccc;
        }
        
        .my-slider-progress-bar {
            background: greenyellow;
            height: 2px;
            transition: width 400ms ease;
            width: 0;
        }


/* blockquotes */

    blockquote {
        font-family: Georgia, serif;
        position: relative;
        margin: 0.2em;
        padding: 0.2em 2em 0.2em 3em;
    }

    blockquote:before {
        font-family: Georgia, serif;
        position: absolute;
        font-size: 6em;
        line-height: 1;
        top: 0;
        left: 0;
        content: "\201C";
    }
    blockquote:after {
        font-family: Georgia, serif;
        position: absolute;
        float:right;
        font-size:6em;
        line-height: 1;
        right:0;
        bottom:-0.5em;
        content: "\201D";
    }
    blockquote footer {
        padding: 0 2em 0 0;
        text-align:right;
    }
    blockquote cite:before {
        content: "\2013";
    }
    </style>

 <?php include "header.php"?>

 

<style>
    a.disabled {
  pointer-events: none;
  cursor: default;
}
</style>

</head>

<body>
   
<script src="js/javascriptProgress.js"></script>
    <!-- BACK TO TOP -->
    <div id="progress">
        <span id="progress-value">&#x1F815;</span>
    </div>

    <!-- CAROUSEL -->
    <div id="myCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="images/homeSlider/666(1).jpg " class="d-block w-100" alt="...">
                <div class="container">
                    <div class="carousel-caption text-start">
                        <h1 class="animate__animated animate__bounce animate__delay-1s animate__repeat-2	2" style=" color:rgb(17, 0, 255); ">SPITALI Health & Heal</h1>
                        <p class="animate__animated animate__bounceInLeft animate__delay-1s" style="margin-bottom: 300px; color: rgb(0, 0, 0);  font-size:30px;"><b>Gjithmonë në përkujdesje për shëndetin tuaj!</b></p>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img src="images/homeSlider/186176.png" class="d-block w-100" alt="...">
                <div class="container">
                    <div class="carousel-caption">
                        <h1 class="animate__animated animate__pulse animate__repeat-3	3" style="color:rgb(34, 48, 255); text-shadow: 0px 0px 30px rgb(255, 255, 255), 0px 0px 20px rgb(255, 255, 255)">Laboratorë cilësorë!</h1>
                        <p class="animate__animated animate__bounceInRight animate__delay-1s"  style="color:rgb(0, 0, 0); font-weight: bold; font-size:23px;">Të certifikuar sipas standardeve europiane, me laboratorantë të specializuar.Për rezultate mjekësore 100% të sakta!</p>
                    </div>
                </div>
            </div>

            <div class="carousel-item">
                <img src="images/homeSlider/186020.jpg" class="d-block w-100" alt="...">
                <div class="container">
                    <div class="carousel-caption text-end">
                        <h1 class="animate__animated animate__swing  animate__repeat-2	2" style="color:rgb(45, 49, 255); text-shadow: 0px 0px 30px rgb(255, 255, 255), 0px 0px 20px rgb(255, 255, 255)">Besojini shëndetin tuaj spitalit Health & heal!</h1>
                        <p class="animate__animated animate__bounceInUp animate__delay-1s" style="font-weight: bold; color:rgb(0, 0, 0); font-size:30px;">Shëndeti juaj është në duar të sigurta!</p>
                    </div>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
        <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>
    </div>
    </div>
    <!--END CAROUSEL -->


    <!-- SHERBIME -->
    <section id="section-padding" class="section-padding">
        <div class="container" data-aos="fade-up">
            <div class="section-title">
                <h2>SHËRBIMET TONA</h2>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                    <a href="doktor.php">
                        <div class="single-service">
                            <span class="icon"><i class="fa fa-user-md"></i></i></span>
                            <div class="content"> 
                                    <h5>Staf mjekësor</h5>
                                <p>Staf i specializuar mjekësh me shumë vite ekperiencë</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4">
                    <a  href="http://localhost/hms-project/HMS-master/HMS-master/Patient/reserveArea/index.php"  class= <?php if(isset($_SESSION['username'])){ 
                            if($_SESSION['emri_rol'] != 'pacient'){ echo "disabled";} else echo ""; }?> >
                      
                        
                          
               
                    
                        <div class="single-service">
                            <span class="icon"><i class="bi bi-calendar4-week"></i></span>
                            <div class="content">  
                                    <h5>Rezervo</h5>
                                <p>Rezervoni takimin tuaj tani<br>Plotësoni formularin</br>
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4">
                    <div class="single-service">
                        <a href="checkup_group.php">
                            <span class="icon"><i class="bi bi-clipboard-data"></i></span>
                            <div class="content">
                                    <h5>Paketat Check-Up</h5>
                                <p>Paketat Check-Up për femra dhe meshkuj. <br>Rezervoni tani paketën tuaj për vetëm 10000 lekë !</p>
                            </div>
                        </div>
                    </div>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- END OF SHERBIME -->

    <!-- ABOUT US -->
    <section id="about" class="about">
        <div class="container" data-aos="fade-up">
            <div class="section-title">
                <h2>RRETH NESH</h2>
                <p>
                    Të jesh lider dhe të vendosësh standardet në rang kombëtar dhe jo vetëm, për ne do të thotë të kesh zgjidhje për çdo kërkesë të çdo pacienti, t’u ofrosh atyre sistemin më efiçent dhe teknologjinë më të lartë në mbështetje të profesionalizmit të stafit.
                    Do të thotë të jesh gjithmonë disa hapa para e të mos ndalesh asnjë ditë së përmirësuari dhe avancuari nëpërmjet punës kërkimore dhe edukimit. Numri i madh i pacientëve, besimi dhe shpresa që është krijuar ndër ta, flet shumë për ne.
                    Flet për reputacionin e krijuar në dhjetë vite punë të ekipit të palodhur të spitalit. Flet edhe për pritshmërinë dhe përgjegjësinë e lartë para së cilës gjendemi çdo ditë për të justifikuar besimin e atyre që na kanë zgjedhur.
                </p>
            </div>
            <div class="row">
                <div class="col-xl-5 col-lg-6 video-box d-flex  justify-content-center align-items-stretch position-relative ">
                    <a href="https://youtube.com/channel/UCwJAExpigHzUHQNhzOPLcww" class="glight-box play-btn mb-4"></a>
                </div>
                <div class="col-xl-7 col-lg-6 icon-box d-flex flex-column justify-content-center align-items-stretch py-4 px-lg-5 ">
                    <div class="icon-box ">
                        <div class="icon"><i class="bx bx-heart"></i></div>
                        <h4 class="title"> <a href="">STAFI</a></h4>
                        <p class="description">Stafi mjekësor në Spitalin YouHeal përbëhet nga mjekë shqiptarë dhe të huaj me edukim në universitetet me të njohura, si dhe me një eksperiencë shumëvjeçare në fushën e mjekësisë në vend dhe jashtë. Profesionalizimi dhe përkushtimi
                            i mjekëve në Spitalin YouHeal mundëson për të gjithë pacientët shërbim mjekësor të specializuar në standartet më të larta që ofron mjekësia sot, në vend dhe rajon. </p>
                    </div>
                    <div class="icon-box ">
                        <div class="icon"><i class="bx bx-health"></i></div>
                        <h4 class="title"><a href="">URGJENCA</a></h4>
                        <p class="description">Urgjenca e SPITALIT YouHeal ofron shërbim të specializuar dhe në kohën e duhur për pacientët. Menaxhon me sukses të gjitha rastet që paraqiten duke e bërë këtë shërbim një hallkë kryesore të shtyllave të menaxhimit dhe trajtimit
                            të emergjencave me një numër mesatar prej 500 rastesh në muaj. </p>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- END ABOUT SECTION -->


    <!-- RASTE NE NEVOJE-->

    <section id="shell" class="shell">
        <div class="container" data-aos="fade-up">
            <div class="section-title">
                <h2>RASTE NË NEVOJË</h2>
                <h5>"Bamirësia nuk të varfëron" </h5>
            </div>
            <div class="container">
                <div class="row">
                        <?php
                    $query = ("SELECT  p.*, u.id, u.emri, u.mbiemri, TIMESTAMPDIFF(YEAR, datelindja, CURDATE()) AS age
                    FROM users u , pacient_ne_nevoje p
                    WHERE u.id = p.id");
                    $result = mysqli_query($con, $query);
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_array($result)) {
                    ?>
                    <div class="col-md-3">
                        <div class="wsk-cp-product">
                            <div class="wsk-cp-img">
                                <img src="Admin/pacientNevoje/images/<?php echo $row["image"]; ?>" alt="Product" class="img-responsive" />
                            </div>
                            <div class="wsk-cp-text">
                                <div class="category">
                                    <a href="Pagesa/index.php"> <span>Dhuro</span></a>
                                </div>
                                <div class="description-prod">
                                    <div class="col">
                                        <div class="row" style="color:black;">
                                            <p><span style="color: red;"><?php echo $row["emri"]; ?>
                                            <?php echo $row["mbiemri"]; ?></span> <br>
                                            Mosha: <?php echo $row["age"]; ?>
                                            <br> <span style="color:blue;">Nr llogarise bankare:</span>  <?php echo $row["nr_llogarise_bankare"]; ?> <br>
                                            <?php echo $row["pershkrimi"]; ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
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


    <?php
// Lidhja me databazen
$connect = mysqli_connect("localhost", "root", "", "hospital_database");
?>
<section style="background-color:#E8F9FD;">
    <div class="section-title">
        <h2>FEEDBACK NGA PACINETET E SPITALIT TONE</h2>
    </div>
    <section class="splide" aria-label="..." style="height:250px; padding:20px; width:90%;margin-left:60px;">
    <div class="splide__track">
    <ul class="splide__list">
        <?php
            $query = ("SELECT  p.suggestions, p.feedback, u.emri, u.mbiemri FROM poll p JOIN users u ON p.id_pacient = u.id WHERE p.post = 1");
            $result = mysqli_query($connect, $query);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_array($result)) {
            ?>
         
            <li class="splide__slide">
            <div class="splide__slide__container" style="text-align:center;">
            <p style="font-size:20px;font-family:cursive;"><?php echo $row['feedback']; ?> </p>
            <p><blockquote style="margin-left:50px;margin-right:50px;"><span style="font-size:15px;font-family:cursive;color:black;"><?php echo $row['suggestions'];?></span></blockquote></p>
                <p style="color:blue;"><?php echo $row['emri']; echo "  "; echo $row['mbiemri']; ?></p>
                </br>
                </div>
            </li>
       
       
        <?php
                }
            }
            ?> 
         </ul>
        </div>
        
        <!-- Add the progress bar element -->
       
        </section>

    </section>
 <!-- CONTACT -->
 <section class="contact" id="contact">
            <div class="container ">
                <div class="section-title">
                    <h2>Kontakt</h2>
                    <i class="bi bi-house-door-fill"></i>
                    <h4> Bulevardi Zogu I, Tiranë 1001, Albania</h4>
                </div> 
                <h4 class="sent-notification"></h4>
    <!-- GOOGLE MAP -->
    <div class="container">
    <div class="row">
        <div class="col-md-6">
        <div class="mapouter">
                    <div class="gmap_canvas"><iframe width="600" height="400" id="gmap_canvas" src="https://maps.google.com/maps?q=fshn&t=&z=5&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                        <style>
                            .mapouter { 
                                width: 400px;
                                height: 300px;
                            }
                        </style>
                        <a href="https://www.embedgooglemap.net"></a>
                        <style>
                            .gmap_canvas {
                                overflow: hidden;
                                background: none!important;
                                height: 400px;
                                width: 500px;
                            }
                        </style>
                    </div>
                </div>

        </div>
        <br />
<?php

    if(isset($_SESSION['username'])){
        $user = $_SESSION['username'];
    
        
        $query2 = ("SELECT  * FROM users WHERE username = '$user'");
                    $result3 = mysqli_query($con, $query2);
                    if (mysqli_num_rows($result3) > 0) {
                        while ($row = mysqli_fetch_array($result3)) {
                            $emri = $row['emri'];
                            $email = $row['email'];
                        }
                    }
    }
?>

        <div class="col-md-6">
       
             <form class="my-form" id="myForm" action="sendEmail.php" method="POST">
              <div class="form-group">
                  <label for="form-name">Emri</label>
                  <input type="text" <?php if(isset($_SESSION['username'])){ ?> value ="<?php  echo $emri?>" <?php  } ?> class="form-control" id="emri" placeholder="Emri">
              </div>
              <div class="form-group">
                  <label for="form-email" >Email Address</label>
                  <input type="email" <?php if(isset($_SESSION['username'])){ ?> value ="<?php  echo $email?>" <?php  } ?> class="form-control" id="email" placeholder="Adresa juaj e email">
              </div>
              <div class="form-group">
                  <label for="form-subject">Subject</label>
                  <input type="text" class="form-control" id="subject" placeholder="Subject">
              </div>
              <div class="form-group">
                  <label for="form-message">Vendosni mesazhin tuaj</label>
                  <textarea class="form-control" id="body" placeholder="Message"></textarea>
              </div>
              <button class="btn btn-default rounded " style="margin-left: 200px ; margin-top: 18px ;" onclick="sendEmail()" type="button">DERGO</button>                
          </form>
      </div>
  </div>
</div>
<style>
    .my-form {
        color: #305896;
    }
    .my-form .btn-default {
        background-color: #305896;
        color: #fff;
        border-radius: 0;
    }
    .my-form .btn-default:hover {
        background-color: #4498C6;
        color: #fff;
    }
    .my-form .form-control {
        border-radius: 0;
    }
</style>


        </section> 



    <!-- Partneret -->
 
    <section id="section-padding" class="section-padding ">
        <div class="container " data-aos="fade-up">
            <div class="container " data-aos="fade-up">
                <div class="section-title " style="margin-top: 40px;">
                    <h2>KLIENTË DHE PARTNERË</h2>
                </div>
                <div class="container">
                    <section class="customer-logos slider">
                        <div class="slide"><img src="images/partner/albsig.png"></div>
                        <div class="slide"><img src="images/partner/bkt.png"></div>
                        <div class="slide"><img src="images/partner/digitalb.png"></div>
                        <div class="slide"><img src="images/partner/eurosig.png"></div>
                        <div class="slide"><img src="images/partner/insig.png"></div>
                        <div class="slide"><img src="images/partner/oledrohot.png"></div>
                        <div class="slide"><img src="images/partner/paracetamol.png"></div>
                        <div class="slide"><img src="images/partner/rainfaissen.png"></div>
                        <div class="slide"><img src="images/partner/rapidols.png"></div>
                        <div class="slide"><img src="images/partner/sicred.png"></div>
                    </section>
                </div>
    </section>
   
    <!-- footer -->
    <?php include "footer.html"?>
    <script>
        
        $(function(){
       
       $(".dropdown-menu").on('click', 'li a', function(){
         $(".btn:first-child").text($(this).text());
         $(".btn:first-child").val($(this).text());
         alert($(".btn:first-child").text($(this).text()));
         alert($(".btn:first-child").val($(this).text()));
       });
       
       });
       </script>
           </script>
       
        <script type="text/javascript">
         function sendEmail(){
            var emri=$("#emri");
            var email=$("#email");
            var subject=$("#subject");
            var body=$("#body");
            if(isNotEmpty(emri) && isNotEmpty(email) && isNotEmpty(subject) && isNotEmpty(body)){
              $.ajax({
                 url:'sendEmail.php',
                 method:'POST',
                 dataType:'json',
                 data:{
                    emri: emri.val(),
                    email: email.val(),
                    subject: subject.val(),
                    body: body.val()
                 },success: function(data){
                     $('#myForm')[0].reset();
                     Swal.fire({
  position: 'top-center',
  icon: 'success',
  title: 'Mesazhi juaj eshte derguar me sukses!',
  showConfirmButton: false,
  timer: 1500
})              
                 }
              });
           }
           else{
            Swal.fire({
  position: 'top-center',
  icon: 'warning',
  title: 'KUJDES!',
  text:"Plotesoni fushat sic duhet!",
  showConfirmButton: false,
  timer: 1500
})

           }
         }
         function isNotEmpty(caller){
           if(caller.val()==""){
           caller.css('border','1px solid red');
           return false;
         }
         else
         {
           caller.css('border','');
           return true;
       }
        }
       </script>

</body>
    <!-- CSS -->
    <link href="css/style.css" rel="stylesheet">
    <script src="js/javascript.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <link href="https://fonts.googleapis.com/css2?family=Fruktur&family=Indie+Flower&family=Inspiration&family=Josefin+Slab:wght@300&family=Pacifico&family=Quicksand&family=Roboto:wght@100&family=Titillium+Web:wght@200;300&display=swap" rel="stylesheet">

    <link href="vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->

    <link href="css/style.css" rel="stylesheet">
    <link href="css/checkup.css" rel="stylesheet">

<script src="resource/js/jquery-1.11.0.js"></script>


<script>
        
    $(function(){

    $(".dropdown-menu").on('click', 'li a', function(){
    $(".btn:first-child").text($(this).text());
    $(".btn:first-child").val($(this).text());
    alert($(".btn:first-child").text($(this).text()));
    alert($(".btn:first-child").val($(this).text()));
    });

    });

    //per pjesen e splide
    var splide = new Splide( '.splide' );
    var bar    = splide.root.querySelector( '.my-slider-progress-bar' );
    
    // Update the bar width:
    splide.on( 'mounted move', function () {
        var end = splide.Components.Controller.getEnd() + 1;
        bar.style.width = String( 100 * ( splide.index + 1 ) / end ) + '%';
    } );
    
    splide.mount();

    new Splide( '.splide', { 
    type  : 'fade',
    perPage: 1,
    gap: 0,
    padding: 0,
    rewind: false,
    width : '100vw',
    height: '10vw',
    // cover: true,
    autoplay: true,
    interval: 4000
    } ).mount();

</script>
   
</html>