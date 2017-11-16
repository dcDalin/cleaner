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

$stmt = $user_home->runQuery("SELECT tbl_users.userFname, tbl_users.userLname, tbl_users.userEmail, tbl_users.userPhone,
							request_cleaner.status
							FROM tbl_users,request_cleaner
							WHERE tbl_users.userID = request_cleaner.cleanerID");
$stmt->execute();
$clean = $stmt->fetch(PDO::FETCH_OBJ);


$stmt=$user_home->runQuery("SELECT 
				request_cleaner.requestID, request_cleaner.dateToClean, request_cleaner.dateRequested, request_cleaner.status, request_cleaner.customerDescription,
				clean_modules_info.moduleTitle, clean_modules_info.modulePrice 
				
				FROM 
				
				request_cleaner,clean_modules_info 
				
				WHERE 
				
				request_cleaner.userID = :userID AND
				clean_modules_info.moduleID = request_cleaner.moduleID AND 
				request_cleaner.requestID = :uid");
	$stmt->bindValue(":uid", $_GET['requestID']);
	$stmt->bindparam(":userID",$userID);
	$userID = $_SESSION['userSession'];
	$stmt->execute();
	$result=$stmt->fetch(PDO::FETCH_OBJ);

?>
<?php
	$title = "Profile";
	$thisPage = "signup.php";
	$navMenu ="";
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
								<h1><span>More</span> Details </h1>
								
							<?php
						}
					
					?>
					
					
				</div>
			</div>
		</div>
	</div>
	
	<?php

			include 'include-customer-sidenav.php';
			
	?>
	
			<div class="fh5co-contact animate-box">
		<div class="container">
			<div class="row">
				
				<div class="col-md-8 col-md-push-1 col-sm-12 col-sm-push-0 col-xs-12 col-xs-push-0">
				
					

					
					<div class="container">
	<div class="row">

		<section class="content">
			
			<div class="col-md-10 col-md-offset-0">
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="pull-right">
							<div class="btn-group">
							<h1><span class="colored"><?php echo $row['userFname']; ?>&nbsp;</span><?php echo $row['userLname']; ?></span> </h1>
								
								
							</div>
						</div>
						
						<div class="table-container">
							<table class="table table-filter">
								<tbody>
								
									<tr data-status="<?php echo $result->cleanerStatus; ?>">
										
										<td>
											
												<div class="media-body">
													<span class="media-meta pull-right">
														
													</span>
													<h4 class="title">
														<?php echo $result->moduleTitle; ?> (Kshs. <?php echo $result->modulePrice; ?>)
														<span class="pull-right active">Date to Clean: <?php echo $result->dateToClean; ?></span>
													</h4>
													<?php
													if($result->status == 1){
														?>
													<h5>Assigned Cleaner: <?php echo $clean->userFname; ?> <?php echo $clean->userLname; ?></h5>
													<p>Cleaner Email: <?php echo $clean->userEmail; ?>, Cleaner Phone Number: <?php echo $clean->userPhone; ?></p>
														<?php
													}else{
													?>
													<h5>Cleaner Not Assigned Yet!</h5>
													<?php
													}
													?>
													
													<p><strong>Your Message to the Cleaner:</strong> <?php echo $result->customerDescription; ?></p>
												</div>
												
												<p><a href="requested_cleaners.php">Back</a></p>
											
										</td>
									</tr>
									
								</tbody>
							</table>
						</div>
					</div>
				</div>
				
			</div>
		</section>
		
	</div>
</div>
<script>
$(document).ready(function () {

	$('.star').on('click', function () {
      $(this).toggleClass('star-checked');
    });

    $('.ckbox label').on('click', function () {
      $(this).parents('tr').toggleClass('selected');
    });

    $('.btn-filter').on('click', function () {
      var $target = $(this).data('target');
      if ($target != 'all') {
        $('.table tr').css('display', 'none');
        $('.table tr[data-status="' + $target + '"]').fadeIn('slow');
      } else {
        $('.table tr').css('display', 'none').fadeIn('slow');
      }
    });

 });
</script>
					
					
        
					
						
				</div>
		
		
			</div>
		</div>	
	</div>
					
<script>
      $(document).ready(function () {

	$('.star').on('click', function () {
      $(this).toggleClass('star-checked');
    });

    $('.ckbox label').on('click', function () {
      $(this).parents('tr').toggleClass('selected');
    });

    $('.btn-filter').on('click', function () {
      var $target = $(this).data('target');
      if ($target != 'all') {
        $('.table tr').css('display', 'none');
        $('.table tr[data-status="' + $target + '"]').fadeIn('slow');
      } else {
        $('.table tr').css('display', 'none').fadeIn('slow');
      }
    });

 });
      
      </script>
	
<?php
	include 'include-footer.php';