<div class="widgets">

  <div class="row" >
    <div class="col-md-12">
      <div
          ba-panel
          ba-panel-title="Edit Faculty Form"
          ba-panel-class="with-scroll">
		  
		  <form role="form" ng-submit="updateTask(tasks[0])"  ng-upload enctype="multipart/form-data" ng-controller="editfacCtrl" name="efacForm"  >
			<div ng-repeat="task in tasks ">
				<input type="hidden" name="id" id="id" ng-model="id"  value="{{task.id}}" />
			  <div class="form-group">
				<label for="input02">Full Name</label>
				<input type="text" name="name" class="form-control" ng-model="task.name"  id="input02" placeholder="Name" >
			  </div>
			 <div class="form-group">
				<label>Father Name</label>
				<input type="text" name="fname" class="form-control" ng-model="task.fname"   placeholder="Father Name" >
			  </div>
			  <div class="form-group">
				<label>Username</label>
				<input type="text" name="username" class="form-control" ng-model="task.username"   placeholder="Username" disabled="disabled" >
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
				<label for="input03">Mobile</label>
				<input type="text" name="mobile" class="form-control" ng-model="task.mobile"  id="input03" placeholder="Mobile" >
			  </div>
			 
			   <div class="form-group">
				<label for="input07">Gender</label><br />

				<input type="radio" name="gender" class="" ng-model="task.gender"  id="input07"  value="Male" ng-selected="{{ Male== task.gender}}"  /> Male
				<input type="radio" name="gender" class="" ng-model="task.gender"  id="input07"  value="Female" ng-selected="{{ Female== task.gender}}" /> Female
			  </div>
			  <div class="form-group">
				<label for="input08">Dob</label>
				<input type="text" name="dob" class="form-control datepicker" ng-model="task.dob"  id="input08" placeholder="DOB" >
			  </div>
			  <div class="form-group">
				<label >Image</label>
				<input type="file" id="i_file" name="file"  ng-file-select="onFileSelect($files)"    />
				<input type="hidden" name="image" ng-model="image"  />

			  </div>
			  <div class="form-group">
				<label for="input09">Current Address</label>
				<textarea placeholder="Current Addres" class="form-control" name="current_address" ng-model="task.current_address"  id="input09"></textarea>
			  </div>
			 <div class="form-group">
				<label for="input06">Course</label><br />
					 <div ng-dropdown-multiselect="" extra-settings="example15settings"    options="course" selected-model="selcourse"></div>
				<!--<am-multiselect  class="" multiple="true" ms-selected ="There are {{selectedCourse.length}} course(s) selected"
									ng-model="task.courses" ms-header="Select Some Course"
									options="c.title for c in course"
									ng-selected="{{ c == task.courses}}"  
									ng-required="true"
									change="selected()">
				</am-multiselect>-->
			  </div>
			  
			  <input type="hidden" name="oldclass"  value="{{selcourse}}" class="form-control" />
			  <div class="form-group">
				<label >Highest Qualification</label>
				<input type="text" name="highest_quali" class="form-control" ng-model="task.highest_quali" >
			  </div>
			  <div class="form-group">
				<label >Years of Experiance</label>
				<input type="text" name="year_of_exp" class="form-control" ng-model="task.year_of_exp" >
			  </div>
			 <div class="form-group">
				<label for="input08">Date Of Join</label>
				<input type="date" name="join_date" class="form-control " ng-model="task.join_date" value="{{task.join_date}}"  id="input08" placeholder="Date Of Join" >
			  </div>
			   <div class="form-group">
				<label for="input07">Join As</label><br />

				<input type="radio" name="join_as" class="" ng-model="task.join_as"  value="Permanent" ng-selected="{{ Permanent == task.join_as}}" /> Permanent
				<input type="radio" name="join_as" class="" ng-model="task.join_as" value="Guest" ng-selected="{{ Guest == task.join_as}}"  /> Guest
			  </div>
		
			   <div class="form-group">
				<button type="submit" class="btn btn-primary">Update</button>
				<a href="<?php echo site_url('admin/index#/faculties/details/') ?>/{{task.id}}" class="btn btn-danger">Close</a>
			  </div>
				
  	  			</div>
			</form>
      
	  </div>
    </div>
    
  </div>

</div>
