<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div id="apps">
<div class="wrapper">
    <header class="main-header">
    <!-- Logo -->
    <a href="<?php echo base_url("admin"); ?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>WMD</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>WebDev </b>Tool</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu" :class="{'active' : pageLink == 'profile'}">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo base_url(); ?>assets/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs">{{fname}}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php echo base_url(); ?>assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                <p>
                  <?php echo $this->session->userdata("full_name"); ?>
                  <!-- <small>Member since Nov. 2012</small> -->
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <!-- <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div> -->
                <div class="pull-left" v-if="pageLink != 'profile'">
                <a href="<?=base_url('admin/profile')?>" class="btn btn-default btn-flat">My Profile</a>
                </div>

                <div class="pull-right">
                  <a href="<?php echo base_url("logout"); ?>" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            
            <a href="<?php echo base_url("logout"); ?>"> Sign Out   <i class="sign_out fa fa-sign-out"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>