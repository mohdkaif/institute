<div class="widgets">

  <div class="row" >
    <div class="col-md-12">
      <div
          ba-panel
          ba-panel-title="View Expanses"
          ba-panel-class="with-scroll">
		  
		   <form role="form" ng-submit="updateTask(tasks[0])" ng-upload enctype="multipart/form-data" ng-controller="viewexpansesCtrl" >
			  <div ng-repeat="task in tasks ">
				<input type="hidden" name="id" id="id" ng-model="id"  value="{{task.id}}" />
			<div class="form-group">
			  <div class="row">
				<div class="col-md-2">
					<label for="input02">Date</label>
				</div>
				<div class="col-md-4">
				{{task.date | date: "dd/MM/yyyy"}}
				</div>	
			  </div>
			 </div> 
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
				<label for="input01">Expanses Category</label>
				</div>
				<div class="col-md-4">
				{{task.category}}
				</div>	
			  </div>
			 </div>  
			 
			 <div class="form-group">
			  <div class="row">
				<div class="col-md-2">
				<label for="input02">Amount</label>
				</div>
				<div class="col-md-4" ng-model="task.amount">
				{{task.amount}}
				</div>	
			  </div>
			 </div>  
			 
			 <div class="form-group">
			  <div class="row">
				<div class="col-md-2">
				<label for="input02">Payment Method</label>
				</div>
				<div class="col-md-4">
						{{0 == task.payment_method?'Cheque':'Cash'}}
				</div>	
			  </div>
			 </div> 
			 
			 <div class="form-group">
			  <div class="row">
				<div class="col-md-2">
				<label for="input02">Status</label>
				</div>
				<div class="col-md-4">
						{{ 1 == task.status?'Paid':'Unpaid'}}
				</div>	
			  </div>
			 </div>  
			 
			  
			 <div class="form-group">
			  <div class="row">
				<div class="col-md-2">
				<label for="textarea01">Description</label>
				</div>
				<div class="col-md-4">
				{{task.description}}
				</div>	
			  </div>
			 </div>  	
			
					
			  <div class="form-group">
				<a href="<?php echo site_url('admin/index#/expanses') ?>" class="btn btn-danger">Close</a>
			  </div>
				
  	  		</div>
			</form>
		  
	  </div>
    </div>
    
  </div>

</div>
