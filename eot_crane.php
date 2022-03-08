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
          <h6 class="mb-0">EOT CRANE & SEMI EOT CRANE</h6>
        </div>
        <!-- Navbar Toggler-->
        <div class="suha-navbar-toggler" data-bs-toggle="offcanvas" data-bs-target="#suhaOffcanvas" aria-controls="suhaOffcanvas"><span></span><span></span><span></span></div>
      </div>
    </div>
    <form action="action.php" method="POST" enctype="multipart/form-data">
     <div class="page-content-wrapper">
      <div class="container">

        <!-- Profile Wrapper-->
        <div class="profile-wrapper-area py-5" style="padding-bottom: 1rem!important">
          <!-- User Information-->
          <div class="card user-info-card">
            <div class="card-body p-4 d-flex align-items-center">
             
              <div class="user-info">
                <h5 class="mb-0 text-center">Company Details</h5>
              </div>
            </div>
          </div>
          <!-- User Meta Data-->
          <div class="card user-data-card">
            <div class="card-body">
              
                <div class="mb-3">
                       <div class="title "><i class="lni lni-map-marker"></i><span>Company Name</span></div>
                        <input type="text" name="comp_name" placeholder="Company Name" class="form-control">
                </div>
                <div class="mb-3">
                        <div class="title "><i class="lni lni-map-marker"></i><span>Address</span></div>
                        <textarea class="form-control" name="address" placeholder="Address" rows="3"></textarea>
                </div>
                <div class="mb-3">
                     <div class="title "><i class="lni lni-map-marker"></i><span>Country</span>
                     </div>
                    <select class="form-control country" name="country" required> 
                      <option value="">---SELECT---</option>
                      <option value="India">India</option>
                      <?php 
                            if(!empty($country)){
                              foreach ($country as $key => $value) {
                                ?><option value="<?php echo $value['country']?>"><?php echo $value['country']?> </option><?php
                              }
                            }
                      ?>
                    </select>
                </div>
                <div class="mb-3">
                  <div class="title "><i class="lni lni-map-marker"></i><span>State</span></div>
                  <select class="form-control state" name="state" required> 
                    <option value="">---SELECT---</option>
                    <?php 
                          if(!empty($state)){
                            foreach ($state as $key => $value) {
                              ?><option value="<?php echo $value['id']?>"><?php echo $value['name']?></option><?php
                            }
                          }
                    ?>
                  </select>
                </div> 
                <div class="mb-3">
                  <div class="title "><i class="lni lni-map-marker"></i><span>City</span></div>
                  <select class="form-control city" id="city" name="dist" required>
                  </select>
                </div> 
                <div class="mb-3">
                  <div class="title other"><i class="lni lni-map-marker"></i><span>City </span>
                      <input type="text" class="form-control " id="other" name="other_country_details" placeholder="To be filled manually">
                  </div>
                 </div>
                <!-- <button class="btn btn-success" name="eotcrane_upload" type="submit">Upload</button> -->
             
            </div>
          </div>
        </div>
      </div>
    </div>
  
     <div class="page-content-wrapper">
      <div class="container">
        <!-- Profile Wrapper-->
        <div class="profile-wrapper-area py-5" style="padding-bottom: 1rem!important">
          <!-- User Information-->
          <div class="card user-info-card">
            <div class="card-body p-4 d-flex align-items-center">
             
              <div class="user-info">
                <h5 class="mb-0 text-center">UPLOAD PDF</h5>
              </div>
            </div>
          </div>
          <!-- User Meta Data-->
          <div class="card user-data-card">
            <div class="card-body">
              <!-- <form action="action.php" method="POST" enctype="multipart/form-data"> -->
                <div class="mb-3">
                  <div class="title mb-2"><i class="lni lni-angellist"></i><span>TYPE OF CRANE</span> <span style="color: red;">*</span></div>
                  <select class="form-control" name="crane_type">
                    <option value="">---SELECT---</option>
                    <option value="single_girder_eot_crane">SINGLE GIRDER EOT CRANE(UPTO 15T)</option>
                    <option value="double_girder_eot_crane">DOUBLE GIRDER EOT CRANE(UPTO 110T)</option>
                    <option value="single_girder_semi_eot_crane">SINGLE GIRDER SEMI EOT CRANE(UPTO 15T)</option>
                    <option value="double_girder_semi_eot_crane">DOUBLE GIRDER SEMI EOT CRANE(UPTO 25T)</option>
                    <option value="single_girder_under_slung_crane">SINGLE GIRDER UNDER SLUNG CRANE(UPTO 15T)</option>
                    <!-- <option value="double_girder_under_slung_crane">DOUBLE GIRDER UNDER SLUNG CRANE</option> -->
                  </select>
                </div>
                <div class="mb-3">
                  <div class="title mb-2"><i class="lni lni-envelope"></i><span>UPLOAD TECHNICAL SPECIFICATIONS /REQUIREMENTS</span></div>
                  <input class="form-control mb-3" type="file" name="file1">
                  <input class="form-control mb-3" type="file" name="file2">
                  <input class="form-control mb-3" type="file" name="file3">
                  <input class="form-control mb-3" type="file" name="file4">
                  <input class="form-control mb-3" type="file" name="file5">
                </div>
                <div class="mb-4">
                  <textarea class="form-control" rows="2" placeholder="Remarks"></textarea>
                </div>
                <button class="btn btn-success" name="eotcrane_upload" type="submit">Upload</button>
           <!--    </form> -->
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
            <div class="col-12 text-center"><h2>OR</h2></div>
    </div>
    <div class="page-content-wrapper">
      <div class="container">
        <!-- Profile Wrapper-->
        <div class="profile-wrapper-area">
          <!-- User Information-->
          <div class="card user-info-card">
            <div class="card-body p-4 d-flex align-items-center">
             
              <div class="user-info">
                <h5 class="mb-0 text-center">FILL THE BELOW FORM</h5>
              </div>
            </div>
          </div>
          
          <!-- User Meta Data-->
          <div class="card user-data-card">
            <div class="card-body">
              <div class="mb-3">
                <span style="color: red;"><strong>*</strong></span>Marked columns are to be fill mandatory. <!--  Marked are mandatory to be filled. --><hr>
              </div>
              <!-- <form action="action.php" method="POST" enctype="multipart/form-data"> -->
             
                <div class="mb-3">
                  <div class="title mb-2"><i class="lni lni-money-location"></i><span>LOCATION</span> <span style="color: red;">*</span></div>
                  <select class="form-control" name="location">
                    <option value="">---SELECT---</option>
                    <option value="indoor">INDOOR</option>
                    <option value="outdoor">OUTDOOR</option>
                  </select>
                </div>
                 <div class="mb-3">
                  <div class="title mb-2"><i class="lni lni-angellist"></i><span>TYPE OF CRANE</span> <span style="color: red;">*</span></div>
                  <select class="form-control crane_type" name="crane_type">
                    <option value="">---SELECT---</option>
                    <option value="single_girder_eot_crane">SINGLE GIRDER EOT CRANE(UPTO 15T)</option>
                    <option value="double_girder_eot_crane">DOUBLE GIRDER EOT CRANE(UPTO 110T)</option>
                    <option value="single_girder_semi_eot_crane">SINGLE GIRDER SEMI EOT CRANE(UPTO 15T)</option>
                    <option value="double_girder_semi_eot_crane">DOUBLE GIRDER SEMI EOT CRANE(UPTO 25T)</option>
                    <option value="single_girder_under_slung_crane">SINGLE GIRDER UNDER SLUNG CRANE(UPTO 15T)</option>
                    <!-- <option value="double_girder_under_slung_crane">DOUBLE GIRDER UNDER SLUNG CRANE</option> -->
                  </select>
                </div>
                  <div class="mb-3">
                  <div class="title mb-2"><i class="lni lni-steam"></i><span>CAPACITY (IN TON)</span> <span style="color: red;">*</span></div>
                  <div class="title mb-2"><span>MH (MAIN HOIST)</span> <span style="color: red;">*</span></div>
                  <input type="text" name="mainhost" placeholder="" class="form-control mb-2">
                  <div class="title mb-2"><span>AH (AUX. HOIST)</span></div>
                  <input type="text" name="auxhoist" placeholder="Please write N/A, in case it is not applicable" class="form-control ahaux mb-2">
                </div>
                <div class="mb-3">
                  <div class="title mb-2"><i class="lni lni-envelope"></i><span>CLASS OF DUTY</span> <span style="color: red;">*</span></div>
                   <select class="form-control" name="class_duty">
                    <option value="">---SELECT---</option>
                    <option value="m1">M1 (CLASS-I)</option>
                    <option value="m2">M2 (CLASS-I)</option>
                    <option value="m3">M3 (CLASS-I)</option>
                    <option value="m4">M4 (CLASS-II)</option>
                    <option value="m5">M5 (CLASS-II)</option>
                    <option value="m6">M6 (CLASS-III)</option>
                    <option value="m7">M7 (CLASS-IV)</option>
                    <option value="m8">M8 (CLASS-IV)</option>
                  </select>
                </div>
                 <div class="mb-3">
                  <div class="title mb-2"><i class="lni lni-map-marker"></i><span>DESIGN STANDARD</span> <span style="color: red;">*</span></div>
                   <select class="form-control" name="design_standered">
                    <option value="">---SELECT---</option>
                    <option value="is">IS 3177</option>
                    <option value="fem">FEM</option>
                    <option value="din">DIN</option>
                  </select>
                </div>
                 <div class="mb-3">
                  <div class="title mb-2"><i class="lni lni-map-marker"></i><span>APPLICATION</span></div>
                   <input type="text" class="form-control" name="application" placeholder="">
                </div>
                <div class="mb-3">
                  <div class="title mb-2"><i class="lni lni-map-marker"></i><span>SPAN (IN METERS)</span> <span style="color: red;">*</span></div>
                  <input class="form-control" name="span"  type="text">  <!-- placeholder="Please Furnish in Meters" -->
                </div>
                 <div class="mb-3">
                  <div class="title mb-2"><i class="lni lni-map-marker"></i><span>LIFTING HEIGHT (IN METERS)</span><span style="color: red;">*</span></div>
                  <div class="title mb-2"><span>MH (MAIN HOIST)</span><span style="color: red;">*</span></div>
                  <input type="text" class="form-control mb-2" placeholder="" name="abv_floor_mh">
                  <div class="title mb-2"><span>AH (MAIN HOIST)</span></div>
                 <!--  <input type="text" class="form-control mb-2 abv_floor_ah" placeholder=""  name="abv_floor_ah"> -->
                    <input type="text" class="form-control mb-2 blw_floor_ah" placeholder="Please write N/A, in case it is not applicable" name="blw_floor_ah">
                </div>
                <div class="mb-3">
                  <div class="title mb-2"><i class="lni lni-map-marker"></i><span>TRAVEL LENGTH (IN METERS)</span></div>
                  <input class="form-control" type="text" name="travel_length">
                </div>
                 <div class="mb-3">
                  <div class="title mb-2"><i class="lni lni-map-marker"></i><span>COLUMN TO COLUMN DISTANCE (IN METERS)</span></div>
                  <input class="form-control" type="text" placeholder="To be filled in case Gantry Girder is also required" name="column_to_column">
                </div>
                <div class="mb-3">
                  <div class="title mb-2"><i class="lni lni-map-marker"></i><span>SPEED (OPTIONAL)- IN MTRS./MIN.</span></div>
                  
                  
                </div>
                <div class="mb-3">
                  <div class="title mb-2"><span>MH (MAIN HOIST)</span></div>
                  <input type="text" class="form-control mb-2" name="speed_mh" placeholder="Please Fill Manual In Case of Manual Operation" >
                  <div class="title mb-2"><span>AH (AUX. HOIST)</span></div>
                  <input type="text" class="form-control mb-2 speed_ah"  name="speed_ah" placeholder="Please Fill Manual In Case of Manual Operation" >
                  <div class="title mb-2"><span>CT (CROSS TRAVEL)</span></div>
                  <input type="text" class="form-control mb-2" name="speed_ct" placeholder="Please Fill Manual In Case of Manual Operation" >
                  <div class="title mb-2"><span>LT (LONG TRAVEL)</span></div>
                  <input type="text" class="form-control mb-2" name="speed_lt" placeholder="Please Fill Manual In Case of Manual Operation" >
                </div>
                <?php $abcd =  json_decode($_COOKIE['Cookie'],true); $id=$abcd['id'];?>
                <div class="mb-0"><input type="hidden" name="id" value="<?php echo $id;?>"></div>
                <div class="mb-3">
                  <div class="title mb-2"><i class="lni lni-map-marker"></i><span>MICRO SPEED (OPTIONAL)</span></div>
                  
                
                  <select class="form-control multipleselect vpd_ah" multiple="multiple"  name="vfd[]">
                    
                   <!--  <option value="mh">MH</option>
                    <option value="ah">AH</option>
                    <option value="ct">CT</option>
                    <option value="lt">LT</option> -->
                 </select> 
                </div>
                <div class="mb-3">
                  <div class="title mb-2"><i class="lni lni-map-marker"></i><span>SCOPE OF SUPPLY</span> <span style="color: red;">*</span></div>
                    <select class="form-control multipleselect" multiple="multiple" id="myselect" name="scope_supply[]">
                    
                    <option value="crane">CRANE</option>
                    <option value="shrouded">DSL</option>
                    <option value="sq">SQ. BAR/RAIL WITH FIXING ITEMS</option>
                    <option value="gg">GANTRY GIRDER</option>
                    <option value="recommended">RECOMMENDED SPARE PARTS</option>
                    <option value="mandatory">MANDATORY SPARE PARTS</option>
                  </select>
                </div>
                <div class="mb-3">
                  <div class="title mb-2"><i class="lni lni-map-marker"></i><span>INSTALLATION</span> <span style="color: red;">*</span></div>
                   <select class="form-control  install" name="installation">
                    <option value="">---SELECT---</option>
                    <option value="yes">YES</option>
                    <option value="no">NO</option>
                  </select>
                </div>
                 <div class="mb-3">
                  <div class="title mb-2"><i class="lni lni-map-marker"></i><span>OTHER REMARKS, IF ANY</span></div>
                   <input type="text" name="other_remarks" class="form-control">
                </div>
                <button class="btn btn-success w-100" name="eotcrane_text" type="submit">SUBMIT & REVIEW</button>
             
            </div>
          </div>
        </div>
      </div>
    </div>
     </form>
    <div class="space"></div>
    <!-- Internet Connection Status-->
   <?php include 'footer.php';?>
  <?php include 'footer-link.php';?>
  <script type="text/javascript">
    var select_ids = [];
    $(document).ready(function(e) {
    
      $('#myselect option').each(function(index, element) {
        select_ids.push($(this).val());
      })
    });
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
  $(".other").hide(true);
    $('.crane_type').change(function(e){
      // debugger;
         var id=$(this).val();
          if(id=='single_girder_eot_crane'){
             $(".ahaux").prop("readonly", true); 
             $(".abv_floor_ah").prop("readonly",true);
             $(".blw_floor_ah").prop("readonly",true);
             $(".speed_ah").prop("readonly", true);
             $(".vpd_ah").html('');
             $('.vpd_ah').append(`<option value="mh">MH</option>`);
             $('.vpd_ah').append(`<option value="ct">CT</option>`);
             $('.vpd_ah').append(`<option value="lt">LT</option>`);
          }
          else if(id=='single_girder_semi_eot_crane'){
             $(".ahaux").prop("readonly", true); 
             $(".abv_floor_ah").prop("readonly", true);
             $(".blw_floor_ah").prop("readonly", true);
             $(".speed_ah").prop("readonly", true);
             $(".vpd_ah").html('');
             $('.vpd_ah').append(`<option value="mh">MH</option>`);
             $('.vpd_ah').append(`<option value="ct">CT</option>`);
             $('.vpd_ah').append(`<option value="lt">LT</option>`);
             // $('.vpd_ah').append(`<option value="ah">AH</option>`); 
          }
          else if(id=='single_girder_under_slung_crane'){
            $(".ahaux").prop("readonly", true); 
             $(".abv_floor_ah").prop("readonly", true);
             $(".blw_floor_ah").prop("readonly", true);
             $(".speed_ah").prop("readonly", true);
             $(".vpd_ah").html('');
             $('.vpd_ah').append(`<option value="mh">MH</option>`);
             $('.vpd_ah').append(`<option value="ct">CT</option>`);
             $('.vpd_ah').append(`<option value="lt">LT</option>`);
             // $('.vpd_ah').append(`<option value="ah">AH</option>`); 

          }
          else{
             $(".ahaux").prop("readonly", false);
             $(".abv_floor_ah").prop("readonly", false);
             $(".blw_floor_ah").prop("readonly", false);
             $(".speed_ah").prop("readonly", false);
             $(".vpd_ah").html('');
             $('.vpd_ah').append(`<option value="mh">MH</option>`);
             $('.vpd_ah').append(`<option value="ct">CT</option>`);
             $('.vpd_ah').append(`<option value="lt">LT</option>`);
             $('.vpd_ah').append(`<option value="ah">AH</option>`);   //doubt
          }
    return false;
    });
    $('.country').change(function(e){
   
         var id=$(this).val();
            if(id!='India'){
               $('.state').prop('disabled', true);
               $('.city').prop('disabled', true);
               $(".other").show(true);
               $('.install').append(` <option value="lt" selected='selected'>Supervision</option>`); 
            }else{
               $('.state').prop('disabled', false);
               $('.city').prop('disabled', false);
               $(".other").hide(true);
            }
         return false;
    });


    function selectAll()
    {
      $('select#myselect').val(select_ids);
    }

  </script>
     