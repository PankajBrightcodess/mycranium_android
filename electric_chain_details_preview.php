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

   $elec_id = $_SESSION['last_id'];
     $qry="SELECT * FROM `myc_electric_chain_details` where `id`='$elec_id'";
    $runs=mysqli_query($conn,$qry);
    $data=mysqli_fetch_assoc($runs);
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
              <form action="action.php" method="POST"  >
              <table class="table table-bordered " style="font-size: 10px;">
                <thead>
                  <tr>
                     <td colspan="1"><span><strong style="color:red;">COMPANY NAME</strong></span></td>
                     <td colspan="2"><br>
                    <!--   <input type="text" name="address" id="address" placeholder="Address" class="form-control"> -->
                      <span><strong><?php echo $data['company_name']?></strong></span>
                      <br>
                    <span><strong><?php echo $data['contact']?></strong></span></td>
                     <td colspan="1"><span><strong style="color:red;">DELIVERY/PROJECT ADDRESS WITH COMPANY/PERSON'S NAME</strong></span></td>
                      <td colspan="2" style="width: 50%;"><span><strong><?php echo $data['company_name']?></strong></span><br>
                      <span><strong><?php echo $data['address_2']?></strong></span><br>
                      <span><strong><?php echo $data['contact_2']?></strong></span></td>
                  </tr>
                   <tr>
                     <td colspan="1"><span><strong style="color:red;">COUNTRY</strong></span></td>
                     <td colspan="2" ><span><strong><?php echo $data['country']?></strong></span></td>
                    <td colspan="1"><span><strong style="color:red;">COUNTRY</strong></span></td>
                     <td colspan="2" ><span><strong><?php echo $data['country_2']?></strong></span></td>
                  </tr>
                  <tr>
                     <td colspan="1"><span><strong style="color:red;">GSTIN</strong></span></td>
                     <td colspan="2" >                      
                      <span><strong><?php echo $data['gstin']?></strong></span></td>
                    <td colspan="1"><span><strong style="color:red;">GSTIN(Optional)</strong></span></td>
                     <td colspan="2" >
                      <span><strong><?php echo $data['gstin_optional']?></strong></span></td>
                  </tr>
                   <tr>
                     <td colspan="1"><span><strong style="color:red;">STATE</strong></span></td>
                     <td colspan="2" ><span><strong><?php echo $data['state']?></strong></span></td>
                    <td colspan="1"><span><strong style="color:red;">STATE</strong></span></td>
                     <td colspan="2" ><span><strong><?php echo $data['state_new']?></strong></span></td>
                  </tr>
                   <tr>
                     <td colspan="1"><span><strong style="color:red;">STATE CODE(AS PER GST RULE)</strong></span></td>
                     <td colspan="2" >                      
                      <span><strong><?php echo $data['statecode']?></strong></span></td>
                    <td colspan="1"><span><strong style="color:red;">STATE CODE(AS PER GST RULE)</strong></span></td>
                     <td colspan="2" >
                     <span><strong><?php echo $data['statecode_optional']?></strong></span></td>
                  </tr>
                  <tr style="background: yellow; color: red;">
                    <td colspan="1"><span><strong style="color:red;">DESCRIPTIONS</strong></span></td>
                     <td colspan="2" ><span><strong style="color:red;">QTY.</strong></span></td>
                    <td colspan="1"><span><strong style="color:red;">AMOUNT(INR)</strong></span></td>
                     <td colspan="2" ><span><strong style="color:red;">REMARKS</strong></span></td>
                  </tr>
                   <tr>
                     <td colspan="1"><span><strong>CHAIN PULLEY BLOCK</strong></span></td>
                     <td colspan="2" >                      
                      <span><strong><?php echo $data['rate_qnty']?></strong></span>
                    </td>
                    <td colspan="1"><span><strong id="rate">INR <?php echo $data['rate']?></strong></span>
                    </td>
                     <td colspan="2" ></td>
                  </tr>
                   <tr>
                     <td colspan="1"><span><strong>EXTRA LIFT REQUIREMENT(IN MTRS)</strong></span></td>
                     <td colspan="2" >
                     <!-- <input type="hidden" name="extralift" id="extralift" value="484">  -->  <strong><span id="total"><?php echo $data['extra_lift_qnty']?></span></strong>                   
                    </td>
                    <td colspan="1"><strong><span>INR &nbsp;&nbsp;</span><span id="total"><?php echo $data['extralift']?></span></strong>
                    </td>
                     <td colspan="2" ><strong id="model_no"><?php echo $data['model_no']?></strong></td>
                  </tr>
                   <tr>
                     <td colspan="1"><span><strong>GEARED TROLLEY</strong></span></td>
                     <td colspan="2" >                      
                      <span><strong><span id="total"><?php echo $data['geared_trolley_qty']?></span></strong></td>
                    <td colspan="1"><strong><span>INR &nbsp;&nbsp;</span><span id="coumne_e_total"><?php echo $data['column_e']?>.00</span></strong>
                      <!-- <input type="hidden" id="coumne_e_total_val" name="coumne_e_total_val"> -->
                    </td>
                     <td colspan="2" id="traviling_moter_no"><?php echo $data['traviling_moter_no_val']?>
                      <!-- <input type="hidden" name="traviling_moter_no_val" value="CS-GT-0103"> -->
                     </td>
                  </tr>
                   <tr>
                     <td colspan="3"><span><strong>BASIC TOTAL</strong></span></td>
                     
                    <td colspan="1"><strong><span>INR &nbsp;&nbsp;</span><span id="basic_total"><?php echo $data['basic_total_val']?></span></strong></td>
                     <td colspan="2" ></td>
                  </tr>
                   <tr id="igst">
                     <td colspan="3"><span><strong>IGST @ 18%</strong></span></td>
                     <td colspan="1"><strong><span>INR &nbsp;&nbsp;</span><span id="igst_18"><?php if(!empty($data['igst_18_val'])){ echo $data['igst_18_val'];}?></span></strong></td>
                     <td colspan="2" >WILL BE APPLICABLE IN CASE, THE BILLING ADDRESS IN OUTSIDE STATE</td>
                  </tr>
                  <tr id="cgst">
                     <td colspan="3"><span><strong>CGST @ 9%</strong></span></td>
                     <td colspan="1"><strong><span>INR &nbsp;&nbsp;</span><span id="cgst_9"><?php if(!empty($data['cgst_9_val'])){ echo $data['cgst_9_val'];}?></span></strong></td>
                     <td colspan="2" rowspan="2" >WILL BE APPLICABLE IN CASE, THE BILLING ADDRESS IN OUTSIDE STATE</td>
                  </tr>
                   <tr id="sgst">
                     <td colspan="3"><span><strong>SGST @ 9%</strong></span></td>
                     <td colspan="1"><strong><span>INR &nbsp;&nbsp;</span><span id="sgst_9"><?php if(!empty($data['sgst_9_val'])){ echo $data['sgst_9_val'];}?></span></strong></td>
                     
                  </tr>
                  <tr>
                     <td colspan="3"><span><strong>TOTAL AMOUNT</strong></span></td>
                     <td colspan="1"><strong><span>INR &nbsp;&nbsp;</span><span id="total_amounts"><?php echo $data['total_amounts_val']?></span></strong> </td>
                     <td colspan="2"> </td> 
                  </tr>
                  <tr>

                     <td colspan="3"><span><strong>AMOUNT(IN WORD)</strong></span></td>
                     <td colspan="3"><span><!-- TWENTY EIGHT THOUSAND FIVE HUNDRED THIRTEEN POINT ONE TWO --></span> </td>
                  </tr>
                  <tr>
                     <td colspan="6">
                      <!-- <input type="button" class="btn btn-sm btn-success text-white form-control preview"  value="" data-toggle="modal" data-target="#exampleModalCenter" name=""> -->
                      <input type="hidden" name="lastid" value="<?php echo $data['id']?>">
                      <input type="hidden" name="amount" value="<?php echo $data['total_amounts_val']?>">
                      <input type="submit" name="pay_now" class="btn btn-sm btn-success" value="Pay Now">
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

         $('.state').change(function(e){
   
         var id=$(this).val();
        $.ajax({
                type:'POST',
                url:'action.php',
               data:{id:id,state:'state'},
                success: function(data){
                      console.log(data);
                    $('#state_code').val(data);
                    var state_code = $('#state_code').val();
                    
                     if(state_code==20){
                         var cgst_9= $('#cgst_9').html();
                         var sgst_9= $('#sgst_9').html();
                         var total_amount = parseFloat(c18) +parseFloat(cgst_9)+parseFloat(sgst_9)+parseFloat(total);
                         $('#total_amounts').html(total_amount);
                         $('#total_amounts_val').html(total_amount);
                          $('#cgst').show();
                          $('#sgst').show();
                          $('#igst').hide();
                       }
                       else{
                         var basic_18= $('#igst_18').html();
                         var total_amount = parseFloat(c18) +parseFloat(basic_18)+parseFloat(total);
                         $('#total_amounts').html(total_amount);
                         $('#total_amounts_val').html(total_amount);
                         $('#cgst').hide();
                         $('#sgst').hide();
                         $('#igst').show();
                        
                       }

                    },
                    error: function(){ 
                       alert("error");
                    },
        });
    return false;  
    });
         $('#qnty').change(function(e){
          var qnty = $(this).val();
          var extralift = $('#extralift').val();
          var total = parseFloat(extralift)*parseInt(qnty);
          $('#total').html(total);
          $('#total_val').val(total);

           var c18 = 3795;
           var c19 = $('#total').html();
           var c20 = $('#coumne_e_total').html();
           var total_basic  = parseFloat(c18) + parseFloat(c19) + parseFloat(c20);
           $('#basic_total').html(total_basic);
           $('#basic_total_val').val(total_basic);
           // ''''''''basic total 18%''''
           var basic_18 = parseFloat(total_basic) + (parseFloat(total_basic)*18/100);
           $('#igst_18').html(basic_18);
           $('#igst_18_val').val(basic_18);
           // ''''''''basic total 9%''''
           var basic_9 = parseFloat(total_basic) + (parseFloat(total_basic)*9/100);
           $('#cgst_9').html(basic_9);
           $('#cgst_9_val').val(basic_9);
           ////total amount
           if(state_code==20){
               var cgst_9= $('#cgst_9').html();
              var sgst_9= $('#sgst_9').html();
              var total_amount = parseFloat(c18) +parseFloat(cgst_9)+parseFloat(sgst_9)+parseFloat(total);
               $('#total_amounts').html(total_amount);
               $('#total_amounts_val').val(total_amount);

               $('#cgst').show();
               $('#sgst').show();
               $('#igst').hide();
             }
           else{
              var basic_18= $('#igst_18').html();
               var total_amount = parseFloat(c18) +parseFloat(basic_18)+parseFloat(total);
               $('#total_amounts').html(total_amount);
               $('#total_amounts_val').val(total_amount);
               $('#cgst').hide();
               $('#sgst').hide();
               $('#igst').show();
             }
         });

         $('#true_false').change(function(e){
          var true_false = $(this).val();
          var column_e = $('#column_e').val();
          var total = parseFloat(column_e)*parseInt(true_false);
          $('#coumne_e_total').html(total);
          $('#coumne_e_total_val').val(total);
           var c18 = 3795;
           var c19 = $('#total').html();
           var c20 = $('#coumne_e_total').html();
           var total_basic  = parseFloat(c18) + parseFloat(c19) + parseFloat(c20);
           $('#basic_total').html(total_basic);
           $('#basic_total_val').val(total_basic);

           //''''''''sgst 9%'''''''
            var basic_09 = parseFloat(c20) + (parseFloat(c20)*9/100);
           $('#sgst_9').html(basic_09);
           $('#sgst_9_val').val(basic_09);

           // .....total amount.........
           if(state_code==20){
              var cgst_9= $('#cgst_9').html();
              var sgst_9= $('#sgst_9').html();
              var total_amount = parseFloat(c18) +parseFloat(cgst_9)+parseFloat(sgst_9)+parseFloat(total);
               $('#total_amounts').html(total_amount);
               $('#total_amounts_val').val(total_amount);
               $('#cgst').show();
               $('#sgst').show();
               $('#igst').hide();
             }
           else{
               var basic_18= $('#igst_18').html();
               var total_amount = parseFloat(c18) +parseFloat(basic_18)+parseFloat(total);
               $('#total_amounts').html(total_amount);
               $('#total_amounts_val').val(total_amount);
               $('#cgst').hide();
               $('#sgst').hide();
               $('#igst').show();
             }
         });
         var c18 = 3795;
         var c19 = $('#total').html();
         var c20 = $('#coumne_e_total').html();

         var total  = parseFloat(c18) + parseFloat(c19) + parseFloat(c20);
         $('#basic_total').html(total);
         $('#basic_total_val').val(total_basic);

      
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