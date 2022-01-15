<?php 
session_start();
include 'connection.php';
if(!isset($_POST['signup'])){
	echo '<pre>';
	// print_r($_POST);die;
	$username = $_POST['username'];
	$company = $_POST['company_name'];
	$gst = $_POST['gst_no'];
	$contact = $_POST['contact_no'];
	$email = $_POST['email'];
	$address = $_POST['address'];
	$password = $_POST['password'];
	$query="SELECT `id` FROM `tmp_customer` WHERE `email`='$email'";
	$run=mysqli_query($conn,$query);
	$rowcount = mysqli_num_rows($run);
	print_r($rowcount);die;
	// $data=mysqli_fetch_assoc($run);
	// if((mysqli_num_rows($run) =< 0){
	// 	print_r('Hello')
	// }

// $data=mysqli_fetch_assoc($run)
}


?>