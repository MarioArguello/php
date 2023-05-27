<?php
	include 'conect.php';
	$conn =  conect();
	if(count($_POST)>0){
		if($_POST['type']==1){
			$name=$_POST['name'];
			$lastname=$_POST['lastname'];
			$username=$_POST['username'];
			$password=$_POST['password'];
			$email=$_POST['email'];
			$sql = "INSERT INTO `users`( `name`, `lastname`, `username`, `password`, `email`) 
			VALUES ('$name','$lastname','$username','$password','$email')";
			
			if (mysqli_query($conn, $sql)) {
				echo json_encode(array("statusCode"=>200));
			} 
			else {
				echo json_encode(array("statusCode"=>201));
			}
			mysqli_close($conn);
		}
	}
	if(count($_POST)>0){
		if($_POST['type']==2){
			$id=$_POST['id'];
			$name=$_POST['name'];
			$lastname=$_POST['lastname'];
			$username=$_POST['username'];
			$password=$_POST['password'];
			$email=$_POST['email'];
			$sql = "UPDATE `users` SET `name`='$name',`lastname`='$lastname',`username`='$username',`password`='$password',`email`='$email' WHERE id=$id";
		
			if (mysqli_query($conn, $sql)) {
				echo json_encode(array("statusCode"=>200));
			} 
			else {
				echo json_encode(array("statusCode"=>201));
			}
			mysqli_close($conn);
		}
	}
	if(count($_POST)>0){
		if($_POST['type']==3){
			$id=$_POST['id'];
			$sql = "DELETE FROM `users` WHERE id=$id ";
			if (mysqli_query($conn, $sql)) {
				echo $id;
			} 
			else {
				echo "Error: " . $sql . "<br>" . mysqli_error($conn);
			}
			mysqli_close($conn);
		}
	}
	
?>