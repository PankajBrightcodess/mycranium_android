<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <!-- fontawesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
<link rel="shortcut icon" href="img/logo.png" type="image/png">
    <title>Vendor Registration | Cranium Services</title>
  </head>
  <body>
  <?php include"header-top.php"; ?>
  <?php include"header-mid.php"; ?>
  <?php include"menu.php"; ?>
  <!--<section class="page-banner"><div class="container"><img src="images/contact-us.jpg" alt="contact-us" class="w-100"></div></section>-->
  <section class="pages" id="career">
  	<div class="container">
		<!-- <div class="row">
        	<div class="col-md-12">
            	<h2>Career</h2><hr class="border-warning">
                <h3>Available Openings</h3>
                <div class="table-responsive">
                    <table class="table table-striped">
                    	<thead>
                                    <tr>
                                        <th>SL.</th>
                                        <th>Designation</th>
                                        <th>Experience</th>
                                        <th>Qualification</th>
                                        <th>No. of Posts</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1.</td>
                                        <td>Lab assistant</td>
                                        <td>Experience of two years in concerned field</td>
                                        <td>Graduates</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>2.</td>
                                        <td>Plant manager</td>
                                        <td>Experience of two years in concerned field</td>
                                        <td>Graduates</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>3.</td>
                                        <td>Sales officer</td>
                                        <td>Experience of two years in concerned field</td>
                                        <td>Graduates</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>4.</td>
                                        <td>Accountant</td>
                                        <td>Experience of two years in concerned field</td>
                                        <td>Graduates</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>5.</td>
                                        <td>Mechanical engineer</td>
                                        <td>Experience of two years in concerned field</td>
                                        <td>Graduates</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>6.</td>
                                        <td>Machine operator</td>
                                        <td>Experience of two years in concerned field</td>
                                        <td>Graduates</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>7.</td>
                                        <td>Chemist</td>
                                        <td>Experience of two years in concerned field</td>
                                        <td>Graduates</td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>        
				</div>    
            </div>
            <div class="clearfix"></div>
        </div> -->
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="career-apply">
                    <hr><h2><b class="font">Apply Here For Vendor Registration</b></h2><hr>
                    <hr/>
                    <form action="action.php" method="POST"  enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="text">Company Name : </label>
                            <input type="text" name="name" placeholder="Insert Full Name" class="form-control upload-btn py-4" required>
                        </div>
                        <div class="form-group">
                            <label for="contact">Address : </label>
                            <input type="text" name="address" placeholder="Your Address" class="form-control upload-btn py-4" required>
                        </div>
                        <div class="form-group">
                            <label for="text">Email : </label>
                            <input type="email" name="email" placeholder="Email" class="form-control upload-btn py-4" required>
                        </div>
                        <div class="form-group">
                            <label for="contact">Contact No : </label>
                            <input type="text" name="contact" placeholder="Your Contact No." class="form-control upload-btn py-4" required>
                        </div>
                        <div class="form-group">
                            <label for="apply for">Nature of Business : </label>
                            <select name="business_nature" class="form-control upload-btn" required>
                                <option value="">---Select Type ---</option>
                                <option value="Manufacturer">Manufacturer</option>
                                <option value="trader">Trader</option>
                                <option value="Service provider">Service Provide</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="contact">Details of Products/Services : </label>
                            <input type="text" name="discription" placeholder="Details" class="form-control upload-btn py-4" required>
                        </div>
                        <div class="form-group">
                            <label for="resume">Upload Company Profile : </label>
                            <input type="file" name="resume" class="form-control p-1" required>
                        </div>
                        <button type="submit" name="applyforvender" class="btn btn-lg btn-success">Submit</button>
                        <!-- onclick="myFunction()" -->
                    </form>
                </div>
            </div>            
        </div>
    </div>
 </section>

 <?php include"footer.php"; ?>  

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script type="text/javascript">
        // function myFunction(){
        //     alert("Submitted Successfully, Thank You!!");
        // }
    </script>
  </body>
</html>