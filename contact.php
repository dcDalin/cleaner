<?php
	require_once 'class.user.php';

	$reg_user = new USER();
	
	if(isset($_POST['submit'])){
		$name = trim($_POST['name']);
		$email  	=trim($_POST['email']);
		$message	=trim($_POST['message']);
		
		$userEmail = 'onlinecleaningservicessystem@gmail.com';
		$userEmail = 'mcdalinoluoch@gmail.com';
		
		$subject = $name.','.$email;
		$reg_user->send_mail($userEmail,$message,$subject);	
	}else{
		
	}
	$title = "Contact Us";
	$thisPage = "contact.php";
	include 'include-header.php';
	include 'include-nav.php';
	
?>

	<div class="fh5co-page-title" style="background-image: url(images/contactus.jpg);">
		<div class="overlay"></div>
		<div class="container">
			<div class="row">
				<div class="col-md-12 animate-box">
					<h1><span class="colored">Contact</span> Us</h1>
				</div>
			</div>
		</div>
	</div>
	

	<div class="fh5co-contact animate-box">
		<div class="container">
			<div class="row">
				<div class="col-md-3">
					<h3>Contact Info.</h3>
					<ul class="contact-info">
						
						<li><i class="icon-phone"></i>+254-717-631-262</li>
						<li><i class="icon-envelope"></i><a href="#">onlinecleaningservicessystem@gmail.com</a></li>
						<li><i class="icon-globe"></i><a href="#">ocss.co.ke</a></li>
					</ul>
				</div>
				<div class="col-md-8 col-md-push-1 col-sm-12 col-sm-push-0 col-xs-12 col-xs-push-0">
					<div class="row">
					
						<form method="post" class="form-horizontal">
								
						<div class="col-md-6">
							<div class="form-group">
								<input class="form-control" name="name" placeholder="Name" type="text" required data-parsley-pattern="^[a-zA-Z ]+$" placeholder="What's your name?">
							</div>
						</div>
						
						<div class="col-md-6">
							<div class="form-group">
								<input class="form-control" name="email" placeholder="Email" type="text" required data-parsley-type="email" data-parsley-trigger="keyup" placeholder="Don't forget your e-mail">
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<textarea required name="message" class="form-control" id="" cols="30" rows="7" placeholder="Message"></textarea>
							</div>
						</div>
						
						<div class="col-md-12">
							<div class="form-group">
								
								<button type="submit" name="submit"  class="btn btn-primary">Submit</button>
								<button type="reset" class="btn btn-default m-l-5">Cancel</button>
							</div>
						</div>
						
						</form>
					</div>
				</div>
			</div>
		</div>	
	</div>

	
<?php
	include 'include-footer.php';