<?php 
session_start();
include 'connection.php';
function Imageupload($dir,$inputname,$allext,$pass_width,$pass_height,$pass_size,$newname){

	$count = count($_FILES);
	for ($i=0; $i < $count; $i++) { 
	if(file_exists($_FILES["$inputname"]["tmp_name"])){
		$file_extension = strtolower( pathinfo($_FILES["$inputname"]["name"], PATHINFO_EXTENSION));
		$error="";
		if(in_array($file_extension, $allext)){
			list($width, $height, $type, $attr) = getimagesize($_FILES["$inputname"]["tmp_name"]);
			$image_weight = $_FILES["$inputname"]["size"];
			if($width <= "$pass_width" && $height <= "$pass_height" && $image_weight <= "$pass_size"){
				$tmp = $_FILES["$inputname"]["tmp_name"];
				$extension[1]="jpg";
				$name=$newname.".".$extension[1];
				print_r($tmp);
				print_r($dir);
				print_r($name);
				if(move_uploaded_file($tmp,"$dir".$name)){
					return true;
				}

			}
			else{
				$error .="Please upload photo size of $pass_width X $pass_height !!!";
			}
		}
		else{
			$error .="Please upload an image !!!";
		}
	}
	else{
		$error .="Please Select an image !!!";
	}
	}
	
	return $error;
}
// ''''''''''''''''''''''''''''''''pdf''''''''''''''''''''''''''''''''''''''''''''
function Pdfupload($dir,$inputname,$allext,$pass_width,$pass_height,$pass_size,$newname){
	if(file_exists($_FILES["$inputname"]["tmp_name"])){
		// do this contain any file check
		$file_extension = strtolower(pathinfo($_FILES["$inputname"]["name"], PATHINFO_EXTENSION));
		$error="";
		if(in_array($file_extension, $allext)){
			// file extension check
			list($width, $height, $type, $attr) = getimagesize($_FILES["$inputname"]["tmp_name"]);
			$pdf_weight = $_FILES["$inputname"]["size"];
			if($width <= "$pass_width" && $height <= "$pass_height" && $pdf_weight <= "$pass_size"){
				// dimension check
				$tmp = $_FILES["$inputname"]["tmp_name"];
				// print_r($extension);die;
				$extension[1]="pdf";
				
				$name=$newname.".".$extension[1];
				if(move_uploaded_file($tmp, "$dir" .$name)){
					return true;
				}
			}
			else{
				$error .="Please upload Pdf size of $pass_width X $pass_height !!!";
			}
		}
		else{
			$error .="Please upload an Pdf !!!";
		}
	}
	else{
		$error .="Please Select an Pdf !!!";
	}
	return $error;
}

if(isset($_POST['signup'])){
	// echo '<pre>';
	// print_r($_POST);die;
	$username = $_POST['username'];
	$company = $_POST['company_name'];
	// $gst = $_POST['gst_no'];
	$contact = $_POST['contact_no'];
	$email = $_POST['email'];
	$address = $_POST['address'];
	$password = $_POST['password'];
	$added_on = date('Y-m-d');
	$query="SELECT `id` FROM `myc_customer` WHERE `email_id`='$email'";
	
	$run=mysqli_query($conn,$query);
	if(mysqli_num_rows($run) == 0){
		$query = "INSERT INTO `myc_customer`(`name`,`comp_name`,`contact_no`,`email_id`,`address`,`password`,`added_on`) VALUES ('$username','$company','$contact','$email','$address','$password','$added_on')";
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
 	  // print_r($data);die;
 	  $id = $data['id'];
 	  $name = $data['name'];
 	  $comp_name = $data['comp_name'];
 	  $gst_no = $data['gst_no'];
 	  $contact_no = $data['contact_no'];
 	  $email_id = $data['email_id'];
 	  $address = $data['address'];
 	  $password = $data['password'];
 	  $added_on = $data['added_on'];
 	  $cookie_value['id'] = $data['id'];
 	  $cookie_value['role'] = $data['role'];
 	  $cookie_value['name']= $data['name'];
 	  $cookie_value['comp_name']= $data['comp_name'];
 	  $cookie_value['gst_no']= $data['gst_no'];
 	  $cookie_value['contact_no']= $data['contact_no'];
 	  $cookie_value['email_id']= $data['email_id'];
 	  $cookie_value['address']= $data['address'];
 	  $cookie_values = json_encode($cookie_value);
 	  setcookie("Cookie",$cookie_values,time() + (86400 * 30),"/");
       echo "COOKIE IS CREATED SUCCESSFULLY !";
 	  if(!empty($data)){
	    	header('Location:home.php?id='.$id.'&name='.$name.'&company_name='.$comp_name.'&gst_no='.$gst_no.'&contact_no='.$contact_no.'&email_id='.$email_id.'&address='.$address.'');
	    	// header("location:$_SERVER[HTTP_REFERER]");
	    }
	    else{
	    	header('Location:login.php');
		    
	    }
 	
 }

 if(isset($_POST['eotcrane_upload'])){
 	     // echo '<pre>';
 	     // print_r($_POST);
 	     // print_r($_FILES);die;
 	      $comp_name = $_POST['comp_name'];
 	      $address = $_POST['address'];
 	      $country = $_POST['country'];
 	      $state = $_POST['state'];
 	      $dist = $_POST['dist'];
 	      $other_country_details = $_POST['other_country_details'];

	 	$photo1 = $_FILES['file1']['name'];
		$photo1 = explode('.',$photo1);
		$image1= time().$photo1[0];
		$extension1 = $photo1[1];
		$imagename1 = $_FILES['file1']['tmp_name'];
			list($width,$height)=getimagesize($_FILES['file1']['tmp_name']);
		$dir="uploads/upload_files/";
		$allext=array("png","PNG","jpg","JPG","jpeg","JPEG","GIF","gif","pdf");
		$check1 = Imageupload($dir,'file1',$allext,"1800000","1800000",'100000000',$image1,$extension1);
		// '''''''''''file 1''''''''''''''''''''''
		$photo2 = $_FILES['file2']['name'];
		$photo2 = explode('.',$photo2);
		$image2= time().$photo2[0];
		$extension2 = $photo2[1];
		$imagename2 = $_FILES['file2']['tmp_name'];
			list($width,$height)=getimagesize($_FILES['file2']['tmp_name']);
		$dir="uploads/upload_files/";
		$allext=array("png","PNG","jpg","JPG","jpeg","JPEG","GIF","gif","pdf");
		$check2 = Imageupload($dir,'file2',$allext,"1800000","1800000",'100000000',$image2,$extension2);
		// '''''''''''file 2''''''''''''''''''''''
		$photo3 = $_FILES['file3']['name'];
		$photo3 = explode('.',$photo3);
		$image3= time().$photo3[0];
		$extension3 = $photo3[1];
		$imagename3 = $_FILES['file3']['tmp_name'];
			list($width,$height)=getimagesize($_FILES['file3']['tmp_name']);
		$dir="uploads/upload_files/";
		$allext=array("png","PNG","jpg","JPG","jpeg","JPEG","GIF","gif","pdf");
		$check3 = Imageupload($dir,'file3',$allext,"1800000","1800000",'100000000',$image3,$extension3);
		// '''''''''''file 3''''''''''''''''''''''
		$photo4 = $_FILES['file4']['name'];
		$photo4 = explode('.',$photo4);
		$image4= time().$photo4[0];
		$extension4 = $photo4[1];
		$imagename4 = $_FILES['file4']['tmp_name'];
			list($width,$height)=getimagesize($_FILES['file4']['tmp_name']);
		$dir="uploads/upload_files/";
		$allext=array("png","PNG","jpg","JPG","jpeg","JPEG","GIF","gif","pdf");
		$check4 = Imageupload($dir,'file4',$allext,"1800000","1800000",'100000000',$image4,$extension4);
		// '''''''''''file 4''''''''''''''''''''''
		$photo5 = $_FILES['file5']['name'];
		$photo5 = explode('.',$photo5);
		$image5= time().$photo5[0];
		$extension5 = $photo5[1];
		$imagename5 = $_FILES['file5']['tmp_name'];
			list($width,$height)=getimagesize($_FILES['file5']['tmp_name']);
		$dir="uploads/upload_files/";
		$allext=array("png","PNG","jpg","JPG","jpeg","JPEG","GIF","gif","pdf");
		$check5 = Imageupload($dir,'file5',$allext,"1800000","1800000",'100000000',$image5,$extension5);
		// '''''''''''file 5''''''''''''''''''''''
		if($check1===true || $check2===true || $check3===true || $check4===true || $check5===true){

		$image1 = $image1.".jpg";	
		$image2 = $image2.".jpg";
		$image3 = $image3.".jpg";	
		$image4 = $image4.".jpg";	
		$image5 = $image5.".jpg";	
		$added_on = date('Y-m-d');
		$use_id =  json_decode($_COOKIE['Cookie'],true); 
            $cstmr_id=$use_id['id'];
		$device= "EOT CRANE & SEMI EOT CRANE";
		
		$query="INSERT INTO `myc_upload`(`file1`,`file2`,`file3`,`file4`,`file5`,`custmr_id`,`device_id`,`comp_name`,`address`,`country`,`state`,`dist`,`other_country_details`,`added_on`) VALUES ('$image1','$image2','$image3','$image4','$image5','$cstmr_id','$device','$comp_name','$address','$country','$state','$dist','$other_country_details','$added_on')";
		$sql=mysqli_query($conn,$query);
		$_SESSION['last_upload_id']=$conn->insert_id; 
		if($sql){
			 header("Location:preview_uploadfile.php");
			$_SESSION['msg']="Successfully Added!!!";	
		}
		else{
			$_SESSION['msg']="Not added result !!!";
			header("Location:$_SERVER[HTTP_REFERER]");
		}
    }
}

if(isset($_POST['eotcrane_text'])){

	$qry = "SELECT `id` FROM `myc_eotrequestform` ORDER BY `id` DESC LIMIT 1";
	$run=mysqli_query($conn,$qry);
	$data=mysqli_fetch_assoc($run);
	if(!empty($data)){
		$refno = 'REF-100'.$data['id'];
		$project_loc = $_POST['project_loc'];
		$comp_name = $_POST['comp_name'];
		$address = $_POST['address'];
		$country = $_POST['country'];
		$state = $_POST['state'];
		$dist = $_POST['dist'];
		$other_country_details = $_POST['other_country_details'];
		$mainhost = $_POST['mainhost'];
		$auxhoist = $_POST['auxhoist'];
		$location = $_POST['location'];
		$crane_type = $_POST['crane_type'];
		$class_duty = $_POST['class_duty'];
		$design_standered = $_POST['design_standered'];
		$application = $_POST['application'];
		$span = $_POST['span'];
		$abv_floor_mh = $_POST['abv_floor_mh'];
		$blw_floor_ah = $_POST['blw_floor_ah'];
		$travel_length = $_POST['travel_length'];
		$column_to_column = $_POST['column_to_column'];
		$speed_mh = $_POST['speed_mh'];
		$speed_ah = $_POST['speed_ah'];
		$speed_ct = $_POST['speed_ct'];
		$speed_lt = $_POST['speed_lt'];
		$cust_id = $_POST['id'];
		$vfd = json_encode($_POST['vfd']);
		$scope_supply = json_encode($_POST['scope_supply']);
		$installation = $_POST['installation'];
		$other_remarks = $_POST['other_remarks'];
		$query="INSERT INTO `myc_eotrequestform`(`project_loc`,`comp_name`,`address`,`country`,`state`,`dist`,`other_country_details`,`mainhost`,`auxhoist`,`location`,`crane_type`,`class_duty`,`design_standered`,`application`,`span`,`abv_floor_mh`,`blw_floor_ah`,`travel_length`,`column_to_column`,`speed_mh`,`speed_ah`,`speed_ct`,`speed_lt`,`cust_id`,`vfd`,`scope_supply`,`installation`,`other_remarks`,`refno`) VALUES ('$project_loc','$comp_name','$address','$country','$state','$dist','$other_country_details
			','$mainhost','$auxhoist','$location','$crane_type','$class_duty','$design_standered','$application','$span','$abv_floor_mh','$blw_floor_ah','$travel_length','$column_to_column','$speed_mh','$speed_ah','$speed_ct','$speed_lt','$cust_id','$vfd','$scope_supply','$installation','$other_remarks','$refno')";
			$sql=mysqli_query($conn,$query);
			$_SESSION['eotcrane_lasttext_id']=$conn->insert_id; 
			if($sql){
				 header("Location:eot_preview.php");
				$_SESSION['msg']="Successfully Added!!!";	
			}
			else{
				$_SESSION['msg']="Not added result !!!";
				header("Location:$_SERVER[HTTP_REFERER]");
			}

	}
	else{
		$refno = 'REF-100';
		$project_loc = $_POST['project_loc'];
		$comp_name = $_POST['comp_name'];
		$address = $_POST['address'];
		$country = $_POST['country'];
		$state = $_POST['state'];
		$dist = $_POST['dist'];
		$other_country_details = $_POST['other_country_details'];
		$mainhost = $_POST['mainhost'];
		$auxhoist = $_POST['auxhoist'];
		$location = $_POST['location'];
		$crane_type = $_POST['crane_type'];
		$class_duty = $_POST['class_duty'];
		$design_standered = $_POST['design_standered'];
		$application = $_POST['application'];
		$span = $_POST['span'];
		$abv_floor_mh = $_POST['abv_floor_mh'];
		$blw_floor_ah = $_POST['blw_floor_ah'];
		$travel_length = $_POST['travel_length'];
		$column_to_column = $_POST['column_to_column'];
		$speed_mh = $_POST['speed_mh'];
		$speed_ah = $_POST['speed_ah'];
		$speed_ct = $_POST['speed_ct'];
		$speed_lt = $_POST['speed_lt'];
		$cust_id = $_POST['id'];
		$vfd = json_encode($_POST['vfd']);
		$scope_supply = json_encode($_POST['scope_supply']);
		$installation = $_POST['installation'];
		$other_remarks = $_POST['other_remarks'];
		$query="INSERT INTO `myc_eotrequestform`(`project_loc`,`comp_name`,`address`,`country`,`state`,`dist`,`other_country_details`,`mainhost`,`auxhoist`,`location`,`crane_type`,`class_duty`,`design_standered`,`application`,`span`,`abv_floor_mh`,`blw_floor_ah`,`travel_length`,`column_to_column`,`speed_mh`,`speed_ah`,`speed_ct`,`speed_lt`,`cust_id`,`vfd`,`scope_supply`,`installation`,`other_remarks`,`refno`) VALUES ('$project_loc','$comp_name','$address','$country','$state','$dist','$other_country_details
			','$mainhost','$auxhoist','$location','$crane_type','$class_duty','$design_standered','$application','$span','$abv_floor_mh','$blw_floor_ah','$travel_length','$column_to_column','$speed_mh','$speed_ah','$speed_ct','$speed_lt','$cust_id','$vfd','$scope_supply','$installation','$other_remarks','$refno')";
		$sql=mysqli_query($conn,$query);
		$_SESSION['eotcrane_lasttext_id']=$conn->insert_id;
		if($sql){
			 header("Location:eot_preview.php");
			$_SESSION['msg']="Successfully Added!!!";	
		}
		else{
			$_SESSION['msg']="Not added result !!!";
			header("Location:$_SERVER[HTTP_REFERER]");
		}

	}
	
}
if(isset($_POST['eot_payment'])){
	
	$lastid = $_SESSION['eotcrane_lasttext_id'];
	$amount = $_POST['amount'];
	$length = 15;
	 $order_no=substr(str_shuffle(str_repeat($x='ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz', ceil($length/strlen($x)) )),1,$length);
	 $added_on = date('Y-m-d');
	 // print_r($data);die;
	  $query="UPDATE `myc_eotrequestform` SET `amount`='$amount',`order_no`='$order_no'  WHERE `id`='$lastid'";
	$run=mysqli_query($conn,$query);
	$_SESSION['tables'] = myc_eotrequestform;
	if($run){
		// ''''''''''''subscription check''''''''''''''''
		$use_id =  json_decode($_COOKIE['Cookie'],true); 
            $cust_id=$use_id['id'];
            $exp_date = date('Y-m-d');
            $qry = "SELECT `id` FROM `myc_subscription` WHERE `cust_id`='$cust_id' AND `expire_date`>'$exp_date'";
	      $run=mysqli_query($conn,$qry);
	      $data=mysqli_fetch_assoc($run);

	      if(empty($data)){
	      	$_SESSION['last_updated_id']=$lastid;
		      header('Location:payment_2.php');
		      $_SESSION['msg']="Student Updated Successfully !!!";
	      }
	      else{
	      	header('Location:home.php');
		      $_SESSION['msg']="Student Updated Successfully !!!";
	      }
			
	}
	else{
		$_SESSION['msg']="Student Not Updated!!!";
		header("location:$_SERVER[HTTP_REFERER]");
	}
 }


 if(isset($_POST['gantry_upload'])){

 	      $comp_name = $_POST['comp_name'];
 	      $address = $_POST['address'];
 	      $country = $_POST['country'];
 	      $state = $_POST['state'];
 	      $dist = $_POST['dist'];
 	      $other_country_details = $_POST['other_country_details'];

	 	$photo1 = $_FILES['file1']['name'];
		$photo1 = explode('.',$photo1);
		$image1= time().$photo1[0];
		$extension1 = $photo1[1];
		$imagename1 = $_FILES['file1']['tmp_name'];
			list($width,$height)=getimagesize($_FILES['file1']['tmp_name']);
		$dir="uploads/upload_files/";
		$allext=array("png","PNG","jpg","JPG","jpeg","JPEG","GIF","gif","pdf");
		$check1 = Imageupload($dir,'file1',$allext,"1800000","1800000",'100000000',$image1,$extension1);
		// '''''''''''file 1''''''''''''''''''''''
		$photo2 = $_FILES['file2']['name'];
		$photo2 = explode('.',$photo2);
		$image2= time().$photo2[0];
		$extension2 = $photo2[1];
		$imagename2 = $_FILES['file2']['tmp_name'];
			list($width,$height)=getimagesize($_FILES['file2']['tmp_name']);
		$dir="uploads/upload_files/";
		$allext=array("png","PNG","jpg","JPG","jpeg","JPEG","GIF","gif","pdf");
		$check2 = Imageupload($dir,'file2',$allext,"1800000","1800000",'100000000',$image2,$extension2);
		// '''''''''''file 2''''''''''''''''''''''
		$photo3 = $_FILES['file3']['name'];
		$photo3 = explode('.',$photo3);
		$image3= time().$photo3[0];
		$extension3 = $photo3[1];
		$imagename3 = $_FILES['file3']['tmp_name'];
			list($width,$height)=getimagesize($_FILES['file3']['tmp_name']);
		$dir="uploads/upload_files/";
		$allext=array("png","PNG","jpg","JPG","jpeg","JPEG","GIF","gif","pdf");
		$check3 = Imageupload($dir,'file3',$allext,"1800000","1800000",'100000000',$image3,$extension3);
		// '''''''''''file 3''''''''''''''''''''''
		$photo4 = $_FILES['file4']['name'];
		$photo4 = explode('.',$photo4);
		$image4= time().$photo4[0];
		$extension4 = $photo4[1];
		$imagename4 = $_FILES['file4']['tmp_name'];
			list($width,$height)=getimagesize($_FILES['file4']['tmp_name']);
		$dir="uploads/upload_files/";
		$allext=array("png","PNG","jpg","JPG","jpeg","JPEG","GIF","gif","pdf");
		$check4 = Imageupload($dir,'file4',$allext,"1800000","1800000",'100000000',$image4,$extension4);
		// '''''''''''file 4''''''''''''''''''''''
		$photo5 = $_FILES['file5']['name'];
		$photo5 = explode('.',$photo5);
		$image5= time().$photo5[0];
		$extension5 = $photo5[1];
		$imagename5 = $_FILES['file5']['tmp_name'];
			list($width,$height)=getimagesize($_FILES['file5']['tmp_name']);
		$dir="uploads/upload_files/";
		$allext=array("png","PNG","jpg","JPG","jpeg","JPEG","GIF","gif","pdf");
		$check5 = Imageupload($dir,'file5',$allext,"1800000","1800000",'100000000',$image5,$extension5);
		// '''''''''''file 5''''''''''''''''''''''
		if($check1===true || $check2===true || $check3===true || $check4===true || $check5===true){

		$image1 = $image1.".jpg";	
		$image2 = $image2.".jpg";
		$image3 = $image3.".jpg";	
		$image4 = $image4.".jpg";	
		$image5 = $image5.".jpg";	
		$added_on = date('Y-m-d');
		$use_id =  json_decode($_COOKIE['Cookie'],true); 
            $cstmr_id=$use_id['id'];
		$device= "GANTRY CRANE & SEMI GANTRY CRANE";
		// echo '<pre>';
		// print_r($device);die;
		$query="INSERT INTO `myc_upload`(`file1`,`file2`,`file3`,`file4`,`file5`,`custmr_id`,`device_id`,`comp_name`,`address`,`country`,`state`,`dist`,`other_country_details`,`added_on`) VALUES ('$image1','$image2','$image3','$image4','$image5','$cstmr_id','$device','$comp_name','$address','$country','$state','$dist','$other_country_details','$added_on')";
		$sql=mysqli_query($conn,$query);
		$_SESSION['last_upload_id']=$conn->insert_id; 
		if($sql){
			 header("Location:preview_uploadfile.php");
			$_SESSION['msg']="Successfully Added!!!";	
		}
		else{
			$_SESSION['msg']="Not added result !!!";
			header("Location:$_SERVER[HTTP_REFERER]");
		}
    }
}

if(isset($_POST['gantry_text'])){
	// echo '<pre>';
	// print_r($_POST);die;

	$qry = "SELECT `id` FROM `myc_gantrycrane` ORDER BY `id` DESC LIMIT 1";
	$run=mysqli_query($conn,$qry);
	$data=mysqli_fetch_assoc($run);
	if(!empty($data)){
	$refno = 'REF-200'.$data['id'];	
	$project_loc = $_POST['project_loc'];
	$comp_name = $_POST['comp_name'];
	$address = $_POST['address'];
	$country = $_POST['country'];
	$state = $_POST['state'];
	$dist = $_POST['dist'];
	$other_country_details = $_POST['other_country_details'];
	$mainhost = $_POST['mainhost'];
	$auxhoist = $_POST['auxhoist'];
	$location = $_POST['location'];
	$crane_type = $_POST['crane_type'];
	$class_duty = $_POST['class_duty'];
	$design_standered = $_POST['design_standered'];
	$application = $_POST['application'];
	$span = $_POST['span'];
	$cantilever = $_POST['cantilever'];
	$abv_floor_mh = $_POST['blw_floor_mh'];
	$blw_floor_ah = $_POST['blw_floor_ah'];
	$travel_length = $_POST['travel_length'];
	$speed_mh = $_POST['speed_mh'];
	$speed_ah = $_POST['speed_ah'];
	$speed_ct = $_POST['speed_ct'];
	$speed_lt = $_POST['speed_lt'];
	$cust_id = $_POST['id'];
	$vfd = json_encode($_POST['vfd']);
	$scope_supply = json_encode($_POST['scope_supply']);
	$installation = $_POST['installation'];
	$other_remarks = $_POST['other_remarks'];
	$query="INSERT INTO `myc_gantrycrane`(`project_loc`,`comp_name`,`address`,`country`,`state`,`dist`,`other_country_details`,`mainhost`,`auxhoist`,`location`,`crane_type`,`class_duty`,`design_standered`,`application`,`span`,`cantilever`,`abv_floor_mh`,`blw_floor_ah`,`travel_length`,`speed_mh`,`speed_ah`,`speed_ct`,`speed_lt`,`cust_id`,`vfd`,`scope_supply`,`installation`,`other_remarks`,`refno`) VALUES ('$project_loc','$comp_name','$address','$country','$state','$dist','$other_country_details','$mainhost','$auxhoist','$location','$crane_type','$class_duty','$design_standered','$application','$span','$cantilever','$abv_floor_mh','$blw_floor_ah','$travel_length','$speed_mh','$speed_ah','$speed_ct','$speed_lt','$cust_id','$vfd','$scope_supply','$installation','$other_remarks','$refno')";
		$sql=mysqli_query($conn,$query);
		$_SESSION['gantry_lasttext_id']=$conn->insert_id;
		if($sql){
			 header("Location:gantry_preview.php");
			$_SESSION['msg']="Successfully Added!!!";	
		}
		else{
			$_SESSION['msg']="Not added result !!!";
			header("Location:$_SERVER[HTTP_REFERER]");
		}
	}else{
	$refno = 'REF-200';	
	$project_loc = $_POST['project_loc'];
	$comp_name = $_POST['comp_name'];
	$address = $_POST['address'];
	$country = $_POST['country'];
	$state = $_POST['state'];
	$dist = $_POST['dist'];
	$other_country_details = $_POST['other_country_details'];
	$mainhost = $_POST['mainhost'];
	$auxhoist = $_POST['auxhoist'];
	$location = $_POST['location'];
	$crane_type = $_POST['crane_type'];
	$class_duty = $_POST['class_duty'];
	$design_standered = $_POST['design_standered'];
	$application = $_POST['application'];
	$span = $_POST['span'];
	$cantilever = $_POST['cantilever'];
	$abv_floor_mh = $_POST['blw_floor_mh'];
	$blw_floor_ah = $_POST['blw_floor_ah'];
	$travel_length = $_POST['travel_length'];
	$speed_mh = $_POST['speed_mh'];
	$speed_ah = $_POST['speed_ah'];
	$speed_ct = $_POST['speed_ct'];
	$speed_lt = $_POST['speed_lt'];
	$cust_id = $_POST['id'];
	$vfd = json_encode($_POST['vfd']);
	$scope_supply = json_encode($_POST['scope_supply']);
	$installation = $_POST['installation'];
	$other_remarks = $_POST['other_remarks'];
	$query="INSERT INTO `myc_gantrycrane`(`project_loc`,`comp_name`,`address`,`country`,`state`,`dist`,`other_country_details`,`mainhost`,`auxhoist`,`location`,`crane_type`,`class_duty`,`design_standered`,`application`,`span`,`cantilever`,`abv_floor_mh`,`blw_floor_ah`,`travel_length`,`speed_mh`,`speed_ah`,`speed_ct`,`speed_lt`,`cust_id`,`vfd`,`scope_supply`,`installation`,`other_remarks`,`refno`) VALUES ('$project_loc','$comp_name','$address','$country','$state','$dist','$other_country_details','$mainhost','$auxhoist','$location','$crane_type','$class_duty','$design_standered','$application','$span','$cantilever','$abv_floor_mh','$blw_floor_ah','$travel_length','$speed_mh','$speed_ah','$speed_ct','$speed_lt','$cust_id','$vfd','$scope_supply','$installation','$other_remarks','$refno')";
		$sql=mysqli_query($conn,$query);
		$_SESSION['gantry_lasttext_id']=$conn->insert_id;
		if($sql){
			 header("Location:gantry_preview.php");
			$_SESSION['msg']="Successfully Added!!!";	
		}
		else{
			$_SESSION['msg']="Not added result !!!";
			header("Location:$_SERVER[HTTP_REFERER]");
		}

	}
}
if(isset($_POST['ganty_payment'])){
	// echo '<pre>';
	// print_r($_POST);die;
	
	$lastid = $_SESSION['gantry_lasttext_id'];
	$amount = $_POST['amount'];
	$length = 15;
	 $order_no=substr(str_shuffle(str_repeat($x='ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz', ceil($length/strlen($x)) )),1,$length);
	 $added_on = date('Y-m-d');
	 // print_r($data);die;
	  $query="UPDATE `myc_gantrycrane` SET `amount`='$amount',`order_no`='$order_no'  WHERE `id`='$lastid'";
	$run=mysqli_query($conn,$query);
	$_SESSION['tables'] = myc_gantrycrane;
	if($run){
		// ''''''''''''subscription check''''''''''''''''
		$use_id =  json_decode($_COOKIE['Cookie'],true); 
            $cust_id=$use_id['id'];
            $exp_date = date('Y-m-d');
            $qry = "SELECT `id` FROM `myc_subscription` WHERE `cust_id`='$cust_id' AND `expire_date`>'$exp_date'";
	      $run=mysqli_query($conn,$qry);
	      $data=mysqli_fetch_assoc($run);

	      if(empty($data)){
	      	$_SESSION['last_updated_id']=$lastid;
		      header('Location:payment_2.php');
		      $_SESSION['msg']="Student Updated Successfully !!!";
	      }
	      else{
	      	header('Location:home.php');
		      $_SESSION['msg']="Student Updated Successfully !!!";
	      }
		// $_SESSION['last_updated_id']=$lastid;
		//  header('Location:payment_2.php');
		// $_SESSION['msg']="Student Updated Successfully !!!";	
	}
	else{
		$_SESSION['msg']="Student Not Updated!!!";
		header("location:$_SERVER[HTTP_REFERER]");
	}
}
// ''''''''''''''''''''''Gantry Crane End''''''''''''''''''''''''''''''
if(isset($_POST['jib_upload'])){
		// echo '<pre>';
		// print_r($_POST);
		// print_r($_FILES);die;

	      $comp_name = $_POST['comp_name'];
 	      $address = $_POST['address'];
 	      $country = $_POST['country'];
 	      $state = $_POST['state'];
 	      $dist = $_POST['dist'];
 	      $other_country_details = $_POST['other_country_details'];
 	   
	 	$photo1 = $_FILES['file1']['name'];
		$photo1 = explode('.',$photo1);
		$image1= time().$photo1[0];
		$extension1 = $photo1[1];
		$imagename1 = $_FILES['file1']['tmp_name'];
			list($width,$height)=getimagesize($_FILES['file1']['tmp_name']);
		$dir="uploads/upload_files/";
		$allext=array("png","PNG","jpg","JPG","jpeg","JPEG","GIF","gif","pdf");
		$check1 = Imageupload($dir,'file1',$allext,"1800000","1800000",'100000000',$image1,$extension1);
		// '''''''''''file 1''''''''''''''''''''''
		$photo2 = $_FILES['file2']['name'];
		$photo2 = explode('.',$photo2);
		$image2= time().$photo2[0];
		$extension2 = $photo2[1];
		$imagename2 = $_FILES['file2']['tmp_name'];
			list($width,$height)=getimagesize($_FILES['file2']['tmp_name']);
		$dir="uploads/upload_files/";
		$allext=array("png","PNG","jpg","JPG","jpeg","JPEG","GIF","gif","pdf");
		$check2 = Imageupload($dir,'file2',$allext,"1800000","1800000",'100000000',$image2,$extension2);
		// '''''''''''file 2''''''''''''''''''''''
		$photo3 = $_FILES['file3']['name'];
		$photo3 = explode('.',$photo3);
		$image3= time().$photo3[0];
		$extension3 = $photo3[1];
		$imagename3 = $_FILES['file3']['tmp_name'];
			list($width,$height)=getimagesize($_FILES['file3']['tmp_name']);
		$dir="uploads/upload_files/";
		$allext=array("png","PNG","jpg","JPG","jpeg","JPEG","GIF","gif","pdf");
		$check3 = Imageupload($dir,'file3',$allext,"1800000","1800000",'100000000',$image3,$extension3);
		// '''''''''''file 3''''''''''''''''''''''
		$photo4 = $_FILES['file4']['name'];
		$photo4 = explode('.',$photo4);
		$image4= time().$photo4[0];
		$extension4 = $photo4[1];
		$imagename4 = $_FILES['file4']['tmp_name'];
			list($width,$height)=getimagesize($_FILES['file4']['tmp_name']);
		$dir="uploads/upload_files/";
		$allext=array("png","PNG","jpg","JPG","jpeg","JPEG","GIF","gif","pdf");
		$check4 = Imageupload($dir,'file4',$allext,"1800000","1800000",'100000000',$image4,$extension4);
		// '''''''''''file 4''''''''''''''''''''''
		$photo5 = $_FILES['file5']['name'];
		$photo5 = explode('.',$photo5);
		$image5= time().$photo5[0];
		$extension5 = $photo5[1];
		$imagename5 = $_FILES['file5']['tmp_name'];
			list($width,$height)=getimagesize($_FILES['file5']['tmp_name']);
		$dir="uploads/upload_files/";
		$allext=array("png","PNG","jpg","JPG","jpeg","JPEG","GIF","gif","pdf");
		$check5 = Imageupload($dir,'file5',$allext,"1800000","1800000",'100000000',$image5,$extension5);
		// '''''''''''file 5''''''''''''''''''''''
		if($check1===true || $check2===true || $check3===true || $check4===true || $check5===true){

		$image1 = $image1.".jpg";	
		$image2 = $image2.".jpg";
		$image3 = $image3.".jpg";	
		$image4 = $image4.".jpg";	
		$image5 = $image5.".jpg";	
		$added_on = date('Y-m-d');
		$use_id =  json_decode($_COOKIE['Cookie'],true); 
            $cstmr_id=$use_id['id'];
		$device= "JIB CRANE";
		// echo '<pre>';
		// print_r($device);die;
		$query="INSERT INTO `myc_upload`(`file1`,`file2`,`file3`,`file4`,`file5`,`custmr_id`,`device_id`,`comp_name`,`address`,`country`,`state`,`dist`,`other_country_details`,`added_on`) VALUES ('$image1','$image2','$image3','$image4','$image5','$cstmr_id','$device','$comp_name','$address','$country','$state','$dist','$other_country_details','$added_on')";
		$sql=mysqli_query($conn,$query);
		$_SESSION['last_upload_id']=$conn->insert_id;
		if($sql){
			 header("Location:preview_uploadfile.php");
			$_SESSION['msg']="Successfully Added!!!";	
		}
		else{
			$_SESSION['msg']="Not added result !!!";
			header("Location:$_SERVER[HTTP_REFERER]");
		}
    }
}


if(isset($_POST['jib_text'])){
	// echo '<pre>';
	// print_r($_POST);die;
	$qry = "SELECT `id` FROM `myc_jibcrane` ORDER BY `id` DESC LIMIT 1";
	$run=mysqli_query($conn,$qry);
	$data=mysqli_fetch_assoc($run);
	if(!empty($data)){
		$refno = 'REF-300'.$data['id'];
	$project_loc = $_POST['project_loc'];
	$comp_name = $_POST['comp_name'];
	$address = $_POST['address'];
	$country = $_POST['country'];
	$state = $_POST['state'];
	$dist = $_POST['dist'];
	$other_country_details = $_POST['other_country_details'];
	$type_of_hoist = $_POST['type_of_hoist'];
	$mainhost = $_POST['mainhost'];
	$auxhoist = $_POST['auxhoist'];
	$location = $_POST['location'];
	$crane_type = $_POST['crane_type'];
	$class_duty = $_POST['class_duty'];
	$design_standered = $_POST['design_standered'];
	$application = $_POST['application'];
	$hoist_type = $_POST['hoist_type'];
	$arm = $_POST['arm'];
	$lifting_height = $_POST['lifting_height'];
	$MH = $_POST['MH'];
	$CT = $_POST['CT'];
	$swivel = $_POST['swivel'];
	$swivel_degree = $_POST['swivel_degree'];
	$scope_supply = json_encode($_POST['scope_supply']);
	$use_id =  json_decode($_COOKIE['Cookie'],true); 
      $cust_id=$use_id['id'];
	// $cust_id = $_COOKIE['Cookie'];
	$installation = $_POST['installation'];
	$other_remarks = $_POST['other_remarks'];
	$query="INSERT INTO `myc_jibcrane`(`project_loc`,`comp_name`,`address`,`country`,`state`,`dist`,`other_country_details`,`type_of_hoist`,`mainhost`,`auxhoist`,`location`,`crane_type`,`class_duty`,`design_standered`,`application`,`hoist_type`,`arm`,`lifting_height`,`mh`,`ct`,`swivel`,`swivel_degree`,`scope_supply`,`cust_id`,`installation`,`other_remarks`,`ref_no`) VALUES ('$project_loc','$comp_name','$address','$country','$state','$dist','$other_country_details','$type_of_hoist','$mainhost','$auxhoist','$location','$crane_type','$class_duty','$design_standered','$application','$hoist_type ','$arm','$lifting_height','$MH','$CT','$swivel','$swivel_degree','$scope_supply','$cust_id','$installation','$other_remarks','$refno')";
		// print_r($query);die;
		$sql=mysqli_query($conn,$query);
		$_SESSION['jib_lasttext_id']=$conn->insert_id;
		if($sql){
			 header("Location:jib_preview.php");
			$_SESSION['msg']="Successfully Added!!!";	
		}
		else{
			$_SESSION['msg']="Not added result !!!";
			header("Location:$_SERVER[HTTP_REFERER]");
		}
     }
     else{
     	$refno = 'REF-300';
	$project_loc = $_POST['project_loc'];
	$comp_name = $_POST['comp_name'];
	$address = $_POST['address'];
	$country = $_POST['country'];
	$state = $_POST['state'];
	$dist = $_POST['dist'];
	$other_country_details = $_POST['other_country_details'];
	$mainhost = $_POST['mainhost'];
	$auxhoist = $_POST['auxhoist'];
	$location = $_POST['location'];
	$crane_type = $_POST['crane_type'];
	$class_duty = $_POST['class_duty'];
	$design_standered = $_POST['design_standered'];
	$application = $_POST['application'];
	$hoist_type = $_POST['hoist_type'];
	$arm = $_POST['arm'];
	$lifting_height = $_POST['lifting_height'];
	$MH = $_POST['MH'];
	$CT = $_POST['CT'];
	$swivel = $_POST['swivel'];
	$swivel_degree = $_POST['swivel_degree'];
	$scope_supply = json_encode($_POST['scope_supply']);
	$use_id =  json_decode($_COOKIE['Cookie'],true); 
      $cust_id=$use_id['id'];
	$installation = $_POST['installation'];
	$other_remarks = $_POST['other_remarks'];
	$query="INSERT INTO `myc_jibcrane`(`project_loc`,`comp_name`,`address`,`country`,`state`,`dist`,`other_country_details`,`mainhost`,`auxhoist`,`location`,`crane_type`,`class_duty`,`design_standered`,`application`,`hoist_type`,`arm`,`lifting_height`,`mh`,`ct`,`swivel`,`swivel_degree`,`scope_supply`,`cust_id`,`installation`,`other_remarks`,`refno`) VALUES ('$project_loc','$comp_name','$address','$country','$state','$dist','$other_country_details','$mainhost','$auxhoist','$location','$crane_type','$class_duty','$design_standered','$application','$hoist_type ','$arm','$lifting_height','$MH','$CT','$swivel','$swivel_degree','$scope_supply','$cust_id','$installation','$other_remarks','$refno')";
	
		$sql=mysqli_query($conn,$query);
		$_SESSION['jib_lasttext_id']=$conn->insert_id;
		if($sql){
			 header("Location:jib_preview.php");
			$_SESSION['msg']="Successfully Added!!!";	
		}
		else{
			$_SESSION['msg']="Not added result !!!";
			header("Location:$_SERVER[HTTP_REFERER]");
		}

     }
}
if(isset($_POST['jib_payment'])){
	// echo '<pre>';

	// print_r($_POST);die;
	
	$lastid = $_SESSION['jib_lasttext_id'];
	$amount = $_POST['amount'];
	$length = 15;
	 $order_no=substr(str_shuffle(str_repeat($x='ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz', ceil($length/strlen($x)) )),1,$length);
	 $added_on = date('Y-m-d');
	 // print_r($data);die;
	  $query="UPDATE `myc_jibcrane` SET `amount`='$amount',`order_no`='$order_no',`added_on`='$added_on'  WHERE `id`='$lastid'";
	$run=mysqli_query($conn,$query);
	$_SESSION['tables'] = myc_jibcrane;
	if($run){
		// ''''''''''''subscription check''''''''''''''''
		$use_id =  json_decode($_COOKIE['Cookie'],true); 
            $cust_id=$use_id['id'];
            $exp_date = date('Y-m-d');
            $qry = "SELECT `id` FROM `myc_subscription` WHERE `cust_id`='$cust_id' AND `expire_date`>'$exp_date'";
	      $run=mysqli_query($conn,$qry);
	      $data=mysqli_fetch_assoc($run);

	      if(empty($data)){
	      	$_SESSION['last_updated_id']=$lastid;
		      header('Location:payment_2.php');
		      $_SESSION['msg']="Student Updated Successfully !!!";
	      }
	      else{
	      	header('Location:home.php');
		      $_SESSION['msg']="Student Updated Successfully !!!";
	      }
		// $_SESSION['last_updated_id']=$lastid;
		//  header('Location:payment_2.php');
		// $_SESSION['msg']="Student Updated Successfully !!!";	
	}
	else{
		$_SESSION['msg']="Student Not Updated!!!";
		header("location:$_SERVER[HTTP_REFERER]");
	}
}
// ''''''''''''''''''''''''''''JIB CRANE''''''''''''''''''''''''''''''''''''''''
if(isset($_POST['monorail_upload'])){

	 	$photo1 = $_FILES['file1']['name'];
		$photo1 = explode('.',$photo1);
		$image1= time().$photo1[0];
		$extension1 = $photo1[1];
		$imagename1 = $_FILES['file1']['tmp_name'];
		list($width,$height)=getimagesize($_FILES['file1']['tmp_name']);
		$dir="uploads/upload_files/";
		$allext=array("png","PNG","jpg","JPG","jpeg","JPEG","GIF","gif","pdf");
		$check1 = Imageupload($dir,'file1',$allext,"1800000","1800000",'100000000',$image1,$extension1);
		// '''''''''''file 1''''''''''''''''''''''
		$photo2 = $_FILES['file2']['name'];
		$photo2 = explode('.',$photo2);
		$image2= time().$photo2[0];
		$extension2 = $photo2[1];
		$imagename2 = $_FILES['file2']['tmp_name'];
		list($width,$height)=getimagesize($_FILES['file2']['tmp_name']);
		$dir="uploads/upload_files/";
		$allext=array("png","PNG","jpg","JPG","jpeg","JPEG","GIF","gif","pdf");
		$check2 = Imageupload($dir,'file2',$allext,"1800000","1800000",'100000000',$image2,$extension2);
		// '''''''''''file 2''''''''''''''''''''''
		$photo3 = $_FILES['file3']['name'];
		$photo3 = explode('.',$photo3);
		$image3= time().$photo3[0];
		$extension3 = $photo3[1];
		$imagename3 = $_FILES['file3']['tmp_name'];
		list($width,$height)=getimagesize($_FILES['file3']['tmp_name']);
		$dir="uploads/upload_files/";
		$allext=array("png","PNG","jpg","JPG","jpeg","JPEG","GIF","gif","pdf");
		$check3 = Imageupload($dir,'file3',$allext,"1800000","1800000",'100000000',$image3,$extension3);
		// '''''''''''file 3''''''''''''''''''''''
		$photo4 = $_FILES['file4']['name'];
		$photo4 = explode('.',$photo4);
		$image4= time().$photo4[0];
		$extension4 = $photo4[1];
		$imagename4 = $_FILES['file4']['tmp_name'];
		list($width,$height)=getimagesize($_FILES['file4']['tmp_name']);
		$dir="uploads/upload_files/";
		$allext=array("png","PNG","jpg","JPG","jpeg","JPEG","GIF","gif","pdf");
		$check4 = Imageupload($dir,'file4',$allext,"1800000","1800000",'100000000',$image4,$extension4);
		// '''''''''''file 4''''''''''''''''''''''
		$photo5 = $_FILES['file5']['name'];
		$photo5 = explode('.',$photo5);
		$image5= time().$photo5[0];
		$extension5 = $photo5[1];
		$imagename5 = $_FILES['file5']['tmp_name'];
		list($width,$height)=getimagesize($_FILES['file5']['tmp_name']);
		$dir="uploads/upload_files/";
		$allext=array("png","PNG","jpg","JPG","jpeg","JPEG","GIF","gif","pdf");
		$check5 = Imageupload($dir,'file5',$allext,"1800000","1800000",'100000000',$image5,$extension5);
		// '''''''''''file 5''''''''''''''''''''''
		if($check1===true || $check2===true || $check3===true || $check4===true || $check5===true){

		$image1 = $image1.".jpg";	
		$image2 = $image2.".jpg";
		$image3 = $image3.".jpg";	
		$image4 = $image4.".jpg";	
		$image5 = $image5.".jpg";	
		$added_on = date('Y-m-d');
		$cstmr_id = $_COOKIE['Cookie'];
		$device= "MONORAIL WITH ELECTRIC WIRE ROPE HOIST";
		// echo '<pre>';
		// print_r($device);die;
		$query="INSERT INTO `myc_upload`(`file1`,`file2`,`file3`,`file4`,`file5`,`custmr_id`,`device_id`,`added_on`) VALUES ('$image1','$image2','$image3','$image4','$image5','$cstmr_id','$device','$added_on')";
		$sql=mysqli_query($conn,$query);
		if($sql){
			 header("Location:$_SERVER[HTTP_REFERER]");
			$_SESSION['msg']="Successfully Added!!!";	
		}
		else{
			$_SESSION['msg']="Not added result !!!";
			header("Location:$_SERVER[HTTP_REFERER]");
		}
    }
}




if(isset($_POST['monorail_text'])){
	// echo '<pre>';
	// print_r($_POST);die;
	$project_loc = $_POST['project_loc'];
	$mainhost = $_POST['mainhost'];
	$auxhoist = $_POST['auxhoist'];
	$location = $_POST['location'];
	$class_duty = $_POST['class_duty'];
	$design_standered = $_POST['design_standered'];
	$application = $_POST['application'];
	$travel_length = $_POST['travel_length'];
	$lifting_height = $_POST['lifting_height'];
	$MH = $_POST['MH'];
	$travel = $_POST['travel'];
	
	$scope_supply = json_encode($_POST['scope_supply']);
	$cust_id = $_COOKIE['Cookie'];
	$installation = $_POST['installation'];
	$other_remarks = $_POST['other_remarks'];
	$query="INSERT INTO `myc_monorailcrane`(`project_loc`,`mainhost`,`auxhoist`,`location`,`class_duty`,`design_standered`,`application`,`travel_length`,`lifting_height`,`MH`,`travel`,`scope_supply`,`cust_id`,`installation`,`other_remarks`) VALUES ('$project_loc','$mainhost','$auxhoist','$location','$class_duty','$design_standered','$application','$travel_length','$lifting_height ','$MH','$travel','$scope_supply','$cust_id','$installation','$other_remarks')";

		$sql=mysqli_query($conn,$query);
		if($sql){
			 header("Location:$_SERVER[HTTP_REFERER]");
			$_SESSION['msg']="Successfully Added!!!";	
		}
		else{
			$_SESSION['msg']="Not added result !!!";
			header("Location:$_SERVER[HTTP_REFERER]");
		}
}
// '''''''''''''''''''''''''''ELECTRIC WIRE''''''''''''''''''''''''''''''
if(isset($_POST['electric_upload'])){

		$comp_name = $_POST['comp_name'];
 	      $address = $_POST['address'];
 	      $country = $_POST['country'];
 	      $state = $_POST['state'];
 	      $dist = $_POST['dist'];
 	      $other_country_details = $_POST['other_country_details'];


	 	$photo1 = $_FILES['file1']['name'];
		$photo1 = explode('.',$photo1);
		$image1= time().$photo1[0];
		$extension1 = $photo1[1];
		$imagename1 = $_FILES['file1']['tmp_name'];
		list($width,$height)=getimagesize($_FILES['file1']['tmp_name']);
		$dir="uploads/upload_files/";
		$allext=array("png","PNG","jpg","JPG","jpeg","JPEG","GIF","gif","pdf");
		$check1 = Imageupload($dir,'file1',$allext,"1800000","1800000",'100000000',$image1,$extension1);
		// '''''''''''file 1''''''''''''''''''''''
		$photo2 = $_FILES['file2']['name'];
		$photo2 = explode('.',$photo2);
		$image2= time().$photo2[0];
		$extension2 = $photo2[1];
		$imagename2 = $_FILES['file2']['tmp_name'];
		list($width,$height)=getimagesize($_FILES['file2']['tmp_name']);
		$dir="uploads/upload_files/";
		$allext=array("png","PNG","jpg","JPG","jpeg","JPEG","GIF","gif","pdf");
		$check2 = Imageupload($dir,'file2',$allext,"1800000","1800000",'100000000',$image2,$extension2);
		// '''''''''''file 2''''''''''''''''''''''
		$photo3 = $_FILES['file3']['name'];
		$photo3 = explode('.',$photo3);
		$image3= time().$photo3[0];
		$extension3 = $photo3[1];
		$imagename3 = $_FILES['file3']['tmp_name'];
		list($width,$height)=getimagesize($_FILES['file3']['tmp_name']);
		$dir="uploads/upload_files/";
		$allext=array("png","PNG","jpg","JPG","jpeg","JPEG","GIF","gif","pdf");
		$check3 = Imageupload($dir,'file3',$allext,"1800000","1800000",'100000000',$image3,$extension3);
		// '''''''''''file 3''''''''''''''''''''''
		$photo4 = $_FILES['file4']['name'];
		$photo4 = explode('.',$photo4);
		$image4= time().$photo4[0];
		$extension4 = $photo4[1];
		$imagename4 = $_FILES['file4']['tmp_name'];
		list($width,$height)=getimagesize($_FILES['file4']['tmp_name']);
		$dir="uploads/upload_files/";
		$allext=array("png","PNG","jpg","JPG","jpeg","JPEG","GIF","gif","pdf");
		$check4 = Imageupload($dir,'file4',$allext,"1800000","1800000",'100000000',$image4,$extension4);
		// '''''''''''file 4''''''''''''''''''''''
		$photo5 = $_FILES['file5']['name'];
		$photo5 = explode('.',$photo5);
		$image5= time().$photo5[0];
		$extension5 = $photo5[1];
		$imagename5 = $_FILES['file5']['tmp_name'];
		list($width,$height)=getimagesize($_FILES['file5']['tmp_name']);
		$dir="uploads/upload_files/";
		$allext=array("png","PNG","jpg","JPG","jpeg","JPEG","GIF","gif","pdf");
		$check5 = Imageupload($dir,'file5',$allext,"1800000","1800000",'100000000',$image5,$extension5);
		// '''''''''''file 5''''''''''''''''''''''
		if($check1===true || $check2===true || $check3===true || $check4===true || $check5===true){

		$image1 = $image1.".jpg";	
		$image2 = $image2.".jpg";
		$image3 = $image3.".jpg";	
		$image4 = $image4.".jpg";	
		$image5 = $image5.".jpg";	
		$added_on = date('Y-m-d');
		$cstmr_id = $_COOKIE['Cookie'];
		$device= "ELECTRIC WIRE ROPE HOIST";
		// echo '<pre>';
		// print_r($device);die;
		$query="INSERT INTO `myc_upload`(`file1`,`file2`,`file3`,`file4`,`file5`,`custmr_id`,`device_id`,`comp_name`,`address`,`country`,`state`,`dist`,`other_country_details`,`added_on`) VALUES ('$image1','$image2','$image3','$image4','$image5','$cstmr_id','$device','$comp_name','$address','$country','$state','$dist','$other_country_details','$added_on')";
		$sql=mysqli_query($conn,$query);
		$_SESSION['last_upload_id']=$conn->insert_id;
		if($sql){
			 header("Location:preview_uploadfile.php");
			$_SESSION['msg']="Successfully Added!!!";	
		}
		else{
			$_SESSION['msg']="Not added result !!!";
			header("Location:$_SERVER[HTTP_REFERER]");
		}
    }
}




if(isset($_POST['electric_text'])){
	// echo '<pre>';
	// print_r($_POST);die;

	$project_loc = $_POST['project_loc'];
	$comp_name = $_POST['comp_name'];
	$address = $_POST['address'];
	$country = $_POST['country'];
	$state = $_POST['state'];
	$dist = $_POST['dist'];
	$other_country_details = $_POST['other_country_details'];
	$mainhost = $_POST['mainhost'];
	$auxhoist = $_POST['auxhoist'];
	$location = $_POST['location'];
	$crane_type = $_POST['crane_type'];
	$design_standered = $_POST['design_standered'];
	$application = $_POST['application'];
	$travel_length = $_POST['travel_length'];
	$lifting_height = $_POST['lifting_height'];
	$MH = $_POST['MH'];
	$travel = $_POST['travel'];
	$scope_supply = json_encode($_POST['scope_supply']);
	$use_id =  json_decode($_COOKIE['Cookie'],true); 
      $cust_id=$use_id['id'];
	$installation = $_POST['installation'];
	$other_remarks = $_POST['other_remarks'];
	$query="INSERT INTO `myc_electricwire`(`project_loc`,`comp_name`,`address`,`country`,`state`,`dist`,`other_country_details`,`mainhost`,`auxhoist`,`location`,`crane_type`,`design_standered`,`application`,`travel_length`,`lifting`,`MH`,`travel`,`scope_supply`,`cust_id`,`installation`,`other_remarks`) VALUES ('$project_loc','$comp_name','$address','$country','$state','$dist','$other_country_details','$mainhost','$auxhoist','$location','$crane_type','$design_standered','$application','$travel_length','$lifting_height ','$MH','$travel','$scope_supply','$cust_id','$installation','$other_remarks')";
		$sql=mysqli_query($conn,$query);
		$_SESSION['electricwire_lasttext_id']=$conn->insert_id;
		if($sql){
			 header("Location:electric_preview.php");
			$_SESSION['msg']="Successfully Added!!!";	
		}
		else{
			$_SESSION['msg']="Not added result !!!";
			header("Location:$_SERVER[HTTP_REFERER]");
		}
}
if(isset($_POST['electric_payment'])){
	
	$lastid = $_SESSION['electricwire_lasttext_id'];
	$amount = $_POST['amount'];
	$length = 15;
	 $order_no=substr(str_shuffle(str_repeat($x='ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz', ceil($length/strlen($x)) )),1,$length);
	 $added_on = date('Y-m-d');
	  $query="UPDATE `myc_electricwire` SET `amount`='$amount',`order_no`='$order_no',`added_on`='$added_on'  WHERE `id`='$lastid'";
	  // print_r($query);die;
	  $run=mysqli_query($conn,$query);
	  $_SESSION['tables'] = myc_electricwire;
	if($run){
		// ''''''''''''subscription check''''''''''''''''
		$use_id =  json_decode($_COOKIE['Cookie'],true); 
            $cust_id=$use_id['id'];
            $exp_date = date('Y-m-d');
            $qry = "SELECT `id` FROM `myc_subscription` WHERE `cust_id`='$cust_id' AND `expire_date`>'$exp_date'";
	      $run=mysqli_query($conn,$qry);
	      $data=mysqli_fetch_assoc($run);

	      if(empty($data)){
	      	$_SESSION['last_updated_id']=$lastid;
		      header('Location:payment_2.php');
		      $_SESSION['msg']="Student Updated Successfully !!!";
	      }
	      else{
		      $_SESSION['msg']="Student Updated Successfully !!!";
	      	header('Location:home.php');
	      }
		// $_SESSION['last_updated_id']=$lastid;
		//  header('Location:payment_2.php');
		// $_SESSION['msg']="Student Updated Successfully !!!";	
	}
	else{
		$_SESSION['msg']="Student Not Updated!!!";
		header("location:$_SERVER[HTTP_REFERER]");
	}
}
// --------------------------electric wire------------------------------
if(isset($_POST['update'])){
	
	$id = $_POST['id'];
	$name = $_POST['name'];		
	$comp_name = $_POST['comp_name'];		
	$contact_no = $_POST['contact_no'];		
	$email_id = $_POST['email_id'];		
	$gst_no = $_POST['gst_no'];		
	$address = $_POST['address'];		
	$password = $_POST['password'];
   	 $query="UPDATE `myc_customer` SET `name`='$name',`comp_name`='$comp_name',`gst_no`='$gst_no',`contact_no`='$contact_no',`email_id`='$email_id',`address`='$address',`password`='$password' WHERE `id`='$id'";
	$run=mysqli_query($conn,$query);
	if($run){
		 header("location:$_SERVER[HTTP_REFERER]");
	}
	else{
		header("location:$_SERVER[HTTP_REFERER]");
	}	
}

if(isset($_POST['city'])){
	$state_id = $_POST['id'];
	$qury="SELECT * FROM `myc_area` where `state_id`='$state_id'AND `type`='district' ORDER BY `name` ASC";
      $run=mysqli_query($conn,$qury);
      $dist=array();
      while ($data=mysqli_fetch_assoc($run)){
      $dist[]=$data;
    }
    // print_r($dist); die;
    $html='<option value="">---SELECT---</option>';
    
    foreach ($dist as $key => $value) {
    	$html.='<option value="'.$value['id'].'">'.$value['name'].'</option>';
    }
    echo $html;
}

if(isset($_POST['state'])){
	$id = $_POST['id'];
	$qury="SELECT `state_code` FROM `myc_area` where `id`='$id' AND `type`='state' ORDER BY `name` ASC";
      $run=mysqli_query($conn,$qury);
      $data=mysqli_fetch_assoc($run);
      print_r($data['state_code']);
}

if(isset($_POST['Preview'])){
	// echo '<pre>';
	// print_r($_POST);die;
	
	$company_name=$_POST['company_name'];
	$address=$_POST['address'];
	$contact=$_POST['contact'];
	$company_owner=$_POST['company_owner'];
	$address_2=$_POST['address_2'];
	$contact_2=$_POST['contact_2'];
	$country=$_POST['country'];
	$country_2=$_POST['country_2'];
	$gstin=$_POST['gstin'];
	$gstin_optional=$_POST['gstin_optional'];
	$state=$_POST['state'];
	$state_new=$_POST['state_new'];
	$statecode=$_POST['statecode'];
	$statecode_optional=$_POST['statecode_optional'];
	$model_no=$_POST['model_no'];
	$rate=$_POST['rate'];
	$extra_lift_true_false=$_POST['extra_lift_true_false'];
	$extra_lift_qnty=$_POST['extra_lift_qnty'];
	$extralift=$_POST['extralift'];
	$geared_trolley=$_POST['geared_trolley'];
	$geared_trolley_qty=$_POST['geared_trolley_qty'];
	$column_e=$_POST['column_e'];
	$traviling_moter_no_val=$_POST['traviling_moter_no_val'];
	$rate_qnty=$_POST['rate_qnty'];
	// $coumne_e_total_val=$_POST['coumne_e_total_val'];
	$basic_total_val=$_POST['basic_total_val'];
	$igst_18_val=$_POST['igst_18_val'];
	$cgst_9_val=$_POST['cgst_9_val'];
	$sgst_9_val=$_POST['sgst_9_val'];
	$total_amounts_val=$_POST['total_amounts_val'];
	$amount = $_POST['total_amounts_val'];
	$use_id =  json_decode($_COOKIE['Cookie'],true); 
      $user_id=$use_id['id'];
	$added_on=date('Y-m-d');
	$query="INSERT INTO `myc_chain_pully_details`(`company_name`,`company_owner`,`address`,`address_2`,`contact`,`contact_2`,`gstin`,`gstin_optional`,`country`,`country_2`,`state`,`state_new`,`statecode`,`statecode_optional`,`model_no`,`rate`,`rate_qnty`,`extra_lift_true_false`,`extra_lift_qnty`,`extralift`,`geared_trolley`,`geared_trolley_qty`,`column_e`,`traviling_moter_no_val`,`basic_total_val`,`igst_18_val`,`cgst_9_val`,`sgst_9_val`,`total_amounts_val`,`amount`,`user_id`,`added_on`) VALUES ('$company_name','$company_owner','$address','$address_2','$contact','$contact_2','$gstin','$gstin_optional','$country','$country_2','$state','$state_new ','$statecode','$statecode_optional','$model_no','$rate','$rate_qnty','$extra_lift_true_false','$extra_lift_qnty','$extralift','$geared_trolley','$geared_trolley_qty','$column_e','$traviling_moter_no_val','$basic_total_val','$igst_18_val','$cgst_9_val','$sgst_9_val','$total_amounts_val','$amount','$user_id','$added_on')";
	echo '<pre>';
	print_r($query);die;
	// print_r(mysqli_query($conn,$query));die;
		$sql=mysqli_query($conn,$query);
	// print_r($sql);die;
		$_SESSION['last_inst_id']=$conn->insert_id; 
		if($sql){
			 header("Location:preview.php");
			$_SESSION['msg']="Successfully Added!!!";	
		}
		else{
			$_SESSION['msg']="Not added result !!!";
			header("Location:$_SERVER[HTTP_REFERER]");
		}
}

if(isset($_POST['submit_shadule'])){
	// echo '<pre>';
	// print_r($_POST);die;
	$comp_name= $_POST['comp_name'];
	$address= $_POST['address'];
	$country= $_POST['country'];
	$state= $_POST['state'];
	$dist= $_POST['dist'];
	$details_of_item= $_POST['details_of_item'];
	$qty= $_POST['qty'];
	$days= $_POST['days'];
	$total_val= $_POST['total_val'];
	$use_id =  json_decode($_COOKIE['Cookie'],true); 
      $id=$use_id['id'];
      $added_on = date('Y-m-d');
      // print_r($_POST);die;
      $query="INSERT INTO `myc_shadule_online`(`comp_name`,`address`,`country`,`state`,`dist`,`details_of_item`,`qty`,`days`,`total_val`,`user_id`,`added_on`) VALUES ('$comp_name','$address','$country','$state','$dist','$details_of_item','$qty','$days','$total_val','$id','$added_on')";
		$sql=mysqli_query($conn,$query);
		$_SESSION['last_id']=$conn->insert_id; 
		// print_r($_SESSION['last_id']);die;


		if($sql){
			 header("Location:schedule_preview.php");
			$_SESSION['msg']="Successfully Added!!!";	
		}
		else{
			$_SESSION['msg']="Not added result !!!";
			header("Location:$_SERVER[HTTP_REFERER]");
		}
      
}

if(isset($_POST['electric_chain_submit'])){
	
	$company_name=$_POST['company_name'];
	$address=$_POST['address'];
	$contact=$_POST['contact'];
	$company_owner=$_POST['company_owner'];
	$address_2=$_POST['address_2'];
	$contact_2=$_POST['contact_2'];
	$country=$_POST['country'];
	$country_2=$_POST['country_2'];
	$gstin=$_POST['gstin'];
	$gstin_optional=$_POST['gstin_optional'];
	$state=$_POST['state'];
	$state_new=$_POST['state_new'];
	$statecode=$_POST['statecode'];
	$statecode_optional=$_POST['statecode_optional'];
	$model_no=$_POST['model_no'];
	$rate=$_POST['rate'];
	$extra_lift_true_false=$_POST['extra_lift_true_false'];
	$extra_lift_qnty=$_POST['extra_lift_qnty'];
	$extralift=$_POST['extralift'];
	$geared_trolley=$_POST['geared_trolley'];
	$geared_trolley_qty=$_POST['geared_trolley_qty'];
	$column_e=$_POST['column_e'];
	$traviling_moter_no_val=$_POST['traviling_moter_no_val'];
	$rate_qnty=$_POST['rate_qnty'];
	// $coumne_e_total_val=$_POST['coumne_e_total_val'];
	$basic_total_val=$_POST['basic_total_val'];
	$igst_18_val=$_POST['igst_18_val'];
	$cgst_9_val=$_POST['cgst_9_val'];
	$sgst_9_val=$_POST['sgst_9_val'];
	$total_amounts_val=$_POST['total_amounts_val'];
	$amount = $_POST['total_amounts_val'];
	$use_id =  json_decode($_COOKIE['Cookie'],true); 
      $user_id=$use_id['id'];
      $added_on = date('Y-m-d');
 // 
      $query="INSERT INTO `myc_electric_chain_details`(`company_name`,`company_owner`,`address`,`address_2`,`contact`,`contact_2`,`gstin`,`gstin_optional`,`country`,`country_2`,`state`,`state_new`,`statecode`,`statecode_optional`,`model_no`,`rate`,`rate_qnty`,`extra_lift_true_false`,`extra_lift_qnty`,`extralift`,`geared_trolley`,`geared_trolley_qty`,`column_e`,`traviling_moter_no_val`,`basic_total_val`,`igst_18_val`,`cgst_9_val`,`sgst_9_val`,`total_amounts_val`,`amount`,`user_id`,`added_on`) VALUES ('$company_name','$company_owner','$address','$address_2','$contact','$contact_2','$gstin','$gstin_optional','$country','$country_2','$state','$state_new ','$statecode','$statecode_optional','$model_no','$rate','$rate_qnty','$extra_lift_true_false','$extra_lift_qnty','$extralift','$geared_trolley','$geared_trolley_qty','$column_e','$traviling_moter_no_val','$basic_total_val','$igst_18_val','$cgst_9_val','$sgst_9_val','$total_amounts_val','$amount','$user_id','$added_on')";

		$sql=mysqli_query($conn,$query);
		$_SESSION['last_id']=$conn->insert_id; 
		// print_r($_SESSION['last_id']);die;


		if($sql){
			 header("Location:electric_chain_details_preview.php");
			$_SESSION['msg']="Successfully Added!!!";	
		}
		else{
			$_SESSION['msg']="Not added result !!!";
			header("Location:$_SERVER[HTTP_REFERER]");
		}
}

if(isset($_POST['pay_now_electric'])){
	$ids = $_POST['last_ids'];
	$amount = $_POST['amount'];
	$length = 15;
	 $order_no=substr(str_shuffle(str_repeat($x='ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz', ceil($length/strlen($x)) )),1,$length);
	 $query="UPDATE `myc_electric_chain_details` SET `amount`='$amount',`order_no`='$order_no' WHERE `id`='$ids'";
	$run=mysqli_query($conn,$query);
	// $_SESSION['last_updated_id']=$conn->insert_id; 
	// print_r($_SESSION['last_updated_id']);die;
	if($run){
		 $_SESSION['last_updated_id'] = $ids;
		 $_SESSION['tables'] = myc_electric_chain_details;
		 // print_r($_SESSION['last_updated_id']);die;
		 header('Location:payment.php');
		$_SESSION['msg']="Student Updated Successfully !!!";	
	}
	else{
		$_SESSION['msg']="Student Not Updated!!!";
		header("location:$_SERVER[HTTP_REFERER]");
	}	

}

if(isset($_POST['pay_now'])){
	// echo '<pre>';
	// print_r($_POST);die;
	$ids = $_POST['lastid'];
	$amount = $_POST['amount'];
	$length = 15;
	 $order_no=substr(str_shuffle(str_repeat($x='ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz', ceil($length/strlen($x)) )),1,$length);
	 $query="UPDATE `myc_chain_pully_details` SET `amount`='$amount',`order_no`='$order_no' WHERE `id`='$ids'";
	$run=mysqli_query($conn,$query);
	// $_SESSION['last_updated_id']=$conn->insert_id; 
	// print_r($_SESSION['last_updated_id']);die;
	if($run){
		 $_SESSION['last_updated_id'] = $ids;
		 $_SESSION['tables'] = myc_chain_pully_details;
		 // print_r($_SESSION['last_updated_id']);die;
		 header('Location:payment.php');
		$_SESSION['msg']="Student Updated Successfully !!!";	
	}
	else{
		$_SESSION['msg']="Student Not Updated!!!";
		header("location:$_SERVER[HTTP_REFERER]");
	}
}





?>

