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

if(isset($_GET['action']) && $_GET['action'] == 'delete'){
	$stmt=$user_home->runQuery("DELETE FROM tbl_users WHERE userID=:uid");
	$stmt->bindValue(":uid", $_GET['userID']);
	$stmt->execute();
}

$stmt = $user_home->runQuery("SELECT * FROM `tbl_users` WHERE userLevel = 3 ORDER BY `tbl_users`.`userID` DESC");


$stmt->execute();



?>
<?php
	$title = "View Customers";
	$thisPage = "view_customers.php";
	$navMenu ="view_customers.php";
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
								<h1><span class="colored">View</span> Customers  </h1>
								
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
		,,<div class="container">
			<div class="row">
				
				<div class="col-md-8 col-md-push-1 col-sm-12 col-sm-push-0 col-xs-12 col-xs-push-0">
				
					

					
					<div class="container">
	<div class="row">

		<section class="content">
			
			<div class="col-md-10 col-md-offset-0">
				<div class="panel panel-default">
					<div class="panel-body">
						
						<div class="table-container">
							<table class="table table-filter">
								<tbody>
								<?php 
									while ($result=$stmt->fetch(PDO::FETCH_OBJ)){
								?>
									<tr data-status="<?php echo $result->cleanerStatus; ?>">
										
										<td>
											
												<div class="media-body">
													<span class="media-meta pull-right">
														<a href="profile.php?userID=<?php echo $result->userID ?>">View</a>|
														
														<a href="view_cleaners.php?userID=<?php echo $result->userID; ?>&action=delete" onclick="return confirm('ARE YOU SURE YOU WANT TO DELETE')">Delete</a>
													
													</span>
													<h4 class="title">
														<?php echo $result->userFname; ?> &nbsp;<?php echo $result->userLname; ?>&nbsp;&nbsp; (<?php echo $result->userGender; ?>)
														<span class="pull-right active">(<?php echo $result->cleanerStatus; ?>)</span>
													</h4>
													<h5>+254 <?php echo $result->userPhone; ?>, <?php echo $result->userEmail; ?></h5>
													
												</div>
											
										</td>
									</tr>
									<?php
								}
							?>
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