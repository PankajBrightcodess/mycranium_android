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
   $id = $_SESSION['last_id'];
    // print_r($id);die;
    $query="SELECT * FROM `myc_shadule_online` where `id`='$id'";
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
        <div class="back-button"><a href="home.php">
            <svg class="bi bi-arrow-left" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"></path>
            </svg></a></div>
        <!-- Page Title-->
        <div class="page-heading">
          <h6 class="mb-0">SCHEDULE FOR ASSESSMENT/HEATH CHECK-UP OF YOUR CRANE</h6>
        </div>
        <!-- Navbar Toggler-->
        <div class="suha-navbar-toggler" data-bs-toggle="offcanvas" data-bs-target="#suhaOffcanvas" aria-controls="suhaOffcanvas"><span></span><span></span><span></span></div>
      </div>
    </div>
    <div class="page-content-wrapper">
      <div class="container marg">
        <!-- Profile Wrapper-->
        <div class="profile-wrapper-area">
         <!-- <form method="post" action="action.php">   -->
          <!-- User Information-->
          <div class="card user-info-card">
            <div class="card-body p-4 d-flex align-items-center">
             
              <div class="user-info">
                <h5 class="mb-0 text-center border-1">DETAILS TO BE FILLED BY CLIENT</h5>
              </div>
            </div>
          </div>
          
          <!-- User Meta Data-->
          <div class="card user-data-card">
            <div class="card-body">
              <table class="table table-bordered table-responsive" style="font-size: 10px; border: 1px; text-align:left;">
                <thead>
                  <tr>
                  <td><span>COMPANY NAME</span></td>
                  <td colspan="3"><input type="hidden" name="comp_name" class="form-control" placeholder="COMPANY NAME"><span><strong><?php echo $data['comp_name']?></strong></span></td>
                </tr>
                <tr>
                  <td><span>ADDRESS</span></td>
                  <td colspan="3"><span><strong><?php echo $data['address']?></strong></span></td>
                </tr>
                <tr>
                     <td><span>Country</span></td>
                    <td colspan="3"><span><strong><?php echo $data['country']?></strong></span></td>
                </tr>
                 <tr>
                     <td><span>State</span></td>
                    <td colspan="3">
                    <?php 
                    $state_id = $data['state'];
                    $query="SELECT `name` FROM `myc_area` where `id`='$state_id'";
                           $run=mysqli_query($conn,$query);
                           $state=mysqli_fetch_assoc($run);    

                    ?><span><strong><?php echo $state['name']?></strong></span></td>
                </tr>
                <tr>
                     <td><span>Dist</span></td>
                    <td colspan="3"><?php 
                    $dist_id = $data['dist'];
                    $query="SELECT `name` FROM `myc_area` where `id`='$dist_id'";
                           $run=mysqli_query($conn,$query);
                           $dist=mysqli_fetch_assoc($run);    

                    ?><span><strong><?php echo $dist['name']?></strong></span></td>
                </tr>
                </thead>
              </table>
              <!-- <a href="" class="btn btn-sm btn-success" style="text-align: center;">SUBMIT</a>
              <a href="" class="btn btn-sm btn-warning" style="text-align: center; float: right;">PROCEED FOR PAYMENT</a> -->
            </div>
          </div>
          <div class="card user-data-card">
            <div class="card-body">
              <table class="table table-bordered table-responsive" style="font-size: 10px; border: 1px; text-align:left;">
                <thead>
                  <tr>
                    <td width="2%">1</td>
                    <td width="10%">DETAIL OF ITEMS TO BE ASSESSED</td>
                    <td width="80%"><span><strong><?php echo $data['details_of_item']?></strong></span></td>
                    <td width="8%">SG- SINGLE GIRDER<br> DG- DOUBLE GIRDER <br>P/M- PILLAR MOUNTED<br> W/M- WALL MOUNTED<br> EWRH- ELECTRIC WIRE ROPE HOIST
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>QTY. (IN NOS.)</td>
                    <td width="20%"><span><strong><?php echo $data['qty']?></strong></span></td>
                    <td></td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>NO. OF DAYS REQUIRED FOR ASSESSMENT/HEALTH CHECK-UP</td>
                    <td width="20%"><span><strong><?php echo $data['days']?></strong></span></td>
                    <td></td>
                </tr>
                 <tr>
                    <td>4</td>
                    <td>Total ASSESSMENT CHARGES @ INR 7500.00 + GST @18% PER MAN PER DAY BASIS</td>
                    <td width="20%">INR <span><strong><?php echo $data['total_val']?></strong></span></td>
                    <td></td>
                </tr>
                 <tr>
                    <td>5</td>
                    <td>PAYMENT TERMS</td>
                    
                    <td colspan="2">100% ADVANCE THROUGH ONLINE MODE</td>
                </tr>
                 <tr>
                    <td>6</td>
                    <td>SERVICE DELIVERY</td>
                    <td colspan="2">WITHIN 72 HOURS FROM THE DATE OF PAYMENT RECEIPT</td>
                </tr>
                <tr>
                    <td colspan="4"></td>
                </tr>
               
                <tr>
                    <td>1</td>
                    <td colspan="3"><strong>PAY ONLINE:-</strong></td>
                </tr>
                 <tr>
                    <td></td>
                    <td colspan="3">SUBMISSION OF DECLARATION BY THE CLIENT</td>
                </tr>
                 <tr>
                    <td colspan="4"></td>
                </tr>
                <tr>
                    <td>2</td>
                    <td colspan="3"><strong>PAYMENT MODE:-</strong></td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="3">DEBIT CARD/CREDIT CARD</td>
                </tr>
                 <tr>
                    <td></td>
                    <td colspan="3">NET BANKING</td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="3">UPI</td>
                </tr>
                 <tr>
                    <td></td>
                    <td colspan="3">WALLETS</td>
                </tr>
                 <tr>
                    <td></td>
                    <td colspan="3">OTHERS</td>
                </tr>
                </thead>
              </table>
               <!-- <input type="submit" name="submit_shadule" class="btn btn-sm btn-success" value="SUBMIT"> -->
              <!-- <a href="" class="btn btn-sm btn-success" style="text-align: center;"></a> -->
              <a href="" class="btn btn-sm btn-warning" style="text-align: center; float: right;">PROCEED FOR PAYMENT</a>
            </div>
          </div>
          <!-- </form> -->
        </div>
      </div>
    </div>
    <div class="space"></div>
    <!-- Internet Connection Status-->
   <?php include 'footer.php';?>
     <?php include 'footer-link.php';?>
      <script type="text/javascript">
        function addrecord(){
           // debugger;
          var qty = $('#qty').val();
          var days = $('#days').val();
          var value = (parseFloat(7500)*parseInt(days));
          var result = value+(value*18/100);
          $('#total').html(result);
          $('#total_val').val(result);
        };

      $('.state').change(function(e){
         var id=$(this).val();
        $.ajax({
                type:'POST',
                url:'action.php',
               data:{id:id,city:'city'},
                success: function(data){
                      // console.log(data);
                    $('#city').html(data);
                    },

                    error: function(){ 
                       alert("error");
                    },
        });
    return false;
    });
     </script>