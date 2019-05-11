<?php

include 'database.php';
$fullname   = $_POST['fullname'];
$username	= $_POST['username'];
$email      = $_POST['exampleInputEmail1'];
$password   = $_POST['exampleInputPassword1'];

$input			= mysqli_query($conn, "INSERT INTO `user`(`fullname`, `username`, `email`, `password`) VALUES ('$fullname', '$username','$email' , '$password')");

if($input){
	session_start();
	$_SESSION['username'] = $username;
	echo "<script>alert('Anda berhasil signup..!');document.location.href='home.php'</script>";
		
}else{
	
	echo "Error: " . $sql . "<br>" . $conn->error;
		
}
?>