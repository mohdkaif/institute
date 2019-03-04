<div class="widgets">

  <div class="row" >
    <div class="col-md-12">
      <div
          ba-panel
          ba-panel-title="Edit Course Form"
          ba-panel-class="with-scroll">
		  
		  <form role="form" ng-submit="updateTask(tasks[0])" ng-controller="editcCtrl" >
			<div ng-repeat="task in tasks ">
				<input type="hidden" name="id" id="id" ng-model="task.id"  value="{{task.id}}" />
			  <div class="form-group">
				<label for="input01">Title</label>
				<input type="text" name="title" class="form-control" ng-model="task.title"    id="input01" placeholder="Title">
			  </div>
			  	
			 <div class="form-group">
				<label for="cc">Course Category</label>
				 <select  name="course_category" ng-model="task.category_id" class="form-control" id="cc">
					  <option value="" ng-selected="selected">--Select Course Category--</option>
					  <option ng-repeat="item in items" value="{{item.id}}"  ng-selected="{{ item.id== task.category_id}}">{{item.name}}</option>
				 </select> 
				 
			  </div>
			 <div class="form-group">
				
					<div class="col-md-6">
						<label for="input02">Duration</label>
						<input type="number" name="duration" class="form-control" ng-model="task.duration" value="{{task.duration}}"  id="input02" placeholder="Duration" >
					</div>
					<div class="col-md-6">
						<label for="input07">Duration Type</label>
						<select name="duration_type" class="form-control" id="input07">
								<option value="1" ng-selected="{{ 1== task.duration_type}}">Hours</option>
								<option value="2" ng-selected="{{ 2== task.duration_type}}">Days</option>
						</select>
					</div>	
			  </div>
			   <div class="form-group">
				<label for="input03">Fees</label>
				<input type="text" name="fees" class="form-control" ng-model="task.fees"  id="input03" placeholder="Fees" >
			  </div>
			   
			  
			  <div class="form-group">
				<label for="textarea01">Description</label>
				<textarea placeholder="Description" class="form-control" name="description" ng-model="task.description"  id="textarea01"></textarea>
			  </div>
			   
			  
			  
			  <div class="form-group">
				<button type="submit" class="btn btn-primary">Update</button>
				<a href="<?php echo site_url('admin/index#/course/details/') ?>/{{task.id}}" class="btn btn-danger">Close</a>
			  </div>
			</div>	
  	  
			</form>
      
	  </div>
    </div>
    
  </div>

</div>
