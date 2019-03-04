<div class="widgets">

  <div class="row" >
    <div class="col-md-12">
      <div
          ba-panel
          ba-panel-title="Add Enquiry/Lead Form"
          ba-panel-class="with-scroll">
		  
		  <form role="form" ng-submit="addTask()" ng-controller="addenqCtrl" name="enqForm" >
			  <div class="form-group">
				<label for="input01">Date Time </label>
				<input type="text" name="date_time" class="form-control datetimepicker" ng-model="date_time"  id="input01" placeholder="Date Time">
				 
			  </div>
			  <div class="form-group">
				<label for="input02">Name</label>
				<input type="text" name="name" class="form-control" ng-model="name"  id="input02" placeholder="Name" >
			  </div>
			   <div class="form-group">
				<label for="input07">Gender</label><br />

				<input type="radio" name="gender" class="" ng-model="gender"  id="input07"  value="Male" /> Male
				<input type="radio" name="gender" class="" ng-model="gender"  id="input07"  value="Female" /> Female
			  </div>
			  <div class="form-group">
				<label for="input08">Dob</label>
				<input type="text" name="dob" class="form-control datepicker" ng-model="dob"  id="input08" placeholder="DOB" >
			  </div>
			   
			
			   <div class="form-group">
				<label for="input03">Mobile</label>
				<input type="text" name="mobile" class="form-control" ng-model="mobile"  id="input03" placeholder="Mobile" >
			  </div>
			  <div class="form-group">
				<label for="input04">Preferred Time</label>
				<input type="text" name="preferred_time" class="form-control timepicker" ng-model="preferred_time"  id="input04" placeholder="Preferred Time" >
			  </div>
			  <div class="form-group">
				<label for="input05">Status</label>
				 <select  name="status" ng-model="status" class="form-control" id="input05">
					  <option value="" >--Select Enquiry Status--</option>
					   <option ng-repeat="item in items" value="{{item.id}}">{{item.name}}</option>
				 </select> 
				 
			  </div>
			  <div class="form-group">
				<label for="input06">Course</label>
				<select  name="course_id" ng-model="course_id" class="form-control"   id="input06">
					  <option value="" >--Select Course--</option>
					  <option ng-repeat="cr in course" value="{{cr.id}}">{{cr.title}}</option>
				 </select>
			  </div>
			  
			  <div class="form-group">
				<label for="input09">Remark</label>
				<textarea placeholder="Remark" class="form-control" name="remark" ng-model="remark"  id="input09"></textarea>
			  </div>
			   
			   <div class="form-group">
				<label for="input10">Handeled By</label>
				<input type="text" name="handeled_by" class="form-control" ng-model="handeled_by"  id="input10" placeholder="Handeled By" >
			  </div>
			  
			   <div class="form-group">
				<button type="submit" class="btn btn-primary">Add</button>
				<a href="<?php echo site_url('admin/index#/enquiries') ?>" class="btn btn-danger">Close</a>
			  </div>
				
  	  
			</form>
      
	  </div>
    </div>
    
  </div>

</div>
