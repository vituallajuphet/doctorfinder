  <!-- Left side column. contains the sidebar -->
  <div id="app2">
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url(); ?>assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{fname}}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form 
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li :class="{'active': this.pageLink=='user'}"><a :href="url + 'admin/user'"><i class="fa fa-user text-blue"></i> <span>User</span></a></li>
        <li :class="{'active': this.pageLink=='email'}"><a :href="url +'admin'"><i class="fa fa-envelope text-blue"></i> <span>Emails</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>SMTP</span></a></li>
        <li><a href="javascript:;"><i class="fa fa-cog text-gray"></i> <span>Settings</span></a></li>
        <li><a href="javascript:;"><i class="fa fa-question-circle text-gray"></i> <span>About</span></a></li>
        <!-- <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li> -->
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
  </div>