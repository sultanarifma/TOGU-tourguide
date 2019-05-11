<?php

include 'database.php';
session_start();
$username = $_POST['username'];
$password = $_POST['password'];
 
$sql = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
 
// execute query sql
$query = mysqli_query($conn,$sql);
 
// ambil datanya dan simpan dalam array
$hasil = mysqli_fetch_array($query);
 
// hitung hasil query
$jumlah = mysqli_num_rows($query);
 
if ($jumlah > 0){
    /* jika datanya ketemu, mulai membuat session
    * yg nilai dari sessionnya diambil dari tabel
    */
    session_start();
    $_SESSION['username'] = $hasil['username'];
    $_SESSION['password'] = $hasil['password'];
 
	// arahkan ke halaman administrator, misal didalam folder "admin"
	echo "<script>alert('Anda berhasil login');</script>";
    header("location:home.php");
}else {
	// data tidak ketemu
	echo "<script>alert('Username atau password salah');window.history.back();</script>";
    
}

?>