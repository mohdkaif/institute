<div class="widgets">

  <div class="row" >
    <div class="col-md-12">
      <div
          ba-panel
          ba-panel-title="Add Course FeeForm"
          ba-panel-class="with-scroll">
		  
		  <form role="form" ng-submit="addTask()" ng-upload enctype="multipart/form-data" ng-controller="addfeeCtrl" name="feeForm" >
			   <input type="hidden" name="faculty_id" value="{{faculty_id}}" />
			   <div class="form-group">
				<label for="input06">Course</label><br />
				 <div ng-dropdown-multiselect="" options="course" selected-model="example1model" extra-settings="example15settings" ></div>
				
				<!--<am-multiselect  class="" multiple="true" ms-selected ="There are {{selectedCourse.length}} course(s) selected"
									ng-model="selectedCourse" ms-header="Select Some Course"
									options="c.title for c in course"
									ng-required="true"
									change="selected()">
				</am-multiselect>-->
			  </div>
				<input type="hidden" name="oldclass" value="{{example1model}}" />
				
			  <div class="form-group">
				<label for="input07">Payout</label><br />

				<input type="radio" name="payout" class="" ng-model="payout"  id="input07"  value="1"  ng-click="alert()" /> Percent
				<input type="radio" name="payout" class="" ng-model="payout"  id="input07"  value="2" /> Fixed
			  </div>	
			  
			  
			  <div class="form-group" ng-if="payout == 2">
				<label for="input02">Salary</label>
				<input type="text" name="salary" class="form-control" ng-model="salary"  id="input02" placeholder="Salary"   >
			  </div>
			 <div class="form-group" ng-if="payout == 1" >
				<label>Percent</label>
				<input type="text" name="percent" class="form-control" ng-model="percent"   placeholder="Percent" >
			  </div>

			   <div class="form-group">
				<button type="submit" class="btn btn-primary">Add</button>
				<a href="<?php echo site_url('admin/index#/faculties/details/') ?>/{{faculty_id}}" class="btn btn-danger">Close</a>
			  </div>
				
  	  
			</form>
      
	  </div>
    </div>
    
  </div>

</div>
