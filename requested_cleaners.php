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



if(isset($_POST['btn-request']))
{
	$cleanModule 		=trim($_POST['cleanModule']);
	$dateToClean 		=trim($_POST['dateToClean']);

		if($user_home->request_cleaner($userID,$cleanModule,$dateToClean))
		{			
			
			$msg = "
					Success! Cleaner has been requested.
					";
		}
		else
		{
			$msg  = "Success, Cleaner requested";
		}		
	}
	
	
	if(isset($_GET['action']) && $_GET['action'] == 'delete'){
	$stmt=$user_home->runQuery("DELETE FROM request_cleaner WHERE requestID=:uid");
	$stmt->bindValue(":uid", $_GET['requestID']);
	$stmt->execute();
	}
	
	
	$stmt=$user_home->runQuery("SELECT request_cleaner.requestID, request_cleaner.dateToClean, request_cleaner.dateRequested, request_cleaner.status, request_cleaner.completed,
				clean_modules_info.moduleTitle, clean_modules_info.modulePrice FROM request_cleaner,clean_modules_info WHERE request_cleaner.userID = :userID AND
					clean_modules_info.moduleID = request_cleaner.moduleID");
	$stmt->bindparam(":userID",$userID);
	$userID = $_SESSION['userSession'];
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
								<h1><span class="colored">My Cleaner</span> Requests  </h1>
								
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
		    	 <table class="table table-striped">
		    	<thead>
		    		<tr>
		    			<td>Module</td>
						<td>Module Price</td>
		    			<td>Date Requested</td>
		    			<td>When To Be Cleaned</td>
		    			<td>Status</td>
		    		</tr>
		    	</thead>
		    		<?php
		    			while($row=$stmt->fetch(PDO::FETCH_OBJ)){
		    		?>
		    	<tbody>
		    		<tr>
		    			<td><?php echo $row->moduleTitle; ?></td>
						<td><?php echo $row->modulePrice; ?></td>
		    			<td><?php echo $row->dateRequested; ?></td>
		    			<td><?php echo $row->dateToClean; ?></td>
		    			<td>
		    				<?php
		    					if($row->status == 0){
		    						echo "Not Active";
		    					}else{
		    						echo "Active";
		    					}
		    				?>
		    			</td>
						<td>
								<a href="more_details.php?requestID=<?php echo $row->requestID ?>">More Details</a> | 
								<?php
								if($row->status == 0){
									?>
									<a href="requested_cleaners.php?requestID=<?php echo $row->requestID; ?>&action=delete" onclick="return confirm('ARE YOU SURE YOU WANT TO CANCEL')">Cancel</a>
									<?php
								}
								if($row->completed == 'M'){
								?>
									<a href="customer_comments.php?requestID=<?php echo $row->requestID; ?>">Review</a>
								<?php
								}else if($row->completed == 'Y'){
								?>
									<a target="_blank" href="receipt.php?requestID=<?php echo $row->requestID; ?>">Receipt</a>
								<?php
								}
								?>
						</td>
									
		    		</tr>
		    	</tbody>
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