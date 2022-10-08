<?php 
	$server = "localhost";
	$pass = "";
	$username = "root";
	$db = "QLSV";
	$conn = mysqli_connect($server, $username, $pass, $db);
	if($conn){
		echo " Kết nối thành công!!";
	}else{
		echo "Kết nối chưa thành công";
	}
 ?>