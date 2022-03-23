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
                    <td colspan="8">TRIPLE SPUR GEAR CHAIN PULLEY BLOICK, WITH ALLOY STEEL GRADE-80</td>
                  </tr>
                  <tr>
                    <td colspan="8">LOAD CHANIN AND GR, 30 MILD STEEL HAND CHAIN IN STANDARD LENGTH OF 03 MTRS</td>
                  </tr>
                <tr>
                   <td>CAPICITY IN TONS</td>
                   <td>MODEL NO.</td>
                   <td>RATE<br>(INR)</td>
                   <td>EXTRA LIFT PER MTR<br>(INR)</td>
                   <td>RATE OF TRAVELLING GEARED TROLLEY<br>(INR)</td>
                   <td>MODEL NO. OF TRAVELLING GEARED TROLLEY</td>
                   <td>DISPATCH TIME</td>
                   <td>ACTION</td>
                </tr>
                 <tr>
                   <td>A</td>
                   <td>B</td>
                   <td>C</td>
                   <td>D</td>
                   <td>E</td>
                   <td>F</td>
                   <td>G</td>
                   <td></td>
                </tr>
                </thead>
                <tbody>
                   <tr>
                       <td>01 TON</td>
                       <td>CS-CPB-1T</td>
                       <td>INR 4,250.00</td>
                       <td>INR 484.00</td>
                       <td>INR 4,800.00</td>
                       <td>CS-GT_CPB-1T</td>
                       <td>WITHIN 15 DAYS</td>
                       <td><a href="chain_pully_details.php" style="color:red;">BUY NOW</a></td> 
                    </tr> 
                    <tr>
                       <td>02 TON</td>
                       <td>CS-CPB-2T</td>
                       <td>INR 6,500.00</td>
                       <td>INR 484.00</td>
                       <td>INR 6,300.00</td>
                       <td>CS-GT_CPB-2T</td>
                       <td>WITHIN 15 DAYS</td>
                       <td><a href="chain_pulley_details_1.php" style="color:red;">BUY NOW</a></td> 
                    </tr> 
                    <tr>
                       <td>03 TON</td>
                       <td>CS-CPB-3T</td>
                       <td>INR 7,750.00</td>
                       <td>INR 855.00</td>
                       <td>INR 8,000.00</td>
                       <td>CS-GT_CPB-3T</td>
                       <td>WITHIN 15 DAYS</td>
                       <td><a href="chain_pully_details_2.php" style="color:red;">BUY NOW</a></td> 
                    </tr>
                    <tr>
                       <td>05 TON</td>
                       <td>CS-CPB-5T</td>
                       <td>INR 10,000.00</td>
                       <td>INR 965.00</td>
                       <td>INR 13,750.00</td>
                       <td>CS-GT_CPB-5T</td>
                       <td>WITHIN 15 DAYS</td>
                       <td><a href="chain_pully_details_3.php" style="color:red;">BUY NOW</a></td> 
                    </tr>
                    <tr>
                       <td>10 TON</td>
                       <td>CS-CPB-10T</td>
                       <td>INR 22,550.00</td>
                       <td>INR 2,000.00</td>
                       <td>INR 31,000.00</td>
                       <td>CS-GT_CPB-10T</td>
                       <td>WITHIN 15 DAYS</td>
                       <td><a href="chain_pully_details_4.php" style="color:red;">BUY NOW</a></td> 
                    </tr>
                </tbody>
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