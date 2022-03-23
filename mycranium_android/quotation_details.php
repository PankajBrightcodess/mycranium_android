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
    // $abcd =  json_decode($_COOKIE['Cookie'],true); 
    $id=$_GET['id'];
    $query="SELECT * FROM `myc_sendquotation` WHERE `id`='$id' ORDER BY 'id' DESC;";
    $run=mysqli_query($conn,$query);
    $data=mysqli_fetch_assoc($run);
    
    // echo '<pre>';
    // print_r($data);die;
    
  ?>
<?php include 'header-link.php'; ?>
<?php include 'header.php'; ?>
    <!-- Header Area-->
    <div class="header-area" id="headerArea">
      <div class="container h-100 d-flex align-items-center justify-content-between">
        <!-- Back Button-->
        <div class="back-button"><a href="download_quotation.php">
            <svg class="bi bi-arrow-left" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"></path>
            </svg></a></div>
        <!-- Page Title-->
        <div class="page-heading">
          <h6 class="mb-0">Quotation Details</h6>
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
                <div class="col-12 mb-3">
                  <a href="<?php echo 'https://demo.softwarebss.com/myc/'.$data['image']?>" download="true" class="btn btn-sm btn-info">Download</a>  <!-- img/pdf/MY_CRANIUM.pdf -->
                </div>
                <form method="POST" action="sendmail.php">
                <div class="col-12 col-md-12 mb-3">
                  <label>CLIENT'S COMMENTS</label>
                  <select class="form-control multipleselect" multiple="multiple" name="client_comment[]">
                    <option value="">---SELECT ALL---</option>
                    <option value="TECHNICAL">TECHNICAL</option>
                    <option value="COMMERCIAL">COMMERCIAL</option>
                  </select>
                </div>
                <div class="col-12 col-md-12 mb-2">
                  <textarea class="form-control" name="comment"> </textarea>
                </div>
                <div class="col-12 col-md-12 mb-3">
                  <input type="submit" name="quotationDetails" id="comment" class="btn btn-sm btn-success" value="SUBMIT">
                  <!-- <a href="" class="btn btn-sm btn-success" name="quotation_details" id="comment">Submit</a> -->
                </div>
              </form>
              </div>
            </div>
          </div>
        </div>
        <div class="col-12">
                  <h2 class="text-center">OR</h2>
                </div>
          <div class="notification-area pt-3 pb-0">
          <!-- Notification Details-->
          <div class="list-group-item ">
            <!-- <div class="noti-info" > -->
              <div class="row">
                <div class="col-12 col-md-12 mb-3">
                  <a href="" class="btn btn-lg btn-warning form-control">Place Order</a>
                </div>
              </div>
            <!-- </div> -->
          </div>
        </div>
      </div>
    </div>
    <!-- Internet Connection Status-->
    <div class="internet-connection-status" id="internetStatus"></div>
    <!-- Footer Nav-->
     <?php include 'footer.php';?>

       <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>

<script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="js/waypoints.min.js"></script>
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.counterup.min.js"></script>
    <script src="js/jquery.countdown.min.js"></script>
    <script src="js/jquery.passwordstrength.js"></script>
    <script src="js/dark-mode-switch.js"></script>
    <script src="js/active.js"></script>
    <script src="js/pwa.js"></script>
    <script src="js/switchery.js"></script>
    <script type="text/javascript">
       $(document).ready(function() {
        $('.multipleselect').select2();
       });
     </script>
     <script type="text/javascript">
      $('#comment').click(function(e){
         swal("Good job!", " RECEIVE THE QUOTATION WITHIN 72 HOURS..!", "success");
       });
    </script>
  </body>

<!-- Mirrored from designing-world.com/suha-v2.5.0/intro.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Sep 2021 12:08:13 GMT -->
</html>
