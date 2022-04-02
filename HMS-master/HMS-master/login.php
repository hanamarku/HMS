<?php
$err_username = $err_fjalekalimi = $err = $err1 = $sukses = "";
if(isset($_POST["hyr1"])){
    if(!empty($_POST['username1']) && !empty($_POST['password1'])){
        $user = real_escape_string($_POST['username1']);
        $pass = real_escape_string($_POST['password1']);

        //DB Connection
        require "Connection.php";

        //select DB from database

        if(empty($user)){
            $err_username = 'Ju lutem plotësoni username-in !';
        }
        if(empty($pass)){
            $err_fjalekalimi = 'Ju lutem plotësoni fjalëkalimin !';
        }
        if(!empty($errors)){
            foreach($errors as $value)
            echo $value."<br/>";
        }else{
            //selecting database
            $query = mysqli_query($con, "SELECT *FROM user_pacient WHERE username = '".$user."' AND fjalekalimi = '".$pass."'");
            $numrows = mysqli_num_rows($query);
            if($numrows != 0){
                while($row = mysqli_fetch_assoc($query)){
                    $dbusername = $row['username'];
                    $dbfjalekalim = $row['fjalekalimi'];
                }
                if($user == $dbusername && $pass == $dbfjalekalim){
                    if(isset($_POST['mbaj_mend'])){
                        setcookie('username', $_POST['username1'], time()+3600, '', '');
                        setcookie('password', $_POST['password1'], time()+3600, '', '');
                    }
                    $sukses = 'Ju u loguat me sukses !';
                    session_start();
                    $_SESSION['username'] = $user;
                    header("refresh:1;url=index.html");
                }
            }else{
                $err = 'Username ose fjalëkalimi nuk është i saktë !';
            }
        }
    }else
    $err1 = "Duhet të plotësoni të gjitha fushat !";
    }

?>


    <html>

    <head>
        <title>HMS</title>
        <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png" />
        <link rel="stylesheet" type="text/css" href="login.css">
        <link href="https://fonts.googleapis.com/css?family=IBM+Plex+Sans&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

        <script>
        </script>
    </head>

    <body>


        <div class="container login" style="font-family: 'IBM Plex Sans';">
            <div class="row">
                <div class="col-md-9 login" id="formaLogin" style="margin-top: 40px;left: 80px;">
                    <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist" style="width: 40%;">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Pacient</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Doktor</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#admin" role="tab" aria-controls="admin" aria-selected="false">Admin</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

                            <h5 style="position:relative;color:#950101;">
                                <?php echo $err1;?>
                            </h5>
                            <h4 style="position:relative;color:#06FF00;">
                                <?php echo $sukses;?>
                            </h4>
                            <h3 class="login-heading" style="font-weight: bold;">Hyr si Pacient</h3>
                            <form method="post" action="login.php">

                                <div class="col login-form">
                                    <div class="row-md-4">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Username " name="username1" />
                                        </div>
                                    </div>

                                    <div class="row-md-4">
                                        <div class="form-group">
                                            <input type="password" class="form-control" placeholder="Password" name="password1" />
                                        </div>
                                    </div>
                                    <h5 style="position:relative;color:#950101;">
                                        <?php echo $err;?>
                                    </h5>
                                    <div class="row-md-4">
                                        <div class="form-group">
                                            <label style="font-weight: bold; color: black;"><input type="checkbox" checked="checked" name="remember" value=""> Më kujto</label> <br>
                                            <a class="linku" style="color: blue; text-decoration: none; font-weight: bold;" href="register.php">Nuk keni një profil ? Regjistrohuni !</a> <br>
                                            <input type="submit" class="btnlogin" name="hyr1" value="Hyr" />
                                        </div>
                                    </div>

                                </div>
                            </form>
                        </div>

                        <div class="tab-pane fade show" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <h3 class="login-heading " style="font-weight: bold;">Hyr si Doktor</h3>
                            <form method="post" action="func3.php">
                                <div class="col login-form">
                                    <div class="row-md-4">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Username " name="username2" />
                                        </div>
                                    </div>

                                    <div class="row-md-4">
                                        <div class="form-group">
                                            <input type="password" class="form-control" placeholder="Password" name="password2" />
                                        </div>
                                    </div>
                                    <div class="row-md-4">
                                        <div class="form-group">
                                            <label style="font-weight: bold; color: black;"><input type="checkbox" checked="checked" name="remember" value="" > Më kujto</label> <br>
                                            <!-- <a href="index.html">Nuk keni nje profil ? Regjistrohuni !</a> -->
                                            <input type="submit" class="btnlogin" name="hyr2" value="Hyr" />
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>


                        <div class="tab-pane fade show" id="admin" role="tabpanel" aria-labelledby="profile-tab">
                            <h3 class="login-heading" style="font-weight: bold;">Hyr si Admin</h3>
                            <form method="post" action="func3.php">
                                <div class="col login-form">
                                    <div class="row-md-4">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Username " name="username3" onkeydown="alphaOnly(event);" required/>
                                        </div>
                                    </div>

                                    <div class="row-md-4">
                                        <div class="form-group">
                                            <input type="password" class="form-control" placeholder="Password" name="password3" required/>
                                        </div>
                                    </div>
                                    <div class="row-md-4">
                                        <div class="form-group">
                                            <label style="font-weight: bold; color: black;"><input type="checkbox" name="mbaj_mend"  checked="checked" value="1"> Më kujto</label> <br>
                                            <!-- <a href="index.html">Nuk keni nje profil ? Regjistrohuni !</a> -->
                                            <input type="submit" class="btnlogin" name="hyr3" value="Hyr" />
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>

        </div>

    </body>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>

    </html>

    <?php
 if(isset($_COOKIE['username1']) && isset($_COOKIE['password1'])){
     $username=$_COOKIE['username1'];
     $password=$_COOKIE['password1'];
     echo"<script>
     document.getElementById('username1').value='$username';
     document.getElementById('password1').value='$password';
     </script>";
 }
?>