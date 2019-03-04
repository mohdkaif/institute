<div class="widgets">

  <div class="row" >
    <div class="col-md-12">
      <div
          ba-panel
          ba-panel-title="Edit Faculty File Form"
          ba-panel-class="with-scroll">
		  
		  <form role="form" ng-submit="updateTask(tasks[0])" ng-upload enctype="multipart/form-data" ng-controller="editfilesfacCtrl" >
		  <div ng-repeat="task in tasks ">
		  	<input type="hidden" name="faculty_id" ng-model="faculty_id" value="{{task.user_id}}" />
			<input type="hidden" name="id" ng-model="id" value="{{task.id}}" />
			 <div class="form-group">
				<label for="title">Title</label>
				 <input type="text" name="title" class="form-control" ng-model="task.title" id="title" />
			</div>
			 <div class="form-group">
				<label >Upload</label>
				<input type="file" id="i_file" name="file"  ng-file-select="onFileSelect($files)"    />
				<input type="hidden" name="image" ng-model="image" value="{{task.file_name}}" id="img"  />

			  </div>
			   <div class="form-group">
			   <a class="btn btn-info"  href="<?php echo base_url('assets/bluradmin/uploads/files/')?>/{{task.file_name}}" download ><i class="ion-ios-download"></i> Download</a>
			  </div>
			  <div class="form-group">
				<button type="submit" class="btn btn-primary">Update</button>
					<a href="<?php echo site_url('admin/index#/faculties/details/') ?>/{{task.user_id}}" class="btn btn-danger">Close</a>
			  </div>
				
  	  		</div>
			</form>
      
	  </div>
    </div>
    
  </div>

</div>
