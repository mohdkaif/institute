<div class="widgets">

  <div class="row" >
    <div class="col-md-12">
      <div
          ba-panel
          ba-panel-title="Edit Notes"
          ba-panel-class="with-scroll">
		  
		  <form role="form" ng-submit="updateTask(tasks[0])" ng-upload enctype="multipart/form-data" ng-controller="editnotesfacCtrl" >
		  	<div ng-repeat="task in tasks ">
			<input type="hidden" name="faculty_id" ng-model="faculty_id" value="{{task.user_id}}" />
			<input type="hidden" name="id" ng-model="id" value="{{task.id}}" />
			
			 <div class="form-group">
				<label for="input01">Notes</label>
				 <textarea name="notes" class="form-control" ng-modal="task.notes">{{task.notes}}</textarea>
			</div>

			  <div class="form-group">
				<button type="submit" class="btn btn-primary">Update</button>
					<a href="<?php echo site_url('admin/index#/students/details/') ?>/{{task.user_id}}" class="btn btn-danger">Close</a>
			  </div>
				
  	  	</div>
			</form>
      
	  </div>
    </div>
    
  </div>

</div>
