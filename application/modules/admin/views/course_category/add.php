<div class="widgets">

  <div class="row" >
    <div class="col-md-12">
      <div
          ba-panel
          ba-panel-title="Add Course Category Form"
          ba-panel-class="with-scroll">
		  
		  <form role="form" ng-submit="addTask()" ng-controller="addccCtrl" name="todoForm" >
			  <div class="form-group">
				<label for="input01">Name</label>
				<input type="text" name="name" class="form-control" ng-model="taskName"  id="input01" placeholder="Name">
				 
			  </div>
			    <div class="form-group">
				<button type="submit" class="btn btn-primary">Add</button>
				<a href="<?php echo site_url('admin/index#/masters/course_category') ?>" class="btn btn-danger">Close</a>
			  </div>
				
  	  
			</form>
      
	  </div>
    </div>
    
  </div>

</div>
