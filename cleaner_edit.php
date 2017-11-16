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
	$stmt = $user_home->runQuery("SELECT * FROM `tbl_users` WHERE userLevel = 2 AND userID = :uid ORDER BY `tbl_users`.`userID` DESC");
	$stmt->bindValue(":uid", $_POST['userID']);
	$stmt->execute();
	$result=$stmt->fetch(PDO::FETCH_OBJ);

	$reg_cleaner = new USER();

	$userID 		=trim($_POST['userID']);
	$userFname 		=trim($_POST['userFname']);
	$userLname 		=trim($_POST['userLname']);
	$userEmail 		=trim($_POST['userEmail']);
	$userPhone 		=trim($_POST['userPhone']);
	$userGender 	=trim($_POST['userGender']);
	
	$stmt = $user_home->runQuery("UPDATE tbl_users SET userFname = :userFname, userLname = :userLname, userEmail = :userEmail, userPhone = :userPhone, userGender = :userGender WHERE userID = :uid");
	
	$stmt -> bindParam(':userFname', $userFname);
	$stmt -> bindParam(':userLname', $userLname);
	$stmt -> bindParam(':userEmail', $userEmail);
	$stmt -> bindParam(':userPhone', $userPhone);
	$stmt -> bindParam(':userGender', $userGender);
	$stmt -> bindParam(':uid',$userID);
    
   if($stmt->execute()){		
			
			$message = "					
						Hello $userFname,
						<br /><br />
						Your profile has been updated<br/>
						OCSS Administrator has updated some of your information. Feel free to contact us incase of incorrect updates.<br/>
						<br /><br />
						
						<br /><br />
						Thanks,";
						
			$subject = "OCSS Cleaner Profile Update";
						
			$reg_cleaner->send_mail($userEmail,$message,$subject);	
			$msg = "Success! Updates made! ";
			
		}
		else
		{
			$msg  = "sorry , Query could no execute...";
		}		
	
}

$stmt = $user_home->runQuery("SELECT * FROM `tbl_users` WHERE userLevel = 2 AND userID = :uid ORDER BY `tbl_users`.`userID` DESC");
$stmt->bindValue(":uid", $_GET['userID']);
$stmt->execute();
$result=$stmt->fetch(PDO::FETCH_OBJ);
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
								<h1><span class="colored">Edit</span> Cleaner  </h1>
								
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
								
								<div class="col-sm-6">
								<input type="hidden" name="userID" value="<?php echo $result->userID; ?>" class="form-control" required data-parsley-pattern="^[a-zA-Z ]+$" placeholder="Cleaner first name?" />
								</div>
								</div>
								
								
								<div class="form-group">
								<label class="col-sm-3 control-label">First Name</label>
								<div class="col-sm-6">
								<input type="text" name="userFname"  class="form-control" required data-parsley-pattern="^[a-zA-Z ]+$" value="<?php echo $result->userFname; ?>" />
								</div>
								</div>
								
								<div class="form-group">
								<label class="col-sm-3 control-label">Last Name</label>
								<div class="col-sm-6">
								<input type="text" name="userLname" class="form-control" required data-parsley-pattern="^[a-zA-Z ]+$" value="<?php echo $result->userLname; ?>" />
								</div>
								</div>
													
								<div class="form-group">
								
								<div class="col-sm-6">
								<input type="hidden" name="userEmail"  value="<?php echo $result->userEmail; ?>" class="form-control" required data-parsley-type="email" data-parsley-trigger="keyup" placeholder="" />				
								</div>
								</div>
								
								<div class="form-group">
								<label class="col-sm-3 control-label">Phone Number (+254)</label>
								<div class="col-sm-6">
								<input type="text" name="userPhone"  class="form-control" required data-parsley-type="number" value="<?php echo $result->userPhone; ?>" />
								</div>
								</div>
								
								
								
								<div class="form-group">
								<label class="col-sm-3 control-label">Gender</label>
								<div class="col-sm-6">
								<select class="form-control" name="userGender" required>
									<option name="userGender" value="" selected="selected"></option>
									<option name="userGender" value="Male" >Male</option>
									<option name="userGender" value="Female">Female</option>
									
								</select>
								</div>
								</div>
								
								
								<div class="form-group">
								<div class="col-sm-offset-3 col-sm-9 m-t-15">
								<button type="submit" name="btn-signup"  class="btn btn-primary">Save</button>
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