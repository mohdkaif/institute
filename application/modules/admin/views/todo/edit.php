<div class="widgets">

  <div class="row" >
    <div class="col-md-12">
      <div
          ba-panel
          ba-panel-title="Edit Todo Form"
          ba-panel-class="with-scroll">
		  
		  <form role="form" ng-submit="updateTask(tasks[0])" ng-controller="EDITTodoCtrl" >
			<div ng-repeat="task in tasks ">
				<input type="hidden" name="id" id="id" ng-model="task.id"  value="{{task.id}}" />
			  
			 <div class="form-group">
			  <div class="row">
				<div class="col-md-6">
					<label for="input01">Title </label>
				<input type="text" name="title" class="form-control" ng-model="task.title"    id="input01" placeholder="Title">
				</div>	
				<div class="col-md-6">
				<label for="input02">Date</label>
				<input type="text" name="date" class="form-control datepicker" ng-model="task.date"  id="input02" placeholder="Date" autocomplete="off">
				</div>	
			  </div>
			 </div>
			 
		
			 <div class="form-group">
			  <div class="row">
				<div class="col-md-12">
				<label for="textarea01">Description</label>
				<textarea placeholder="Description" class="form-control" name="description" ng-model="task.description"  id="textarea01"></textarea>
				</div>	
			  </div>
			 </div>
			 
			 
			 <div class="form-group">
			  <div class="row">
				<div class="col-md-6">
				<label class="checkbox-inline custom-checkbox nowrap">
				  		<input type="checkbox" id="status"  name="status"  ng-model="task.status" value="1" ng-true-value="'1'" ng-false-value="'0'"   >
					
					<span><b>Active</b></span>
				  </label>
				</div>	
			  </div>
			 </div>
			   
			  
			    <div class="form-group">
				<button type="submit" class="btn btn-primary">Update</button>
				<a href="<?php echo site_url('admin/index#/todo') ?>" class="btn btn-danger">Close</a>
			  </div>
			</div>	
  	  
			</form>
      
	  </div>
    </div>
    
  </div>

</div>
