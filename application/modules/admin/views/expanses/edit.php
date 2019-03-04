<div class="widgets">

  <div class="row" >
    <div class="col-md-12">
      <div
          ba-panel
          ba-panel-title="Edit Expanses"
          ba-panel-class="with-scroll">
		  
		   <form role="form" ng-submit="updateTask(tasks[0])" ng-upload enctype="multipart/form-data" ng-controller="editexpansesCtrl" >
			  <div ng-repeat="task in tasks ">
				<input type="hidden" name="id" id="id" ng-model="id"  value="{{task.id}}" />
			<div class="form-group">
			  <div class="row">
				<div class="col-md-4">
				<label for="input02">Date</label>
				<input type="text" name="date" class="form-control datepicker" ng-model="task.date"   placeholder="Date" >
				</div>	
			  </div>
			 </div> 
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
				<label for="input01">Expanses Category</label>
				 <select  name="category_id" ng-model="category_id" id="category_id" class="form-control" >
					  <option value="" ng-selected="selected">--Select Expanses Category--</option>
					  <option ng-repeat="item in items" value="{{item.id}}" ng-selected="{{ item.id== task.category_id}}">{{item.name}}</option>
				 </select> 
				
				</div>	
			  </div>
			 </div>  
			 
			 <div class="form-group">
			  <div class="row">
				<div class="col-md-4">
				<label for="input02">Amount</label>
				<input type="text" name="amount" class="form-control" ng-model="task.amount" placeholder="Amount" >
				</div>	
			  </div>
			 </div>  
			 
			 <div class="form-group">
			  <div class="row">
				<div class="col-md-4">
				<label for="input02">Payment Method</label>
				<select name="payment_method" class="form-control">
						<option value="0" ng-selected="{{ 0 == task.payment_method}}">Cheque</option>
						<option value="1" ng-selected="{{ 1== task.payment_method}}">Cash</option>
				</select>
				</div>	
			  </div>
			 </div> 
			 
			 <div class="form-group">
			  <div class="row">
				<div class="col-md-4">
				<label for="input02">Status</label>
				<select name="status" class="form-control">
						<option value="0" ng-selected="{{ 0 == task.status}}">Unpaid</option>
						<option value="1" ng-selected="{{ 1 == task.status}}">Paid</option>
				</select>
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
				<a href="<?php echo site_url('admin/index#/expanses') ?>" class="btn btn-danger">Close</a>
			  </div>
				
  	  		</div>
			</form>
		  
	  </div>
    </div>
    
  </div>

</div>
