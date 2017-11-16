<?php
session_start();
require_once 'class.user.php';
$user_home = new USER();

if(!$user_home->is_logged_in())
{
	$user_home->redirect('index.php');
}

$stmt = $user_home->runQuery("SELECT * FROM tbl_users WHERE userID=:uid");
$stmt->execute(array(":uid"=>$_SESSION['userSession']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);

if(isset($_POST['btn-signup']))
{
	$reg_cleaner = new USER();

	function randStrGen($len){
    $result = "";
    $chars = "abcdefghijklmnopqrstuvwxyz0123456789";
    $charArray = str_split($chars);
    for($i = 0; $i < $len; $i++){
	    $randItem = array_rand($charArray);
	    $result .= "".$charArray[$randItem];
    }
    return $result;
}

// Usage example
$randstr = randStrGen(8);


	$userFname 		=trim($_POST['userFname']);
	$userLname 		=trim($_POST['userLname']);
	$userEmail 		=trim($_POST['userEmail']);
	$userPhone 		=trim($_POST['userPhone']);
	$userGender 	=trim($_POST['userGender']);
	$upass = $randstr;
	
	
	$stmt = $reg_cleaner->runQuery("SELECT * FROM tbl_users WHERE userEmail=:userEmail");
	$stmt->execute(array(":userEmail"=>$userEmail));
	$row = $stmt->fetch(PDO::FETCH_ASSOC);
	
	if($stmt->rowCount() > 0)
	{
		$msg = "Sorry, email already exists! ";
	}
	else
	{
		if($reg_cleaner->register_cleaner($userFname,$userLname,$userEmail,$userPhone,$userGender,$upass))
		{			
			
			$message = "					
						Hello $userFname,
						<br /><br />
						Welcome to OCSS!<br/>
						You are registered as a cleaner. Your randomly generated password is the one below. Please change it after logging in.<br/>
						<br /><br />
						$upass</a>
						<br /><br />
						Thanks,";
						
			$subject = "OCSS Cleaner Password";
						
			$reg_cleaner->send_mail($userEmail,$message,$subject);	
			$msg = "Success! New cleaner created! ";
			
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
	$navMenu ="cleaner_register.php";
	include 'include-header.php';
	include 'include-nav.php';
?>
<div class="fh5co-page-title" style="background-image: url(images/slide2.jpg);">
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
								<h1><span class="colored">New</span> Cleaner  </h1>
								
							<?php
						}
					
					?>
					
					
				</div>
			</div>
		</div>
	</div>
	
	<?php

			include 'include-admin-side-nav.php';
			
	?>
	
			<div class="fh5co-contact animate-box">
		<div class="container">
			<div class="row">
				
				<div class="col-md-8 col-md-push-1 col-sm-12 col-sm-push-0 col-xs-12 col-xs-push-0">
					<div class="row">
							
						<form method="post" class="form-horizontal">
								
								
								<div class="form-group">
								<label class="col-sm-3 control-label">First Name</label>
								<div class="col-sm-6">
								<input type="text" name="userFname" class="form-control" required data-parsley-pattern="^[a-zA-Z ]+$" placeholder="Cleaner first name?" />
								</div>
								</div>
								
								<div class="form-group">
								<label class="col-sm-3 control-label">Last Name</label>
								<div class="col-sm-6">
								<input type="text" name="userLname" class="form-control" required data-parsley-pattern="^[a-zA-Z ]+$" placeholder="What about last name?" />
								</div>
								</div>
															
								<div class="form-group">
								<label class="col-sm-3 control-label">E-Mail</label>
								<div class="col-sm-6">
								<input type="email" name="userEmail" class="form-control" required data-parsley-type="email" data-parsley-trigger="keyup" placeholder="Don't forget the cleaner's e-mail" />				
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