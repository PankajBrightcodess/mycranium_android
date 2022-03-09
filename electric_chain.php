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
              <table class="table table-bordered " style="font-size: 10px;">
                <thead>
                  <tr>
                    <td colspan="8">ELECTRIC CHAIN HOIST</td>
                  </tr>
                  <tr>
                    <td colspan="8">ATANDARD LIFT OF 3 MTRS.</td>
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
                       <td>CS-ECH-1T</td>
                       <td>INR 54,500.00</td>
                       <td>INR 150.00</td>
                       <td>INR 33,300.00</td>
                       <td>CS-GT_ECH-1T</td>
                       <td>WITHIN 15 DAYS</td>
                       <td><a href="electric_chain_details_1.php" style="color:red;">BUY NOW</a></td> 
                    </tr> 
                    <tr>
                       <td>02 TON</td>
                       <td>CS-CPB-2T</td>
                       <td>INR 60,500.00</td>
                       <td>INR 150.00</td>
                       <td>INR 34,500.00</td>
                       <td>CS-GT_ECH-2T</td>
                       <td>WITHIN 15 DAYS</td>
                       <td><a href="electric_chain_details_2.php" style="color:red;">BUY NOW</a></td> 
                    </tr> 
                    <tr>
                       <td>03 TON</td>
                       <td>CS-ECH-3T</td>
                       <td>INR 72,500.00</td>
                       <td>INR 150.00</td>
                       <td>INR 42,500.00</td>
                       <td>CS-GT_ECH-3T</td>
                       <td>WITHIN 15 DAYS</td>
                       <td><a href="electric_chain_details_3.php" style="color:red;">BUY NOW</a></td> 
                    </tr>
                    <tr>
                       <td>05 TON</td>
                       <td>CS-CPB-5T</td>
                       <td>INR 112,500.00</td>
                       <td>INR 150.00</td>
                       <td>INR 48,500.00</td>
                       <td>CS-GT_ECH-5T</td>
                       <td>WITHIN 15 DAYS</td>
                       <td><a href="electric_chain_details_4.php" style="color:red;">BUY NOW</a></td> 
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