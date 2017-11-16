<footer id="fh5co-footer" role="contentinfo">
	
		<div class="container">
			<div class="col-md-3 col-sm-12 col-sm-push-0 col-xs-12 col-xs-push-0">
				<h3>About Us</h3>
				<p>Spac And Clean, we really clean. </p>
				<p><a href="#" class="btn btn-primary btn-outline with-arrow btn-sm">Read More <i class="icon-arrow-right"></i></a></p>
			</div>
			<div class="col-md-6 col-md-push-1 col-sm-12 col-sm-push-0 col-xs-12 col-xs-push-0">
				<h3>Our Services</h3>
				<ul class="float">
					<li><a href="#"House Cleaning</a></li>
					<li><a href="#">Carpet &amp; Cleaning</a></li>
					<li><a href="#">Dish Washing</a></li>
					<li><a href="#">Interior Deco</a></li>
				</ul>
				<ul class="float">
					<li><a href="#">Car Cleaning</a></li>
					<li><a href="#"Online Payment</a></li>
					<li><a href="#">Flexibility</a></li>
					<li><a href="#">Customer Service</a></li>
				</ul>

			</div>

			<div class="col-md-2 col-md-push-1 col-sm-12 col-sm-push-0 col-xs-12 col-xs-push-0">
				<h3>Follow Us</h3>
				<ul class="fh5co-social">
					<li><a href="#"><i class="icon-twitter"></i></a></li>
					<li><a href="#"><i class="icon-facebook"></i></a></li>
					<li><a href="#"><i class="icon-google-plus"></i></a></li>
					<li><a href="#"><i class="icon-instagram"></i></a></li>
				</ul>
			</div>
			
			
			<div class="col-md-12 fh5co-copyright text-center">
				<p>&copy; 2017 <span><i class="icon-heart"></i> by <a href="" target="_blank"></a>Spac And Clean<a href="" target="_blank"></a></span></p>	
			</div>
			
		</div>
	</footer>
	</div>
	
	
	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>
	<!-- Flexslider -->
	<script src="js/jquery.flexslider-min.js"></script>

	<!-- MAIN JS -->
	<script src="js/main.js"></script>
	
	
	<script src="parsleyjs/dist/parsley.min.js"></script>
	
	<script>
	$(document).ready(function(){
		$('form').parsley();
	});
	
	function htmlbodyHeightUpdate() {
    var height3 = $(window).height();
    var height1 = $('.nav').height() + 50;
    height2 = $('.container-main').height();
    if (height2 > height3) {
        $('html').height(Math.max(height1, height3, height2) + 10);
        $('body').height(Math.max(height1, height3, height2) + 10);
    } else
    {
        $('html').height(Math.max(height1, height3, height2));
        $('body').height(Math.max(height1, height3, height2));
    }

}
	$(document).ready(function () {
		htmlbodyHeightUpdate();
		$(window).resize(function () {
			htmlbodyHeightUpdate();
		});
		$(window).scroll(function () {
			height2 = $('.container-main').height();
			htmlbodyHeightUpdate();
		});
	});
	</script>


	</body>
</html>