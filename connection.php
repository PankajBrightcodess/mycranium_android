<?php 
if(isset($_SERVER['HTTP_HOST']) && $_SERVER['HTTP_HOST']=='localhost'){
	$conn=new mysqli("localhost","root","","db_mycranium");
}
elseif(isset($_SERVER['HTTP_HOST']) && $_SERVER['HTTP_HOST']=='localhost:8080'){
	$conn=new mysqli("localhost","root","","db_mycranium");
}
else{
	$conn=new MySQLi("localhost","softwarebss_crenium","Crenium@2021","softwarebss_crenium");
}
if($conn->connect_errno){
	echo "connection failed";
}
date_default_timezone_set('Asia/Kolkata');
?>

<!-- <?php 
$host = 'localhost';
$db = 'db_mycranium';
$user = 'root';
$password = ' ';
$dsn = "mysql:host=$host;dbname=$db;charset=UTF8";

try {
	$pdo = new PDO($dsn, $user, $password);

	if ($pdo) {
		echo "Connected to the $db database successfully!";
	}
} catch (PDOException $e) {
	echo $e->getMessage();
}




?> -->