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

?>

<?php
	$title = "Home Page";
	$navMenu ="home.php";
	include 'include-header.php';
	include 'include-nav.php';
?>
<div class="fh5co-page-title" style="background-image: url(images/slide6.jpg);">
		<div class="overlay"></div>
		<div class="container">
			<div class="row">
				<div class="col-md-12 animate-box">
					<h1>Welcome <span class="colored"><?php echo $row['userFname']; ?>&nbsp;</span><?php echo $row['userLname']; ?></h1>
					
				</div>
			</div>
		</div>
	</div>
	<?php
		if($row['userLevel'] == 1){
			include 'include-admin-side-nav.php';
		}else if($row['userLevel'] == 2){
			include 'include-cleaner-sidenav.php';
		}else{
			include 'include-customer-sidenav.php';
		}
		?>


<?php	
	include 'include-footer.php';