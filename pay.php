<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Contact Us | Shivanya Computer Education</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<?php include"head-links.php" ; ?>

  </head>
  <body>
  <?php include"header.php" ;?>
  

  <section class="pages" id="contactpg">
  	<div class="container">
        <form action="admin/action.php" method="post">
    		<div class="row " style="background-color: #0D6780; padding: 10px; border-radius: 10px;">
                <div class="col-md-12"><h5 style="color:white;">Payment</h5><hr style="background:yellowgreen;"></div>
                <div class="col-md-6 mb-3">
                    <label style="color: white;">Category<span style="color: Red;">*</span></label>
                	<select class="form-control" id="catg" name="category"required>
                         <option>----SELECT----</option>   
                         <option value="franchise">Franchise</option>   
                         <option value="admission">Admission</option>   
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label style="color: white;">Name<span style="color: Red;">*</span></label>
                    <input type="text" name="name" class="form-control" required> 
                </div>
                <div class="col-md-6 mb-3">
                    <label style="color: white;">Email <span style="color: Red;">*</span></label>
                    <input type="email" name="email" class="form-control" required> 
                </div>
                <div class="col-md-6 mb-3">
                    <label style="color: white;">Phone<span style="color: Red;">*</span></label>
                    <input type="text" name="phone" class="form-control" required> 
                </div>
                <div class="col-md-6  mb-3 " id="course">
                <label style="color:white">Course<span style="color: Red;">*</span></label>
                <select class="form-control" name="course">
                    <option value="0">---SELECT---</option>
                    <option value="DNITC">Diploma in Nursery teacher training Course (DNITC)</option>
                    <option value="DCITC">Diploma in Computer Teacher Training Course (DCITC)</option>
                    <option value="PG-DCC">PG-Diploma in Computer Course (PG-DCC)</option>
                    <option value="MDCC">Marter Diploma in Computer Course (MDCC)</option>
                    <option value="ADCPC">Advance Diploma in Computer Programming Course (ADCPC)</option>
                    <option value="DCOMPC">Diploma in Computer Office Management & Publishing Course (DCOMPC)</option>
                    <option value="ADCC">Advance Diploma in Computer Course (ADCC)</option>
                    <option value="DCOAC">Diploma in Computer Office & Accounting Course (DCOAC)</option>
                    <option value="MCCC">Master Certificate in Computer Course (MCCC)</option>
                    <option value="DCFAC">Diploma in Computer Financial Accounting Course (DCFAC)</option>
                    <option value="DDTPC">Diploma in Desktop Publishing Course (DDTPC)</option>
                    <option value="DWDC">Diploma in Web Designing Course (DWDC)</option>
                    <option value="DCC">Diploma in Computer Course (DCC)</option>
                    <option value="CCC">Certificate in Computer Course (CCC)</option>
                    <option value="CBCC">Certificate in Basic Computer Course (CBCC)</option>
                    <option value="CCFAC">Certificate in Computer Financial Accounting Course (CCFAC)</option>
                    <option value="CCET">Certificate in Computer English Typing</option>
                    <option value="CCHT">Certificate in Computer Hindi Typing</option>
                    <option value="CCEHT">Certificate in Computer Eng/Hindi Typing</option>
                    <option value="CBC">Certificate in Basic Computer</option>
                    <option value="CESPD">Certificate in English Speaking & PD</option>
                    <option value="CDTP">Certificate in DTP</option>
                    <option value="CT">Certificate in Tally</option>
                    <option value="CBP">Certificate in Basic Programming</option>
                </select>
            </div>
             <div class="col-md-6 mb-3 institute">
                    <label style="color: white;">Institute Name<span style="color: Red;">*</span></label>
                    <input type="text" name="istname" id="istnme" class="form-control"> 
                </div>
          
            <div class="col-md-6 mb-5">
                <label style="color: white;" >Amount<span style="color: Red;">*</span></label>
                <input type="text" name="amount" class="form-control" placeholder="0.00" required> 
            </div>
                <div class="clearfix"></div>
            <div class="col-md-12 text-center"><input type="submit" class="btn btn-warning btn-sm" value="Pay Now" name="payment"></div>
            </div>
            
    </form>
    </div>
 </section>


    


<?php include"footer.php"; ?>
<?php include"bootstrap-body-links.php"; ?>
    <!--  setting pop up cookie -->
    <!--//<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.0/jquery.cookie.min.js"></script>-->
    
    <!-- Successful students slider -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>
    <script>
         $('body').on('change','#catg',function(){
            debugger;
            var category = $(this).val();
            if(category=='franchise'){
                $('.institute').show(true);
                $('#course').hide(true);
            }
            if(category=='admission'){
                $('#course').show(true);
                $('.institute').hide(true);
            }
            

        });

		$(document).ready(function(){
       




		$('.customer-logos').slick({
			slidesToShow: 6,
			slidesToScroll: 1,
			autoplay: true,
			autoplaySpeed: 3000,
			arrows: false,
			dots: false,
			pauseOnHover: false,
			responsive: [{
				breakpoint: 768,
				settings: {
					slidesToShow: 4
				}
			}, {
				breakpoint: 520,
				settings: {
					slidesToShow: 3
				}
			}]
		});
	});
    </script>
   <!-- //Successful students slider -->

  </body>
</html>