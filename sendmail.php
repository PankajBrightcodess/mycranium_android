<?php 
session_start();
include 'connection.php';

// '''''''''''''''''''''''''''''''''''''''

   if(isset($_POST['SendMessage'])){
   	  echo '<pre>';
   	  print_r($_COOKIE);die;
	    $to="pankaj.tiwari@brightcodess.com"; 
	    $email = $_COOKIE['EmailId'];
	    $comment = $_POST['comment'];
	    $selectedProjects  = 'None';
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
?>