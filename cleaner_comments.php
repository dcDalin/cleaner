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

$stmt = $user_home->runQuery("SELECT * FROM `request_cleaner` WHERE requestID = :uid ORDER BY `request_cleaner`.`requestID` DESC");
$stmt->bindValue(":uid", $_GET['requestID']);
$stmt->execute();
$result=$stmt->fetch(PDO::FETCH_OBJ);

if(isset($_POST['btn-signup']))
{
	$stmt = $user_home->runQuery("SELECT * FROM `tbl_users` WHERE userLevel = 2 AND userID = :uid ORDER BY `tbl_users`.`userID` DESC");
	$stmt->bindValue(":uid", $_POST['userID']);
	$stmt->execute();
	$result=$stmt->fetch(PDO::FETCH_OBJ);

	$reg_cleaner = new USER();

	$requestID 		=trim($_POST['requestID']);
	$userID 		=trim($_POST['userID']);
	$cleanerID 		=trim($_POST['cleanerID']);
	$cleanerComments 		=trim($_POST['cleanerComments']);
	
	$completed='M';
	$stmt = $user_home->runQuery("
	
		INSERT INTO tbl_comments (requestID, userID, cleanerID, cleanerComments) VALUES
							(:requestID, :userID, :cleanerID, :cleanerComments);
							
		UPDATE request_cleaner SET completed = :completed WHERE requestID = :uid;
		
		UPDATE tbl_users SET cleanerStatus = 'inactive' WHERE userID = :userID;
							
		");
	
	$stmt -> bindParam(':requestID', $requestID);
	$stmt -> bindParam(':userID', $userID);
	$stmt -> bindParam(':cleanerID', $cleanerID);
	$stmt -> bindParam(':cleanerComments', $cleanerComments);
	
	$completed='M';
	$stmt->bindParam(":completed",$completed);
	
	$stmt->bindValue(":uid", $_GET['requestID']);
    
	
   if($stmt->execute()){			
			$msg = "Success! Cleaner Comments Made! ";
			header( "refresh:3;url=cleaner_assigned_jobs.php" );
		}
		else
		{
			$msg  = "sorry , Query could no execute...";
		}		
	
}

$stmt = $user_home->runQuery("SELECT * FROM `request_cleaner` WHERE requestID = :uid ORDER BY `request_cleaner`.`requestID` DESC");
$stmt->bindValue(":uid", $_GET['requestID']);
$stmt->execute();
$result=$stmt->fetch(PDO::FETCH_OBJ);
?>
<?php
	$title = "Cleaner Comments";
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
								<h1><span class="colored">Cleaner</span> Comments  </h1>
								
							<?php
						}
					
					?>
					
					
				</div>
			</div>
		</div>
	</div>
	
	<?php

			include 'include-cleaner-sidenav.php';
			
	?>
	
			<div class="fh5co-contact animate-box">
		<div class="container">
			<div class="row">
				
				<div class="col-md-8 col-md-push-1 col-sm-12 col-sm-push-0 col-xs-12 col-xs-push-0">
					<div class="row">
							
						<form method="post" class="form-horizontal">
								
								
								<div class="form-group">
								
								<div class="col-sm-6">
								<input type="hidden" name="requestID" value="<?php echo $result->requestID; ?>" class="form-control" required data-parsley-pattern="^[a-zA-Z ]+$" placeholder="Cleaner first name?" />
								</div>
								</div>
								
								
								<div class="form-group">
								<div class="col-sm-6">
								<input type="hidden" name="userID"  class="form-control" required data-parsley-pattern="^[a-zA-Z ]+$" value="<?php echo $result->userID; ?>" />
								</div>
								</div>
								
								<div class="form-group">
								<div class="col-sm-6">
								<input type="hidden" name="cleanerID"  class="form-control" required data-parsley-pattern="^[a-zA-Z ]+$" value="<?php echo $result->cleanerID; ?>" />
								</div>
								</div>
								
								
								<div class="form-group">
								<label class="col-sm-3 control-label">Cleaner Comments</label>
								<div class="col-sm-6">
								<textarea required  name="cleanerComments" class="form-control"placeholder="Talk about your experience cleaning this particular house."></textarea>
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