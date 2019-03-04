<div class="widgets">

  <div class="row" >
    <div class="col-md-12">
      <div
          ba-panel
          ba-panel-title="Add Inventory Form"
          ba-panel-class="with-scroll">
		  
		  <form role="form" ng-submit="addTask()" method="post" ng-upload enctype="multipart/form-data" ng-controller="addinventoryCtrl" >
			 <div class="form-group">
			  <div class="row">
				<div class="col-md-4">
				<label for="input02">Title</label>
				<input type="text" name="title" class="form-control" ng-model="title"  id="input02" placeholder="Title" >
				</div>	
			  </div>
			 </div>  
			 
			 <div class="form-group">
			  <div class="row">
				<div class="col-md-4">
				<label for="input02">Price</label>
				<input type="text" name="price" class="form-control" ng-model="price"placeholder="Price" >
				</div>	
			  </div>
			 </div>  
			 
			 <div class="form-group">
			  <div class="row">
				<div class="col-md-4">
				<label for="input02">Quantity/Stock</label>
				<input type="text" name="qty" class="form-control" ng-model="qty" placeholder="Quantity/Stock" >
				</div>	
			  </div>
			 </div>  
			 
			  
			 <div class="form-group">
			  <div class="row">
				<div class="col-md-12">
				<label for="textarea01">Description</label>
				<textarea placeholder="Description" class="form-control" name="description" ng-model="description"  id="textarea01"></textarea>
				</div>	
			  </div>
			 </div>  	
			
				
			  <div class="form-group">
				<button type="submit" class="btn btn-primary">Add</button>
				<a href="<?php echo site_url('admin/index#/inventory') ?>" class="btn btn-danger">Close</a>
			  </div>
				
  	  
			</form>
      
	  </div>
    </div>
    
  </div>

</div>
