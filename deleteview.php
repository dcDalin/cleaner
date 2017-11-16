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

$status = 0;
$stmt = $user_home->runQuery("SELECT * FROM request_cleaner WHERE status = :status");
$stmt->bindParam(":status",$status);
$stmt->execute();



?>
<?php
	$title = "View Cleaners";
	$thisPage = "signup.php";
	$navMenu ="cleaner_register.php";
	include 'include-header.php';
	include 'include-nav.php';
?>
      <div class="pure-g">
		    <div class="pure-u-1-3"></div>
		    <div class="pure-u-1-1">
		    	<h2>Customers</h2>
					<table>
						<tr>
							<th>User ID</th>
							<th>Clean Module</th>
							<th>Date To Clean</th>
							<th>Date Requested</th>
							
						</tr>

							<?php 
								while ($result=$stmt->fetch(PDO::FETCH_OBJ)){
							?>
						
							<tr>
								<td><?php echo $result->userID; ?></td>
								<td><?php echo $result->cleanModule; ?></td>
								<td><?php echo $result->dateToClean; ?></td>
								<td><?php echo $result->dateRequested; ?></td>
								<td><a href="assign_cleaner.php?requestID=<?php echo $result->requestID; ?>">Assign a Cleaner</a></td>

								
							</tr>

							<?php
								}
							?>
							
					</table>
				
				

		    </div>
		    <div class="pure-u-1-3"></div>
		</div>



      <script>
      (function (window, document) {
      document.getElementById('toggle').addEventListener('click', function (e) {
          document.getElementById('tuckedMenu').classList.toggle('custom-menu-tucked');
          document.getElementById('toggle').classList.toggle('x');
      });
      })(this, this.document);
      </script>
	</body>

</html>