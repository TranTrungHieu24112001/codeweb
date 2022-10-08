<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>QLSV</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<?php require_once 'Connection.php' ?>
	<?php 
		if(isset($_POST['add'])){
			$id = $_POST['id'];
			$user = $_POST['user'];
			$pass = $_POST['pass'];
			$name = $_POST['name'];
			$birth = $_POST['birth'];
			$gender = $_POST['gender'];
			if($conn -> query("INSERT INTO sinhvien (ID, Username, Password, Name, BIRTH, GENDER) VALUES (N'$id', N'$user', N'$pass',N'$name', N'$name', N'$birth', N'$gender')")){
				echo "<script>alert('Thêm thành công');</script>";
			}
		}
		$conn->close();
	 ?>
	 <div class="container">
	 	<form method="POST" action="">
			<div class="form-group">
			    <label for="id">ID</label>
			    <input type="text" class="form-control" name="id" placeholder="ID">
			</div>	
			<div class="form-group">
			    <label for="user">Username</label>
			    <input type="text" class="form-control" name="user"  placeholder="Username">
			</div>
			<div class="form-group">
			    <label for="pass">Password</label>
			    <input type="password" class="form-control" name="pass" placeholder="Password">
			</div>
			<div class="form-group">
			    <label for="name">Name</label>
			    <input type="text" class="form-control" name="name"  placeholder="Name">
			</div>
			<div class="form-group">
			    <label for="birth">Date</label>
			    <input type="date" class="form-control" name="birth"  placeholder="Birth">
			</div>
			<div class="form-group">
			    <label for="gender">Gender</label>
			    <input type="text" class="form-control" name="gender"  placeholder="Gender">
			</div>
			<button type="submit" class="btn btn-primary" name="add">Submit</button>
		</form>
	 </div>
</body>
</html>