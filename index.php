<?php
if(!empty($_GET['check'])){
  $CHECK = $_GET['check'];
} 
?>
<?php include 'header-link.php'; ?>
<section class="intro-wrapper">
    <div class=" d-flex align-items-center justify-content-center text-center">
      <!-- Background Shape-->
      <div class="background-shape"></div>
      <div class="container">
        <img class="big-logo" src="img/core-img/logo-white.png" alt="">
        <!-- <h2 class="text-white">MY CRANIUM</h2> -->
      </div>
    </div>
    <?php
        if(!empty($CHECK)){
          ?><div class="get-started-btn"><a class="btn btn-warning btn-lg w-100" href="login.php?check=<?php echo $CHECK;?>">Get Started</a></div><?php
        }else{
          ?><div class="get-started-btn"><a class="btn btn-warning btn-lg w-100" href="login.php">Get Started</a></div><?php
        }
    ?>
    
</section>
    <!-- All JavaScript Files-->
<?php include 'footer-link.php';?>
    