<!-- CSS only -->
<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous"> -->
<!-- JavaScript Bundle with Popper -->
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script> -->

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

<?php include "headerDoktor.php"; ?>
<main id="main" class="main">
    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div>

    <section class="section dashboard">

    <div class="container mt-5">
        <form class="row g-3" action="createPdf.php" method="POST">
            <div class="form-inline" id="medicines">
                  <div class="input_medicines">
                    Ilaci <input type="text" name="ilaci" id="medicine" class="form-control medicine_input_aktuale"/> 
                    ne sasi <input type="text" name="sasia" class="form-control input-symbol" /> 
                    ne oraret : <input type="text" name="orari" class="form-control gjendjet_pasardhese" />
                  </div>
            </div>
            <br>
                <button id="kalim_i_Ri" type="button" class="button btn-success">Per te shtuar nje mjekim te ri , kliko ketu !</button> 
            <br><br>
            
            <div class="form-group">
                <label for="udhezues">Udhezime</label>
                <textarea class="form-control" name="receta" id="udhezues" rows="6" ></textarea>
            </div>

    
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Krijo PDF</button>
            </div>
        </form>
    </div>

</section>

</main>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>

        <script>
              $("#kalim_i_Ri").click(function () {
                let kalimetDiv = $("#medicines");
                let clone = $("#medicines .input_medicines").clone("true");
                clone.find("input").val("");
                clone.appendTo(kalimetDiv);
            })

</script>
