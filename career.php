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
    <title>Career | Cranium Services</title>
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
                                    <hr><h2><b class="font">Apply Here</b></h2><hr>
                                    <hr/>
                                    <form action="action.php" method="POST"  enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="text">Name : </label>
                                            <input type="text" name="name" placeholder="Insert Full Name" class="form-control upload-btn py-4" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="contact">Contact : </label>
                                            <input type="text" name="contact" placeholder="Your Contact No." class="form-control upload-btn py-4" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="contact">Email : </label>
                                            <input type="email" name="email" placeholder="Your Email iD" class="form-control upload-btn py-4" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="apply for">Apply for : </label>
                                            <select name="apply_for" class="form-control upload-btn" required>
                                                <option value="">---Select Required Post ---</option>
                                                <option value="Lab Assistant">Lab Assistant</option>
                                                <option value="Plant Manager">Plant Manager</option>
                                                <option value="Sales Officer">Sales Officer</option>
                                                <option value="Accountant">Accountant</option>
                                                <option value="Mechanical Engineer">Mechanical Engineer</option>
                                                <option value="Machine Operator">Machine Operator</option>
                                                <option value="Chemist">Chemist</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="resume">Attach Resume Here : </label>
                                            <input type="file" name="resume" class="form-control " required>
                                        </div>
                                    <button type="submit" name="applyforjob" class="btn btn-lg btn-success">Submit</button>
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
  </body>
</html>