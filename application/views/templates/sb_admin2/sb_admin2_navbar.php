 <title>BPOSys | Dashboard</title>
 <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="<?php echo base_url(); ?>dashboard"><img class="navbar-logo" src="<?php echo base_url(); ?>assets\landing-page\img\bposys-logo-white-solo.png" alt=""></a>
    </div>
    <!-- /.navbar-header -->

    <ul class="nav navbar-top-links navbar-right">
        <!-- /.dropdown -->
        <li class="dropdown">
            <a id="btn-notif" class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-bell fa-fw" id='notif-container'>
                    <?php if ($notifications != ""): ?>
                        <span class="notif-count"><?= count($notifications) ?></span>
                    <?php endif ?>
                </i><i class="fa fa-caret-down"></i>
            </a>
            <ul id="notif-section" class="dropdown-menu dropdown-alerts">
                <!-- notif goes here -->
            </ul>
            <!-- /.dropdown-alerts -->
        </li>
        <!-- /.dropdown -->
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
                <li><a href="<?php echo base_url() ?>profile"><i class="fa fa-user fa-fw"></i> User Profile</a>
                </li>
                </li>
                <li class="divider"></li>
                <li><a href="<?php echo base_url(); ?>auth/logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                </li>
            </ul>
            <!-- /.dropdown-user -->
        </li>
        <!-- /.dropdown -->
    </ul>
    <!-- /.navbar-top-links -->

    <!--/.sidebar -->
    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <li>
                    <a href="<?php echo base_url(); ?>dashboard" class="<?= $title=='dashboard' ? 'active' : '' ?>"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                </li>
                <!-- <li>
                    <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Charts<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="flot.html">Flot Charts</a>
                        </li>
                        <li>
                            <a href="morris.html">Morris.js Charts</a>
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                <!-- </li> -->
                <li>
                  <a href="#" class="<?= $title == 'none' ? 'active' : '' ?>"><i class="fa fa-money" aria-hidden="true"></i>  &nbsp;Bills and Payments</a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="<?php echo base_url(); ?>profile/payment_history" class="<?= $title == 'payment_history' ? 'active' : '' ?>"><i class="fa fa-history" aria-hidden="true"></i> Payment History</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>profile/unsettled_charges" class="<?= $title == 'billings' ? 'active' : '' ?>"><i class="fa fa-table" aria-hidden="true"></i> Unsettled Charges</a>
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                <li>
                    <a href="<?php echo base_url(); ?>profile/owners" class="<?= $title == 'owner' ? 'active' : '' ?>"><i class="fa fa-users fa-fw"></i> Manage Owners</a>
                </li>
                <li>
                    <a href="<?php echo base_url(); ?>profile/businesses" class="<?= $title == 'business' ? 'active' : '' ?>"><i class="fa fa-cubes fa-fw"></i> Manage Businesses</a>
                </li>
                <!-- <li>
                    <a href="#"><i class="fa fa-wrench fa-fw"></i> UI Elements<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="panels-wells.html">Panels and Wells</a>
                        </li>
                        <li>
                            <a href="buttons.html">Buttons</a>
                        </li>
                        <li>
                            <a href="notifications.html">Notifications</a>
                        </li>
                        <li>
                            <a href="typography.html">Typography</a>
                        </li>
                        <li>
                            <a href="icons.html"> Icons</a>
                        </li>
                        <li>
                            <a href="grid.html">Grid</a>
                        </li>
                    </ul> -->
                    <!-- /.nav-second-level -->
                <!-- </li> -->
               <!--  <li>
                    <a href="#"><i class="fa fa-sitemap fa-fw"></i> Multi-Level Dropdown<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="#">Second Level Item</a>
                        </li>
                        <li>
                            <a href="#">Second Level Item</a>
                        </li>
                        <li>
                            <a href="#">Third Level <span class="fa arrow"></span></a>
                            <ul class="nav nav-third-level">
                                <li>
                                    <a href="#">Third Level Item</a>
                                </li>
                                <li>
                                    <a href="#">Third Level Item</a>
                                </li>
                                <li>
                                    <a href="#">Third Level Item</a>
                                </li>
                                <li>
                                    <a href="#">Third Level Item</a>
                                </li>
                            </ul> -->
                            <!-- /.nav-third-level -->
                        <!-- </li> -->
                    <!-- </ul> -->
                    <!-- /.nav-second-level -->
                <!-- </li> -->
               <!--  <li>
                    <a href="#"><i class="fa fa-files-o fa-fw"></i> Sample Pages<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="blank.html">Blank Page</a>
                        </li>
                        <li>
                            <a href="login.html">Login Page</a>
                        </li>
                    </ul> -->
                    <!-- /.nav-second-level -->
                <!-- </li> -->
            </ul>
        </div>
        <!-- /.sidebar-collapse -->
    </div>
    <!-- /.navbar-static-side -->
</nav>

