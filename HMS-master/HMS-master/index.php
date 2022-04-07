<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Health & Heal</title>
    <!-- CSS -->
    <link href="css/style.css" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- JavaScript Bundle with Popper -->

    <script src="js/javascript.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">


    <link href="https://fonts.googleapis.com/css2?family=Fruktur&family=Indie+Flower&family=Inspiration&family=Josefin+Slab:wght@300&family=Pacifico&family=Quicksand&family=Roboto:wght@100&family=Titillium+Web:wght@200;300&display=swap" rel="stylesheet">
    <!-- Vendor CSS Files -->

    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->

    <link href="css/style.css" rel="stylesheet">
    <link href="css/checkup.css" rel="stylesheet">

    <script src="resource/js/jquery-1.11.0.js"></script>


</head>

<body>
    <?php include "header.html"?>


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
                        <h1 style="margin-bottom: 300px; color:rgb(17, 0, 255); text-shadow: 0px 0px 30px rgb(0, 0, 0), 0px 0px 20px rgb(3, 3, 3)">SPITALI Health & Heal</h1>
                        <p style=" color: rgb(0, 0, 0); text-shadow: 0px 0px 30px rgb(0, 0, 0), 0px 0px 20px rgb(0, 0, 0)"><b>Gjithmonë në përkujdesje për shëndetin tuaj!</b></p>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img src="images/homeSlider/186176.png" class="d-block w-100" alt="...">
                <div class="container">
                    <div class="carousel-caption">
                        <h1 style="color:rgb(34, 48, 255); text-shadow: 0px 0px 30px rgb(255, 255, 255), 0px 0px 20px rgb(255, 255, 255)">Laboratorë cilësorë!</h1>
                        <p style="color:rgb(0, 0, 0); font-weight: bold; text-shadow: 0px 0px 30px rgb(0, 0, 0), 0px 0px 20px rgb(0, 0, 0)">Të certifikuar sipas standardeve europiane, me laboratorantë të specializuar.Për rezultate mjekësore 100% të sakta!</p>
                    </div>
                </div>
            </div>

            <div class="carousel-item">
                <img src="images/homeSlider/186020.jpg" class="d-block w-100" alt="...">
                <div class="container">
                    <div class="carousel-caption text-end">
                        <h1 style="color:rgb(45, 49, 255); text-shadow: 0px 0px 30px rgb(255, 255, 255), 0px 0px 20px rgb(255, 255, 255)">Besojini shëndetin tuaj spitalit Health & heal!</h1>
                        <p style="font-weight: bold; color:rgb(0, 0, 0); text-shadow: 0px 0px 30px rgb(0, 0, 0), 0px 0px 20px rgb(0, 0, 0)">Shëndeti juaj është në duar të sigurta!</p>
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
                        <div class="single-service">
                            <span class="icon"><i class="fa fa-user-md"></i></i></span>
                            <div class="content">
                                <a href="doktor.php">
                                    <h5>Staf mjekësor</h5>
                                </a>
                                <p>Staf i specializuar mjekësh me shumë vite ekperiencë</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="single-service">
                            <span class="icon"><i class="bi bi-calendar4-week"></i></span>
                            <div class="content">
                                <a href="reservation.html">
                                    <h5>Rezervo</h5>
                                </a>
                                <p>Rezervoni takimin tuaj tani<br>Plotësoni formularin</br>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="single-service">
                            <span class="icon"><i class="bi bi-clipboard-data"></i></span>
                            <div class="content">
                                <a href="checkup.html">
                                    <h5>Paketat Check-Up</h5>
                                </a>
                                <p>Paketat Check-Up për femra dhe meshkuj. <br>Rezervoni tani paketën tuaj për vetëm 10000 lekë !</p>
                            </div>
                        </div>
                    </div>
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
                    <div class="col-md-3">
                        <div class="wsk-cp-product">
                            <div class="wsk-cp-img">
                                <img src="images/dhurim/client1.jpeg" alt="Product" class="img-responsive" />
                            </div>
                            <div class="wsk-cp-text">
                                <div class="category">
                                    <a href="#"> <span>Dhuro</span></a>
                                </div>
                                <div class="description-prod">
                                    <div class="col">
                                        <div class="row">
                                            <p><span style="color: red;">Noel Benzema</span> <br>24 vjec <br>Janë kryer 7 operacione për të ndihmuar Noelin t'i shpëtohen veshkat! Veshka e majtë është jashtë funksionit dhe po dëmtohet edhe veshka e djathtë.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="wsk-cp-product">
                            <div class="wsk-cp-img"><img src="images/dhurim/client2.jpg" alt="Product" class="img-responsive" /></div>
                            <div class="wsk-cp-text">
                                <div class="category">
                                    <a href="#"> <span>Dhuro</span></a>
                                </div>
                                <div class="description-prod">
                                    <div class="col ">
                                        <div class="row">
                                            <p><span style="color: red;">Dejana Oruci</span> <br>21 vjec <br>Flavja, që në moshën 1 vjeçare shfaqi probleme me mëlçinë. (Fibrozë Hepatike Kongenitale).Ajo është në limitet e rikuperimit nga mëlçia.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="wsk-cp-product">
                            <div class="wsk-cp-img"><img src="images/dhurim/client3.png" alt="Product" class="img-responsive" /></div>
                            <div class="wsk-cp-text">
                                <div class="category">
                                    <a href="#"><span>Dhuro</span></a>
                                </div>
                                <div class="description-prod">
                                    <div class="col">
                                        <div class="row">
                                            <p><span style="color: red;">Franck Ribery</span> <br>39 vjec <br>Si pasojë e një leuçemie të rrallë Franck është në luftë për jetën. Ai duhet të nisë mënjëherë trasplantin e palcës së shtylles kurrizore.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="wsk-cp-product">
                            <div class="wsk-cp-img"><img src="images/dhurim/client4.jpg" alt="Product" class="img-responsive" /></div>
                            <div class="wsk-cp-text">
                                <div class="category">
                                    <a href="#"><span>Dhuro</span></a>
                                </div>
                                <div class="description-prod">
                                    <div class="col">
                                        <div class="row">
                                            <p><span style="color: red;">Ajsela Salah</span> <br>14 vjec <br>Ajsela ka epilepsi dhe është drejt verbimit. Le të bëhemi bashkë, për t'i mundësuar operacionin në kokë . 11.000 Euro është fatura nga Spitali në
                                                Turqi.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Partneret -->
    <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="js/javascript.js"></script>
    <section id="section-padding" class="section-padding">
        <div class="container" data-aos="fade-up">
            <div class="container" data-aos="fade-up">
                <div class="section-title">
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
    <!-- CONTACT -->
    <!-- <section class="contact" id="contact">
            <div class="container ">
                <div class="section-title">
                    <h2>Contact</h2>
                    <i class="bi bi-house-door-fill"></i>
                    <h4> Bulevardi Zogu I, Tiranë 1001, Albania</h4>
                </div> -->
    <!-- GOOGLE MAP -->
    <!-- <div class="mapouter">
                    <div class="gmap_canvas"><iframe width="600" height="400" id="gmap_canvas" src="https://maps.google.com/maps?q=fshn&t=&z=5&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>

                        <style>
                            .mapouter {
                                position:relative;
                                text-align: right;
                                height: 500px;
                                width: 600px;
                                margin-left: 25%;
                            }
                        </style>
                        <a href="https://www.embedgooglemap.net"></a>
                        <style>
                            .gmap_canvas {
                                overflow: hidden;
                                background: none!important;
                                height: 500px;
                                width: 600px;
                                
                                
                            }
                        </style>
                    </div>
                </div>
            </div>
        </section> -->
    <!-- footer -->
    <?php include "footer.html"?>


    <!-- Vendor JS Files -->
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/glightbox/js/glightbox.min.js"></script>
    <script src="vendor/php-email-form/validate.js"></script>
    <script src="vendor/purecounter/purecounter.js"></script>
    <script src="vendor/swiper/swiper-bundle.min.js"></script>
    <script src="js/jquery-1.11.2.min.js"></script>
    <script src="js/bootstrap.min.js"></script>


    <!-- Template Main JS File -->
    <script src="js/main.js"></script>


</body>

</html>