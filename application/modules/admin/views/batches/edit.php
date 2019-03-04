<div class="widgets">

  <div class="row" >
    <div class="col-md-12">
      <div
          ba-panel
          ba-panel-title="Edit Faculty Form"
          ba-panel-class="with-scroll">
		  
		   <form role="form" ng-submit="updateTask(tasks[0])" ng-upload enctype="multipart/form-data" ng-controller="editbatchCtrl" >
			  <div ng-repeat="task in tasks ">
				<input type="hidden" name="id" id="id" ng-model="id"  value="{{task.id}}" />
			  <div class="form-group">
				<label for="input02">Title</label>
				<input type="text" name="title" class="form-control" ng-model="task.title"  id="input02" placeholder="Title" >
			  </div>
			   <div class="form-group">
				<label for="input01">Course Category</label>
				 <select  name="category_id" ng-model="category_id" class="form-control" id="category_id" ng-change="getClasses();">
					  <option value="" ng-selected="selected">--Select Course Category--</option>
					  <option ng-repeat="item in items" value="{{item.id}}" ng-selected="{{ item.id== task.category_id}}">{{item.name}}</option>
				 </select> 
				 
			  </div>
			  <div class="form-group">
				<label for="input01">Course</label>
				 <select  name="course_id" ng-model="course_id" class="form-control" id="course_id">
					  <option value="" ng-selected="selected">--Select Course--</option>
					  <option ng-repeat="cr in courses" value="{{cr.id}}" ng-selected="{{ cr.id== task.course_id}}">{{cr.title}}</option>
				 </select> 
				 
			  </div>
			 
			  
			  <div class="form-group">
				<label >Duration</label>
				<input type="text" name="duration" class="form-control" ng-model="task.duration" >
			  </div>
			  <div class="form-group">
				<label >Fees</label>
				<input type="text" name="fees" class="form-control" ng-model="task.fees" >
			  </div>
			  <div class="form-group">
				<label >Batch Time</label>
				<input type="text" name="batch_time" class="form-control timepicker" ng-model="task.batch_time" >
			  </div>
			  <div class="form-group">
				<label >Start Date</label>
				<input type="text" name="start_date" class="form-control datepicker" ng-model="task.start_date" ng-blur="getEndDate();" id="start_date"  >
			  </div>
			   <div class="form-group">
				<label >Expected End Date</label>
				<input type="text" name="end_date" class="form-control datepicker" ng-model="task.end_date" id="end_date" value="{{ed}}" >
			  </div>
			 
			<?php /*?> <div class="form-group">
				<label for="input06">Faculty</label><br />
				 <div ng-dropdown-multiselect="" options="faculties" selected-model="selfacultis" extra-settings="example15settings" ></div>
				
			 </div>
				<input type="hidden" name="faculties" value="{{selfacultis}}" />	<?php */?>
				
				<div class="form-group">
				<label for="input08">Faculty</label>
				<select  name="faculty_id" ng-model="faculty_id" class="form-control" id="faculty_id">
					  <option value="" ng-selected="selected">--Select Faculty--</option>
					  <option ng-repeat="f in faculties" value="{{f.id}}" ng-selected="{{ f.id== task.faculty_id}}">{{f.label}}</option>
				 </select>
			</div>
			<div class="form-group">
				<label>Faculty Agreed Fee</label>
				<input type="text" name="agreed_fee" class="form-control" ng-model="task.agreed_fee" id="agreed_fee">
			  </div>
			 <div class="form-group">
				<label for="input08">Description</label>
				<textarea name="description" class="form-control" ng-model="task.description"  id="input08" placeholder="Description" ></textarea>
			  </div>
				
			  <div class="form-group">
				<button type="submit" class="btn btn-primary">Update</button>
				<a href="<?php echo site_url('admin/index#/batches/details') ?>/{{task.id}}" class="btn btn-danger">Close</a>
			  </div>
				
  	  		</div>
			</form>
		  
	  </div>
    </div>
    
  </div>

</div>
