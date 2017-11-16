<?php
session_start();
require_once 'class.user.php';
$user_login = new USER();

if($user_login->is_logged_in()!="")
{
	$user_login->redirect('home.php');
}

if(isset($_POST['btn-login']))
{
	$email = trim($_POST['txtemail']);
	$upass = trim($_POST['txtupass']);
	
	if($user_login->login($email,$upass))
	{
		$user_login->redirect('home.php');
	}
}
?>

<?php
	$title = "Log In";
	$thisPage = "login.php";
	include 'include-header.php';
	include 'include-nav.php';
?>
<div class="fh5co-page-title" style="background-image: url(images/slide4.jpg);">
		<div class="overlay"></div>
		<div class="container">
			<div class="row">
				<div class="col-md-12 animate-box">
					<?php
						if(isset($_GET['error'])){
							?>
							<h1><span class="colored">
							<?php
								echo "Wrong Log In details! ";
							?>
							</span></h1>
							
							<?php
						}
					
						else{
							?>
								<h1><span class="colored">Log</span> In  </h1>
								<span class="colored"><h3><a href="signup.php">Sign Up instead?</a></h3></span>
							<?php
						}
					?>
					
					
				</div>
			</div>
		</div>
	</div>
	

	<div class="fh5co-contact animate-box">
		<div class="container">
			<div class="row">
				
				
				<div class="col-md-10 col-md-push-1 col-sm-12 col-sm-push-0 col-xs-12 col-xs-push-0">
					<div class="row">
						<form method="post" class="form-horizontal">
							
							<div class="form-group">
							<label class="col-sm-3 control-label">E-Mail</label>
							<div class="col-sm-6">
							<input type="email" name="txtemail" class="form-control" required data-parsley-type="email" data-parsley-trigger="keyup" placeholder="Enter your email" />				
							</div>
							</div>
							
												
														
							<div class="form-group">
							<label class="col-sm-3 control-label">Password</label>
							<div class="col-sm-6">
							<input type="password" name="txtupass"  id="pass2" class="form-control" required data-parsley-length="[6, 10]" data-parsley-trigger="keyup" placeholder="Password" />	
							</div>
							</div>
														
							
							
							
							
							<div class="form-group">
							<div class="col-sm-offset-3 col-sm-9 m-t-15">
							<button type="submit"  name="btn-login" class="btn btn-primary">Submit</button>
							<button type="reset" class="btn btn-default m-l-5">Cancel</button><a href="">Forgot Password?</a>
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