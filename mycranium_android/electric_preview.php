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
   $id  =$_SESSION['electricwire_lasttext_id'];
    $query="SELECT * FROM `myc_electricwire` where `id`='$id'";
    $run=mysqli_query($conn,$query);
    $preview=mysqli_fetch_assoc($run);
    // echo '<pre>';
    // print_r($preview);die;
    
   $state = $preview['state'];
   $dist = $preview['dist'];
    $qry="SELECT `name` FROM `myc_area` where `id`='$state'";
    $runs=mysqli_query($conn,$qry);
    $state=mysqli_fetch_assoc($runs);

    $qry="SELECT `name` FROM `myc_area` where `id`='$dist'";
    $runs=mysqli_query($conn,$qry);
    $dist=mysqli_fetch_assoc($runs);

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
          <h6 class="mb-0">ELECTRIC WIRE ROPE HOIST</h6>
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
              <table class="table table-bordered " style="font-size: 10px;">
                <thead>
                  <tr>
                    <th>Company Name</th>
                    <th><?php echo $preview['comp_name'];?></th>
                  </tr>
                  <tr>
                    <th>Address</th>
                    <th><?php echo $preview['address'];?></th>
                  </tr>
                   <tr>
                    <th>Country</th>
                    <th><?php echo $preview['country'];?></th>
                  </tr>
                  <tr>
                    <th>State</th>
                    <th><?php echo $state['name'];?></th>
                  </tr>
                  <tr>
                    <th>City</th>
                    <th><?php echo $dist['name'];?></th>
                  </tr>
                </thead>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  
    <div class="page-content-wrapper">
      <div class="container">
        <!-- Profile Wrapper-->
        <div class="profile-wrapper-area">
          <!-- User Information-->
          <div class="card user-info-card">
            <div class="card-body p-4 d-flex align-items-center">
             
              <div class="user-info">
                <h5 class="mb-0 text-center">PREVIEW FORM</h5>
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
                <table class="table table-bordered " style="font-size: 10px;">
                  <thead>
                  	 <tr>
                      <th><span>CAPACITY (IN TON)</span></th>
                      <th><?php echo $preview['mainhost'];?></th>
                    </tr>
                    <tr>
                      <th><span>LOCATION</span></th>
                      <th><?php echo $preview['location'];?></th>
                    </tr>
                     <tr>
                      <th><span>CLASS OF DUTY</span></th>
                      <th><?php echo $preview['crane_type'];?></th>
                    </tr>
                    <tr>
                      <th><span>DESIGN STANDARD OF HOIST</span></th>
                      <th><?php echo $preview['design_standered'];?></th>
                    </tr>
                    <tr>
                      <th><span>APPLICATION</span></th>
                      <th><?php echo $preview['application'];?></th>
                    </tr>
                    <tr>
                      <th><span>TRAVEL LENGTH (IN METERS)</span></th>
                      <th><?php echo $preview['crane_type'];?></th>
                    </tr>
                     <tr>
                      <th><span>LIFTING HEIGHT (IN METERS)</span></th>
                      <th><?php echo $preview['lifting'];?></th>
                    </tr>
                     <tr>
                      <th><span>SPEED (OPTIONAL)- IN MTRS./MIN.</span></th>
                      <th><?php echo $preview['MH'];?></th>
                    </tr>
                    <tr>
                      <th><span>TRAVEL (CROSS TRAVEL)</span></th>
                      <th><?php echo $preview['travel'];?></th>
                    </tr>
                   
                      <th><span>INSTALLATION</span></th>
                      <th><?php echo $preview['installation'];?></th>
                    </tr>
                     <tr>
                      <th><span>OTHER REMARKS, IF ANY</span></th>
                      <th><?php echo $preview['other_remarks'];?></th>
                    </tr>
                   
                  </thead>
                  
                </table>
                <input type="hidden" name="lastid" value="<?php echo $preview['id'];?>">
                <input type="hidden" name="category" value="ELECTRIC WIRE ROPE HOIST">
                <input type="hidden" name="company_name" value="<?php echo $preview['comp_name'];?>">
                <input type="hidden" name="amount" value="350">
                 <button class="btn btn-success w-100" name="electric_payment" type="submit">PROCEED FOR PAYMENT</button>
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
     
