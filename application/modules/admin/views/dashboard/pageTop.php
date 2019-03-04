<div class="page-top clearfix" scroll-position="scrolled" max-height="50" ng-class="{'scrolled': scrolled}">
  <a href="#/dashboard" class="al-logo clearfix"><span>institute</span></a>
  <a href class="collapse-menu-link ion-navicon" ba-sidebar-toggle-menu></a>


  <div class="user-profile clearfix">
    <div class="al-user-profile" uib-dropdown>
      <a uib-dropdown-toggle class="profile-toggle-link">
	  <?php if(!empty($user->image)){?>
        <img ng-src="<?php echo base_url('assets/bluradmin/uploads/images/'.$user->image)?>">
      <?php }else{ ?>
	    <img ng-src="<?php echo base_url('assets/bluradmin/uploads/avatar5.png')?>">
	  <?php } ?>
	  </a>
      <ul  class="top-dropdown-menu profile-dropdown" uib-dropdown-menu>
        <li><i class="dropdown-arr"></i></li>
    <?php /*?>    <li><a href="#/profile"><i class="fa fa-user"></i>Profile</a></li>
        <li><a href><i class="fa fa-cog"></i>Settings</a></li><?php */?>
        <li><a href='<?php echo site_url('admin/login/logout') ?>' class="signout"><i class="fa fa-power-off"></i>Sign out</a></li>
      </ul>
    </div>
    <msg-center></msg-center>
  </div>
</div>