<div class="widgets">

  <div class="row" >
    <div class="col-md-12">
      <div
          ba-panel
          ba-panel-title="Edit Course Fee Form"
          ba-panel-class="with-scroll">
		  
		  <form role="form" ng-submit="updateTask(tasks[0])" ng-upload enctype="multipart/form-data" ng-controller="editfeeCtrl" name="feeForm" >
			 <div ng-repeat="task in tasks ">
			  <input type="hidden" name="id" id="id" ng-model="id"  value="{{task.id}}" />
			   <input type="hidden" name="faculty_id" id="faculty_id" ng-model="faculty_id"  value="{{task.faculty_id}}" />
			   <div class="form-group">
				<label for="input06">Course</label><br />
				 <div ng-dropdown-multiselect="" options="course" selected-model="selcourse" extra-settings="example15settings" ></div>
				
				<!--<am-multiselect  class="" multiple="true" ms-selected ="There are {{selectedCourse.length}} course(s) selected"
									ng-model="selectedCourse" ms-header="Select Some Course"
									options="c.title for c in course"
									ng-required="true"
									change="selected()">
				</am-multiselect>-->
			  </div>
				<input type="hidden" name="oldclass" value="{{selcourse}}" />
				
			  <div class="form-group">
				<label for="input07">Payout</label><br />

				<input type="radio" name="payout" class="" ng-model="task.payout"  id="input07"  value="1" ng-selected="{{ 1	== task.payout}}"  /> Percent
				<input type="radio" name="payout" class="" ng-model="task.payout"  id="input07"  value="2" ng-selected="{{ 2	== task.payout}}" /> Fixed
			  </div>	
			  
			  
			  <div class="form-group" ng-if="task.payout == 2">
				<label for="input02">Salary</label>
				<input type="text" name="salary" class="form-control" ng-model="task.salary"  id="input02" placeholder="Salary" value="{{task.salary}}"   > 
			  </div>
			 <div class="form-group" ng-if="task.payout == 1" >
				<label>Percent</label>
				<input type="text" name="percent" class="form-control" ng-model="task.percent"   placeholder="Percent" >
			  </div>

			   <div class="form-group">
				<button type="submit" class="btn btn-primary">Update</button>
				<a href="<?php echo site_url('admin/index#/faculties/details/') ?>/{{task.id}}" class="btn btn-danger">Close</a>
			  </div>
				
  	  		</div>
			</form>
      
	  </div>
    </div>
    
  </div>

</div>
