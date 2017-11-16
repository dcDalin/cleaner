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
               
                <!-- Tags -->
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon material-icons">label</span>
                        Operations <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu forAnimate" role="menu">
                        <li><a href="request_cleaner.php"> <i class="material-icons">Request</i> Cleaner</a></li>
                        <li><a href="requested_cleaners.php"> <i class="material-icons">View Requested</i> Cleaners</a></li>
                    </ul>
                </li>
                <li class="separator">System</li>
                <!-- Users -->
                
                <!-- Exit -->
                <li>
                    <a href="logout.php">
                        <span class="menu-icon pull-right hidden-xs showopacity glyphicon material-icons">exit_to_app</span> Log Out
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>