<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
            <img src="<?php echo base_url();?>assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Admin</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
<!--      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>-->
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li id="nav-dashboard"><a href="<?php echo base_url();?>Admin/dashboard"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
        <li id="nav-trip_planner"><a href="<?php echo base_url();?>Admin/trip_planner"><i class="fa fa-map"></i> <span>Trip Planner</span></a></li>
        <!-- <li id="nav-rewards"><a href="<?php echo base_url();?>Admin/rewards"><i class="fa fa-trophy"></i> <span>Rewards</span></a></li> -->
        <li class="treeview" id="nav-events">
          <a href="#">
            <i class="fa fa-television"></i> <span>Events</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li id="nav-events"><a href="<?php echo base_url();?>Admin/events"><i class="fa fa-circle-o"></i> Events</a></li>
            <li><a href="<?php echo base_url();?>Admin/mice"><i class="fa fa-circle-o"></i> Mice</a></li>
            <li><a href="<?php echo base_url();?>Admin/destination_wedding"><i class="fa fa-circle-o"></i> Destination Wedding</a></li>
            <li><a href="<?php echo base_url();?>Admin/eco_tour"><i class="fa fa-circle-o"></i> Eco Tour</a></li>
          </ul>
        </li>
        <li class="treeview" id="nav-activity">
          <a href="#">
            <i class="fa fa-television"></i> <span>Activities</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <?php foreach($content_sidebar as $content3){ ?>
            <li id="nav-<?php echo str_replace(" ", "_", $content3['type']);?>"><a href="<?php echo base_url();?>Admin/activity/<?php echo $content3['activity_name']?>"><i class="fa fa-circle-o"></i> <?php echo $content3['type']?></a></li>
          <?php }?>
          </ul>
        </li>

        <li class="treeview" id="nav-tours">
          <a href="#">
            <i class="fa fa-plane"></i> <span>Tours</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li id="nav-holiday"><a href="<?php echo base_url();?>Admin/holiday_packages"><i class="fa fa-circle-o"></i>Holiday Packages</a></li>
            <li id="nav-honeymoon"><a href="<?php echo base_url();?>Admin/honeymoon_packages"><i class="fa fa-circle-o"></i>Honeymoon Packages</a></li>
          </ul>
        </li>
        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>