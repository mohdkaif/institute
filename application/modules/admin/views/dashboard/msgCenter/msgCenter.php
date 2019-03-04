<ul class="al-msg-center clearfix">
  <li uib-dropdown>
 	
    <a href uib-dropdown-toggle >
     
	  <i class="fa fa-bell-o"></i><span ng-if="count > 0">{{count}}</span>

      <div class="notification-ring"></div>
    </a>
	
    <div uib-dropdown-menu class="top-dropdown-menu">
      <i class="dropdown-arr"></i>

      <div class="header clearfix">
        <strong>Batch Ending Notifications</strong>
      </div>
      <div class="msg-list">
        <a href class="clearfix" ng-repeat="msg in notifications">
          <div class="img-area"><i class="fa fa-clock-o"></i></div>
          <div class="msg-area">
		  		{{msg.template}}
          </div>
        </a>
      </div>
      <a href="<?php echo site_url('/admin/index#/notifications')?>">See all notifications</a>
    </div>
  </li>
</ul>