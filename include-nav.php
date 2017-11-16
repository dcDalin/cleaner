<body>
	
<?php
	$user_home = new USER();
?>
	<div id="fh5co-page">
	<header id="fh5co-header" role="banner">
		<div class="container">
			<div class="row">
				<div class="header-inner">
				
					<?php
			
						//check if user is logged in, if no display of user roles i.e. admin, cleaner, customer
						if($user_home->is_logged_in())
						{
							if($row['userLevel'] == 1){
						?>
							<h1><a href="home.php">S&S - <span><?php echo $row['userFname']; ?></span></a></h1>
						<?php
							}elseif($row['userLevel'] == 2){
						?>
							<h1><a href="home.php">S&S - <span>Cleaner</span></a></h1>
						<?php
							}elseif($row['userLevel'] == 3){
						?>
							<h1><a href="home.php">S&S - <span>Customer</span></a></h1>
						<?php
							}
						}else{
						?>
							<h1 <?php if ($thisPage=="index.php") echo " class=\"active\""; ?> ><a href="index.php">Spic And Span<span>.</span></a></h1>
						<?php
						}
						?>
					<nav role="navigation">
						<ul>
						
							
							
							
							<li class="call"><a href="tel://123456789"><i class="icon-phone"></i>+254-717-631-262</a></li>
							
							
							<?php
								if($user_home->is_logged_in())
								{
							?>
								<li class="cta"><a href="logout.php">Log Out</a></li>
							<?php
								}else{
							?>
								<li <?php if ($thisPage =="contact.php") echo " class=\"active\""; ?> ><a href="contact.php">Contact Us</a></li>
								<li class="cta"><a href="login.php">Log In/Sign Up</a></li>
							<?php
								}
							?>
						</ul>
					</nav>
				</div>
			</div>
		</div>
	</header>
	
