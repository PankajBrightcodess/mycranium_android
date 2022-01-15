<?php 
session_start();
include 'connection.php';
if(isset($_POST['signup'])){
	// echo '<pre>';
	// print_r($_POST);die;
	$username = $_POST['username'];
	$company = $_POST['company_name'];
	$gst = $_POST['gst_no'];
	$contact = $_POST['contact_no'];
	$email = $_POST['email'];
	$address = $_POST['address'];
	$password = $_POST['password'];
	$added_on = date('Y-m-d');
	$query="SELECT `id` FROM `myc_customer` WHERE `email_id`='$email'";
	
	$run=mysqli_query($conn,$query);
	if(mysqli_num_rows($run) == 0){
		$query = "INSERT INTO `myc_customer`(`name`,`comp_name`,`gst_no`,`contact_no`,`email_id`,`address`,`password`,`added_on`) VALUES ('$username','$company','$gst','$contact','$email','$address','$password','$added_on')";
		$sql=mysqli_query($conn,$query);
		if($sql){
			// $_SESSION['msg']="Registered Successfully!!!";
		    header("location:login.php");
		}else{
			// $_SESSION['msg']="Not Successfully Submitted!!!";
		    header("location:login.php");
		}
		
	}
	else{
		// $_SESSION['msg']="You Are Already Registered!!!";
		    header("location:register.php");
	}
 }
 if(isset($_POST['login'])){
 	$email = $_POST['email'];
 	$password = $_POST['password'];
 	$query = "SELECT * FROM `myc_customer` WHERE `email_id`='$email' AND `password`='$password'";
 	$run=mysqli_query($conn,$query);
 	$data=mysqli_fetch_assoc($run);
 	$id = $data['id'];
 	$name = $data['name'];
 	$comp_name = $data['comp_name'];
 	$gst_no = $data['gst_no'];
 	$contact_no = $data['contact_no'];
 	$email_id = $data['email_id'];
 	$address = $data['address'];
 	$password = $data['password'];
 	$added_on = $data['added_on'];
 	$_SESSION['role'] = $data['role'];
 	 if(!empty($data)){
	    	$_SESSION['msg']=" Successfully !!!";
	    	header('Location:home.php?id='.$id.'&name='.$name.'&company_name='.$comp_name.'&gst_no='.$gst_no.'&contact_no='.$contact_no.'&email_id='.$email_id.'&address='.$address.'');
	    	// header("location:$_SERVER[HTTP_REFERER]");
	    }
	    else{
	    	$_SESSION['msg']="Something Error!";
		    
	    }
 	
 }


?>