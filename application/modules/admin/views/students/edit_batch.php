<div class="widgets">

  <div class="row" >
    <div class="col-md-12">
      <div
          ba-panel
          ba-panel-title="Edit Student Batch Form"
          ba-panel-class="with-scroll">
		  
		  <form role="form" ng-submit="updateTask(tasks[0])" ng-upload enctype="multipart/form-data" ng-controller="editbatchstuCtrl" >
		   <div ng-repeat="task in tasks ">
		  	<input type="hidden" name="student_id" ng-model="student_id" value="{{task.student_id}}" />
			<input type="hidden" name="id" id="id" ng-model="id"  value="{{task.id}}" />
			 <div class="form-group">
				<label for="input01">Course</label>
				 <select  name="course_id" ng-model="course_id" class="form-control" id="course_id" ng-change="getBatches();">
					  <option value="" ng-selected="selected">--Select Course--</option>
					  <option ng-repeat="cr in course" value="{{cr.id}}" ng-selected="{{ cr.id== task.course_id}}">{{cr.title}}</option>
				 </select> 
			</div>
			<div class="form-group">
				<label for="input01">Batch</label>
				 <select  name="batch_id" ng-model="batch_id" class="form-control" id="batch_id">
					  <option value="" ng-selected="selected">--Select Batch--</option>
					  <option ng-repeat="bt in batches" value="{{bt.id}}" ng-selected="{{ bt.id== task.batch_id}}">{{bt.title}}</option>
				 </select> 
			</div>
			
				
			  <div class="form-group">
				<button type="submit" class="btn btn-primary">Update</button>
					<a href="<?php echo site_url('admin/index#/students/details/') ?>/{{student_id}}" class="btn btn-danger">Close</a>
			  </div>
		</div>		
  	  
			</form>
      
	  </div>
    </div>
    
  </div>

</div>
