<div class="widgets">

  <div class="row" >
    <div class="col-md-12">
      <div
          ba-panel
          ba-panel-title="Add Student Files"
          ba-panel-class="with-scroll">
		  
		  <form role="form" ng-submit="addTask()" ng-upload enctype="multipart/form-data" ng-controller="addfilesstuCtrl" >
		  	<input type="hidden" name="student_id" ng-model="student_id" value="{{student_id}}" />
			 <div class="form-group">
				<label for="title">Title</label>
				 <input type="text" name="title" class="form-control" ng-model="title" id="title" />
			</div>
			 <div class="form-group">
				<label >Upload</label>
				<input type="file" id="i_file" name="file"  ng-file-select="onFileSelect($files)"    />
				<input type="hidden" name="image" ng-model="image" value="{{task.image}}" id="img"  />

			  </div>

			  <div class="form-group">
					<button type="submit" class="btn btn-primary">Add</button>
					<a href="<?php echo site_url('admin/index#/students/details/') ?>/{{student_id}}" class="btn btn-danger">Close</a>
			  </div>
				
  	  
			</form>
      
	  </div>
    </div>
    
  </div>

</div>
