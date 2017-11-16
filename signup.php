<?php
session_start();
require_once 'class.user.php';

$reg_user = new USER();

if($reg_user->is_logged_in()!="")
{
	$reg_user->redirect('home.php');
}


if(isset($_POST['btn-signup']))
{
	$userFname 		=trim($_POST['userFname']);
	$userLname 		=trim($_POST['userLname']);
	$userEmail 		=trim($_POST['userEmail']);
	$userPhone 		=trim($_POST['userPhone']);
	$userGender 	=trim($_POST['userGender']);
	$userEstate 	=trim($_POST['userEstate']);
	$userHouseNo	=trim($_POST['userHouseNo']);
	$userEstateDescription	=trim($_POST['userEstateDescription']);
	$upass = trim($_POST['txtpass']);
	
	
	$stmt = $reg_user->runQuery("SELECT * FROM tbl_users WHERE userEmail=:userEmail");
	$stmt->execute(array(":userEmail"=>$userEmail));
	$row = $stmt->fetch(PDO::FETCH_ASSOC);
	
	if($stmt->rowCount() > 0)
	{
		$msg = "Sorry, email already exists";
	}
	else
	{
		if($reg_user->register($userFname,$userLname,$userEmail,$userPhone,$userGender,$userEstate,$userHouseNo,$userEstateDescription,$upass))
		{			
			
			$msg = "
					Success! Your account has been created.
					";
		}
		else
		{
			$msg  = "sorry , Query could no execute...";
		}		
	}
}

?>

<?php
	$title = "Sign Up";
	$thisPage = "signup.php";
	include 'include-header.php';
	include 'include-nav.php';
?>
<div class="fh5co-page-title" style="background-image: url(images/slide_6.jpg);">
		<div class="overlay"></div>
		<div class="container">
			<div class="row">
				<div class="col-md-12 animate-box">
					<?php
						if(isset($msg)){
							?>
							<h1><span class="colored">
							<?php
								echo $msg;
							?>
							</span></h1>
							
							<?php
						}else{
							?>
								<h1><span class="colored">Sign</span> Up  </h1>
								<span class="colored"><h3><a href="login.php">Log in instead?</a></h3></span>
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
								<label class="col-sm-3 control-label">First Name</label>
								<div class="col-sm-6">
								<input type="text" name="userFname" class="form-control" required data-parsley-pattern="^[a-zA-Z ]+$" placeholder="What's your first name?" />
								</div>
								</div>
								
								<div class="form-group">
								<label class="col-sm-3 control-label">Last Name</label>
								<div class="col-sm-6">
								<input type="text" name="userLname" class="form-control" required data-parsley-pattern="^[a-zA-Z ]+$" placeholder="What about your second name?" />
								</div>
								</div>
															
								<div class="form-group">
								<label class="col-sm-3 control-label">E-Mail</label>
								<div class="col-sm-6">
								<input type="email" name="userEmail" class="form-control" required data-parsley-type="email" data-parsley-trigger="keyup" placeholder="Don't forget your e-mail" />				
								</div>
								</div>
								
								<div class="form-group">
								<label class="col-sm-3 control-label">Phone Number (+254)</label>
								<div class="col-sm-6">
								<input type="text" name="userPhone" class="form-control" required data-parsley-type="number" placeholder="e.g. 715123456" />
								</div>
								</div>
								
								<div class="form-group">
								<label class="col-sm-3 control-label">Gender</label>
								<div class="col-sm-6">
								<select class="form-control" name="userGender" required>
									<option name="userGender" value="Male" selected="selected">Male</option>
									<option name="userGender" value="Female">Female</option>
									
								</select>
								</div>
								</div>
								
								<div class="form-group">
								<label class="col-sm-3 control-label">Estate</label>
								<div class="col-sm-6">
								<input type="text" name="userEstate" class="form-control" required data-parsley-pattern="^[a-zA-Z ]+$" placeholder="Which estate do you stay?" />
								</div>
								</div>
								
								<div class="form-group">
								<label class="col-sm-3 control-label">House Number</label>
								<div class="col-sm-6">
								<input type="text" name="userHouseNo" class="form-control" required data-parsley-pattern="^[a-zA-Z ]+$" placeholder="The house number too" />
								</div>
								</div>
								
								<div class="form-group">
								<label class="col-sm-3 control-label">Description</label>
								<div class="col-sm-6">
								<textarea required  name="userEstateDescription" class="form-control"placeholder="Make it easy for us to find where you stay, describe where you stay, land marks etc."></textarea>
								</div>
								</div>
								
								<div class="form-group">
								<label class="col-sm-3 control-label">Password</label>
								<div class="col-sm-3">
								<input type="password" name="txtpass" id="pass2" class="form-control" required data-parsley-length="[6, 10]" data-parsley-trigger="keyup" placeholder="Password" />			</div>
								<div class="col-sm-3">
								<input type="password" name="txtpass" class="form-control" required data-parsley-equalto="#pass2" data-parsley-trigger="keyup" placeholder="Re-Type Password" />				</div>
								</div>
															
								
								<div class="form-group">
								<div class="col-sm-offset-3 col-sm-9 m-t-15">
								<button type="submit" name="btn-signup"  class="btn btn-primary">Submit</button>
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