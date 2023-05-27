<?php
	include 'conect.php';
    $conn =  conect();
	$sql = "SELECT * FROM users";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
?>	
		<tr>
			<td><?=$row['name'];?></td>
			<td><?=$row['lastname'];?></td>
			<td><?=$row['username'];?></td>
			<td><?=$row['password'];?></td>
			<td><?=$row['email'];?></td>
			<td><a href="#editEmployeeModal" class="edit" data-toggle="modal">
						<i class="material-icons update" data-toggle="tooltip" 
						data-id="<?php echo $row["id"]; ?>"
						data-name="<?php echo $row["name"]; ?>"
						data-lastname="<?php echo $row["lastname"]; ?>"
						data-username="<?php echo $row["username"]; ?>"
						data-password="<?php echo $row["password"]; ?>"
						data-email="<?php echo $row["email"]; ?>"
						title="Edit"><button type="button" class="btn btn-info">Update</button></i>
					</a></td>
					<td><a href="#deleteEmployeeModal" class="delete" data-id="<?php echo $row["id"]; ?>" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" 
						title="Delete">Eliminar</i></a></td>
			
		</tr>
<?php	
	}
	}
	else {
		echo "0 results";
	}
	mysqli_close($conn);
?>