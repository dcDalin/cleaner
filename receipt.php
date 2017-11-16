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
				clean_modules_info.moduleID, clean_modules_info.moduleTitle, clean_modules_info.modulePrice 
				
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
	$title = "View Cleaner Requests";
	$thisPage = "signup.php";
	$navMenu ="view_cleaner_requests.php";
	include 'include-header.php';
	
?>
<input type="button" onclick="window.print()" value="print"/>
<div class="container">
    <div class="row">
        <div class="well col-xs-10 col-sm-10 col-md-6 col-xs-offset-1 col-sm-offset-1 col-md-offset-3">
            <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <address>
                        <strong><?php echo $row['userFname']; ?>&nbsp;</span><?php echo $row['userLname']; ?></strong>
                        <br>
                        <?php echo $row['userEmail']; ?><br>
						(+254) <?php echo $row['userPhone']; ?>
                        <br>
                        <?php echo $row['userEstate']; ?>, <?php echo $row['userHouseNo']; ?>
                        <br>
                        
                    </address>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6 text-right">
                    <p>
                        <em>Date Cleaned: <?php echo $result->dateToClean; ?></em>
                    </p>
                    <p>
                        <em>Clean Order Number #: <?php echo $result->requestID; ?></em>
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="text-center">
                    <h1>Receipt</h1>
                </div>
                </span>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Clean Module</th>
                            <th>Module ID</th>
                            <th class="text-center"></th>
                            <th class="text-center">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="col-md-9"><em><?php echo $result->moduleTitle; ?></em></h4></td>
                            <td class="col-md-1" style="text-align: center"><?php echo $result->moduleID; ?> </td>
                            <td></td>
                            <td class="col-md-1 text-center"><?php echo $result->modulePrice; ?> </td>
                        </tr>
                        
                        <tr>
                            <td>   </td>
                            <td>   </td>
                            
                            
                        </tr>
                        <tr>
                            <td>   </td>
                            <td>   </td>
                            <td class="text-right"><h4><strong>Total: </strong></h4></td>
                            <td class="text-center text-danger"><h4><strong><?php echo $result->modulePrice; ?> </strong></h4></td>
                        </tr>
                    </tbody>
               
            </div>
        </div>
    </div>