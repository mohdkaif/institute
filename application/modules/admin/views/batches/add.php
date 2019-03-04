<div class="widgets">

  <div class="row" >
    <div class="col-md-12">
      <div
          ba-panel
          ba-panel-title="Add Batch Form"
          ba-panel-class="with-scroll">
		  
		  <form role="form" ng-submit="addTask()" ng-upload enctype="multipart/form-data" ng-controller="addbatchCtrl" >
			  <div class="form-group">
				<label for="input02">Title</label>
				<input type="text" name="title" class="form-control" ng-model="title"  id="input02" placeholder="Title" >
			  </div>
			   <div class="form-group">
				<label for="input01">Course Category</label>
				 <select  name="category_id" ng-model="category_id" id="category_id" class="form-control" ng-change="getClasses();">
					  <option value="" ng-selected="selected">--Select Course Category--</option>
					  <option ng-repeat="item in items" value="{{item.id}}">{{item.name}}</option>
				 </select> 
				 
			  </div>
			   <div class="form-group">
				<label for="input01">Course</label>
				 <select  name="course_id" ng-model="course_id" class="form-control" id="course_id">
					  <option value="" ng-selected="selected">--Select Course--</option>
					  <option ng-repeat="cr in courses" value="{{cr.id}}">{{cr.title}}</option>
				 </select> 
				 
			  </div>
			 
			  
			  <div class="form-group">
				<label >Duration</label>
				<input type="text" name="duration" class="form-control" ng-model="duration" >
			  </div>
			  <div class="form-group">
				<label >Fees</label>
				<input type="text" name="fees" class="form-control" ng-model="fees" >
			  </div>
			  <div class="form-group">
				<label >Batch Time</label>
				<input type="text" name="batch_time" class="form-control timepicker" ng-model="batch_time" >
			  </div>
			  <div class="form-group">
				<label >Start Date</label>
				<input type="text" name="start_date" class="form-control datepicker" ng-model="start_date" ng-blur="getEndDate();" id="start_date" >
			  </div>
			  <div class="form-group">
				<label >Expected End Date</label>
				<input type="text" name="end_date" class="form-control datepicker" ng-model="end_date" id="end_date" value="{{end_date}}" >
			  </div>
			 <?php /*?><div class="form-group">
				<label for="input06">Faculty</label><br />
				 <div ng-dropdown-multiselect="" options="faculties" selected-model="example1model" extra-settings="example15settings" ></div>
				
			 </div>
			 <input type="hidden" name="faculties" value="{{example1model}}" />	
			 <?php */?>
			  <div class="form-group">
				<label for="input08">Faculty</label>
				<select  name="faculty_id" ng-model="faculty_id" class="form-control" id="faculty_id">
					  <option value="" ng-selected="selected">--Select Faculty--</option>
					  <option ng-repeat="f in faculties" value="{{f.id}}">{{f.label}}</option>
				 </select>
			</div>
			 <div class="form-group">
				<label >Faculty Agreed Fee</label>
				<input type="text" name="agreed_fee" class="form-control" ng-model="agreed_fee" id="agreed_fee">
			  </div>
			 <div class="form-group">
				<label for="input08">Description</label>
				<textarea name="description" class="form-control" ng-model="description"  id="input08" placeholder="Description" ></textarea>
			  </div>
				
			  <div class="form-group">
				<button type="submit" class="btn btn-primary">Add</button>
				<a href="<?php echo site_url('admin/index#/batches') ?>" class="btn btn-danger">Close</a>
			  </div>
				
  	  
			</form>
      
	  </div>
    </div>
    
  </div>

</div>
