<html>
 <head>
   
  <title>Departament</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> -->
 
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
    // $(document).ready(function(){
    //   $("input").keydown(function(){
    //     $("input").css("background-color", "yellow");
    //   });
    //   $("input").keyup(function(){
    //     $("input").css("background-color", "pink");
    //   });
    // });

    function checkemriValid() {	
      jQuery.ajax({
      url: "insert.php",
      data:'emri='+$("#emri").val(),
      type: "POST",
      success:function(data){
        $("#check-emri").html(data);
      },
      error:function (){}
      });
    }

    $( "#update" ).click(function() {
      alert( "Handler for .click() called." );
    });
    </script>
  <style>
   body
   {
    margin:0;
    padding:0;
    background-color:#f1f1f1;
   }
   .box
   {
    width:1270px;
    padding:20px;
    background-color:#fff;
    border:1px solid #ccc;
    border-radius:5px;
    margin-top:25px;
   }
   .swal2-popup {
      font-size: 13px !important;
    }

    .swal2-container.swal2-backdrop-show, .swal2-container.swal2-noanimation {
    background: rgba(0,0,0,0.7)!important;
}
  </style>
 </head>
 <body>
 <?php include "../headerAdmin.php"; ?>
<main id="main" class="main">
    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="../../index.php">Home</a></li>
        <li class="breadcrumb-item active"><a href="../indexAdmin.php">Dashboard</a></li>
        <li class="breadcrumb-item active">Departamentet</li>
        </ol>
      </nav>
    </div>
    <section class="section dashboard">
  <div class="container box">
   <div class="table-responsive">
    <br />
    <div>
     <button type="button" id="add_button" data-bs-toggle="modal" data-bs-target="#userModal" class="btn btn-info btn-lg">Shto Departament</button>
    </div>
    <br /><br />
    <table id="user_data" class="table table-bordered table-striped">
     <thead>
      <tr>
       <th width="10%">Image</th>
       <th width="35%">Emri Departamentit</th>
       <th width="35%">Informacion</th>
       <th width="10%">Modifiko</th>
       <th width="10%">Fshij</th>
      </tr>
     </thead>
    </table>
   </div>
  </div>
 </body>
</html>

<div id="userModal" class="modal fade">
 <div class="modal-dialog">
  <form method="post" id="user_form" enctype="multipart/form-data">
   <div class="modal-content">
    <div class="modal-header">
     <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
     <h4 class="modal-title">SHTO DEPARTAMENT</h4>
    </div>
    <div class="modal-body">
     <label>Emri Departamentit</label>
     <input type="text" name="emri" id="emri" class="form-control" onInput="checkemriValid()"/>
     <span id="check-emri"></span>
     <br />
     <label>Informacion</label>
     <input type="text" name="info" id="info" class="form-control" />
     <br />
     <label>selekto Image</label>
     <input type="file" name="user_image" id="user_image" />
     <span id="user_uploaded_image"></span>
    </div>
    <div class="modal-footer">
     <input type="hidden" name="dep_id" id="dep_id" />
     <input type="hidden" name="operation" id="operation" />
     <input type="submit" name="action" id="action" class="btn btn-success" value="Add" />
     <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Mbyll</button>
    </div>
   </div>
  </form>
 </div>
</div>
<!-- 

<div id="userModal1" class="modal fade">
 <div class="modal-dialog">
  <form method="post" id="user_form1" enctype="multipart/form-data">
   <div class="modal-content">
    <div class="modal-header">
     <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
     <h4 class="modal-title">testtt</h4>
    </div>
    <div class="modal-body">
     <label>Emri i Departamentit</label>
     <input type="text" name="emri" id="emri1" class="form-control" value="<?php echo $_POST["emri"] ?>" onInput="checkemriValid()"/> 
     <span id="check-emri"></span>
     <br />
     <label>Informacion</label>
     <input type="text" name="info1" id="info1" class="form-control" />
     <br />
     <label>selekto Image</label>
     <input type="file" name="user_image" id="user_image" />
     <span id="user_uploaded_image"></span>
    </div>
    <div class="modal-footer">
     <input type="hidden" name="dep_id" id="dep_id" />
     <input type="hidden" name="operation1" id="operation1" />
     <input type="submit1" name="action1" id="action1" class="btn btn-success" value="Edit" />
     <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Mbyll</button>
    </div>
   </div>
  </form>
 </div>
</div> -->

<script type="text/javascript" language="javascript" >
  $(document).ready(function(){
    $('#add_button').click(function(){
    // $('#emri').attr('readonly','false');
    $('#user_form')[0].reset();
    $('.modal-title').text("Shto Departament");
    $('#action').val("Shto");
    $('#operation').val("Add");
    $('#user_uploaded_image').html('');
 });



//  $(document).ready(function(){
//     if($('#action').val() == "Modifiko"){
//       $('#action').prop('disabled',false);
//     }
//  });
 
 var dataTable = $('#user_data').DataTable({
  "processing":true,
  "serverSide":true,
  "order":[],
  "ajax":{
   url:"fetch.php",
   type:"POST"
  },
  "columnDefs":[
   {
    "targets":[0, 3, 4],
    "orderable":false,
   },
  ],

 });


 
//  $(document).on('submit1', '#user_form1', function(event){
//   event.preventDefault();
//   var emri = $('#emri1').val();
//   var info = $('#info1').val();
//   var extension = $('#user_image').val().split('.').pop().toLowerCase();
//   if(extension != '')
//   {
//    if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
//    {
//     alert("Formati i fotos nuk suportohet!");
//     $('#user_image').val('');
//     return false;
//    }
//   } 
//   if(emri != '' && info != '' )
//   {
//    $.ajax({
//     url:"insert.php",
//     method:'POST',
//     data:new FormData(this),
//     contentType:false,
//     processData:false,
//     success:function(data)
//     {
//       Swal.fire({
//         icon: 'success',
//         title: '' + data,
//         showCloseButton: false,
//         showCancelButton: false,
//         timer: 1500
//       })
//      $('#user_form1')[0].reset();
//      $('#userModal1').modal('hide');
//      dataTable.ajax.reload();
//     }
//    });
//   }
//   else
//   {
//     Swal.fire({
//       icon: 'warning',
//       title: 'Plotesoni te gjitha fushat',
//       confirmButtonText: 'Ne rregull!',
//     })
//   }
//  });

 $(document).on('submit', '#user_form', function(event){
  event.preventDefault();
  var emri = $('#emri').val();
  var info = $('#info').val();
  var extension = $('#user_image').val().split('.').pop().toLowerCase();
  if(extension != '')
  {
   if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
   {
    alert("Formati i fotos nuk suportohet!");
    $('#user_image').val('');
    return false;
   }
  } 
  if(emri != '' && info != '' )
  {
   $.ajax({
    url:"insert.php",
    method:'POST',
    data:new FormData(this),
    contentType:false,
    processData:false,
    success:function(data)
    {
      Swal.fire({
        icon: 'success',
        title: '' + data,
        showCloseButton: false,
        showCancelButton: false,
        timer: 1500
      })
     $('#user_form')[0].reset();
     $('#userModal').modal('hide');
     dataTable.ajax.reload();
    }
   });
  }
  else
  {
    Swal.fire({
      icon: 'warning',
      title: 'Plotesoni te gjitha fushat',
      confirmButtonText: 'Ne rregull!',
    })
  }
 });


 


 $(document).on('click', '.update', function(){
  var dep_id = $(this).attr("dep_id");
  $.ajax({
   url:"fetch_single.php",
   method:"POST",
   data:{dep_id:dep_id},
   dataType:"json",
   success:function(data)
   {
    $('#userModal').modal('show');
    $('#emri').val(data.emri);
  
    $('#info').val(data.info);
    $('.modal-title').text("Modifiko");
    $('#dep_id').val(dep_id);
    $('#user_uploaded_image').html(data.user_image);
    $('#action').val("Modifiko");
    $('#operation').val("Edit");
   }
   
  })
 });


  $(document).on('click', '.delete', function(){
    var dep_id = $(this).attr("dep_id");
    // Swal.fire('Jeni i sigurte qe deshroni ta fshini ?')
    Swal.fire({  
    title: 'Jeni i sigurte qe deshironi ta fshini ?',  
    showDenyButton: true,  showCancelButton: false,  
    confirmButtonText: `Po`,  
    denyButtonText: `Jo`,
    }).then((result) => {
      if (result.isConfirmed) {  
    $.ajax({
      url:"delete.php",
      method:"POST",
      data:{dep_id:dep_id},
      success:function(data)
      {
        Swal.fire({
          icon: 'success',
          title: '' + data,
          // showCloseButton: false,
          // showCancelButton: false,
          // timer: 1000
        })
      //  Swal.fire(data);
      

      dataTable.ajax.reload();
      }
    });
    }
    else
    {
    return false; 
    }
    });
  });
});
</script>

<script>
  function checkNameValid() {	
	jQuery.ajax({
	url: "add.php",
	data:'emri='+$("#emri").val(),
	type: "POST",
	success:function(data){
		$("#check-username").html(data);
	},
	error:function (){}
	});
}
</script>
</section>
</main>

</body>  
<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
   -->
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" /> -->
  <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>  
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
  </html>