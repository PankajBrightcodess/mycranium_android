<?php
if(isset($_POST['applyforjob'])){
  $name=$_POST['name'];
  $contact=$_POST['contact'];
  $email=$_POST['email'];
  $apply_for=$_POST['apply_for'];
  
  $resume=$_FILES['resume'];
  

  
  $resumefn=$resume['name'];   //fn indicate file name
  $resumepath=$resume['tmp_name'];
  $resumeerror =$resume['error'];
  if($resumeerror==0){
  $resumefile="cvfilesjob/".$resumefn;
  
  move_uploaded_file($resumepath,$resumefile);
  }
 

$namew        = "Cranium Services:";
$emailw       = "info@craniumservices.in";
$to          = "$emailw";
$from        = "$email";
$subject     = "$name appled for job through your website ";
// $mainMessage = "Hi, here's the file.";
$mainMessage = "Dear Sir/Mam,\n\nMyself $name, I am sending my resume to Cranium Services for job purpose. My resume is attached with this mail.\n\nI, hereby declare that the information contained in my resume is true and correct to the best of my knowledge and belief.\n\nThanks & Regards,\nName : $name\nEmail Id : $email\nMobile no : $contact\nApply For : $apply_for\n   ";

$fileatt     = "$resumefile";
// $fileatt     = "./test.pdf";
//file location
$fileatttype = "application/pdf";
$fileattname = "$resumefn"; //name that you want to use to send or you can use the same name
$headers = "From: $from";

// File
$file = fopen($fileatt, 'rb');
$data = fread($file, filesize($fileatt));
fclose($file);

// This attaches the file
$semi_rand     = md5(time());
$mime_boundary = "==Multipart_Boundary_x{$semi_rand}x";
$headers      .= "\nMIME-Version: 1.0\n" .
"Content-Type: multipart/mixed;\n" .
" boundary=\"{$mime_boundary}\"";
$message = "This is a multi-part message in MIME format.\n\n" .
"--{$mime_boundary}\n" .
"Content-Type: text/plain; charset=\"iso-8859-1\n" .
"Content-Transfer-Encoding: 7bit\n\n" .
$mainMessage  . "\n\n";

$data = chunk_split(base64_encode($data));
$message .= "--{$mime_boundary}\n" .
"Content-Type: {$fileatttype};\n" .
" name=\"{$fileattname}\"\n" .
"Content-Disposition: attachment;\n" .
" filename=\"{$fileattname}\"\n" .
"Content-Transfer-Encoding: base64\n\n" .
$data . "\n\n" .
"--{$mime_boundary}--\n";

// Send the email
if(@mail($to, $subject, $message, $headers)) {

echo ("<script LANGUAGE='JavaScript'>
  window.alert('Mail send Succesfully');
  window.location.href='career.php';
  </script>");
// header("location:career.php");

}
else {

echo ("<script LANGUAGE='JavaScript'>
  window.alert('Mail not send ');
  window.location.href='career.php';
  </script>");
}
}
?>
<?php
if(isset($_POST['applyforvender'])){
  $name=$_POST['name'];
  $address=$_POST['address'];
  $email=$_POST['email'];
  $contact=$_POST['contact'];
  $business_nature=$_POST['business_nature'];
  $discription=$_POST['discription'];
  $resume=$_FILES['resume'];
  

  
  $resumefn=$resume['name'];   //fn indicate file name
  $resumepath=$resume['tmp_name'];
  $resumeerror =$resume['error'];
  if($resumeerror==0){
  $resumefile="venderRegfiles/".$resumefn;
  
  move_uploaded_file($resumepath,$resumefile);
  }
 

$namew        = "Cranium Services:";
$emailw       = "info@craniumservices.in";
$to          = "$emailw";
$from        = "$email";
$subject     = "Vender Regestration Request by $name  ";
// $mainMessage = "Hi, here's the file.";
$mainMessage = "Dear Sir/Mam,\n\nMyself $name, I am sending my details to Cranium Services for Vender Registration . My Company details are attached with this mail.\n\nI, hereby declare that the information contained in my mail is true and correct to the best of my knowledge and belief.\n\nThanks & Regards,\nName : $name\nAddress : $address\nEmail Id : $email\nMobile no : $contact\nNature of business : $business_nature\nDetails of Products/Services :$discription\n   ";

$fileatt     = "$resumefile";
// $fileatt     = "./test.pdf";
//file location
$fileatttype = "application/pdf";
$fileattname = "$resumefn"; //name that you want to use to send or you can use the same name
$headers = "From: $from";

// File
$file = fopen($fileatt, 'rb');
$data = fread($file, filesize($fileatt));
fclose($file);

// This attaches the file
$semi_rand     = md5(time());
$mime_boundary = "==Multipart_Boundary_x{$semi_rand}x";
$headers      .= "\nMIME-Version: 1.0\n" .
"Content-Type: multipart/mixed;\n" .
" boundary=\"{$mime_boundary}\"";
$message = "This is a multi-part message in MIME format.\n\n" .
"--{$mime_boundary}\n" .
"Content-Type: text/plain; charset=\"iso-8859-1\n" .
"Content-Transfer-Encoding: 7bit\n\n" .
$mainMessage  . "\n\n";

$data = chunk_split(base64_encode($data));
$message .= "--{$mime_boundary}\n" .
"Content-Type: {$fileatttype};\n" .
" name=\"{$fileattname}\"\n" .
"Content-Disposition: attachment;\n" .
" filename=\"{$fileattname}\"\n" .
"Content-Transfer-Encoding: base64\n\n" .
$data . "\n\n" .
"--{$mime_boundary}--\n";

// Send the email
if(@mail($to, $subject, $message, $headers)) {

echo ("<script LANGUAGE='JavaScript'>
  window.alert('Mail send Succesfully');
  window.location.href='vendor.php';
  </script>");
// header("location:career.php");

}
else {

echo ("<script LANGUAGE='JavaScript'>
  window.alert('Mail not send ');
  window.location.href='vendor.php';
  </script>");
}
}
?>



<?php
if(isset($_POST['contactus'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $contact=$_POST['contact'];
    $description=$_POST['description'];
    
    // $email = "Enquiry";
    $to = "info@craniumservices.in"; 
        $subject = "Enquary from your website : $name";
        $message = "\nName : $name <br>\n\nEmail: $email<br>\n\nContact no: $contact<br>\n\nCustomer Enquiry/Message : $description\n ";
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= 'From:' .$email ."\r\n";
        if(@mail($to, $subject, $message, $headers)){
            echo ("<script LANGUAGE='JavaScript'>
            window.alert('Message Sent Succesfully');
            window.location.href='index.php';
            </script>");
        }
        else{
            echo ("<script LANGUAGE='JavaScript'>
    window.alert('Message not sent ');
    window.location.href='index.php';
    </script>");
       }
}
?>
<?php
if(isset($_POST['send_request'])){
  $org_name=$_POST['org_name'];
  $name=$_POST['name'];
    $address=$_POST['address'];
    $contact=$_POST['contact'];
    $email=$_POST['email'];
    $requirement=$_POST['requirement'];
    
    // $email = "Enquiry";
    $to = "info@craniumservices.in"; 
        $subject = "Request for Online Quotation : $name";
        $message = "\nOrganisation Name : $org_name <br>\n\nName: $name<br>\n\nAddress: $address<br>\n\nContact no: $contact<br>\n\nEmail: $email<br>\n\nDescription of requirement : $requirement\n ";
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= 'From:' .$email ."\r\n";
        if(@mail($to, $subject, $message, $headers)){
            echo ("<script LANGUAGE='JavaScript'>
            window.alert('Message Sent Succesfully');
            window.location.href='contact-us.php';
            </script>");
        }
        else{
            echo ("<script LANGUAGE='JavaScript'>
    window.alert('Message not sent ');
    window.location.href='contact-us.php';
    </script>");
       }
}
?>
