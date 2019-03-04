<div class="widgets">

  <div class="row" >
    <div class="col-md-12">
      <div
          ba-panel
          ba-panel-title="View Inventory"
          ba-panel-class="with-scroll">
		  
		   <form role="form" ng-submit="updateTask(tasks[0])" ng-upload enctype="multipart/form-data" ng-controller="viewinventoryCtrl" >
			  <div ng-repeat="task in tasks ">
				<input type="hidden" name="id" id="id" ng-model="id"  value="{{task.id}}" />
			<div class="form-group">
			  <div class="row">
				<div class="col-md-2">
				<label for="input02">Title</label>
				</div>
				<div class="col-md-4">
				{{task.title}}
				</div>	
			  </div>
			 </div>  
			 
			 <div class="form-group">
			  <div class="row">
				<div class="col-md-2">
				<label for="input02">Price</label>
				</div>
				<div class="col-md-4">
				{{task.price}}
				</div>	
			  </div>
			 </div>  
			 
			 <div class="form-group">
			  <div class="row">
				<div class="col-md-2">
				<label for="input02">Quantity/Stock</label>
				</div>
				<div class="col-md-4">
				{{task.qty}}
				</div>	
			  </div>
			 </div>  
			 
			  
			 <div class="form-group">
			  <div class="row">
				<div class="col-md-2">
				<label for="textarea01">Description</label>
				</div>
				<div class="col-md-10">
				{{task.description}}
				</div>	
			  </div>
			 </div>  	
				
			  <div class="form-group">
				<a href="<?php echo site_url('admin/index#/inventory') ?>" class="btn btn-danger">Close</a>
			  </div>
				
  	  		</div>
			</form>
		  
	  </div>
    </div>
    
  </div>

</div>
