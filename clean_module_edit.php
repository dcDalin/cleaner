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
	$stmt = $user_home->runQuery("SELECT * FROM `clean_modules_info` WHERE  moduleID = :uid ORDER BY `clean_modules_info`.`moduleID` DESC");
	$stmt->bindValue(":uid", $_POST['moduleID']);
	$stmt->execute();
	$result=$stmt->fetch(PDO::FETCH_OBJ);

	$reg_cleaner = new USER();

	$moduleTitle 		=trim($_POST['moduleTitle']);
	$modulePrice 		=trim($_POST['modulePrice']);
	$moduleDescription	=trim($_POST['moduleDescription']);
	
	$stmt = $user_home->runQuery("UPDATE clean_modules_info SET moduleTitle = :moduleTitle, modulePrice = :modulePrice, moduleDescription = :moduleDescription WHERE moduleID = :uid");
	
	$stmt -> bindParam(':moduleTitle', $moduleTitle);
	$stmt -> bindParam(':modulePrice', $modulePrice);
	$stmt -> bindParam(':moduleDescription', $moduleDescription);
	$stmt -> bindParam(':uid',$moduleID);
    $stmt ->execute();
   
	$msg = "Success! Module updated.";
			
	
}else
		{
			$msg  = "sorry , Query could no execute...";
		}	

$stmt = $user_home->runQuery("SELECT * FROM `clean_modules_info` WHERE  moduleID = :uid ORDER BY `clean_modules_info`.`moduleID` DESC");
$stmt->bindValue(":uid", $_GET['moduleID']);
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
								<label class="col-sm-3 control-label">Module Title</label>
								<div class="col-sm-6">
								<input type="text" name="moduleTitle" value="<?php echo $result->moduleTitle; ?>" class="form-control" required data-parsley-pattern="^[a-zA-Z ]+$" placeholder="Name of the Clean Module" />
								</div>
								</div>
								
								
								<div class="form-group">
								<label class="col-sm-3 control-label">Module Price</label>
								<div class="col-sm-6">
								<input type="text" name="modulePrice" value="<?php echo $result->modulePrice; ?>" class="form-control" required data-parsley-type="number" placeholder="Price in Kshs" />
								</div>
								</div>
								
								<div class="form-group">
								<label class="col-sm-3 control-label">Description</label>
								<div class="col-sm-6">
								<textarea required  name="moduleDescription" value="<?php echo $result->moduleDescription; ?>" placeholder="<?php echo $result->moduleDescription; ?>"class="form-control"></textarea>
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