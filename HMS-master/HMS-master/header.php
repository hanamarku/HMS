<?php

require "Connection.php";
session_start();
?>
<link href="css/style.css" rel="stylesheet">
<script src="login.php"></script>
<script src="js/javascript.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<link href="css/style.css" rel="stylesheet">
<link href="css/checkup.css" rel="stylesheet">

<nav class="navbar navbar-expand-lg navbar-light bg-light" style="background-color: #61a5c2;">
    <div class="container">
        <img src="images/logo.png" alt="..." height="56">
        <p class="navbar-brand mt-4" style="font-family: Pacifico;font-size: 25px;font-weight: bold;">Health &#38; Heal</p>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto py-0">
                <a href="index.php" class="nav-item nav-link">
                    <i class="bi bi-house-door-fill " style="color:rgb(0, 0, 0);"></i>
                </a>
                <a style="color:rgb(0, 0, 0);" href="#about" class="nav-item nav-link">Rreth Nesh</a>
                <div class="dropdown">
                <button class="btn btn-outline-primary dropdown-toggle" style="color: black;" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    Departamentet
                </button>
                <?php
                    $sql = "SELECT * FROM `db_departament`";
                    $all_dep_names = mysqli_query($con, $sql);
                    // $_SESSION['dep'];
                ?>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1" name="thenumbers">
                <?php while ($dep_list = mysqli_fetch_array($all_dep_names, MYSQLI_ASSOC)) :;?>																			
                    <li><a class="dropdown-item" href="departament.php?emri=<?php echo $dep_list['emri']; ?>"><?php echo $dep_list["emri"];?></a></li>
                   
                    <?php endwhile;?>	
                   								
                </ul>
                </div>
                <?php
                ?>


                <input type="hidden" id="mydata" name="mydata" value='data'>
                <form class="navbar-form form-inline" action="search.php"  method="POST">
                    <div class="input-group search-box">
                        <input type="text" name="submit" id="search" placeholder="Kerko ketu..." class="form-control">
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="bi bi-search"></i>
                                </span>
                            </div>
                        </div>
                    </form>
                </div>
                
                <?php if(isset($_SESSION["username"]) ) {?>
                <div><a  href=<?php if($_SESSION["rol"]=="0")
                {echo "Patient/indexPatient.php";}else if($_SESSION["rol"]=="1"){echo "Doctor/indexDoctor.php";}
                else if($_SESSION["rol"]=="2"){echo "Admin/indexAdmin.php";}?>><button style="font-family:monospace; font-weight:bold;" type="button" class="btn btn-success">Profili im : <span style="text-align:center;color:black;"><?php echo $_SESSION['username']?></span></button></a>
                </div>
                <p><?php } else{?>

                <div class="navbar-nav ml-auto action-buttons">
                    <div class="nav-item ">
                        <a style="color:rgb(0, 0, 0);" href="login.php" class="nav-link ">Hyr</a>
                    </div>
                    <div class="nav-item ">
                        <a href="register.php" class="btn btn-primary ">Regjistrohu</a>
                    </div>
                </div>
                <?php } ?>
    </div>
</nav>
<script>
    var elements = document.getElementsByClassName('dropdown-item');
var data;
Array.from(elements).forEach((element) => {
  element.addEventListener('click', (event) => {
    data = `${event.target.innerText}`;
    $("#mydata").val(data);
  });
});


</script>
