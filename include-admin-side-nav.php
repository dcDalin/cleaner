	<nav class="navbar navbar-m2p sidebar" role="navigation">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-sidebar-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-sidebar-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <!-- Dashboard -->
                <li <?php if ($navMenu =="home.php") echo " class=\"active open\""; ?>>
                  <a href="home.php">
                      <span class="pull-right hidden-xs showopacity glyphicon material-icons"></span> Dashboard
                  </a>
                </li>
                <!-- Banner -->
                <li <?php if ($navMenu =="new_clean_module.php") echo " class=\"active\""; ?>>
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <span class="menu-icon pull-right hidden-xs showopacity glyphicon material-icons"></span>
                        Clean Modules <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu forAnimate" role="menu">
                        <li><a href="new_clean_module.php"><i class="material-icons">new</i> New Clean Module</a></li>
                        <li><a href="view_clean_modules.php"><i class="material-icons">view</i> View Clean Modules</a></li>
                    </ul>
                </li>
				
				<li <?php if ($navMenu =="cleaner_register.php") echo " class=\"active\""; ?>>
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <span class="menu-icon pull-right hidden-xs showopacity glyphicon material-icons"></span>
                        Cleaners <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu forAnimate" role="menu">
                        <li><a href="cleaner_register.php"><i class="material-icons">new</i> Cleaner</a></li>
                        <li><a href="view_cleaners.php"><i class="material-icons">view</i> Cleaners</a></li>
                    </ul>
                </li>
				
				<li <?php if ($navMenu =="view_customers.php") echo " class=\"active\""; ?>>
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <span class="menu-icon pull-right hidden-xs showopacity glyphicon material-icons"></span>
                        Customers <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu forAnimate" role="menu">
                        <li><a href="view_customers.php"><i class="material-icons">view</i> Customers</a></li>
                        
                    </ul>
                </li>
                
                <!-- Page -->
                <li <?php if ($navMenu =="view_cleaner_requests.php") echo " class=\"active\""; ?>>
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <span class="menu-icon pull-right hidden-xs showopacity glyphicon material-icons"></span>
                        Operations <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu forAnimate" role="menu">
                        <li><a href="view_cleaner_requests.php"><i class="material-icons">Assign</i> Cleaner</a></li>
                        <li><a href="view_assigned_cleaners.php"><i class="material-icons">View Assigned</i> Cleaners</a></li>
                    </ul>
                </li>
				
				<li <?php if ($navMenu =="comments.php") echo " class=\"active\""; ?>>
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <span class="menu-icon pull-right hidden-xs showopacity glyphicon material-icons"></span>
                        Reviews <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu forAnimate" role="menu">
                        <li><a href="comments.php"><i class="material-icons">View</i> Comments</a></li>
                       
                    </ul>
                </li>
                <!-- Blog -->
               
                <li>
                    <a href="logout.php">
                        <span class="menu-icon pull-right hidden-xs showopacity glyphicon material-icons">exit_to_app</span> Logout
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>