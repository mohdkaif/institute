<div class="widgets">

  <div class="row" >
    <div class="col-md-12">
      <div
          ba-panel
          ba-panel-title="Add Faculty Form"
          ba-panel-class="with-scroll">
		  
		  <form role="form" ng-submit="addTask()" ng-upload enctype="multipart/form-data" ng-controller="addfacCtrl" name="facForm" >
			  <div class="form-group">
				<label for="input02">Full Name</label>
				<input type="text" name="name" class="form-control" ng-model="name"  id="input02" placeholder="Name" >
			  </div>
			 <div class="form-group">
				<label>Father Name</label>
				<input type="text" name="fname" class="form-control" ng-model="fname"   placeholder="Father Name" >
			  </div>
			  <div class="form-group">
				<label>Username</label>
				<input type="text" name="username" class="form-control" ng-model="username"   placeholder="Username" >
			  </div>
			  <div class="form-group">
				<label>Email</label>
				<input type="email" name="email" class="form-control" ng-model="email"   placeholder="Email" >
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
				<label for="input03">Mobile</label>
				<input type="text" name="mobile" class="form-control" ng-model="mobile"  id="input03" placeholder="Mobile" >
			  </div>
			  
			   <div class="form-group">
				<label for="input07">Gender</label><br />

				<input type="radio" name="gender" class="" ng-model="gender"  id="input07"  value="Male" /> Male
				<input type="radio" name="gender" class="" ng-model="gender"  id="input07"  value="Female" /> Female
			  </div>
			  <div class="form-group">
				<label for="input08">Dob</label>
				<input type="text" name="dob" class="form-control datepicker" ng-model="dob"  id="input08" placeholder="DOB" >
			  </div>
			  
			  <div class="form-group">
				<label >Image</label>
				<input type="file" id="i_file" name="file"  ng-file-select="onFileSelect($files)"    />
				<input type="hidden" name="image" ng-model="image"  />

			  </div>
			  <div class="form-group">
				<label for="input09">Current Address</label>
				<textarea placeholder="Current Addres" class="form-control" name="current_address" ng-model="current_address"  id="input09"></textarea>
			  </div>
			 <div class="form-group">
				<label for="input06">Course</label><br />
				<div ng-dropdown-multiselect="" options="course" selected-model="example13model" extra-settings="example13settings"></div>

				<!--<div ng-dropdown-multiselect="" options="course" selected-model="example13model" extra-settings="example13settings"></div>-->

			  </div>
				<input type="hidden" name="oldclass" value="{{example13model}}" />
			  <div class="form-group">
				<label >Highest Qualification</label>
				<input type="text" name="highest_quali" class="form-control" ng-model="highest_quali" >
			  </div>
			  <div class="form-group">
				<label >Years of Experiance</label>
				<input type="text" name="year_of_exp" class="form-control" ng-model="year_of_exp" >
			  </div>
			 <div class="form-group">
				<label for="joinDate">Date Of Join</label>
				<input type="date" name="join_date" class="form-control" ng-model="join_date"   placeholder="Date Of Join" >
			  </div>
			 
			   <div class="form-group">
				<label for="input07">Join As</label><br />

				<input type="radio" name="join_as" class="" ng-model="join_as"  value="Permanent" /> Permanent
				<input type="radio" name="join_as" class="" ng-model="join_as" value="Guest" /> Guest
			  </div>
			
			   <div class="form-group">
				<button type="submit" class="btn btn-primary">Add</button>
				<a href="<?php echo site_url('admin/index#/faculties') ?>" class="btn btn-danger">Close</a>
			  </div>
				
  	  
			</form>
      
	  </div>
    </div>
    
  </div>

</div>
