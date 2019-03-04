<div class="widgets">

  <div class="row" >
    <div class="col-md-12">
      <div
          ba-panel
          ba-panel-title="View Todo"
          ba-panel-class="with-scroll" >
		  <div ng-controller="VIEWTodoCtrl">
			<div ng-repeat="task in tasks ">
			 
			 <div class="row">
			  <div class="form-group">
				<div class="col-md-2 "><label for="input01">Title</label></div>
				<div class="col-md-2 " >{{task.title}}</div>
			  </div>
			 </div> 
			 <div class="row">
			  <div class="form-group">
				<div class="col-md-2 "><label for="input01">Date</label></div>
				<div class="col-md-2 " >{{ task.date | date :  "dd.MM.y" }}</div>
			  </div>
			 </div> 
			 <div class="row">
			  <div class="form-group">
				<div class="col-md-2 "><label for="input01">Description</label></div>
				<div class="col-md-2 " >{{task.description}}</div>
			  </div>
			 </div> 
			 <div class="row">
			  <div class="form-group">
				<div class="col-md-2 "><label for="input01">Status</label></div>
				<div class="col-md-2 " >{{task.status==0 ? 'Inactive' : 'Active'}}</div>
			  </div>
			 </div> 
			 
			   
			  
			    <div class="form-group">
				<a href="<?php echo site_url('admin/index#/todo') ?>" class="btn btn-danger">Close</a>
			  </div>
			</div>	
  	  	</div>
	  </div>
    </div>
    
  </div>

</div>
