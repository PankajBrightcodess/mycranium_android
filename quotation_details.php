<?php include 'header-link.php'; ?>
<?php include 'header.php'; ?>
    <!-- Header Area-->
    <div class="header-area" id="headerArea">
      <div class="container h-100 d-flex align-items-center justify-content-between">
        <!-- Back Button-->
        <div class="back-button"><a href="notifications.php">
            <svg class="bi bi-arrow-left" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"></path>
            </svg></a></div>
        <!-- Page Title-->
        <div class="page-heading">
          <h6 class="mb-0">Quotation Details</h6>
        </div>
        <!-- Navbar Toggler-->
        <div class="suha-navbar-toggler" data-bs-toggle="offcanvas" data-bs-target="#suhaOffcanvas" aria-controls="suhaOffcanvas"><span></span><span></span><span></span></div>
      </div>
    </div>
    <!-- Page Content Wrapper-->
    <div class="page-content-wrapper" style="margin-top:70px;">
      <div class="container">
        <!-- Notifications Details Area-->
        <div class="notification-area pt-3 pb-2">
          <!-- Notification Details-->
          <div class="list-group-item d-flex py-3">
            <div class="noti-info" >
              <div class="row">
                <div class="col-12 mb-3">
                  <a href="img/pdf/MY_CRANIUM.pdf" class="btn btn-sm btn-info">Download</a>
                </div>
                <div class="col-12 mb-3">
                  <label>CLIENT'S COMMENTS</label>
                  <select class="form-control">
                    <option >---SELECT---</option>
                    <option >TECHNICAL</option>
                    <option >COMMERCIAL</option>
                  </select>
                </div>
                <div class="col-12 mb-2">

                  
                  <textarea class="form-control"> </textarea>
                </div>
                

                <div class="col-12 mb-3">
                  <a href="" class="btn btn-sm btn-success" id="comment">Submit</a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-12">
                  <h2 class="text-center">OR</h2>
                </div>
          <div class="notification-area pt-3 pb-0">
          <!-- Notification Details-->
          <div class="list-group-item ">
            <!-- <div class="noti-info" > -->
              <div class="row">
                <div class="col-12 col-md-12 mb-3">
                  <a href="" class="btn btn-lg btn-warning form-control">Place Order</a>
                </div>
              </div>
            <!-- </div> -->
          </div>
        </div>
      </div>
    </div>
    <!-- Internet Connection Status-->
    <div class="internet-connection-status" id="internetStatus"></div>
    <!-- Footer Nav-->
     <?php include 'footer.php';?>
     <?php include 'footer-link.php';?>