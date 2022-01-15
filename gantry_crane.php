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
          <h6 class="mb-0">GANTRY CRANE & SEMI GANTRY CRANE</h6>
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
                  <input class="form-control mb-2" type="file" accept="pdf" value="">
                  <input class="form-control mb-2" type="file" accept="pdf" value="">
                  <input class="form-control mb-2" type="file" accept="pdf" value="">
                  <input class="form-control mb-2" type="file" accept="pdf" value="">
                  <input class="form-control mb-2" type="file" accept="pdf" value="">
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
                    <div class="title mb-2"><i class="lni lni-map-marker"></i><span>PROJECT LOCATION</span></div>
                   <input type="text" class="form-control" placeholder="" name="">
                </div>
                <div class="mb-3">
                  <div class="title mb-2"><i class="lni lni-steam"></i><span>CAPACITY (IN TON)</span></div>
                  <div class="title mb-2"><span>MH (MAIN HOIST)</span></div>
                  <input type="text" name="mainhost" placeholder="" class="form-control mb-2">
                  <div class="title mb-2"><span>AH (AUX. HOIST)</span></div>
                  <input type="text" name="auxhoist" placeholder="Please write N/A, in case it is not applicable" class="form-control mb-2">
                </div>
                <div class="mb-3">
                  <div class="title mb-2"><i class="lni lni-money-location"></i><span>LOCATION</span></div>
                  <select class="form-control" name="location">
                    <option value="">---SELECT---</option>
                    <option value="indoor">INDOOR</option>
                    <option value="outdoor">OUTDOOR</option>
                  </select>
                </div>
                <div class="mb-3">
                  <div class="title mb-2"><i class="lni lni-angellist"></i><span>TYPE OF CRANE</span></div>
                  <select class="form-control" name="crane_type">
                    <option value="">---SELECT---</option>
                    <option value="single_girder_eot_crane">SINGLE GIRDER EOT CRANE</option>
                    <option value="double_girder_eot_crane">DOUBLE GIRDER EOT CRANE</option>
                    <option value="single_girder_semi_eot_crane">SINGLE GIRDER SEMI EOT CRANE</option>
                    <option value="double_girder_semi_eot_crane">DOUBLE GIRDER SEMI EOT CRANE</option>
                    <option value="single_girder_under_slung_crane">SINGLE GIRDER UNDER SLUNG CRANE</option>
                    <option value="double_girder_under_slung_crane">DOUBLE GIRDER UNDER SLUNG CRANE</option>
                  </select>
                </div>
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
                  <div class="title mb-2"><i class="lni lni-map-marker"></i><span>DESIGN STANDARD</span></div>
                   <select class="form-control" name="crane_type">
                    <option value="">---SELECT---</option>
                    <option value="is">IS 3177</option>
                    <option value="fem">FEM</option>
                    <option value="din">DIN</option>
                  </select>
                </div>
                <div class="mb-3">
                  <div class="title mb-2"><i class="lni lni-map-marker"></i><span>APPLICATION</span></div>
                   <input type="text" class="form-control" name="application">
                </div>
                <div class="mb-3">
                  <div class="title mb-2"><i class="lni lni-map-marker"></i><span>SPAN (IN METERS)</span></div>
                  <input class="form-control" name="span" type="text">
                </div>
                  <div class="mb-3">
                  <div class="title mb-2"><i class="lni lni-map-marker"></i><span>CANTILEVERS- IF ANY (IN METERS)</span></div>
                  <input class="form-control" placeholder="Please Furnish Details With Both/One Side" type="text">
                </div>
                <div class="mb-3">
                  <div class="title mb-2"><i class="lni lni-map-marker"></i><span>LIFTING HEIGHT (IN METERS)</span></div>
                  <div class="title mb-2"><span>MH (MAIN HOIST)</span></div>
                  <input type="text" class="form-control mb-2" placeholder="" name="abv_floor">
                  <input type="text" class="form-control mb-2" placeholder="Please write N/A, in case, it is not applicable" name="blw_floor">
                  <div class="title mb-2"><span>AH (MAIN HOIST)</span></div>
                  <input type="text" class="form-control mb-2" placeholder="" name="abv_floor">
                    <input type="text" class="form-control mb-2" placeholder="please write N/A, in case, it is not application" name="blw_floor">
                  <!-- <select class="form-control"><option>---SELECT---</option> <option style="MH">MH (MAIN HOIST)</option><option style="AH">AH (AUX. HOIST)</option></select> -->
                </div>
                <div class="mb-3">
                  <div class="title mb-2"><i class="lni lni-map-marker"></i><span>TRAVEL LENGTH (IN METERS)</span></div>
                  <input class="form-control" type="text">
                </div>
              
                <div class="mb-3">
                  <div class="title mb-2"><i class="lni lni-map-marker"></i><span>SPEED (OPTIONAL)- IN MTRS./MIN.</span></div>

                  <div class="title mb-2"><span>MH (MAIN HOIST)</span></div>
                  <input type="text" class="form-control mb-2" placeholder="Please Fill Manual In Case Of Manual Operation" name="">
                  <div class="title mb-2"><span>AH (AUX. HOIST)</span></div>
                  <input type="text" class="form-control mb-2" placeholder="Please Fill Manual In Case Of Manual Operation" name="">
                  <div class="title mb-2"><span>CT (CROSS TRAVEL)</span></div>
                  <input type="text" class="form-control mb-2" placeholder="Please Fill Manual In Case Of Manual Operation" name="">
                  <div class="title mb-2"><span>LT (LONG TRAVEL)</span></div>
                  <input type="text" class="form-control mb-2" placeholder="Please Fill Manual In Case Of Manual Operation" name="">
                </div>
                <div class="mb-3">
                  <div class="title mb-2"><i class="lni lni-map-marker"></i><span>MICRO SPEED (OPTIONAL)</span></div>
                    <select class="form-control multipleselect" multiple="multiple"  name="vfd[]">
                     
                    <option value="mh">MH</option>
                    <option value="ah">AH</option>
                    <option value="ct">CT</option>
                    <option value="lt">LT</option>
                 </select> 
                </div>
                <div class="mb-3">
                  <div class="title mb-2"><i class="lni lni-map-marker"></i><span>SCOPE OF SUPPLY</span></div>
                     <select class="form-control multipleselect" multiple="multiple" name="scope_supply[]">
                    
                    <option value="crane">CRANE</option>
                    <option value="shrouded">SHROUDED BUS BAR</option>
                    <option value="sq">SQ. BAR/RAIL WITH FIXING ITEMS</option>
                    <option value="gg">GANTRY GIRDER</option>
                    <option value="recommended">RECOMMENDED SPARE PARTS</option>
                    <option value="mandatory">MANDATORY SPARE PARTS</option>
                  </select>
                </div>
                <div class="mb-3">
                  <div class="title mb-2"><i class="lni lni-map-marker"></i><span>INSTALLATION</span></div>
                   <select class="form-control" name="installation">
                    <option value="">---SELECT---</option>
                    <option value="yes">YES</option>
                    <option value="no">NO</option>
                  </select>
                </div>
                 <div class="mb-3">
                  <div class="title mb-2"><i class="lni lni-map-marker"></i><span>OTHER REMARKS, IF ANY</span></div>
                   <input type="text" name="other_remarks" class="form-control">
                </div>
                <button class="btn btn-success w-100" type="submit">Submit</button>
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