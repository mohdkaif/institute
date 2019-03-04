<div class="widgets">

  <div class="row" >
    <div class="col-md-12">
      <div
          ba-panel
          ba-panel-title="Edit Inventory"
          ba-panel-class="with-scroll">
		  
		   <form role="form" ng-submit="updateTask(tasks[0])" ng-upload enctype="multipart/form-data" ng-controller="editinventoryCtrl" >
			  <div ng-repeat="task in tasks ">
				<input type="hidden" name="id" id="id" ng-model="id"  value="{{task.id}}" />
			<div class="form-group">
			  <div class="row">
				<div class="col-md-4">
				<label for="input02">Title</label>
				<input type="text" name="title" class="form-control" ng-model="task.title"  id="input02" placeholder="Title" >
				</div>	
			  </div>
			 </div>  
			 
			 <div class="form-group">
			  <div class="row">
				<div class="col-md-4">
				<label for="input02">Price</label>
				<input type="text" name="price" class="form-control" ng-model="task.price"placeholder="Price" >
				</div>	
			  </div>
			 </div>  
			 
			 <div class="form-group">
			  <div class="row">
				<div class="col-md-4">
				<label for="input02">Quantity/Stock</label>
				<input type="text" name="qty" class="form-control" ng-model="task.qty" placeholder="Quantity/Stock" >
				</div>	
			  </div>
			 </div>  
			 
			  
			 <div class="form-group">
			  <div class="row">
				<div class="col-md-12">
				<label for="textarea01">Description</label>
				<textarea placeholder="Description" class="form-control" name="description" ng-model="task.description"  id="textarea01">{{task.description}}</textarea>
				</div>	
			  </div>
			 </div>  	
				
			  <div class="form-group">
				<button type="submit" class="btn btn-primary">Update</button>
				<a href="<?php echo site_url('admin/index#/inventory') ?>" class="btn btn-danger">Close</a>
			  </div>
				
  	  		</div>
			</form>
		  
	  </div>
    </div>
    
  </div>

</div>
