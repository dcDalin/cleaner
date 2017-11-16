
<!DOCTYPE html>

	<html class="no-js">
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php echo $title ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Website Template by FreeHTML5.co" />
	<meta name="keywords" content="free website templates, free html5, free template, free bootstrap, free website template, html5, css3, mobile first, responsive" />
	<meta name="author" content="FreeHTML5.co" />

	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
	<link rel="shortcut icon" href="favicon.ico">
	<link href='https://fonts.googleapis.com/css?family=Varela+Round' rel='stylesheet' type='text/css'>
	<!-- <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,400italic,700' rel='stylesheet' type='text/css'> -->
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="css/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="css/bootstrap.css">
	<!-- Flexslider  -->
	<link rel="stylesheet" href="css/flexslider.css">
	<!-- Theme style  -->
	<link rel="stylesheet" href="css/style.css">

	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	<script src="js/jquery-3.2.0.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->
	<style type="text/css">
		

p {
    margin: 0 0 1em;
}

.comment {
    overflow: hidden;
    padding: 0 0 1em;
    border-bottom: 1px solid #ddd;
    margin: 0 0 1em;
    *zoom: 1;
}

.comment-img {
    float: left;
    margin-right: 33px;
    border-radius: 5px;
    overflow: hidden;
}

.comment-img img {
    display: block;
}

.comment-body {
    overflow: hidden;
}

.comment .text {
    padding: 10px;
    border: 1px solid #e5e5e5;
    border-radius: 5px;
    background: #fff;
}

.comment .text p:last-child {
    margin: 0;
}

.comment .attribution {
    margin: 0.5em 0 0;
    font-size: 14px;
    color: #666;
}

/* Decoration */

.comments,
.comment {
    position: relative;
}

.comments:before,
.comment:before,
.comment .text:before {
    content: "";
    position: absolute;
    top: 0;
    left: 65px;
}

.comments:before {
    width: 3px;
    top: -20px;
    bottom: -20px;
    background: rgba(0,0,0,0.1);
}

.comment:before {
    width: 9px;
    height: 9px;
    border: 3px solid #fff;
    border-radius: 100px;
    margin: 16px 0 0 -6px;
    box-shadow: 0 1px 1px rgba(0,0,0,0.2), inset 0 1px 1px rgba(0,0,0,0.1);
    background: #ccc;
}

.comment:hover:before {
    background: orange;
}

.comment .text:before {
    top: 18px;
    left: 78px;
    width: 9px;
    height: 9px;
    border-width: 0 0 1px 1px;
    border-style: solid;
    border-color: #e5e5e5;
    background: #fff;
    -webkit-transform: rotate(45deg);
    -moz-transform: rotate(45deg);
    -ms-transform: rotate(45deg);
    -o-transform: rotate(45deg);
}		
	.wrapper{
		//padding-top: 20px;
		padding-top: 50px;
	}

	input.parsley-error,
	select.parsley-error,
	textarea.parsley-error {    
		border-color:#843534;
		box-shadow: none;
	}


	input.parsley-error:focus,
	select.parsley-error:focus,
	textarea.parsley-error:focus {    
		border-color:#843534;
		box-shadow:inset 0 1px 1px rgba(0,0,0,.075),0 0 6px #ce8483
	}


	.parsley-errors-list {
		list-style-type: none;
		opacity: 0;
		transition: all .3s ease-in;

		color: #d16e6c;
		margin-top: 5px;
		margin-bottom: 0;
	  padding-left: 0;
	}

	.parsley-errors-list.filled {
		opacity: 1;
		color: #a94442;
	}
	
	
	body,html{
    height: 100%;
}

/* remove outer padding */
.container-main .row{
    padding: 0px;
    margin: 0px;
}

/*Remove rounded coners*/

nav.sidebar.navbar {
    border-radius: 0px;
}

nav.sidebar, .container-main{
    -webkit-transition: margin 200ms ease-out;
    -moz-transition: margin 200ms ease-out;
    -o-transition: margin 200ms ease-out;
    transition: margin 200ms ease-out;
}

/* Icons */
.menu-icon {
    font-size: 20px;
}

/* Add gap to nav and right windows.*/
/*.container-main{
    padding: 10px 10px 0 10px;
}*/

/* Colors */
.navbar-m2p {
    background-color: #00464f;
    border-color: #00464f;
}
.navbar-m2p span, .navbar-m2p a {
    color: #FFFFFF;
}
.active .dropdown-toggle {
    background-color: rgba(126, 169, 39, 0.3);
    border-color: rgba(126, 169, 39, 0.3);
}
.nav .open > a {
    background-color: rgba(126, 169, 39, 0.3);
    border-color: rgba(126, 169, 39, 0.3);
}
.nav li > a:hover, .nav .open > a:hover,
.nav li > a:focus, .nav .open > a:focus,
.nav li > a:active, .nav .open > a:active {
    background-color: rgba(126, 169, 39, 0.3);
}
.nav .open ul > li {
    background-color: rgba(126, 169, 39, 0.4)
}
.navbar-m2p .navbar-nav .open .dropdown-menu>li>a {
    color: #FFFFFF;
    padding: 10px;
}
/* borda menu active */
.navbar-m2p .navbar-nav .active a {
    margin-left: -1px;
    border-left: 5px solid #7ea927;
}
/* Hamburger */
.navbar-toggle {
    background-color: transparent;
    border: 1px solid rgba(126, 169, 39, 0.4);
}
.navbar-toggle .icon-bar,
.navbar-toggle .icon-bar + .icon-bar {
    background-color: #7ea927;
}

nav:hover .forAnimate{
    opacity: 1;
}

.navbar-m2p .dropdown-menu {
    padding: 0px;
}

.nav li.separator {
    padding: 10px 15px;
    text-transform: uppercase;
    background-color: rgba(0, 0, 39, 0.2);
    color: rgba(208, 208, 207, 0.4);
}

/* .....NavBar: Icon only with coloring/layout.....*/

/*small/medium side display*/
@media (min-width: 768px) {

    /*Allow main to be next to Nav*/
    .container-main{
        position: absolute;
        width: calc(100% - 40px); /*keeps 100% minus nav size*/
        margin-left: 40px;
        float: right;
    }

    /*lets nav bar to be showed on mouseover*/
    nav.sidebar:hover + .container-main{
        margin-left: 300px;
    }

    /*Center Brand*/
    nav.sidebar.navbar.sidebar>.container .navbar-brand, .navbar>.container-fluid .navbar-brand {
        margin-left: 0px;
    }
    /*Center Brand*/
    nav.sidebar .navbar-brand, nav.sidebar .navbar-header{
        text-align: center;
        width: 100%;
        margin-left: 0px;
        font-size: 25px;
        line-height: 27px;
    }

    /*Center Icons*/
    nav.sidebar a{
        padding-right: 13px;
    }

    /* Colors/style dropdown box*/
    nav.sidebar .navbar-nav .open .dropdown-menu {
        position: static;
        float: none;
        width: auto;
        margin-top: 0;
        background-color: transparent;
        border: 0;
        -webkit-box-shadow: none;
        box-shadow: none;
    }

    /*allows nav box to use 100% width*/
    nav.sidebar .navbar-collapse, nav.sidebar .container-fluid{
        padding: 0 0px 0 0px;
    }

    /*gives sidebar width/height*/
    nav.sidebar{
        width: 300px;
        height: 100%;
        margin-left: -260px;
        float: left;
        z-index: 8000;
        margin-bottom: 0px;
    }

    /*give sidebar 100% width;*/
    nav.sidebar li {
        width: 100%;
    }

    /* Move nav to full on mouse over*/
    nav.sidebar:hover{
        margin-left: 0px;
    }
    /*for hiden things when navbar hidden*/
    .forAnimate{
        opacity: 0;
    }
}

/* .....NavBar: Fully showing nav bar..... */

@media (min-width: 1330px) {

    /*Allow main to be next to Nav*/
    .container-main{
        width: calc(100% - 300px); /*keeps 100% minus nav size*/
        margin-left: 300px;
    }

    /*Show all nav*/
    nav.sidebar{
        margin-left: 0px;
        float: left;
    }
    /*Show hidden items on nav*/
    nav.sidebar .forAnimate{
        opacity: 1;
    }
}
	</style>
	
	</head>
	</head>