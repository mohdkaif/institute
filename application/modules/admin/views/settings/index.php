<div class="widgets">

  <div class="row" >
    <div class="col-md-12">
      <div
          ba-panel
          ba-panel-title="Settings"
          ba-panel-class="with-scroll">
		  
		  <form role="form" ng-submit="updateTask()" ng-upload enctype="multipart/form-data" ng-controller="settingCtrl" >
			 <div ng-repeat="task in tasks "> 
			 	<input type="hidden" name="id" value="{{task.id}}" />
			 
			 <div class="form-group">
			  <div class="row">
				<div class="col-md-4">
				<label for="input02">Company Name</label>
				<input type="text" name="name" class="form-control" ng-model="task.name"  id="input02" placeholder="Company Name" >
				</div>	
			  </div>
			 </div> 
			 
			 <div class="form-group">
			  <div class="row">
				<div class="col-md-4">
				<label >Logo</label>
				<input type="file" id="i_file" name="file"  ng-file-select="onFileSelect($files)"    />
				<input type="hidden" name="logo" ng-model="logo" value="{{task.logo}}" id="img"  />
				</div>	
				<div class="col-md-4" ng-if='task.logo'>
					<img ng-src="<?php echo base_url('assets/bluradmin/uploads/images')?>/{{task.logo}}" style="height:80" width="60" />
				 </div>
			  </div>
			 </div> 
			 
			 <div class="form-group">
			  <div class="row">
				<div class="col-md-4">
				<label for="input02">Email</label>
				<input type="text" name="email" class="form-control" ng-model="task.email" placeholder="Email" >
				</div>	
			  </div>
			 </div> 
			 <div class="form-group">
			  <div class="row">
				<div class="col-md-4">
				<label for="input02">Phone</label>
				<input type="text" name="phone" class="form-control" ng-model="task.phone"   placeholder="Phone" >
				</div>	
			  </div>
			 </div> 
			 <div class="form-group">
			  <div class="row">
				<div class="col-md-4">
				<label for="input02">Address</label>
				<textarea name="address" class="form-control" ng-model="task.address" >{{task.address}}</textarea>
				</div>	
			  </div>
			 </div> 
			 <div class="form-group">
			  <div class="row">
				<div class="col-md-4">
				<label >Student Registration Number Start From</label>
				<input type="text" name="registration_no" class="form-control" ng-model="task.registration_no" >
				</div>	
			  </div>
			 </div> 
			 <div class="form-group">
			  <div class="row">
				<div class="col-md-4">
				<label >Student Receipt Number Start From</label>
				<input type="text" name="receipt_no" class="form-control" ng-model="task.receipt_no"  >
				</div>	
			  </div>
			 </div> 
			 
			 <div class="form-group">
			  <div class="row">
				<div class="col-md-4">
				<label >Facult Receipt Number Start From</label>
				<input type="text" name="faculty_receipt_no" class="form-control" ng-model="task.faculty_receipt_no" value="{{task.faculty_receipt_no}}" >
				</div>	
			  </div>
			   <div class="form-group">
				  <div class="row">
					<div class="col-md-4">
					<label >Batch Alert Days</label>
					<input type="text" name="batch_alert" class="form-control" ng-model="task.batch_alert" >
					</div>	
				  </div>
				 </div> 
			  <div class="form-group">
			  <div class="row">
				<div class="col-md-4">
				<button type="submit" class="btn btn-primary">Update</button>
				</div>	
			  </div>
			  
  	  		</div>
			</form>
      
	  </div>
    </div>
    
  </div>

</div>
