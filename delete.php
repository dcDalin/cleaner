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

$stmt = $user_home->runQuery("SELECT * FROM `tbl_users` WHERE userLevel = 2 ORDER BY `tbl_users`.`userID` DESC");


$stmt->execute();



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
								<h1><span class="colored">View</span> Cleaners  </h1>
								
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
				<div class="panel panel-default">
			
						
						<div class="table-container">
							<table class="table table-filter">
								<tbody>
								<?php 
									while ($result=$stmt->fetch(PDO::FETCH_OBJ)){
								?>
						
									<tr data-status="pagado">
										
										
										<td>
											<div class="media">
												<a href="#" class="pull-left">
													<img src="https://s3.amazonaws.com/uifaces/faces/twitter/fffabs/128.jpg" class="media-photo">
												</a>
												<div class="media-body">
													<span class="media-meta pull-right"><a href="view_cleaners.php?userID=<?php echo $result->userID; ?>&action=delete" onclick="return confirm('ARE YOU SURE YOU WANT TO DELETE')">Delete</a></span>
													<h4 class="title">
														<?php echo $result->userFname; ?> &nbsp;<?php echo $result->userLname; ?>&nbsp;&nbsp; (<?php echo $result->userGender; ?>)
														<span class="pull-right pagado">(View)</span>
													</h4>
													<p class="summary"><?php echo $result->userEmail; ?></p>
													<p>+254 7<?php echo $result->userPhone; ?></p>
					
												</div>
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