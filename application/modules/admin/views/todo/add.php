<div class="widgets">

  <div class="row" >
    <div class="col-md-12">
      <div
          ba-panel
          ba-panel-title="Add Todo Form"
          ba-panel-class="with-scroll">
		  
		  <form role="form" ng-submit="addTask()" ng-controller="ADDTodoCtrl" name="todoForm" >
			 
			 <div class="form-group">
			  <div class="row">
				<div class="col-md-6">
					<label for="input01">Title </label>
				<input type="text" name="title" class="form-control" ng-model="taskTitle"  id="input01" placeholder="Title">
				</div>
				<div class="col-md-6">
					<label for="input02">Date </label>
				<input type="text" name="date" class="form-control datepicker" ng-model="taskDate"  id="input02" placeholder="Date" autocomplete="off">
				</div>		
			  </div>
			 </div>
			
			 <div class="form-group">
			  <div class="row">
				<div class="col-md-12">
				<label for="textarea01">Description</label>
				<textarea placeholder="Description" class="form-control" name="description" ng-model="taskDescription"  id="textarea01"></textarea>
				</div>	
			  </div>
			 </div>  	
			 
			 <div class="form-group">
			  <div class="row">
				<div class="col-md-6">
				<label class="checkbox-inline custom-checkbox nowrap">
					<input type="checkbox" id="inlineCheckbox01" value="1" name="status" ng-model="taskStatus">
					<span><b>Active</b></span>
				  </label>
				  
				</div>	
			  </div>
			 </div>  		
			    <div class="form-group">
				<button type="submit" class="btn btn-primary">Add task</button>
				<a href="<?php echo site_url('admin/index#/todo') ?>" class="btn btn-danger">Close</a>
			  </div>
				
  	  
			</form>
      
	  </div>
    </div>
    
  </div>

</div>
