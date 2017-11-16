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

$status = 1;
$stmt = $user_home->runQuery("SELECT 
			tbl_users.userFname,tbl_users.userLname,tbl_users.userEmail, 
			request_cleaner.requestID, request_cleaner.userID, request_cleaner.moduleID,request_cleaner.dateToClean, request_cleaner.completed 
			from 
			tbl_users,request_cleaner 
			where 

			tbl_users.userID = request_cleaner.cleanerID and status = :status");



$stmt->bindParam(":status",$status);

$stmt->execute();



?>
<?php
	$title = "View Cleaner Requests";
	$thisPage = "signup.php";
	$navMenu ="view_cleaner_requests.php";
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
								<h1><span class="colored">Assign</span> Cleaners  </h1>
								
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
				
					

					
					<div class="container">
	<div class="row">

		<section class="content">
			
			<div class="col-md-10 col-md-offset-0">
				<div class="panel panel-default">
					<div class="panel-body">
						
						<table class="table table-striped">
							
								

						<tr>
							
							<th>Cleaner Name</th>
							<th>Clean Module</th>
							<th>Date To Clean</th>
							<th></th>
							
						</tr>

							<?php 
								while ($result=$stmt->fetch(PDO::FETCH_OBJ)){
							?>
						
							<tr>
								
								<td><?php echo $result->userFname; ?> <?php echo $result->userLname; ?></td>
								<td><?php echo $result->moduleID; ?></td>
								<td><?php echo $result->dateToClean; ?></td>
								<td>
									<td>
									<?php
										if($result->completed == 'Y'){
											?>
											COMPLETED
											<?php
										}else if($result->completed == 'M'){
											?>
										     IN PROGRESS
											<?php
										}else{
										?>
										<a href="assign_cleaner.php?requestID=<?php echo $result->requestID; ?>">Re-Assign a Cleaner</a>
										<?php
										}
										?>
									</td>
								</td>
								
								
								
							</tr>

							<?php
								}
							?>
							
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