<div class="widgets">

  <div class="row" >
    <div class="col-md-12">
      <div
          ba-panel
          ba-panel-title="Edit Student Form"
          ba-panel-class="with-scroll">
		  
		   <form role="form" ng-submit="updateTask(tasks[0])" ng-upload enctype="multipart/form-data" ng-controller="editstudentCtrl" >
			  <div ng-repeat="task in tasks ">
				<input type="hidden" name="id" id="id" ng-model="id"  value="{{task.id}}" />
<div class="form-group">
				<label for="input02">Registration</label><br />

				<input type="radio" name="registration" ng-model="task.registration"  value="0" ng-click="select2();" ng-selected="{{ 0 == task.registration}}" > Direct
				<input type="radio" name="registration" ng-model="task.registration"  value="1" ng-click="select2();" ng-selected="{{ 1 == task.registration}}" > Enquiry
			  </div>
			   <div class="form-group" ng-if="task.registration == 1" >
				<label for="input01">Enquiry</label>
				 <select  name="enquiry_id" ng-model="enquiry_id" id="enquiry_id" class="form-control select2" >
					  <option value="" ng-selected="selected">--Select Enquiry--</option>
					  <option ng-repeat="item in enquires" value="{{item.id}}" ng-selected="{{ item.id== task.enquiry_id}}">{{item.name}}- {{item.mobile}}</option>
				 </select> 
			  </div>
			  <div class="form-group">
				<label >Registration No</label>
				<input type="text" name="registration_no" class="form-control" value="{{task.registration_no}}" >
				<input type="hidden" name="oldregistration_no" class="form-control" value="{{task.registration_no}}" >
			  </div>
		 	
			  <h4>Basic Info:</h4>
			 <div class="separator"></div>
			  
			  <div class="form-group">
				<label for="input02">Name</label>
				<input type="text" name="name" class="form-control" ng-model="task.name" placeholder="Name" >
			  </div>
			  <div class="form-group">
				<label for="input02">Mobile</label>
				<input type="text" name="mobile" class="form-control" ng-model="task.mobile" placeholder="Mobile" >
			  </div>
			  <div class="form-group">
				<label for="input02">Gardian's Name</label>
				<input type="text" name="gardian_name" class="form-control" ng-model="task.gardian_name" placeholder="Gardian's Name" >
			  </div>
			  <div class="form-group">
				<label for="input02">Gardian's Mobile</label>
				<input type="text" name="gardian_mobile" class="form-control" ng-model="task.gardian_mobile" placeholder="Gardian's Mobile" >
			  </div>
			  <div class="form-group">
				<label for="input07">Gender</label><br />

				<input type="radio" name="gender" class="" ng-model="task.gender"   value="Male" ng-selected="{{ Male == task.gender}}"  /> Male
				<input type="radio" name="gender" class="" ng-model="task.gender"   value="Female" ng-selected="{{ Female == task.gender}}" /> Female
			  </div>
			  <div class="form-group">
				<label>Username</label>
					<input type="text" name="username" class="form-control" ng-model="task.username"   placeholder="Username" >
			  </div>
			  <div class="form-group">
				<label>Email</label>
				<input type="email" name="email" class="form-control" ng-model="task.email"   placeholder="Email" >
			  </div>
			  <div class="form-group">
				<label>Password</label>
				<input type="password" name="password" class="form-control" ng-model="password"   placeholder="Password" >
			  </div>
			  <div class="form-group">
				<label>Confirm Password</label>
				<input type="password" name="confirm" class="form-control" ng-model="confirm"   placeholder="Confirm Password" >
			  </div>
			 
			  <div class="form-group">
				<label for="input08">Dob</label>
				<input type="text" name="dob" class="form-control datepicker" ng-model="task.dob"   placeholder="DOB" >
			  </div>
			  <div class="form-group">
				<label >Image</label>
				<input type="file" id="i_file" name="file"  ng-file-select="onFileSelect($files)"    />
				<input type="hidden" name="image" ng-model="image" value="{{task.image}}" id="img"  />

			  </div>
			  <div class="form-group">
				
				<img ng-src="<?php echo base_url('assets/bluradmin/uploads/images')?>/{{task.image}}" style="height:80" width="60" />
			  </div>
			 	
			  
			  <div class="form-group">
				<label >Current Address</label>
				<textarea name="current_address" class="form-control" ng-model="task.current_address" >{{task.current_address}}</textarea>
			  </div>
			 
			  
			 				
			  <div class="form-group">
				<button type="submit" class="btn btn-primary">Update</button>
				<a href="<?php echo site_url('admin/index#/students/details') ?>/{{task.id}}" class="btn btn-danger">Close</a>
			  </div>
				
  	  		</div>
			</form>
		  
	  </div>
    </div>
    
  </div>

</div>
