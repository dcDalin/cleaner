<?php

require_once 'dbconfig.php';

class USER
{	

	private $conn;
	
	public function __construct()
	{
		$database = new Database();
		$db = $database->dbConnection();
		$this->conn = $db;
    }
	
	public function runQuery($sql)
	{
		$stmt = $this->conn->prepare($sql);
		return $stmt;
	}
	
	public function lasdID()
	{
		$stmt = $this->conn->lastInsertId();
		return $stmt;
	}
	
	public function register($userFname,$userLname,$userEmail,$userPhone,$userGender,$userEstate,$userHouseNo,$userEstateDescription,$upass)
	{
		try
		{							
			$password = md5($upass);
			$stmt = $this->conn->prepare("INSERT INTO tbl_users(userFname,userLname,userEmail,userPhone,userGender,userEstate,userHouseNo,userEstateDescription,userPass,userLevel) 
			                                       VALUES(:userFname,:userLname,:userEmail,:userPhone,:userGender,:userEstate,:userHouseNo,:userEstateDescription,:userPass,:userLevel)");
												
												
			$stmt->bindparam(":userFname",$userFname);
			$stmt->bindparam(":userLname",$userLname);
			$stmt->bindparam(":userEmail",$userEmail);
			$stmt->bindparam(":userPhone",$userPhone);
			$stmt->bindparam(":userGender",$userGender);
			$stmt->bindparam(":userEstate",$userEstate);
			$stmt->bindparam(":userHouseNo",$userHouseNo);
			$stmt->bindparam(":userEstateDescription",$userEstateDescription);
			$stmt->bindparam(":userPass",$password);
			$stmt->bindparam(":userLevel",$userLevel);
			$userLevel = 3;
			$stmt->execute();	
			return $stmt;
		}
		catch(PDOException $ex)
		{
			echo $ex->getMessage();
		}
	}
	
	public function register_cleaner($userFname,$userLname,$userEmail,$userPhone,$userGender,$upass)
	{
		try
		{							
			$password = md5($upass);
			$stmt = $this->conn->prepare("INSERT INTO tbl_users(userFname,userLname,userEmail,userPhone,userGender,userPass,userLevel) 
			                                       VALUES(:userFname,:userLname,:userEmail,:userPhone,:userGender,:userPass,:userLevel)");
												
												
			$stmt->bindparam(":userFname",$userFname);
			$stmt->bindparam(":userLname",$userLname);
			$stmt->bindparam(":userEmail",$userEmail);
			$stmt->bindparam(":userPhone",$userPhone);
			$stmt->bindparam(":userGender",$userGender);
			$stmt->bindparam(":userPass",$password);
			$stmt->bindparam(":userLevel",$userLevel);
			$userLevel = 2;
			$stmt->execute();	
			return $stmt;
		}
		catch(PDOException $ex)
		{
			echo $ex->getMessage();
		}
	}
	
	public function edit_cleaner($userFname,$userLname,$userEmail,$userPhone,$userGender)
	{
		try
		{							
			
			$stmt = $this->conn->prepare("UPDATE tbl_users SET userFname = :userFname, userLname = :userLname, userEmail = :userEmail, userPhone = :userPhone, userGender = :userGender WHERE userID = :uid"); 
			                                      
												
												
			$stmt->bindparam(":userFname",$userFname);
			$stmt->bindparam(":userLname",$userLname);
			$stmt->bindparam(":userEmail",$userEmail);
			$stmt->bindparam(":userPhone",$userPhone);
			$stmt->bindparam(":userGender",$userGender);
			$stmt->bindparam(":uid",$userID);
			$stmt->execute();	
			return $stmt;
		}
		catch(PDOException $ex)
		{
			echo $ex->getMessage();
		}
	}


	public function request_cleaner($moduleID,$dateToClean,$customerDescription){
		try{
			$stmt=$this->conn->prepare("INSERT INTO request_cleaner (userID,moduleID,dateToClean,customerDescription) 
				VALUES(:userID,:moduleID,:dateToClean,:customerDescription)");
			$stmt->bindparam(":userID",$userID);
			$stmt->bindparam(":moduleID",$moduleID);
			$stmt->bindparam(":dateToClean",$dateToClean);
			$stmt->bindparam(":customerDescription",$customerDescription);

			$userID = $_SESSION['userSession'];
			$stmt->execute();

		}catch(PODException $e){
			echo $e->getMessage();
		}
	}
	public function login($email,$upass)
	{
		try
		{
			$stmt = $this->conn->prepare("SELECT * FROM tbl_users WHERE userEmail=:email_id");
			$stmt->execute(array(":email_id"=>$email));
			$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
			
			if($stmt->rowCount() == 1)
			{
				if($userRow['userStatus']== 'Y')
				{
					if($userRow['userPass']==md5($upass))
					{
						$_SESSION['userSession'] = $userRow['userID'];
						return true;
					}
					else
					{
						header("Location: login.php?error");
						exit;
					}
				}
				else
				{
					header("Location: login.php?inactive");
					exit;
				}	
			}
			else
			{
				header("Location: login.php?error");
				exit;
			}		
		}
		catch(PDOException $ex)
		{
			echo $ex->getMessage();
		}
	}
	
	public function clean_module($moduleTitle,$modulePrice,$moduleDescription)
	{
		try
		{							
			
			$stmt = $this->conn->prepare("INSERT INTO clean_modules_info(moduleTitle,modulePrice,moduleDescription) 
			                                       VALUES(:moduleTitle,:modulePrice,:moduleDescription)");
												
												
			$stmt->bindparam(":moduleTitle",$moduleTitle);
			$stmt->bindparam(":modulePrice",$modulePrice);
			$stmt->bindparam(":moduleDescription",$moduleDescription);
			
			$stmt->execute();	
			return $stmt;
		}
		catch(PDOException $ex)
		{
			echo $ex->getMessage();
		}
	}
	
	public function is_logged_in()
	{
		if(isset($_SESSION['userSession']))
		{
			return true;
		}
	}
	
	public function redirect($url)
	{
		header("Location: $url");
	}
	
	public function logout()
	{
		session_destroy();
		$_SESSION['userSession'] = false;
	}
	
	function send_mail($userEmail,$message,$subject)
	{						
		require_once('mailer/class.phpmailer.php');
		$mail = new PHPMailer();
		$mail->IsSMTP(); 
		$mail->SMTPDebug  = 0;                     
		$mail->SMTPAuth   = true;                  
		$mail->SMTPSecure = "ssl";                 
		$mail->Host       = "smtp.gmail.com";      
		$mail->Port       = 465;             
		$mail->AddAddress($userEmail);
		
		$mail->Username="onlinecleaningservicessystem@gmail.com";  
		$mail->Password="ocsspassword";            
		$mail->SetFrom('onlinecleaningservicessystem@gmail.com','OCSS');
		$mail->AddReplyTo("onlinecleaningservicessystem@gmail.com","C");
		$mail->Subject    = $subject;
		$mail->MsgHTML($message);
		$mail->Send();
	}	
	
}