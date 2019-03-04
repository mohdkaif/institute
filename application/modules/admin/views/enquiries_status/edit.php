<div class="widgets">

  <div class="row" >
    <div class="col-md-12">
      <div
          ba-panel
          ba-panel-title="Edit Enquiry Status Form"
          ba-panel-class="with-scroll">
		  
		  <form role="form" ng-submit="updateTask(tasks[0])" ng-controller="editesCtrl" >
			<div ng-repeat="task in tasks ">
				<input type="hidden" name="id" id="id" ng-model="task.id"  value="{{task.id}}" />
			  <div class="form-group">
				<label for="input01">Title</label>
				<input type="text" name="name" class="form-control" ng-model="task.name"    id="input01" placeholder="Name">
			  </div>
			    <div class="form-group">
				<button type="submit" class="btn btn-primary">Update</button>
				<a href="<?php echo site_url('admin/index#/masters/enquiries_status') ?>" class="btn btn-danger">Close</a>
			  </div>
			</div>	
  	  
			</form>
      
	  </div>
    </div>
    
  </div>

</div>
