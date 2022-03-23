<?php 
  session_start();
  include_once('connection.php');
  $msg = "";
    if (isset($_SESSION['msg'])) {
        $msg = $_SESSION['msg'];
        unset($_SESSION['msg']);
    }
    if ($msg != "") {
        echo "<script> alert('$msg')</script>";
    }
    // print_r($_POST);die;
    $length = 4;
    $otp=substr(str_shuffle(str_repeat($x='123456789', ceil($length/strlen($x)) )),1,$length);
    $username = $_POST['username'];
    $company_name = $_POST['company_name'];
    $contact_no = $_POST['contact_no'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $password = $_POST['password'];
    // $message = $otp.' is your valid OTP.';
     $message= $otp. ' is your OTP to proceed on CRANIUM SERVICES. It is valid for 10 minutes. Do not share your OTP with anyone.';
    $base_url = "http://167.114.117.218/rest/services/sendSMS/sendGroupSms?AUTH_KEY=9eac167ec1efbe78138397fabba902e";
    $senderId = "CRANM";
    $routeId = "1";
    if(!empty($contact_no)){
      $curl = curl_init();
      curl_setopt_array($curl, array(
        CURLOPT_URL => $base_url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => "{\"smsContent\":\"$message\",\"routeId\":\"$routeId\",\"mobileNumbers\":\"$contact_no\",\"senderId\":\"$senderId\",\"signature\":\"signature\",\"smsContentType\":\"english\"}",
        CURLOPT_HTTPHEADER => array(
        "Cache-Control: no-cache",
        "Content-Type: application/json"
        ),
      ));
      $response = curl_exec($curl);
      // print_r($response);die;
      $err = curl_error($curl);
      curl_close($curl);
      if ($err) {
        // return false;
      } else {
        $response;

        // return true;
      }
     
    }
    // $length = 4;
    // $otp=substr(str_shuffle(str_repeat($x='123456789', ceil($length/strlen($x)) )),1,$length);
    
    ?>
<!DOCTYPE html>
<html lang="en">
  
<!-- Mirrored from designing-world.com/suha-v2.5.0/otp-confirm.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Sep 2021 12:08:48 GMT -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, viewport-fit=cover, shrink-to-fit=no">
    <meta name="description" content="Suha - Multipurpose Ecommerce Mobile HTML Template">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="theme-color" content="#100DD1">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <!-- The above tags *must* come first in the head, any other head content must come *after* these tags-->
    <!-- Title-->
    <title>My Cranium</title>
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&amp;display=swap" rel="stylesheet">
    <!-- Favicon-->
    <link rel="icon" href="img/icons/icon-72x72.png">
    <!-- Apple Touch Icon-->
    <link rel="apple-touch-icon" href="img/icons/icon-96x96.png">
    <link rel="apple-touch-icon" sizes="152x152" href="img/icons/icon-152x152.png">
    <link rel="apple-touch-icon" sizes="167x167" href="img/icons/icon-167x167.png">
    <link rel="apple-touch-icon" sizes="180x180" href="img/icons/icon-180x180.png">
    <!-- CSS Libraries-->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/lineicons.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <!-- Stylesheet-->
    <link rel="stylesheet" href="style.css">
    <!-- Web App Manifest-->
    <link rel="manifest" href="manifest.json">
  </head>
  <body>
    <!-- Preloader-->
    <div class="preloader" id="preloader">
      <div class="spinner-grow text-secondary" role="status">
        <div class="sr-only">Loading...</div>
      </div>
    </div>
    <!-- Login Wrapper Area-->
    <div class="login-wrapper d-flex align-items-center justify-content-center text-center">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-12 col-sm-9 col-md-7 col-lg-6 col-xl-5">
            <div class="text-start px-4">
              <h5 class="mb-1 text-white">Verify Phone Number</h5>
              <p class="mb-4 text-white">Enter the OTP code sent to<strong class="ms-1">+91-<?php echo $contact_no;?></strong></p>
            </div>
            <!-- OTP Verify Form-->
            <div class="otp-verify-form mt-5 px-4">
              <form action="action.php" method="POST">
                <div class=" mb-5">
                  <input  type="hidden" name="username" id="username" value="<?php echo $username;?>">
                  <input  type="hidden" name="company_name" id="company_name" value="<?php echo $company_name;?>">
                  <input  type="hidden" name="contact_no" id="contact_no" value="<?php echo $contact_no;?>">
                  <input  type="hidden" name="email" id="email" value="<?php echo $email;?>">
                  <input  type="hidden" name="address" id="address" value="<?php echo $address;?>">
                  <input  type="hidden" name="password" id="password" value="<?php echo $password;?>">
                  <input  type="hidden" name="otp" id="otp" value="<?php echo $otp;?>">
                  <input class="form-control" type="text" id="new_otp" name="new_otp"  value="" placeholder="Enter OTP" maxlength="4">
                </div>
                <button class="btn btn-warning btn-lg w-100 " name="signup" type="submit">Verify &amp; Proceed</button>  <!-- checkotp -->
              </form>
            </div>
            <!-- Term & Privacy Info-->
            <div class="login-meta-data px-4">
              <p class="mt-3 mb-0">Don't received the OTP?<span class="otp-sec ms-1 text-white" id="resendOTP"></span></p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- All JavaScript Files-->
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/waypoints.min.js"></script>
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.counterup.min.js"></script>
    <script src="js/jquery.countdown.min.js"></script>
    <script src="js/jquery.passwordstrength.js"></script>
    <script src="js/dark-mode-switch.js"></script>
    <script src="js/otp-timer.js"></script>
    <script src="js/active.js"></script>
    <script src="js/pwa.js"></script>
    <script type="text/javascript">
      $('.checkotp').click(function(e){
        var username = $('#username').val();
        var company_name = $('#company_name').val();
        var contact_no = $('#contact_no').val();
        var email = $('#email').val();
        var address = $('#address').val();
        var password = $('#password').val();
        var otp = $('#otp').val();
        var new_otp = $('#new_otp').val();
        if(otp===new_otp){
          $.ajax({
              type:'POST',
              url:'action.php',
             data:{username:username,company_name:company_name,contact_no:contact_no,email:email,address:address,password:password,signup:'signup'},
              success: function(data){
                    console.log(data);
                  $('#state_code_optional').val(data);

                  },
                  error: function(){ 
                     alert("Wrong OTP");
                  },
          });

        }
      
    });
    </script>

  </body>

<!-- Mirrored from designing-world.com/suha-v2.5.0/otp-confirm.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Sep 2021 12:08:49 GMT -->
</html>