<?php
session_start();
require_once 'class.user.php';
$user_home = new USER();

if(!$user_home->is_logged_in())
{
	$user_home->redirect('index.php');
}

//populate select field, make sure date cleaner is available

$stmt=$user_home->runQuery("SELECT * FROM tbl_users WHERE userLevel = 2 ");

$stmt->execute();

$results = $stmt->fetchAll(PDO::FETCH_ASSOC);





$stmt = $user_home->runQuery("SELECT * FROM tbl_users WHERE userID=:uid");
$stmt->execute(array(":uid"=>$_SESSION['userSession']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);

if(isset($_POST['post'])){

	$cleanerID = $_POST['cleanerID'];
	$status = 1;

	$stmt=$user_home->runQuery("UPDATE request_cleaner SET cleanerID = :cleanerID, status = :status WHERE requestID=:uid");



	$stmt->bindParam(":cleanerID",$cleanerID);
	$stmt->bindParam(":status",$status);
	
	$stmt->bindValue(":uid", $_GET['requestID']);
	$stmt->execute();

	$msg = "Success, cleaner has been assigned";

	
}else{
	$msg = "Assign Cleaner";
	
}

$stmt = $user_home->runQuery("SELECT * FROM `tbl_users` WHERE userLevel = 2 ORDER BY `tbl_users`.`userID` DESC");


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
				
<a href="view_cleaner_requests.php">Back</a>
		    		<form action="" method = "post" class="pure-form pure-form-stacked">
				 
				        
				      
								<div class="form-group">
								<label class="col-sm-3 control-label">Cleaner </label>
								<div class="col-sm-6">
								<?php
								if ($stmt->rowCount() > 0) { ?>
								<select class="form-control" name="cleanerID" required>
									<?php foreach ($results as $row) { ?>
									  <option value="<?php echo $row['userID']; ?>"><?php echo $row['userEmail']; ?>, <?php echo $row['userFname']; ?> <?php echo $row['userLname']; ?></option>
									<?php } ?>
									
								</select>
								<?php } ?>
								
								</div>
								<button type="submit" name="post"  class="btn btn-primary">Assign Cleaner</button>
								</div>
						<br>

				        
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