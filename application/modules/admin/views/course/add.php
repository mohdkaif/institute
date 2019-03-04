<div class="widgets">

  <div class="row" >
    <div class="col-md-12">
      <div
          ba-panel
          ba-panel-title="Add Course Form"
          ba-panel-class="with-scroll">
		  
		  <form role="form" ng-submit="addTask()" ng-controller="addcCtrl" name="courseForm" >
			  <div class="form-group">
				<label for="input01">Title </label>
				<input type="text" name="title" class="form-control" ng-model="taskTitle"  id="input01" placeholder="Title">
				 
			  </div>
			  <div class="form-group">
				<label for="input01">Course Category</label>
				 <select  name="course_category" ng-model="course_category" class="form-control">
					  <option value="" ng-selected="selected">--Select Course Category--</option>
					  <option ng-repeat="item in items" value="{{item.id}}">{{item.name}}</option>
				 </select> 
				 
			  </div>
			  <div class="form-group">
				
					<div class="col-md-6">
						<label for="input02">Duration</label>
						<input type="number" name="duration" class="form-control" ng-model="taskDuration"  id="input02" placeholder="Duration" >
					</div>
					<div class="col-md-6">
						<label for="input07">Duration Type</label>
						<select name="duration_type" class="form-control" id="input07" name="duration_type">
								<option value="1">Hours</option>
								<option value="2">Days</option>
						</select>
					</div>	
			  </div>
			   <div class="form-group">
				<label for="input03">Fees</label>
				<input type="text" name="fees" class="form-control" ng-model="taskFees"  id="input03" placeholder="Fees" >
			  </div>
			  <div class="form-group">
				<label for="textarea01">Description</label>
				<textarea placeholder="Description" class="form-control" name="description" ng-model="taskDescription"  id="textarea01"></textarea>
			  </div>
			   
			   <div class="form-group">
				<button type="submit" class="btn btn-primary">Add</button>
				<a href="<?php echo site_url('admin/index#/course') ?>" class="btn btn-danger">Close</a>
			  </div>
				
  	  
			</form>
      
	  </div>
    </div>
    
  </div>

</div>
