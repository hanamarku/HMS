<!-- CSS only -->
<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous"> -->
<!-- JavaScript Bundle with Popper -->
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script> -->

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>


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
            <div class="col-md-6">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" id="email">
            </div>
            <div class="col-md-6">
                <label for="info" class="form-label">Info</label>
                <input type="text" name="info" class="form-control" id="info">
            </div>

            <div class="col-md-6">
                <label for="inputCity" class="form-label">City</label>
                <input type="text" class="form-control" id="inputCity">
            </div>
            <div class="col-md-4">
                <label for="inputState" class="form-label">State</label>
                <select id="inputState" class="form-select">
                <option selected>Choose...</option>
                <option>...</option>
                </select>
            </div>

            <div class="form-inline" id="medicines">
                  <div class="inputi_i_Gjendjeve">
                    Ilaqi <input type="text" id="medicine" class="form-control medicine_input_aktuale"/> 
                    ne sasi <input type="text" class="form-control input-symbol" /> 
                    ne oraret : <input type="text" class="form-control gjendjet_pasardhese"/>
                  </div>
            </div>
            <br>
                <button id="kalim_i_Ri" type="button" class="button btn-success">Per te shtuar nje mjekim te ri , kliko ketu !</button> 
            <br><br>
            
            <div class="form-group">
                <label for="udhezues">Udhezime</label>
                <textarea class="form-control" id="udhezues" rows="3"></textarea>
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
    let clone = $("#medicines .inputi_i_Gjendjeve").last().clone("true");
    clone.find("input").val("");
    clone.appendTo(kalimetDiv);
  });

        </script>