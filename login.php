<?php include 'header-link.php'; ?>
    <!-- Login Wrapper Area-->
    <section class="login-wrapper">
    <div class="login-wrapper d-flex align-items-center justify-content-center text-center">
      <!-- Background Shape-->
      <div class="background-shape"></div>
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-12 col-sm-9 col-md-7 col-lg-6 col-xl-5">
            <img class="big-logo" src="img/core-img/logo-white.png" alt="">
            <!-- <h2 class="text-white">MY CRANIUM</h2> -->
            <!-- Register Form-->
            <div class="register-form mt-5 px-4">
              <form action="https://designing-world.com/suha-v2.5.0/home.php" method="">
                <div class="form-group text-start mb-4"><span>Username</span>
                  <label for="username"><i class="lni lni-user"></i></label>
                  <input class="form-control" id="username" type="text" required placeholder="info@example.com">
                </div>
                <div class="form-group text-start mb-4"><span>Password</span>
                  <label for="password"><i class="lni lni-lock"></i></label>
                  <input class="form-control" id="password" type="password" required placeholder="Password">
                </div>
                <a href="home.php" class="btn btn-warning btn-lg w-100">Log In</a>
                <!-- <button class="btn btn-warning btn-lg w-100" type="submit">Log In</button> -->
              </form>
            </div>
            <!-- Login Meta-->
            <div class="login-meta-data"><a class="forgot-password d-block mt-3 mb-1" href="forget-password.php">Forgot Password?</a>
              <!-- forget-password.php -->
              <p class="mb-0">Didn't have an account?<a class="ms-1" href="register.php">Register Now</a></p>
            </div>
            <!-- View As Guest-->
            <!-- <div class="view-as-guest mt-3"><a class="btn" href="home.php">View as Guest</a></div> -->
          </div>
        </div>
      </div>
    </div>
    </section>
    <!-- All JavaScript Files-->
    <?php include 'footer-link.php';?>