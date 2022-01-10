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
    <div class="offcanvas offcanvas-start suha-offcanvas-wrap" tabindex="-1" id="suhaOffcanvas" aria-labelledby="suhaOffcanvasLabel">
      <!-- Close button-->
      <button class="btn-close btn-close-white text-reset" type="button" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      <!-- Offcanvas body-->
      <div class="offcanvas-body">
        <!-- Sidenav Profile-->
        <div class="sidenav-profile">
          <div class="user-profile"><img src="img/bg-img/9.jpg" alt=""></div>
          <div class="user-info">
            <h6 class="user-name mb-1">Suha Sarah</h6>
            <p class="available-balance">Total balance $<span class="counter">583.67</span></p>
          </div>
        </div>
        <!-- Sidenav Nav-->
        <ul class="sidenav-nav ps-0">
          <li><a href="profile.html"><i class="lni lni-user"></i>My Profile</a></li>
          <li><a href="notifications.html"><i class="lni lni-alarm lni-tada-effect"></i>Notifications<span class="ms-3 badge badge-warning">3</span></a></li>
          <li class="suha-dropdown-menu"><a href="#"><i class="lni lni-cart"></i>Shop Pages</a>
            <ul>
              <li><a href="shop-grid.html">- Shop Grid</a></li>
              <li><a href="shop-list.html">- Shop List</a></li>
              <li><a href="single-product.html">- Product Details</a></li>
              <li><a href="featured-products.html">- Featured Products</a></li>
              <li><a href="flash-sale.html">- Flash Sale</a></li>
            </ul>
          </li>
          <li><a href="pages.html"><i class="lni lni-empty-file"></i>All Pages</a></li>
          <li class="suha-dropdown-menu"><a href="wishlist-grid.html"><i class="lni lni-heart"></i>My Wishlist</a>
            <ul>
              <li><a href="wishlist-grid.html">- Wishlist Grid</a></li>
              <li><a href="wishlist-list.html">- Wishlist List</a></li>
            </ul>
          </li>
          <li><a href="settings.html"><i class="lni lni-cog"></i>Settings</a></li>
          <li><a href="intro.html"><i class="lni lni-power-switch"></i>Sign Out</a></li>
        </ul>
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
              <form action="#" method="">
                <div class="mb-2">
                  <div class="title mb-2"><i class="lni lni-envelope"></i><span>UPLOAD TECHNICAL SPECIFICATIONS /REQUIREMENTS</span></div>
                  <input class="form-control" type="file" accept="pdf" value="">
                </div>
                <button class="btn btn-success" type="submit">Upload</button>
              </form>
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
              <form action="#" method="">
                <div class="mb-3">
                  <div class="title mb-2"><i class="lni lni-steam"></i><span>CAPACITY</span></div>
                  <select class="form-control"><option>---SELECT---</option> <option style="MH">MH (MAIN HOIST)</option><option style="AH">AH (AUX. HOIST)</option></select>
                </div>
                <div class="mb-3">
                  <div class="title mb-2"><i class="lni lni-money-location"></i><span>LOCATION</span></div>
                  <input class="form-control" type="text" name="loaction" value="">
                </div>
                <div class="mb-3">
                  <div class="title mb-2"><i class="lni lni-envelope"></i><span>CLASS OF DUTY</span></div>
                  <input class="form-control" type="text">
                </div>
                <div class="mb-3">
                  <div class="title mb-2"><i class="lni lni-map-marker"></i><span>DESIGN STANDARD OF HOIST</span></div>
                  <input class="form-control" type="text">
                </div>
                <div class="mb-3">
                  <div class="title mb-2"><i class="lni lni-map-marker"></i><span>APPLICATION</span></div>
                  <input class="form-control" type="text">
                </div>
                <div class="mb-3">
                  <div class="title mb-2"><i class="lni lni-map-marker"></i><span>TRAVEL LENGTH (IN METERS)</span></div>
                  <input class="form-control" type="text">
                </div>
                <div class="mb-3">
                  <div class="title mb-2"><i class="lni lni-map-marker"></i><span>LIFTING HEIGHT (IN METERS)</span></div>
                  <input class="form-control" type="text">
                </div>
               <!--  <div class="mb-3">
                  <div class="title mb-2"><i class="lni lni-map-marker"></i><span>TRAVEL LENGTH (IN METERS)</span></div>
                  <input class="form-control" type="text">
                </div> -->
                <!-- <div class="mb-3">
                  <div class="title mb-2"><i class="lni lni-map-marker"></i><span>COLUMN TO COLUMN DISTANCE (IN METERS)</span></div>
                  <input class="form-control" type="text">
                </div> -->
                <div class="mb-3">
                  <div class="title mb-2"><i class="lni lni-map-marker"></i><span>SPEED (OPTIONAL)- IN MTRS./MIN.</span></div>
                  <select class="form-control"><option>---SELECT---</option> <option style="MH">MH (MAIN HOIST)</option><option style="AH">AH (AUX. HOIST)</option><option style="CT">CT(CROSS TRAVEL)</option></select>
                </div>
                <div class="mb-3">
                  <div class="title mb-2"><i class="lni lni-map-marker"></i><span>SCOPE OF SUPPLY</span></div>
                   <input class="form-control" type="text">
                </div>
                <div class="mb-3">
                  <div class="title mb-2"><i class="lni lni-map-marker"></i><span>INSTALLATION</span></div>
                   <input class="form-control" type="text">
                </div>
                <div class="mb-3">
                  <div class="title mb-2"><i class="lni lni-map-marker"></i><span>OTHER REMARKS, IF ANY</span></div>
                   <input class="form-control" type="text">
                </div>
                <button class="btn btn-success w-100" type="submit">Save All Changes</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="space"></div>
    <!-- Internet Connection Status-->
    <div class="internet-connection-status" id="internetStatus"></div>
    <!-- Footer Nav-->
    <?php include 'footer.php';?>
     <?php include 'footer-link.php';?>