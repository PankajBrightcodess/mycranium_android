<?php 
session_start();
include_once('connection.php');
$msg = "";
  if (isset($_SESSION['msg'])) {
    $msg=$_SESSION['msg'];
    unset($_SESSION['msg']);
  }
  // if(!empty($_SESSION['role'])){
  //    if($_SESSION['role']=='2'){
  //      header('location:home.php');
  //   }
  // }
  
  if ($msg != "") {
    echo "<script> alert('$msg') </script>";
  }
?>
<?php include 'header-link.php'; ?>
    <!-- Login Wrapper Area-->
    <section class="login-wrapper">
    <div class="d-flex align-items-center justify-content-center text-center">
      <!-- Background Shape-->
      <div class="background-shape"></div>
      <div class="container register">
        <div class="row justify-content-center">
          <div class="col-12 col-sm-9 col-md-7 col-lg-6 col-xl-5">
            <img class="big-logo" src="img/core-img/logo-white.png" alt="">
            <!-- <h2 class="text-white">MY CRANIUM</h2> -->
            <!-- Register Form-->
            <div class="register-form mt-5 px-4">
              <form action="otp-confirm.php" method="POST" >  <!-- id="formid" -->
                <div class="form-group text-start mb-4"><span>Username</span>
                  <label for="username"><i class="lni lni-user"></i></label>
                  <input class="form-control" id="username" name="username" type="text" placeholder="Designing World">
                </div>
                <div class="form-group text-start mb-4"><span>Name</span>
                  <label for="company"><i class="lni lni-apartment"></i></label>
                  <input class="form-control" id="company_name" name="company_name" type="text" placeholder="Name">
                </div>
              <!--   <div class="form-group text-start mb-4"><span>GST No.</span>
                  <label for="gst"><i class="lni lni-money-protection"></i></label>
                  <input class="form-control" id="gst_no" name="gst_no" type="text" placeholder="GST Number">
                </div> -->
                 <div class="form-group text-start mb-4"><span>Contact No.</span>
                  <label for="contact"><i class="lni lni-phone-set"></i></label>
                  <input class="form-control" id="contact_no" name="contact_no" type="text" placeholder="Contact Number">
                </div>
                <div class="form-group text-start mb-4"><span>Email</span>
                  <label for="email"><i class="lni lni-envelope"></i></label>
                  <input class="form-control" id="email" name="email" type="email" placeholder="help@example.com">
                </div>
                 <div class="form-group text-start mb-4"><span>Address</span>
                   <label for="address"><i class="lni lni-postcard"></i></label>
                   <input class="form-control" id="address" name="address" type="text" placeholder="Address">
                </div>
                <div class="form-group text-start mb-4"><span>Password</span>
                  <label for="password"><i class="lni lni-lock"></i></label>
                  <input class="input-psswd form-control" name="password" id="registerPassword" type="password" placeholder="Password">
                </div>
                <button class="btn btn-warning btn-lg w-100"  name="signup" type="submit">Sign Up</button>
              </form> <!-- id="signup" -->
            </div>
            <!-- Login Meta-->
            <div class="login-meta-data">
              <p class="mt-3 mb-0">Already have an account?<a class="ms-1" href="login.php">Sign In</a></p>
            </div>
          </div>
        </div>
      </div>
    </div>
    </section>
    <!-- All JavaScript Files-->
     <?php include 'footer-link.php';?>
     <script type="text/javascript">
       $( document ).ready(function() {
        $('#signup').click(function(e){
        var data = $('#formid').serializeArray();
        $.ajax({
                 type:'POST',
                 url:'action.php',
                 data:data,
                 success: function(result){
                   console.log(result);
                   location.reload();
                   // if(result!=''){
                   //  location = "login.php";
                   // }
                   // else{
                   //  location = "register.php";
                   // }
                    
                   // location.reload();
                },
                  error: function(){ 
                  alert("error");
                },
        });
   
    return false;
    });
      });
     </script>