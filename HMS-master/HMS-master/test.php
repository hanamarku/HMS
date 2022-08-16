<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<script scr="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css"></script>
	<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
	<script src="https://code.jquery.com/jquery-3.2.1.js"></script>

    
<form id="add_form" action="test_back.php" method="POST" enctype="multipart/form-data">
<div class="form-group">
    <input type="text" class="form-control"  placeholder="Username" name="username" id="username" onInput="checkUsernameValid()"/>
        <span id="check-username"></span>
</div>

<div class="d-flex justify-content-center">
	<input type="submit" name="submit" id="submit" class="btn btn-success btn-lg " value="Shto">
</div>
</form>

<script>
    function checkUsernameValid() {	
	jQuery.ajax({
	url: "test_back.php",
	data:'username='+$("#username").val(),
	type: "POST",
	success:function(data){
		$("#check-username").html(data);
	},
	error:function (){}
	});
}

</script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">