<!DOCTYPE html>
<html lang="en">
<head>
  <title>View Ajax</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
<div style="margin: auto;width: 60%;">
	<div class="alert alert-success alert-dismissible" id="success" style="display:none;">
	  <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
	</div>
	<h2>Add data</h2>
	<form id="fupForm" name="form1" method="post">
		<div class="form-group">
			<label for="name">Name:</label>
			<input type="text" class="form-control" id="name" placeholder="Name" name="name">
		</div>
		<div class="form-group">
			<label for="lastname">Lastname:</label>
			<input type="text" class="form-control" id="lastname" placeholder="lastname" name="lastname">
		</div>
		<div class="form-group">
			<label for="username">Username:</label>
			<input type="text" class="form-control" id="username" placeholder="username" name="username">
		</div>
		<div class="form-group">
			<label for="password">Password:</label>
			<input type="text" class="form-control" id="password" placeholder="password" name="password">
		</div>
		<div class="form-group">
			<label for="email">Email:</label>
			<input type="text" class="form-control" id="email" placeholder="email" name="email">
		</div>
		<div class="modal-footer">
					<input type="hidden" value="1" name="type">
					<input type="button" name="save" class="btn btn-primary" value="Add" id="butsave">
				</div>
		
	</form>
</div>
<!-- Delete Modal HTML -->
<div id="deleteEmployeeModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form>
				<div class="modal-header">						
					<h4 class="modal-title">Eliminar User</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				</div>
				<div class="modal-body">
					<input type="hidden" id="id_d" name="id" class="form-control">					
					<p>¿Está seguro de que desea eliminar estos registros?</p>
					<p class="text-warning"><small>Esta acción no se puede deshacer.</small></p>
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<button type="button" class="btn btn-danger" id="delete">Eliminar</button>
				</div>
			</form>
		</div>
	</div>
</div>

<script>
	$(document).ready(function() {
	$('#butsave').on('click', function() {
	$("#butsave").attr("disabled", "disabled");
	var name = $('#name').val();
	var lastname = $('#lastname').val();
	var username = $('#username').val();
	var password = $('#password').val();
	var email = $('#email').val();

	if(name!="" && lastname!="" && username!="" && password!="" && email!=""){
		$.ajax({
			url: "save.php",
			type: "POST",
			data: {
				name: name,
				lastname: lastname,
				username: username,
				password: password,
				email: email,
				type: 1
			},
			cache: false,
			success: function(dataResult){
				console.log("dataResult");
				console.log(dataResult);
				var DataResult = JSON.parse(dataResult);
				if(DataResult.statusCode==200){
					$("#butsave").removeAttr("disabled");
					$('#fupForm').find('input:text').val('');
					$("#success").show();
					$('#success').html('Dato agregago correctamente !'); 
					location.reload();		
				}
				else if(DataResult.statusCode==201){
					alert("Error occured !");
				}
				
			}
		});
		}
		else{
			alert('Please fill all the field !');
		}
	});
	});

	$(document).on('click','.update',function(e) {
		var id=$(this).attr("data-id");
		var name=$(this).attr("data-name");
		var lastname=$(this).attr("data-lastname");
		var username=$(this).attr("data-username");
		var password=$(this).attr("data-password");
		var email=$(this).attr("data-email");
		$('#id_u').val(id);
		$('#name_u').val(name);
		$('#lastname_u').val(lastname);
		$('#username_u').val(username);
		$('#password_u').val(password);
		$('#email_u').val(email);
	});
	$(document).on('click','#update',function(e) {
		var data = $("#update_form").serialize();
		$.ajax({
			data: data,
			type: "post",
			url: "save.php",
			success: function(dataResult){
					var dataResult = JSON.parse(dataResult);
					if(dataResult.statusCode==200){	
						alert('Dato actualizado correctamente !'); 
                        location.reload();						
					}
					else if(dataResult.statusCode==201){
					   alert(dataResult);
					}
			}
		});
	});
	$(document).on("click", ".delete", function() { 
		var id=$(this).attr("data-id");
		$('#id_d').val(id);
	});
	$(document).on("click", "#delete", function() { 
		$.ajax({
			url: "save.php",
			type: "POST",
			cache: false,
			data:{
				type:3,
				id: $("#id_d").val()
			},
			success: function(dataResult){
					$('#deleteEmployeeModal').modal('hide');
					$("#"+dataResult).remove();
					location.reload();	
			
			}
		});
	});
</script>
<div id="editEmployeeModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form id="update_form">
				<div class="modal-header">						
					<h4 class="modal-title">Edit User</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				</div>
				<div class="modal-body">
					<input type="hidden" id="id_u" name="id" class="form-control" required>					
					<div class="form-group">
						<label>Name</label>
						<input type="text" id="name_u" name="name" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Lastname</label>
						<input type="text" id="lastname_u" name="lastname" class="form-control" required>
					</div>
					<div class="form-group">
						<label>username</label>
						<input type="text" id="username_u" name="username" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Password</label>
						<input type="text" id="password_u" name="password" class="form-control" required>
					</div>					
					<div class="form-group">
						<label>Email</label>
						<input type="text" id="email_u" name="email" class="form-control" required>
					</div>					
				</div>
				<div class="modal-footer">
				<input type="hidden" value="2" name="type">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<button type="button" class="btn btn-info" id="update">Update</button>
				</div>
			</form>
		</div>
	</div>
</div>
<div class="container">
  <h2>View data</h2>
	<table class="table table-bordered table-sm" >
    <thead>
      <tr>
        <th>Name</th>
        <th>Apellido</th>
        <th>Username</th>
        <th>Password</th>
		<th>Email</th>
		<th>Edit</th>
      </tr>
    </thead>
    <tbody id="table">
      
    </tbody>
  </table>
</div>
<script>
	$.ajax({
		url: "View_ajax.php",
		type: "POST",
		cache: false,
		success: function(data){
			$('#table').html(data); 
		}
	});
</script>
</body>
</html>
