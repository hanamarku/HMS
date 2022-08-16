<!DOCTYPE html>
<html>
<head>
<title>FeedbacK Engine</title>
<!-- custom-theme -->

<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<meta name="keywords" content="Elegant Feedback Form  Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //custom-theme -->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
// <link href="//fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
</head>
<body >
<?php include "headerPatient.php"; ?>
  <main id="main" class="main">
    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="../../index.php">Home</a></li>
		  <li class="breadcrumb-item active"><a href="http://localhost/hms-project/HMS-master/HMS-master/Patient/indexPatient.php">Dashboard</a></li>
          <li class="breadcrumb-item active">Feedback</li>
        </ol>
      </nav>
    </div>
    <?php
                        if(isset($_SESSION['succes'])){
                            ?>
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <h5 class="msg"><?= $_SESSION['succes']; ?></h5>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <?php
                            unset($_SESSION['succes']);
                        }
                        ?>
    <div class="w3layouts_main wrap rounded" style="background-color: white ;">
	  <h3 style="color:#008B8B ; font:bold;">Ju lutemi na ndihmoni që t'ju shërbejmë më mirë duke marrë disa minuta. </h3>
	    <form action="feedback.php" id="feedback" method="post" class="agile_form">
		  <h2 style="color: black; font:bold;">Sa të kënaqur ishit me Shërbimin tonë?</h2>
			 <ul class="agile_info_select">
				 <li><input type="radio" name="feedback" value="Shume mire" id="excellent" required> 
				 	  <label for="excellent" style="color:#00BFFF ;">Shume mire</label>
				      <div class="check w3"></div>
				 </li>
				 <li><input type="radio" name="feedback" value="Mire" id="good"> 
					  <label for="good" style="color:#00BFFF ;"> Mire</label>
				      <div class="check w3ls"></div>
				 </li>
				 <li><input type="radio" name="feedback" value="neutral" id="neutral">
					 <label for="neutral" style="color:#00BFFF ;">Neutral</label>
				     <div class="check wthree"></div>
				 </li>
				 <li><input type="radio" name="feedback" value="Keq" id="poor"> 
					  <label for="poor" style="color:#00BFFF;">Dobet</label>
				      <div class="check w3_agileits"></div>
				 </li>
			 </ul>	  
			<h2 style="color: black; font:bold;">Nëse keni komente specifike, ju lutemi na shkruani ...</h2>
			<textarea  style="background-color: #AFEEEE; font:bold;  color:#696969" placeholder="Shprehni eksperiencen tuaj ne lidhje me spitalin tone." class="w3l_summary" name="suggestions" required=""></textarea>
			<h2 style="color: black; font:bold;">Deshironi qe Feedback juaj te postohet ne faqen tone? </h2>
			<input type="radio" name="aprovoj" value="Po"  checked><span style="color:#00BFFF;"> Po </span></input>
			<input type="radio" name="aprovoj" value="Jo"  ><span style="color:#00BFFF;">Jo </span></input> <br>
			<input style="background-color: #AFEEEE; font:bold; color:black; margin-left:120px" name="submit" type="submit" value="Dergo Feedback"  />
	  </form>
	</div>
</main>
</body>
</html>

