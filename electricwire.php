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
                  <ul>
                    <li>MH (MAIN HOIST)</li>
                    <li><input type="text" name="mainhost" placeholder="PLEASE WRITE N/A, IN CASE IT IS NOT APPLICABLE" class="form-control mb-2"></li>
                    <li>AH (AUX. HOIST)</li>
                    <li><input type="text" name="auxhoist" placeholder="PLEASE WRITE N/A, IN CASE IT IS NOT APPLICABLE" class="form-control mb-2"></li>
                  </ul>
                </div>
                <div class="mb-3">
                  <div class="title mb-2"><i class="lni lni-money-location"></i><span>LOCATION</span></div>
                   <select class="form-control" name="location">
                    <option value="">---SELECT---</option>
                    <option value="indoor">INDOOR</option>
                    <option value="outdoor">OUTDOOR</option>
                  </select>
                </div>
               <!--  <div class="mb-3">
                  <div class="title mb-2"><i class="lni lni-angellist"></i><span>TYPE OF CRANE</span></div>
                   <select class="form-control" name="crane_type">
                    <option value="">---SELECT---</option>
                    <option value="singlecrane">SINGLE GIRDER EOT CRANE</option>
                    <option value="doublecrane">DOUBLE GIRDER EOT CRANE</option>
                    <option value="single_iot">SINGLE GIRDER SEMI EOT CRANE</option>
                    <option value="double_iot">DOUBLE GIRDER EOT CRANE</option>
                    <option value="single_semi_iot">SINGLE GIRDER SEMI EOT CRANE</option>
                    <option value="double_semi_iot">DOUBLE GIRDER SEMI EOT CRANE</option>
                  </select>
                </div> -->
                <div class="mb-3">
                  <div class="title mb-2"><i class="lni lni-envelope"></i><span>CLASS OF DUTY</span></div>
                   <select class="form-control" name="crane_type">
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
                  <div class="title mb-2"><i class="lni lni-map-marker"></i><span>DESIGN STANDARD OF HOIST</span></div>
                  <select class="form-control" name="crane_type">
                    <option value="">---SELECT---</option>
                    <option value="is">IS 3938</option>
                    <option value="fem">FEM</option>
                    <option value="din">DIN</option>
                  </select>
                </div>
                <div class="mb-3">
                  <div class="title mb-2"><i class="lni lni-map-marker"></i><span>APPLICATION</span></div>
                  <input class="form-control" type="text" placeholder="TO BE FURNISHED AS PER YOUR APPLICATION">
                </div>
                <div class="mb-3">
                  <div class="title mb-2"><i class="lni lni-map-marker"></i><span>TRAVEL LENGTH (IN METERS)</span></div>
                  <input class="form-control" type="text" >
                </div>
                <div class="mb-3">
                  <div class="title mb-2"><i class="lni lni-map-marker"></i><span>LIFTING HEIGHT (IN METERS)</span></div>
                  <input class="form-control" type="text" placeholder="PLEASE FURNISH IN METERS">
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
                  <ul>
                    <li>MH (MAIN HOIST)</li>
                    <li><input type="text" class="form-control mb-2" placeholder="PLEASE WRITE MANUAL, IN CASE IT IS MANUALLY OPERATED" name=""></li>
                    <li>TRAVEL</li>
                    <li><input type="text" class="form-control mb-2" placeholder="PLEASE WRITE MANUAL, IN CASE IT IS MANUALLY OPERATED" name=""></li>
                  </ul>
                </div>
                 <div class="mb-3">
                  <div class="title mb-2"><i class="lni lni-map-marker"></i><span>SCOPE OF SUPPLY</span></div>
                   <select class="form-control" name="scope_of_supply">
                    <option value="">---SELECT---</option>
                    <option value="hoist">HOIST</option>
                    <option value="festooning_cable">FESTOONING CABLE</option>
                  </select>
                </div>
                 <div class="mb-3">
                  <div class="title mb-2"><i class="lni lni-map-marker"></i><span>INSTALLATION</span></div>
                  <select class="form-control" name="installation">
                    <option value="">---SELECT---</option>
                    <option value="yes">Yes</option>
                    <option value="no">No</option>
                  </select>
                </div>
                 <div class="mb-3">
                  <div class="title mb-2"><i class="lni lni-map-marker"></i><span>OTHER REMARKS, IF ANY</span></div>
                   <select class="form-control" name="other_remarks">
                    <option value="">---SELECT---</option>
                    <option value="yes">Yes</option>
                    <option value="no">No</option>
                  </select>
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