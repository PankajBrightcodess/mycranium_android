<?php include 'header-link.php'; ?>
 <?php include 'header.php'; ?>  
<?php 
session_start();
include_once('connection.php');
 
// print_r($_COOKIE);
//     echo '<pre>'; 
    // print_r($_COOKIE['Cookie']);
    $abcd =  json_decode($_COOKIE['Cookie'],true); 
    $id=$abcd['id'];
    $query="SELECT * FROM `myc_customer` WHERE `id`=$id";
    $run=mysqli_query($conn,$query);
    $data=mysqli_fetch_assoc($run);
    
    // print_r($data);
    
?>
    <!-- Header Area-->
    <div class="header-area" id="headerArea">
      <div class="container h-100 d-flex align-items-center justify-content-between">
        <!-- Logo Wrapper-->
        <div class="logo-wrapper"><a href="home.php"><img src="img/core-img/logo-white.png" style="height: 30px; width:30px;" alt=""></a></div>
        <!-- Search Form-->
        <div class="top-search-form">
          <form action="#" method="">
            <input class="form-control" type="search" placeholder="Enter your keyword">
            <button type="submit"><i class="fa fa-search"></i></button>
          </form>
        </div>
        <!-- Navbar Toggler-->
        <div class="suha-navbar-toggler" data-bs-toggle="offcanvas" data-bs-target="#suhaOffcanvas" aria-controls="suhaOffcanvas"><span></span><span></span><span></span></div>
      </div>
    </div>
    <div class="page-content-wrapper">
      <div class="container">
        <!-- Profile Wrapper-->
        <div class="profile-wrapper-area py-3">
          <!-- User Information-->
          <div class="card user-info-card">
            <div class="card-body p-4 d-flex align-items-center">
              <div class="user-profile me-3"><img src="img/bg-img/8.jpg" alt=""></div>
              <div class="user-info">
                <p class="mb-0 text-white"><?php echo $data['email_id'];?></p>
                <h5 class="mb-0"><?php echo $data['name'];?></h5>
              </div>
            </div>
          </div>
          <!-- User Meta Data-->
          <div class="card user-data-card">
            <div class="card-body">
              <div class="single-profile-data d-flex align-items-center justify-content-between">
                <div class="title d-flex align-items-center"><i class="lni lni-user"></i><span>Full Name</span></div>
                <div class="data-content"><?php echo $data['name'];?></div>
              </div>
              <div class="single-profile-data d-flex align-items-center justify-content-between">
                <div class="title d-flex align-items-center"><i class="lni lni-user"></i><span>Company Name</span></div>
                <div class="data-content"><?php echo $data['comp_name'];?></div>
              </div>
              <div class="single-profile-data d-flex align-items-center justify-content-between">
                <div class="title d-flex align-items-center"><i class="lni lni-phone"></i><span>Phone</span></div>
                <div class="data-content"><?php echo $data['contact_no'];?></div>
              </div>
              <div class="single-profile-data d-flex align-items-center justify-content-between">
                <div class="title d-flex align-items-center"><i class="lni lni-envelope"></i><span>Email Address</span></div>
                <div class="data-content"><?php echo $data['email_id'];?>                              </div>
              </div>
              <div class="single-profile-data d-flex align-items-center justify-content-between">
                <div class="title d-flex align-items-center"><i class="lni lni-map-marker"></i><span>GST No.</span></div>
                <div class="data-content"><?php echo $data['gst_no'];?></div>
              </div>
              <div class="single-profile-data d-flex align-items-center justify-content-between">
                <div class="title d-flex align-items-center"><i class="lni lni-phone"></i><span>Address</span></div>
                <div class="data-content"><?php echo $data['address'];?></div>
              </div>
              <div class="single-profile-data d-flex align-items-center justify-content-between">
                <div class="title d-flex align-items-center"><i class="lni lni-envelope"></i><span>Password</span></div>
                <div class="data-content"><?php echo $data['password'];?>                              </div>
              </div>
              <!-- <div class="single-profile-data d-flex align-items-center justify-content-between">
                <div class="title d-flex align-items-center"><i class="lni lni-star"></i><span>My Order</span></div>
                <div class="data-content"><a class="btn btn-danger btn-sm" href="">View</a></div>
              </div> -->
              <!-- Edit Profile-->
              <div class="edit-profile-btn mt-3">
                <input type="submit" name="edit_profile" data-id="<?php echo $data['id'];?>" data-name="<?php echo $data['name'];?>" data-comp_name="<?php echo $data['comp_name'];?>" data-contact_no="<?php echo $data['contact_no'];?>" data-email_id="<?php echo $data['email_id'];?>" data-gst_no="<?php echo $data['gst_no'];?>" data-address="<?php echo $data['address'];?>" data-password="<?php echo $data['password'];?>" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-info w-100 updt" value="Edit Profile">
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>


    <!-- Footer Nav-->
<?php include 'footer.php';?>
<?php include 'footer-link.php';?>
<script type="text/javascript">
   

    $('.updt').click(function(e){
    var id = $(this).data('id');
    var name = $(this).data('name');
    var comp_name = $(this).data('comp_name');
    var contact_no = $(this).data('contact_no');
    var email_id = $(this).data('email_id');
    var gst_no = $(this).data('gst_no');
    var mobile = $(this).data('mobile');
    var address = $(this).data('address');
    var address = $(this).data('address');
    var password = $(this).data('password');
    
    $('#id').val(id);
    $('#name').val(name);
    $('#comp_name').val(comp_name);
    $('#contact_no').val(contact_no);
    $('#email_id').val(email_id);
    $('#gst_no').val(gst_no);
    $('#address').val(address);
    $('#password').val(password);
    
  });</script>
  <!-- Internet Connection Status-->
    <div class="internet-connection-status" id="internetStatus"></div>
    

          <!-- Modal -->
          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">PROFILE</h5>
                  <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form method="POST" action="action.php" >
                <div class="modal-body">
                  <div class="row">
                    <div class="col-12 col-md-12">
                      <label>Name</label>
                      <input type="text" name="name" id="name" class="form-control">
                      <input type="hidden" name="id" id="id">
                    </div>
                    <div class="col-12 col-md-12">
                      <label>Company Name</label>
                      <input type="text" name="comp_name" id="comp_name" class="form-control">
                    </div>
                    <div class="col-12 col-md-12">
                      <label>Phone</label>
                      <input type="text" name="contact_no" id="contact_no" class="form-control">
                    </div>
                    <div class="col-12 col-md-12">
                      <label>Email Address</label>
                      <input type="text" name="email_id" id="email_id" class="form-control">
                    </div>
                    <div class="col-12 col-md-12">
                      <label>GST No</label>
                      <input type="text" name="gst_no" id="gst_no" class="form-control">
                    </div>
                    <div class="col-12 col-md-12">
                      <label>Address</label>
                      <input type="text" name="address" id="address" class="form-control">
                    </div>
                    <div class="col-12 col-md-12">
                      <label>Password</label>
                      <input type="text" name="password" id="password" class="form-control">
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="submit" name="update" class="btn btn-primary">Update</button>
                </div>
                </form>
              </div>
            </div>
          </div>
          <!-- ................ -->