

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<?php
     if(isset($_SESSION['username'])){
         header("location:index.php");
     }
     ?>

<script>
        window.history.forwrad();
    </script>
<?php
//DB Connection
require "Connection.php";
session_start();


$err_username = $err_fjalekalimi = $err = $err1 = $sukses = "";
$attempt=0;



if(isset($_POST["hyr1"])){
    $username = $_POST['username'];
    $fjalekalimi = $_POST['fjalekalimi'];
    //$userType = $_POST['userType'];
    
    //$_SESSION["rol"] = $userType;
    // echo "<script>alert('$userType');</script>";
   
    // if($userType == 0){
    //     $_SESSION['emri_rol']='pacient';
    // }else if($userType == 1){
    //     $_SESSION['emri_rol']='doktor';
    // }else{
    //     $_SESSION['emri_rol']='admin';
    // }
        
    
        if(!empty($_POST['username']) && !empty($_POST['fjalekalimi']) ){
        $user = mysqli_real_escape_string($con, $username);
        $pass = mysqli_real_escape_string($con,$fjalekalimi);
        // $roleId = mysqli_real_escape_string($con,$roleId);
                
        $pass = md5($pass); 
       
            $pdo=new PDO('mysql:host=localhost;dbname=hospital_database','root',"");
            $sql =  "SELECT *FROM users WHERE username = :username AND fjalekalimi = :fjalekalimi ";
            //$sql =  "SELECT *FROM users WHERE username = :username AND fjalekalimi = :fjalekalimi AND roleId = :roleId";
            $stmt=$pdo->prepare($sql);
            $stmt->bindParam(":username",$user);
            $stmt->bindParam(":fjalekalimi",$pass);
            //$stmt->bindParam(":roleId",$userType);
            $stmt->execute();
            //$rowProve = $stmt->fetch();
            //$result=$stmt->fetch();
            //echo $result['verify_status'];
        

            
            //end
            if($result=$stmt->fetch()) {
                if($result['verify_status']==1){

                }else{
                    $_SESSION['status'] = "Ju lutem verifikoni adresen tuaj te email-it per te aktivizuar llogarine tuaj ! ";
                    header("Location: login.php");
                    exit(0);
                }
                    $_SESSION['username'] = $username;
                   
                    // $status_query = "SELECT verify_status FROM users WHERE username = '$username' AND fjalekalimi = '$pass' LIMIT 1";
                    // $status_query_run = mysqli_query($con, $status_query);
                    // if(mysqli_num_rows($status_query_run) > 0){
                    //     $rowStatus = mysqli_fetch_array($status_query_run);
                    //     echo $rowStatus[0];
                    // }


                   
                    $userType = mysqli_query($con, "SELECT * FROM roles r INNER JOIN users u ON r.roleId = u.roleId WHERE u.username = '$username' AND fjalekalimi = '$pass'");
                    if($row = mysqli_fetch_row($userType)){
                        $_SESSION["rol"] = $row[0];
                        $_SESSION["emri_rol"] = $row[1];
                        // $err = $_SESSION["rol"];
                        // $err .= $_SESSION["rol_name"];
                               
                               header("refresh:2;url=index.php");
                       
        
        
                        } else {
        
                        $err = "Username ose fjalekalimi eshte gabim";
                    }
                
        
                    if(isset($_POST['mbaj_mend'])){
                        setcookie('username', $_POST['username'], time()+3600, '', '');
                        setcookie('fjalekalimi', $_POST['fjalekalimi'], time()+3600, '', '');
                    }
                    // $sukses = 'Ju u loguat me sukses !';
                    echo '<script type="text/javascript">';
                    echo 'setTimeout(function () { swal({
                        title: "Ju u loguat me sukses !",
                        text: " ",
                        icon: "success",
                        buttons: false
                      });';
                    echo '}, 200);</script>';
                  
                 
                    

                    //                 $_SESSION["login_attempts"] += 1;
                    //                 if ($_SESSION["login_attempts"] >2 )
                    // {
                    //     $_SESSION["locked"] = time();
                        // $err ="Please wait for 30 seconds";
                        
                    //      if (isset($_SESSION["locked"]))

                    // {
                    //     $difference = time() - $_SESSION["locked"];
                    //     if ($difference > 2)
                    //     {
                    //         header("refresh:1;url=login.php");
                        
                    //     }
                    //}
                // }
            }else{
                    // $err1 = 'Username ose fjalëkalimi nuk është i saktë !';
                    echo '<script type="text/javascript">';
                    echo 'setTimeout(function () { swal({
                        title: "Username ose fjalëkalimi nuk është i saktë !",
                        text: " ",
                        icon: "error",
                        buttons: false,
                        timer: 2000,
                      });';
                    echo '}, 100);</script>';
                   
                    
                  
                }
    }
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
        <script src="https://code.jquery.com/jquery-3.2.1.js"></script>

        <link href="vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
        <script src="sweetalert2.min.js"></script>
        <link rel="stylesheet" href="sweetalert2.min.css">

        <script>
            window.setTimeout(function () {
                $(".alert").fadeTo(500, 0).slideUp(500, function () {
                    $(this).remove();
                });
            }, 2000);
        </script>
    </head>

    <body>

        <div class="container login" style="font-family: 'IBM Plex Sans';">
            <div class="row">
                <div class="col-md-9 login" id="formaLogin" style="margin-top: 40px;left: 80px;">
                <a href="index.php"  style="text-decoration:none; color: white;"><button class="kthehu" style=" border: none;border-radius: 1.5rem;padding: 2%;background: #0523b9;color: #fff;font-weight: 700;width: 10%;cursor: pointer; "> 
                            <i class="bi bi-house-door" style="font-size:20px;"></i></button>
                </a>
           
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        
                        <?php
                        if(isset($_SESSION['status'])){
                            ?>
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <h5 class="msg"><?= $_SESSION['status']; ?></h5>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <?php
                            unset($_SESSION['status']);
                        }
                        ?>

                        

                            <h5 id="errorMsg" style="position:relative;color:#950101;">
                                <?php echo $err1;?>
                            </h5>
                            <h4  style="position:relative;color:#06FF00;">
                                <?php echo $sukses;?>
                            </h4>
                            <h3 class="login-heading" style="font-weight: bold;">Hyr</h3>
                            <form method="post" action="login.php" name="form1" id="form1">
                            </div> 

                           
                           
                            
                                <div class="col login-form">
                                    <div class="row-md-4">
                                        <div class="form-group">
                                        <!-- <input type="hidden" name="roli" value="0"> -->
                                         <input type="text" class="form-control" placeholder="Username" id="username"  name="username"  required oninvalid="this.setCustomValidity('Ju lutem plotësoni username-in !')" oninput="this.setCustomValidity('')" />
                                            </label><span id='message6'></span></span>
                                        </div>
                                    </div>

                                    <div class="row-md-4">
                                        <div class="form-group">
                                            <input type="password" class="form-control" placeholder="Password" id="fjalekalimi"  name="fjalekalimi"  required oninvalid="this.setCustomValidity('Ju lutem plotësoni fjalëkalimin !')" oninput="this.setCustomValidity('')"/>
                                            </label><span id='message1'></span></span>
                                        </div>
                                    </div>
                                    <h5 style="position:relative;color:#950101;"><?php echo $err;?></h5>   
                                    <!-- <div class= "form-group lead" > 
                                        <label for="usertype">Hyr si :</label>
                                        <input type="radio" name="userType" value="0"  class= "custom-radio" required oninvalid="this.setCustomValidity('Plotesimi i njeres prej ketyre fushave eshte i detyrueshem !')" oninput="this.setCustomValidity('')">&nbsp;Pacient 
                                        <input type="radio" name="userType" value="1"  class= "custom-radio" required>&nbsp;Doktor   
                                        <input type="radio" name= "userType" value="2"   class= "custom-radio" required>&nbsp; Admin 
                                    </div>  -->
                                    <div class="row-md-4">
                                        <div class="form-group">
                                            <label style="font-weight: bold; color: black;"><input type="checkbox" checked="checked" name="remember" value=""> Më kujto</label> <br>
                                            <a class="linku" style="color: blue; text-decoration: none; font-weight: bold;" href="register.php">Nuk keni një profil ? Regjistrohuni si pacient!</a> <br> 
                                            <input type="submit" class="btnlogin btn btn-primary " name="hyr1" id="hyr1" value="Hyr" /> <br> <br>
                                            Nuk ju ka ardhur email-i konfirmues ? <a style="color:blue;" href="resend_email_verification.php">Dergo perseri !</a> <br>
                                            <a href="forgot_password.php" class="float-end" style="color:blue;">Keni harruar fjalekalimin ?</a>
                                            <!-- <button type="submit" id="hyr1" name="hyr1" class="btn btn-primary">hyr</button> -->
                                        </div>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>

        </div>

    <script  type="text/javascript">

        $(function() {

            $("#message1").hide();
            $("#message6").hide();
            var message_username = false;
            var message_fjalekalim = false;

            $("#username").keyup(function(){
            checkUserName();
            });

            $("#fjalekalimi").keyup(function(){
            checkPasswordValidation();
            });

            function checkUserName() { 
                var username = $("#username").val().trim();
                if(username === '') {
                    $("#message6").html("Username nuk duhet te jete bosh !").css('color', '#890F0D'); 
                    $("#message6").show();
                    $("#username").css("border","2px solid #F90A0A");
                    message_username = true;
                }else if(username.length < 5) {
                    $("#message6").html("Username duhet te permbaje te pakten 5 karaktere !").css('color', '#890F0D'); 
                    $("#message6").show();
                    $("#username").css("border","2px solid #F90A0A");
                    message_username = true;
                    }else if(/\s/.test(username)){  
                        $("#message6").html("Username nuk mund te permbaje karakter bosh-hapesire!").css('color', '#890F0D'); 
                        $("#message6").show();
                        $("#username").css("border","2px solid #F90A0A");
                        message_username = true;
                        }else{
                            $("#message6").hide();
                            $("#username").css("border","2px solid #34F458");
                        }
            }


            function checkPasswordValidation() {
                var pass = $("#fjalekalimi").val().trim();
                if(pass === ''){
                    $("#message1").html("Fjalëkalimi nuk mund te jete bosh !").css('color', '#890F0D'); 
                    $("#message1").show();
                    $("#fjalekalimi").css("border","2px solid #F90A0A");
                    message_fjalekalim = true;
                }else
                if(pass.length < 8){
                    $("#message1").html("Fjalëkalimi permban jo më pak se 8 karaktere !").css('color', '#890F0D'); 
                    $("#message1").show();
                    $("#fjalekalimi").css("border","2px solid #F90A0A");
                    message_fjalekalim = true;
                }else{
                    $("#message1").hide();
                    $("#fjalekalimi").css("border","2px solid #34F458");
                }
            }

            $("#form1").submit(function() {
                message_fjalekalim = false;
                message_username = false;

                checkUserName();
                checkPasswordValidation();

                if (message_fjalekalim === true  || message_username === true ) {
                    swal({
                        title: "Kujdes !",
                        text: "Plotesoni te gjitha fushat sic duhet !",
                        icon: "warning",
                        // buttons: false,
                        // timer: 2000,
                      });
                return false;
                }
            });
        });
    </script> 

    </body>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>

    </html>

    <?php
//  if(isset($_COOKIE['username']) && isset($_COOKIE['fjalekalimi'])){
//      $username=$_COOKIE['username'];
//      $password=$_COOKIE['fjalekalimi'];
//      echo"<script>
//      document.getElementById('username').value='$username';
//      document.getElementById('fjalekalimi').value='$password';
//      </script>";
//  }
?>