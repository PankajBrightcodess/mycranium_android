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
          <h6 class="mb-0"></h6>
        </div>
        <!-- Navbar Toggler-->
        <div class="suha-navbar-toggler" data-bs-toggle="offcanvas" data-bs-target="#suhaOffcanvas" aria-controls="suhaOffcanvas"><span></span><span></span><span></span></div>
      </div>
    </div>
    <div class="page-content-wrapper">
      <div class="container marg">
        <!-- Profile Wrapper-->
        <div class="profile-wrapper-area">
          <!-- User Information-->
          <div class="card user-info-card">
            <div class="card-body p-4 d-flex align-items-center">
             
              <div class="user-info">
                <h5 class="mb-0 text-center border-1">TRIPLE SPUR GEAR CHAIN PULLEY BLOCK, WITH ALLOY STEEL GRADE-80</h5>
              </div>
            </div>
          </div>
          
          <!-- User Meta Data-->
          <div class="card user-data-card table-responsive">
            <div class="card-body">
              <table class="table table-bordered " style="font-size: 10px;">
                <thead>
                  <tr>
                     <td colspan="1"><span><strong style="color:red;">BILLING ADDRESS WITH COMPANY/PERSON'S NAME</strong></span></td>
                     <td colspan="2"><input type="text" class="form-control" placeholder="Company/Person Name" name="company_name"><br>
                      <input type="text" name="address" placeholder="Address" class="form-control"><br>
                      <input type="text" name="contact" placeholder="Mobile No" class="form-control"></td>
                     <td colspan="1"><span><strong style="color:red;">DELIVERY/PROJECT ADDRESS WITH COMPANY/PERSON'S NAME</strong></span></td>
                      <td colspan="2" style="width: 50%;"><input type="text" class="form-control" placeholder="Company/Person Name" name="company_name"><br>
                      <input type="text" name="address" placeholder="Address" class="form-control"><br>
                      <input type="text" name="contact" placeholder="Mobile No" class="form-control"></td>
                  </tr>
                   <tr>
                     <td colspan="1"><span><strong style="color:red;">COUNTRY</strong></span></td>
                     <td colspan="2" ><select class="form-control country" name="country" required> 
                          <option value="">---SELECT---</option>
                          <option value="India">India</option>
                          <?php 
                                if(!empty($country)){
                                  foreach ($country as $key => $value) {
                                    ?><option value="<?php echo $value['country']?>"><?php echo $value['country']?> </option><?php
                                  }
                                }
                          ?>
                        </select></td>
                    <td colspan="1"><span><strong style="color:red;">COUNTRY</strong></span></td>
                     <td colspan="2" ><select class="form-control country" name="country" required> 
                          <option value="">---SELECT---</option>
                          <option value="India">India</option>
                          <?php 
                                if(!empty($country)){
                                  foreach ($country as $key => $value) {
                                    ?><option value="<?php echo $value['country']?>"><?php echo $value['country']?> </option><?php
                                  }
                                }
                          ?>
                        </select></td>
                  </tr>
                  <tr>
                     <td colspan="1"><span><strong style="color:red;">GSTIN</strong></span></td>
                     <td colspan="2" >                      
                      <input type="text" class="form-control" name="gstin_optional"></td>
                    <td colspan="1"><span><strong style="color:red;">GSTIN(Optional)</strong></span></td>
                     <td colspan="2" >
                      <input type="text" class="form-control" name="gstin_optional"></td>
                  </tr>
                   <tr>
                     <td colspan="1"><span><strong style="color:red;">STATE</strong></span></td>
                     <td colspan="2" ><select class="form-control state" name="state" required> 
                    <option value="">---SELECT---</option>
                    <?php 
                          if(!empty($state)){
                            foreach ($state as $key => $value) {
                              ?><option value="<?php echo $value['id']?>"><?php echo $value['name']?></option><?php
                            }
                          }
                    ?>
                  </select></td>
                    <td colspan="1"><span><strong style="color:red;">STATE</strong></span></td>
                     <td colspan="2" ><select class="form-control state" name="state" required> 
                    <option value="">---SELECT---</option>
                    <?php 
                          if(!empty($state)){
                            foreach ($state as $key => $value) {
                              ?><option value="<?php echo $value['id']?>"><?php echo $value['name']?></option><?php
                            }
                          }
                    ?>
                  </select></td>
                  </tr>
                   <tr>
                     <td colspan="1"><span><strong style="color:red;">STATE CODE(AS PER GST RULE)</strong></span></td>
                     <td colspan="2" >                      
                      <input type="text" class="form-control" name="statecode_optional"></td>
                    <td colspan="1"><span><strong style="color:red;">STATE CODE(AS PER GST RULE)</strong></span></td>
                     <td colspan="2" >
                      <input type="text" class="form-control" name="gstin_optional"></td>
                  </tr>
                  <tr style="background: yellow; color: red;">
                    <td colspan="1"><span><strong style="color:red;">DESCRIPTIONS</strong></span></td>
                     <td colspan="2" ><span><strong style="color:red;">ACTION</strong></span></td>
                    <td colspan="1"><span><strong style="color:red;">AMOUNT(INR)</strong></span></td>
                     <td colspan="2" >REMARKS FOR BRIGHT CODE<span><strong style="color:red;">AMOUNT(INR)</strong></span></td>
                  </tr>
                   <tr>
                     <td colspan="1"><span><strong>CHAIN PULLEY BLOCK</strong></span></td>
                     <td colspan="2" >                      
                      <span><strong>CS-CPB-1T</strong></span></td>
                    <td colspan="1"><span><strong>INR 3,759.00</strong></span></td>
                     <td colspan="2" ></td>
                  </tr>
                   <tr>
                     <td colspan="1"><span><strong>EXTRA LIFT REQUIREMENT(IN MTRS)</strong></span></td>
                     <td colspan="2" >                      
                      <span><strong>CS-CPB-1T</strong></span></td>
                    <td colspan="1"><span><strong>484.00</strong></span><span>*</span><select><option>1</option><option>2</option><option>3</option><option>4</option><option>5</option><option>5</option><option>6</option><option>7</option><option>8</option><option>9</option><option>10</option></select></td>
                     <td colspan="2" ></td>
                  </tr>
                   <tr>
                     <td colspan="1"><span><strong>GEARED TROLLEY</strong></span></td>
                     <td colspan="2" >                      
                      <span><select class="form-control" name="option"><option value="yes">Yes</option><option value="no">No</option></select></td>
                    <td colspan="1">4,800</td>
                     <td colspan="2" >CS-GT-0103</td>
                  </tr>
                   <tr>
                     <td colspan="3"><span><strong>BASIC TOTAL</strong></span></td>
                     
                    <td colspan="1">10,256.00</td>
                     <td colspan="2" ></td>
                  </tr>
                   <tr>
                     <td colspan="3"><span><strong>IGST @ 18%</strong></span></td>
                     <td colspan="1">INR 12,102.08 </td>
                     <td colspan="2" >WILL BE APPLICABLE IN CASE, THE BILLING ADDRESS IN OUTSIDE STATE</td>
                  </tr>
                  <tr>
                     <td colspan="3"><span><strong>CGST @ 9%</strong></span></td>
                     <td colspan="1">INR 11,179.04 </td>
                     <td colspan="2" rowspan="2" >WILL BE APPLICABLE IN CASE, THE BILLING ADDRESS IN OUTSIDE STATE</td>
                  </tr>
                   <tr>
                     <td colspan="3"><span><strong>SGST @ 9%</strong></span></td>
                     <td colspan="1">INR 5232.00 </td>
                     
                  </tr>
                  <tr>
                     <td colspan="3"><span><strong>TOTAL AMOUNT</strong></span></td>
                     <td colspan="1">INR 28,513.12 </td>
                     <td colspan="2">RANCHI </td> 
                  </tr>
                  <tr>
                     <td colspan="3"><span><strong>AMOUNT(IN WORD)</strong></span></td>
                     <td colspan="3"><span>TWENTY EIGHT THOUSAND FIVE HUNDRED THIRTEEN POINT ONE TWO</span> </td>
                  </tr>
                  <tr>
                     <td colspan="6"><input type="submit" class="btn btn-sm btn-success form-control" value="Payment Now" name=""></td> 
                  </tr>
                </thead>
               
              </table>
            </div>
          </div>
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
        };
     </script>