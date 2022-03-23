<?php 
  session_start();
  include_once('connection.php');
  // $msg = "";
  //   if (isset($_SESSION['msg'])) {
  //       $msg = $_SESSION['msg'];
  //       unset($_SESSION['msg']);
  //   }
  //   if ($msg != "") {
  //       echo "<script> alert('$msg')</script>";
  //   }
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
                <h5 class="mb-0 text-center border-1">ELECTRIC CHAIN HOIST</h5>
              </div>
            </div>
          </div>
          
          <!-- User Meta Data-->
          <div class="card user-data-card table-responsive">
            <div class="card-body">
              <form action="action.php" method="POST">
              <table class="table table-bordered " style="font-size: 10px;">
                <thead>
                  <tr>
                     <td colspan="1"><span><strong style="color:red;">BILLING ADDRESS WITH COMPANY NAME</strong></span></td>
                     <td colspan="2"><input type="text" style="width: 150px;" class="form-control" placeholder="Company/Person Name" id="company_name" name="company_name"><br>
                      <input type="text" name="address" id="address" placeholder="Address" class="form-control"><br>
                      <input type="text" name="contact" id="contact_no" placeholder="Mobile No" class="form-control"></td>
                     <td colspan="1"><span><strong style="color:red;">DELIVERY/PROJECT ADDRESS WITH COMPANY/PERSON'S NAME</strong></span></td>
                      <td colspan="2" style="width: 50%;"><input type="text" id="comp_name_2" class="form-control" placeholder="Company/Person Name" style="width: 150px;" name="company_owner"><br>
                      <input type="text" name="address_2" id="address_2" placeholder="Address" class="form-control"><br>
                      <input type="text" name="contact_2" id="contact_2" placeholder="Mobile No" class="form-control"></td>
                  </tr>
                   <tr>
                     <td colspan="1"><span><strong style="color:red;">COUNTRY</strong></span></td>
                     <td colspan="2" ><select class="form-control country" id="country" name="country" required> 
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
                     <td colspan="2" ><select class="form-control country" id="country_2" name="country_2" required> 
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
                      <input type="text" class="form-control" id="gstin" name="gstin"></td>
                    <td colspan="1"><span><strong style="color:red;">GSTIN(Optional)</strong></span></td>
                     <td colspan="2" >
                      <input type="text" class="form-control" id="gstin_optional" name="gstin_optional"></td>
                  </tr>
                   <tr>
                     <td colspan="1"><span><strong style="color:red;">STATE</strong></span></td>
                     <td colspan="2" ><select class="form-control state" id="state" name="state" required> 
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
                     <td colspan="2" ><select class="form-control state_new" id="state_2" name="state_new" required> 
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
                      <input type="text" class="form-control "  id="state_code" name="statecode"></td>
                    <td colspan="1"><span><strong style="color:red;">STATE CODE(AS PER GST RULE)</strong></span></td>
                     <td colspan="2" >
                      <input type="text" class="form-control" id="state_code_optional" name="statecode_optional"></td>
                  </tr>
                  <tr style="background: yellow; color: red;">
                    <td colspan="1"><span><strong style="color:red;">DESCRIPTIONS</strong></span></td>
                     <td colspan="1" ><span><strong style="color:red;">ACTION</strong></span></td>
                     <td colspan="1" ><span><strong style="color:red;">QTY.</strong></span></td>
                    <td colspan="1"><span><strong style="color:red;">AMOUNT(INR)</strong></span></td>
                     <td colspan="2"><span><strong style="color:red;">REMARKS</strong></span></td>
                  </tr>
                   <tr>
                     <td colspan="1"><span><strong>ELECTRIC CHAIN HOIST</strong></span></td>
                     <td colspan="1" >                      
                      <span><strong>N/A</strong></span>
                      
                    </td>
                    <td colspan="1" >                      
                    <select class="form-control" name="rate_qnty" id="rate_qnty">
                      <option value="">--SELECT--</option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                      <option value="6">6</option>
                      <option value="7">7</option>
                      <option value="8">8</option>
                      <option value="9">9</option>
                      <option value="10">10</option>
                    </select>
                    </td>
                    <td colspan="1"><span><strong >INR <span id="rate">54,500.00</span></strong></span>
                      <input type="hidden" name="rate" id="rates"  value="54500.00">
                    </td>
                     <td colspan="2" ><span><strong id="model_no">CS-ECH-1T</strong></span>
                     <input type="hidden" name="model_no" value="CS-ECH-1T"></td>
                  </tr>
                   <tr>
                     <td colspan="1"><span><strong>EXTRA LIFT REQUIREMENT(IN MTRS)</strong></span></td>
                     <td colspan="1" >
                                          
                     <select class="form-control" name="extra_lift" id="extra_lift_true_false"><option>--SELECT--</option><option value="1">Yes</option><option value="0">No</option></select></td>
                     <td colspan="1" >                      
                    <select class="form-control" name="extra_lift_qnty" id="extra_lift_qnty">
                      <option value="">--SELECT--</option>
                      <option value="0">0</option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                      <option value="6">6</option>
                      <option value="7">7</option>
                      <option value="8">8</option>
                      <option value="9">9</option>
                      <option value="10">10</option>
                    </select>
                   
                    </td>
                    <td colspan="1"><strong><span>INR &nbsp;&nbsp;</span><span id="extra_lift_total">0.00</span></strong>
                       <input type="hidden" name="extralift" id="extralift" value="0"> 
              <!--         <input type="hidden" name="total_val" value=""> -->  <!-- id="total" -->
                    </td>
                     <td colspan="2" ></td>
                  </tr>
                   <tr>
                     <td colspan="1"><span><strong>GEARED TROLLEY</strong></span></td>
                     <td colspan="1" >                      
                      <span><select class="form-control" name="geared_trolley" id="geared_trolley_true_false" ><option>--SELECT--</option><option value="1">Yes</option><option value="0">No</option></select></td>
                      <td colspan="1" >                      
                          <select class="form-control" name="geared_trolley_qty" id="geared_trolley_qty">
                            <option value="">--SELECT--</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                          </select>
                    </td>
                       
                    <td colspan="1"><strong><span>INR &nbsp;&nbsp;</span><span id="geared_trolley_total">0.00</span></strong>
                       <input type="hidden" value="0" name="column_e" id="geared">
                      <!-- <input type="hidden" id="coumne_e_total_val" name="coumne_e_total_val"> -->
                    </td>
                     <td colspan="2" id="traviling_moter_no">CS-GT_ECH-1T
                      <input type="hidden" name="traviling_moter_no_val" value="CS-GT_ECH-1T">
                     </td>
                  </tr>
                   <tr>
                     <td colspan="3"><span><strong>BASIC TOTAL</strong></span></td>
                     
                    <td colspan="1"><strong><span>INR &nbsp;&nbsp;</span><span id="basic_total">0.00</span></strong><input type="hidden" value="54500" name="basic_total_val" id="basic_total_val" ></td>
                     <td colspan="2" ></td>
                  </tr>
                   <tr id="igst">
                     <td colspan="3"><span><strong>IGST @ 18%</strong></span></td>
                     <td colspan="1"><strong><span>INR &nbsp;&nbsp;</span><span id="igst_18">0.00</span></strong><input type="hidden" id="igst_18_val" name="igst_18_val"></td>
                     <td colspan="2" >Outside Jharkhand State</td>
                  </tr>
                  <tr id="cgst">
                     <td colspan="3"><span><strong>CGST @ 9%</strong></span></td>
                     <td colspan="1"><strong><span>INR &nbsp;&nbsp;</span><span id="cgst_9">0.00</span></strong><input type="hidden" name="cgst_9_val" id="cgst_9_val"> </td>
                     <td colspan="2" rowspan="2" >Within Jharkhand State</td>
                  </tr>
                   <tr id="sgst">
                     <td colspan="3"><span><strong>SGST @ 9%</strong></span></td>
                     <td colspan="1"><strong><span>INR &nbsp;&nbsp;</span><span id="sgst_9">0.00</span></strong><input type="hidden" name="sgst_9_val" id="sgst_9_val">  </td>
                     
                  </tr>
                  <tr>
                     <td colspan="3"><span><strong>TOTAL AMOUNT</strong></span></td>
                     <td colspan="1"><strong><span>INR &nbsp;&nbsp;</span><span id="total_amounts">0.00</span></strong><input type="hidden" id="total_amounts_val" name="total_amounts_val"> </td>
                     <td colspan="2"> </td> 
                  </tr>
                  <tr>

                     <td colspan="3"><span><strong>AMOUNT(IN WORD)</strong></span></td>
                     <td colspan="3"><span><!-- TWENTY EIGHT THOUSAND FIVE HUNDRED THIRTEEN POINT ONE TWO --></span> </td>
                  </tr>
                  <tr>
                     <td colspan="6">
                      <!-- <input type="button" class="btn btn-sm btn-success text-white form-control preview"  value="" data-toggle="modal" data-target="#exampleModalCenter" name=""> -->
                      <input type="submit" name="electric_chain_submit" class="btn btn-sm btn-success" value="SUBMIT & PREVIEW">
                   <!--    <button type="button" class="btn btn-success text-white form-control">Preview</button> -->
                    </td> 
                  </tr>
                </thead>
               
              </table>
              </form>
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
         // .........................main..............................
         $('.state').change(function(e){
            debugger;
         var id=$(this).val();
        $.ajax({
                type:'POST',
                url:'action.php',
               data:{id:id,state:'state'},
                success: function(data){
                      console.log(data);
                    $('#state_code').val(data);
                    },
                    error: function(){ 
                       alert("error");
                    },
        });
    return false;  
    });
       $('#rate_qnty').change(function(e){
          // debugger;
          var rateqnty = $(this).val();
          var c18 = 54500;
          var rate = parseFloat(c18)*parseFloat(rateqnty);
          $('#rate').html(rate);
          $('#rates').val(rate);
          var ratevalue = $('#rates').val();
          var extra = $('#extralift').val();
          var gear = $('#geared').val();
          var state_code = $('#state_code').val();
          var total_value = parseFloat(ratevalue)+parseFloat(extra)+parseFloat(gear);
          $('#basic_total').html(total_value);
          $('#basic_total_val').val(total_value);
          if(state_code==20){
             var basic_total = $('#basic_total_val').val();
             var basic_9s = (parseFloat(basic_total)*9/100);
             var basic_9=  parseFloat(basic_9s).toFixed(2);
             $('#cgst_9').html(basic_9);
             $('#cgst_9_val').val(basic_9);
             $('#sgst_9').html(basic_9);
             $('#sgst_9_val').val(basic_9);
             $('#cgst').show();
             $('#sgst').show();
             $('#igst').hide();
             var total_amounts = parseFloat(basic_total) +(parseFloat(basic_9s)*2);
             var total_amount=  parseFloat(total_amounts).toFixed(2);
             $('#total_amounts').html(total_amount);
             $('#total_amounts_val').val(total_amount);

          }else{
             var basic_total = $('#basic_total_val').val();
             var basic_18s = (parseFloat(basic_total)*18/100);
             var basic_18=  parseFloat(basic_18s).toFixed(2);
             $('#igst_18').html(basic_18);
             $('#igst_18_val').val(basic_18);
             $('#cgst').hide();
             $('#sgst').hide();
             $('#igst').show();
             var total_amounts = parseFloat(basic_total) +(parseFloat(basic_18s)*2);
             var total_amount=  parseFloat(total_amounts).toFixed(2);
             $('#total_amounts').html(total_amount);
             $('#total_amounts_val').val(total_amount);
          }
      });
        $('#extra_lift_qnty').change(function(e){
          
          var check_value = $('#extra_lift_true_false').val();
          if(check_value==1){
            var extraliftqnty = $(this).val();
            var e5 = 150;
            var extra = parseFloat(e5)*parseFloat(extraliftqnty);
            $('#extralift').val(extra);
            $('#extra_lift_total').html(extra);
            var ratevalue = $('#rates').val();
            var extra = $('#extralift').val();
            var gear = $('#geared').val();
            var state_code = $('#state_code').val();
            var total_value = parseFloat(ratevalue)+parseFloat(extra)+parseFloat(gear);
            $('#basic_total').html(total_value);
            $('#basic_total_val').val(total_value);
            if(state_code==20){
             var basic_total = $('#basic_total_val').val();
             var basic_9s = (parseFloat(basic_total)*9/100);
              var basic_9=  parseFloat(basic_9s).toFixed(2);
             $('#cgst_9').html(basic_9);
             $('#cgst_9_val').val(basic_9);
             $('#sgst_9').html(basic_9);
             $('#sgst_9_val').val(basic_9);
             $('#cgst').show();
             $('#sgst').show();
             $('#igst').hide();
             var total_amounts = parseFloat(basic_total) +(parseFloat(basic_9s)*2);
             var total_amount=  parseFloat(total_amounts).toFixed(2);
             $('#total_amounts').html(total_amount);
             $('#total_amounts_val').val(total_amount);
          }else{
             var basic_total = $('#basic_total_val').val();
             var basic_18s = (parseFloat(basic_total)*18/100);
             var basic_18=  parseFloat(basic_18s).toFixed(2);
             $('#igst_18').html(basic_18);
             $('#igst_18_val').val(basic_18);
             $('#cgst').hide();
             $('#sgst').hide();
             $('#igst').show();
             var total_amounts = parseFloat(basic_total) +(parseFloat(basic_18s)*2);
             var total_amount=  parseFloat(total_amounts).toFixed(2);
             $('#total_amounts').html(total_amount);
             $('#total_amounts_val').val(total_amount);
          }
          }
          
      });
      $('#extra_lift_true_false').change(function(e){
         
            var extralift_true_false = $(this).val();
            var e5 = 150;
            var extra = parseFloat(e5)*parseFloat(extralift_true_false);
            $('#extralift').val(extra);
            $('#extra_lift_total').html(extra);
            var ratevalue = $('#rates').val();
            var extra = $('#extralift').val();
            var gear = $('#geared').val();
            var state_code = $('#state_code').val();
            var total_value = parseFloat(ratevalue)+parseFloat(extra)+parseFloat(gear);
            $('#basic_total').html(total_value);
            $('#basic_total_val').val(total_value);
            if(state_code==20){
             var basic_total = $('#basic_total_val').val();
             var basic_9s = (parseFloat(basic_total)*9/100);
              var basic_9=  parseFloat(basic_9s).toFixed(2);
             $('#cgst_9').html(basic_9);
             $('#cgst_9_val').val(basic_9);
             $('#sgst_9').html(basic_9);
             $('#sgst_9_val').val(basic_9);
             $('#cgst').show();
             $('#sgst').show();
             $('#igst').hide();
             var total_amounts = parseFloat(basic_total) +(parseFloat(basic_9s)*2);
             var total_amount=  parseFloat(total_amounts).toFixed(2);
             $('#total_amounts').html(total_amount);
             $('#total_amounts_val').val(total_amount);
          }else{
             var basic_total = $('#basic_total_val').val();
             var basic_18s = (parseFloat(basic_total)*18/100);
             var basic_18=  parseFloat(basic_18s).toFixed(2);
             $('#igst_18').html(basic_18);
             $('#igst_18_val').val(basic_18);
             $('#cgst').hide();
             $('#sgst').hide();
             $('#igst').show();
             var total_amounts = parseFloat(basic_total) +(parseFloat(basic_18s)*2);
             var total_amount=  parseFloat(total_amounts).toFixed(2);
             $('#total_amounts').html(total_amount);
             $('#total_amounts_val').val(total_amount);
          }
     
          
      });
      $('#geared_trolley_qty').change(function(e){
        // debugger;
          var check_value1 = $('#geared_trolley_true_false').val();
          if(check_value1==1){
            var geared_trolley = $(this).val();
            var f5 = 33300;
            var geared = parseFloat(f5)*parseFloat(geared_trolley);
            $('#geared').val(geared);
            $('#geared_trolley_total').html(geared);
            var ratevalue = $('#rates').val();
            var extra = $('#extralift').val();
            var gear = $('#geared').val();
            var state_code = $('#state_code').val();
            var total_value = parseFloat(ratevalue)+parseFloat(extra)+parseFloat(gear);
            $('#basic_total').html(total_value);
            $('#basic_total_val').val(total_value);
            if(state_code==20){
             var basic_total = $('#basic_total_val').val();
             var basic_9s = (parseFloat(basic_total)*9/100);
              var basic_9=  parseFloat(basic_9s).toFixed(2);
             $('#cgst_9').html(basic_9);
             $('#cgst_9_val').val(basic_9);
             $('#sgst_9').html(basic_9);
             $('#sgst_9_val').val(basic_9);
             $('#cgst').show();
             $('#sgst').show();
             $('#igst').hide();
             var total_amounts = parseFloat(basic_total) +(parseFloat(basic_9s)*2);
             var total_amount=  parseFloat(total_amounts).toFixed(2);
             $('#total_amounts').html(total_amount);
             $('#total_amounts_val').val(total_amount);
          }else{
             var basic_total = $('#basic_total_val').val();
             var basic_18s = (parseFloat(basic_total)*18/100);
             var basic_18=  parseFloat(basic_18s).toFixed(2);
             $('#igst_18').html(basic_18);
             $('#igst_18_val').val(basic_18);
             $('#cgst').hide();
             $('#sgst').hide();
             $('#igst').show();
             var total_amounts = parseFloat(basic_total) +(parseFloat(basic_18s)*2);
             var total_amount=  parseFloat(total_amounts).toFixed(2);
             $('#total_amounts').html(total_amount);
             $('#total_amounts_val').val(total_amount);
          }
         }
      });
       $('#geared_trolley_true_false').change(function(e){

          var geared_trolley_true_false = $(this).val();
          var f5 = 33300;
          var geared = parseFloat(f5)*parseFloat(geared_trolley_true_false);
          $('#geared').val(geared);
          $('#geared_trolley_total').html(geared);
          var ratevalue = $('#rates').val();
          var extra = $('#extralift').val();
          var gear = $('#geared').val();
          var state_code = $('#state_code').val();
          var total_value = parseFloat(ratevalue)+parseFloat(extra)+parseFloat(gear);
          $('#basic_total').html(total_value);
          $('#basic_total_val').val(total_value);
          if(state_code==20){
             var basic_total = $('#basic_total_val').val();
             var basic_9s = (parseFloat(basic_total)*9/100);
              var basic_9=  parseFloat(basic_9s).toFixed(2);
             $('#cgst_9').html(basic_9);
             $('#cgst_9_val').val(basic_9);
             $('#sgst_9').html(basic_9);
             $('#sgst_9_val').val(basic_9);
             $('#cgst').show();
             $('#sgst').show();
             $('#igst').hide();
             var total_amounts = parseFloat(basic_total) +(parseFloat(basic_9s)*2);
             var total_amount=  parseFloat(total_amounts).toFixed(2);
             $('#total_amounts').html(total_amount);
             $('#total_amounts_val').val(total_amount);
          }else{
             var basic_total = $('#basic_total_val').val();
             var basic_18s = (parseFloat(basic_total)*18/100);
             var basic_18 =  parseFloat(basic_18s).toFixed(2);
             $('#igst_18').html(basic_18);
             $('#igst_18_val').val(basic_18);
             $('#cgst').hide();
             $('#sgst').hide();
             $('#igst').show();
             var total_amounts = parseFloat(basic_total) +(parseFloat(basic_18s)*2);
             var total_amount=  parseFloat(total_amounts).toFixed(2);
             $('#total_amounts').html(total_amount);
             $('#total_amounts_val').val(total_amount);
          }
      });
    $('.state_new').change(function(e){
      var id=$(this).val();
      $.ajax({
              type:'POST',
              url:'action.php',
             data:{id:id,state:'state'},
              success: function(data){
                    console.log(data);
                  $('#state_code_optional').val(data);

                  },
                  error: function(){ 
                     alert("error");
                  },
      });
    });
</script>