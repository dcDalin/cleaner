<?php
session_start();
require_once 'class.user.php';
$user_login = new USER();

if($user_login->is_logged_in()!="")
{
	$user_login->redirect('home.php');
}

?>
<?php
	$title = "Home";
	$thisPage = "index.php";
	include 'include-header.php';
	include 'include-nav.php';
?>
<aside id="fh5co-hero" clsas="js-fullheight">
		<div class="flexslider js-fullheight">
			<ul class="slides">
		   	<li style="background-image: url(images/slide1.jpg);">
		   		<div class="container">
		   			<div class="col-md-12 text-center js-fullheight fh5co-property-brief slider-text">
		   				<div class="fh5co-property-brief-inner">
		   					<div class="fh5co-box">
		   						
		   						<h3><a href="#">Clan Module One</a></h3>
		   						<div class="price-status">
                             	<span class="price">Kshs. 1,000 </span>
	                        </div>
	                        <p>Basic Cleaning</p>
	                        

	                        <p><a href="#" class="btn btn-primary">Learn more</a></p>
									
	                        
	   						</div>
		   				</div>
		   			</div>
		   		</div>
		   	</li>
		   	   	<li style="background-image: url(images/slide1.jpg);">
		   		<div class="container">
		   			<div class="col-md-12 text-center js-fullheight fh5co-property-brief slider-text">
		   				<div class="fh5co-property-brief-inner">
		   					<div class="fh5co-box">
		   						
		   						<h3><a href="#">Clan Module One</a></h3>
		   						<div class="price-status">
                             	<span class="price">Kshs. 1,000 </span>
	                        </div>
	                        <p>Basic Cleaning</p>
	                        

	                        <p><a href="#" class="btn btn-primary">Learn more</a></p>
									
	                        
	   						</div>
		   				</div>
		   			</div>
		   		</div>
		   	</li>
				   	<li style="background-image: url(images/slide1.jpg);">
		   		<div class="container">
		   			<div class="col-md-12 text-center js-fullheight fh5co-property-brief slider-text">
		   				<div class="fh5co-property-brief-inner">
		   					<div class="fh5co-box">
		   						
		   						<h3><a href="#">Clan Module One</a></h3>
		   						<div class="price-status">
                             	<span class="price">Kshs. 1,000 </span>
	                        </div>
	                        <p>Basic Cleaning</p>
	                        

	                        <p><a href="#" class="btn btn-primary">Learn more</a></p>
									
	                        
	   						</div>
		   				</div>
		   			</div>
		   		</div>
		   	</li>
		   	
		  	</ul>
	  	</div>
	</aside>
	

			</div>
		</div>
	</div>

<?php
	include 'include-footer.php';