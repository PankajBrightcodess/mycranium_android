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
    $abcd =  json_decode($_COOKIE['Cookie'],true); 
    $id=$abcd['id'];
    // print_r($id);die;
    $query="SELECT * FROM `myc_sendquotation` WHERE `cust_id`='$id' ORDER BY 'id' DESC;";
    $run=mysqli_query($conn,$query);
    while ($data=mysqli_fetch_assoc($run)) {
      $quotation[]=$data;
    }
    // echo '<pre>';
    // print_r($quotation);die;
    
  ?>
<?php include 'header-link.php'; ?>
<?php include 'header.php'; ?>
    <!-- Header Area-->
    <div class="header-area" id="headerArea">
      <div class="container h-100 d-flex align-items-center justify-content-between">
        <!-- Back Button-->
        <div class="back-button"><a href="home.php">
            <svg class="bi bi-arrow-left" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"></path>
            </svg></a></div>
        <!-- Page Title-->
        <div class="page-heading">
          <h6 class="mb-0">DOWNLOAD YOUR QUOTATION</h6>
        </div>
        <!-- Navbar Toggler-->
        <div class="suha-navbar-toggler" data-bs-toggle="offcanvas" data-bs-target="#suhaOffcanvas" aria-controls="suhaOffcanvas"><span></span><span></span><span></span></div>
      </div>
    </div>
   
    <!-- Page Content Wrapper-->
    <div class="page-content-wrapper">
      <div class="container">
        <!-- Section Heading-->
        <div class="section-heading d-flex align-items-center pt-3 justify-content-between">
          <h6>Notification(s)</h6><a class="notification-clear-all text-secondary" href="#">Clear All</a>
        </div>
       
        <!-- Notifications Area-->
        <div class="notification-area pb-2">
          <div class="list-group" style="margin-bottom: 56px;">
            <?php 
            if(!empty($quotation)){
              foreach ($quotation as $key => $value) {
                ?>
                <a class="list-group-item readed d-flex align-items-center" href="quotation_details.php?id=<?php echo $value['id'];?>"><span class="noti-icon"><i class="lni lni-angle-double-right"></i></span>
                <div class="noti-info">
                   <h6 class="mb-0"><?php echo $value['quotation'];?>(<?php echo $value['refno'];?>)</h6><span>2 days ago</span>
                </div></a>
                <?php
              }}
            ?>
          </div>
        </div>
      </div>
    </div>
    <div class="internet-connection-status" id="internetStatus"></div>
     <?php include 'footer.php';?>
     <?php include 'footer-link.php';?>