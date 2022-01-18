<?php 
session_start();
include 'connection.php';

// '''''''''''''''''''''''''''''''''''''''

   if(isset($_POST['assessmentDetails'])){
   	  // echo '<pre>';
   	  // print_r($_COOKIE);die;
	    $to="info@craniumservices.in"; 
	    $email = $_COOKIE['EmailId'];
	    $comment = $_POST['comment'];
	    $selectedProjects  = '';
	    $body = 'My Cranium Services: '.$selectedProjects;
	    $subject = "Inquiry Regarding";
	    $from = $email;
	    $message = "E-mail: ".$email."\n".$body."\n Comment: ".$comment;
	    $headers = "MIME-Version: 1.0" . "\r\n";
       $headers .= "Content-type:text/html;charset=UTF-8"."\r\n";
	    $headers = "From:".$from;
	    // print_r($message);die;

	    $send =mail($to, $subject, $message, $headers);
	    if ($send){
	     $_SESSION['msg']="Sent Succesfully!!! Thank You ".$name."";
	      header("location:$_SERVER[HTTP_REFERER]");
	    }
	    else {
	       $_SESSION['msg']="Something went Wrong !!!";
	      header("location:$_SERVER[HTTP_REFERER]");
	    }
   }

   if(isset($_POST['quotationDetails'])){
   	  
	    $to="info@craniumservices.in"; 
	    $email = $_COOKIE['EmailId'];
	    $technical = $_POST['client_comment'][0];
	    $commercial = $_POST['client_comment'][1];
	    $comment = $_POST['comment'];
	    $selectedProjects  = '';
	    $body = 'My Cranium Services: '.$selectedProjects;
	    $subject = "Inquiry Regarding";
	    $from = $email;
	     $message = "Category: ".$technical.'/'.$commercial."\n E-mail: ".$email."\n".$body."\n Comment: ".$comment;
	    $headers = "MIME-Version: 1.0" . "\r\n";
       $headers .= "Content-type:text/html;charset=UTF-8"."\r\n";
	    $headers = "From:".$from;

	    $send =mail($to, $subject, $message, $headers);
	    if ($send){
	     $_SESSION['msg']="Sent Succesfully!!! Thank You ".$name."";
	      header("location:$_SERVER[HTTP_REFERER]");
	    }
	    else {
	       $_SESSION['msg']="Something went Wrong !!!";
	      header("location:$_SERVER[HTTP_REFERER]");
	    }
   }
?>