<?php 
session_start();
include 'connection.php';
if(!isset($_POST['signup'])){
	$username = $_POST['username'];
	$company = $_POST['company'];
	$gst = $_POST['gst'];
	$contact = $_POST['contact'];
	$email = $_POST['email'];
	$address = $_POST['address'];
	$password = $_POST['password'];
	$query="SELECT `id` FROM `tmp_customer` WHERE `email_id`='$email'";
	$run=mysqli_query($conn,$query);
	$data=mysqli_fetch_assoc($run);
	print_r($data);die;

// $data=mysqli_fetch_assoc($run)
}


?>