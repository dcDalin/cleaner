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

$stmt=$user_home->runQuery("SELECT * FROM clean_modules_info");

$stmt->execute();

$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

if(isset($_POST['btn-request']))
{
	$moduleID 		=trim($_POST['moduleID']);
	$dateToClean 		=trim($_POST['dateToClean']);
	$customerDescription=trim($_POST['customerDescription']);

		if($user_home->request_cleaner($moduleID,$dateToClean,$customerDescription))
		{			
			
			$msg = "
					Success! Cleaner has been requested.
					";
					header( "refresh:3;url=requested_cleaners.php" );
		}
		else
		{
			$msg  = "Success, Cleaner requested";
		}		
	}

	$stmt=$user_home->runQuery("SELECT * FROM clean_modules_info");
	$stmt->execute();
	
	
?>

<?php
	$title = "Request Cleaner";
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
								<h1><span class="colored">Request</span> Cleaner  </h1>
								
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
					
					
		    	


		    		<form method="post" class="form-horizontal">
						
				        <div class="form-group">
								<label class="col-sm-3 control-label">Clean Module </label>
								<div class="col-sm-6">
								<?php
								if ($stmt->rowCount() > 0) { ?>
								<select class="form-control" name="moduleID" required>
									<?php foreach ($results as $row) { ?>
									  <option value="<?php echo $row['moduleID']; ?>"><?php echo $row['moduleTitle']; ?>, <?php echo $row['modulePrice']; ?> </option>
									<?php } ?>
									
								</select>
								<?php } ?>
								</div>
								</div>
								
						
								
								<div class="form-group">
								<label class="col-sm-3 control-label">Date To Clean</label>
								<div class="col-sm-6">
								<input type="date" name="dateToClean" class="form-control" required  />
								</div>
								</div>
								
								<div class="form-group">
								<label class="col-sm-3 control-label">Description</label>
								<div class="col-sm-6">
								<textarea required  name="customerDescription" class="form-control"placeholder="Describe specifics"></textarea>
								</div>
								</div>
								
								<div class="form-group">
								<div class="col-sm-offset-3 col-sm-9 m-t-15">
								<button type="submit" name="btn-request"  class="btn btn-primary">Submit</button>
								<button type="reset" class="btn btn-default m-l-5">Cancel</button>
								</div>
								</div>
				    
				</form>

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