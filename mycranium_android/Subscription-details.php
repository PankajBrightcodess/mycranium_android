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
    $id = $_GET['id'];
    // print_r($id);die;
    $sub="SELECT * FROM `myc_subscription` WHERE `id`=$id";
    // print_r($sub);die;   
    $run=mysqli_query($conn,$sub);
    $data=mysqli_fetch_assoc($run);
    
    // echo '<pre>';
    // print_r($data);die;
    // echo PRE; 
    // print_r($subdetails);die;
   
?>
<?php include 'header-link.php'; ?>
<?php include 'header.php'; ?>
    <!-- Header Area-->
    <div class="header-area" id="headerArea">
      <div class="container h-100 d-flex align-items-center justify-content-between">
        <!-- Back Button-->
        <div class="back-button"><a href="subscription_report.php">
            <svg class="bi bi-arrow-left" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"></path>
            </svg></a></div>
        <!-- Page Title-->
        <div class="page-heading">
          <h6 class="mb-0">Subscription Details</h6>
        </div>
        <!-- Navbar Toggler-->
        <div class="suha-navbar-toggler" data-bs-toggle="offcanvas" data-bs-target="#suhaOffcanvas" aria-controls="suhaOffcanvas"><span></span><span></span><span></span></div>
      </div>
    </div>
    
    <!-- Page Content Wrapper-->
    <div class="page-content-wrapper" style="margin-top:70px;">
      <div class="container">
        <!-- Notifications Details Area-->
        <div class="notification-area pt-3 pb-2">
          <!-- Notification Details-->
          <div class="list-group-item d-flex py-3">
            <div class="noti-info" >
              <div class="row">
                <div class="col-12">
                  <p><strong>Subscription Details</strong></p><hr>
                </div>
                <?php 
                  if(!empty($data)){
                    ?> <div class="col-12">
                <p><strong><i> Your Subscription is valid from <?php echo date('d-m-Y',strtotime($data['start_date']));?> to <?php echo date('d-m-Y',strtotime($data['expire_date']));?>.</i></strong> </p>
              </div><?php
                  }


                ?>
               
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Internet Connection Status-->
    <div class="internet-connection-status" id="internetStatus"></div>
    <!-- Footer Nav-->
    <div class="footer-nav-area" id="footerNav">
      <div class="container h-100 px-0">
        <div class="suha-footer-nav h-100">
          <ul class="h-100 d-flex align-items-center justify-content-between ps-0">
            <li class="active"><a href="home.php"><i class="lni lni-home"></i>Home</a></li>
            <li><a href="message.php"><i class="lni lni-life-ring"></i>Support</a></li>
            <li><a href="cart.php"><i class="lni lni-shopping-basket"></i>Cart</a></li>
            <li><a href="pages.php"><i class="lni lni-heart"></i>Pages</a></li>
            <li><a href="settings.php"><i class="lni lni-cog"></i>Settings</a></li>
          </ul>
        </div>
      </div>
    </div>
    <!-- All JavaScript Files-->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/waypoints.min.js"></script>
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/jquery.counterup.min.js"></script>
    <script src="js/jquery.countdown.min.js"></script>
    <script src="js/jquery.passwordstrength.js"></script>
    <script src="js/dark-mode-switch.js"></script>
    <script src="js/no-internet.js"></script>
    <script src="js/active.js"></script>
    <script src="js/pwa.js"></script>
    <script type="text/javascript">
      $('#comment').click(function(e){
         swal("Good job!", " RECEIVE THE QUOTATION WITHIN 72 HOURS..!", "success");
       });
    </script>
  </body>

<!-- Mirrored from designing-world.com/suha-v2.5.0/notification-details.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Sep 2021 12:08:45 GMT -->
</html>