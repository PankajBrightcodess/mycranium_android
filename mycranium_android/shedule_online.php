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
    $query="SELECT * FROM `myc_country` where `status`='1'";
    $run=mysqli_query($conn,$query);
    while ($data=mysqli_fetch_assoc($run)) {
      $country[]=$data;
    } 
    $qry="SELECT * FROM `myc_area` where `type`='state'";
    $runs=mysqli_query($conn,$qry);
    while ($data=mysqli_fetch_assoc($runs)) {
       $state[]=$data;
    }
    // echo '<pre>';
    // print_r($state);die;
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
         <form method="post" action="action.php">  
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
                  <td colspan="3"><input type="text" name="comp_name" class="form-control" placeholder="COMPANY NAME"></td>
                </tr>
                <tr>
                  <td><span>ADDRESS</span></td>
                  <td colspan="3"><textarea class="form-control" name="address" rows="2" placeholder="ADDRESS"></textarea></td>
                </tr>
                <tr>
                     <td><span>Country</span></td>
                    <td colspan="3"><select class="form-control" name="country"><option value="">--SELECT--</option><option value="india">India</option></select></td>
                </tr>
                 <tr>
                     <td><span>State</span></td>
                    <td colspan="3"><select class="form-control state" name="state" required> 
                    <option value="">---SELECT---</option>
                    <?php 
                          if(!empty($state)){
                            foreach ($state as $key => $value) {
                                if($value['name']=='Delhi'||$value['name']=='Jharkhand'||$value['name']=='Haryana'||$value['name']=='Bihar'||$value['name']=='Uttar Pradesh'||$value['name']=='West Bengal'||$value['name']=='Odisha'||$value['name']=='Chhattisgarh'){
                                     ?><option value="<?php echo $value['id']?>"><?php echo $value['name']?></option><?php

                                }


                             
                            }
                          }
                    ?>
                  </select></td>
                </tr>
                <tr>
                     <td><span>Dist</span></td>
                    <td colspan="3"><select class="form-control city" id="city" name="dist" required>
                  </select></td>
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
                    <td width="80%"><select class="form-control" name="details_of_item">
                        <option >SELECT</option>
                        <option>SG EOT CRANE</option>
                        <option>SG UNDER SLUNG CRANE</option>
                        <option>SG SEMI EOT CRANE</option>
                        <option>DG EOT CRANE</option>
                        <option>DG UNDER SLUNG CRANE</option>
                        <option>DG SEMI EOT CRANE</option>
                        <option>SG GANTRY CRANE</option>
                        <option>SG SEMI GANTRY CRANE</option>
                        <option>DG GANTRY CRANE</option>
                        <option>DG SEMI GANTRY CRANE</option>
                        <option>P/M JIB CRANE</option>
                        <option>W/M JIB CRANE</option>
                        <option>EWRH</option>
                    </select></td>
                    <td width="8%">SG- SINGLE GIRDER<br> DG- DOUBLE GIRDER <br>P/M- PILLAR MOUNTED<br> W/M- WALL MOUNTED<br> EWRH- ELECTRIC WIRE ROPE HOIST
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>QTY. (IN NOS.)</td>
                    <td width="20%"><input type="text" class="form-control" onkeyup="addrecord()"  name="qty" id="qty"></td>
                    <td></td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>NO. OF DAYS REQUIRED FOR ASSESSMENT/HEALTH CHECK-UP</td>
                    <td width="20%"><input type="text" class="form-control" onkeyup="addrecord()"  name="days" id="days"></td>
                    <td></td>
                </tr>
                 <tr>
                    <td>4</td>
                    <td>Total ASSESSMENT CHARGES @ INR 7500.00 + GST @18% PER MAN PER DAY BASIS</td>
                    <td width="20%">INR <span id="total">0.00</span><input type="hidden" id="total_val" name="total_val"></td>
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
              <!--   <tr>
                    <td colspan="4"></td>
                </tr> -->
               
              <!--   <tr>
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
                </tr> -->
                </thead>
              </table>
               <input type="submit" name="submit_shadule" class="btn btn-sm btn-success" value="SUBMIT & REVIEW">
              <!-- <a href="" class="btn btn-sm btn-success" style="text-align: center;"></a> -->
              <!-- <a href="" class="btn btn-sm btn-warning" style="text-align: center; float: right;">PROCEED FOR PAYMENT</a> -->
            </div>
          </div>
          </form>
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