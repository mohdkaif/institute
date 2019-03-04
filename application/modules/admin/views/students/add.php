<div class="widgets">

  <div class="row" >
    <div class="col-md-12">
      <div
          ba-panel
          ba-panel-title="Add Student Form"
          ba-panel-class="with-scroll">
		  
		  <form role="form" ng-submit="addTask()" ng-upload enctype="multipart/form-data" ng-controller="addstudetCtrl" >
		     <div class="form-group">
			 <input type="hidden" name="enquiry_id" value="{{task.id}}"/>
				<label for="input02">Registration</label><br />
				<input type="radio" name="registration" ng-model="registration" ng-value="0" ng-click="select2();"  > Direct 
				
				<input type="radio" name="registration" ng-model="registration" ng-value="1" ng-click="select2();"> Enquiry 
				
			  </div>
			   <div class="form-group" ng-if="registration == 1" >
				<label for="input01">Enquiry</label>
				 <select  name="enquiry_id" ng-model="enquiry_id" id="enquiry_id" class="form-control select2" >
					  <option value="" ng-selected="selected">--Select Enquiry--</option>
					  <option ng-repeat="item in enquires" value="{{item.id}}" ng-selected="{{ item.id== task.id}}">{{item.name}}- {{item.mobile}}</option>
				 </select> 
				 
			  </div>
			  <h4>Basic Info:</h4>
			 <div class="separator"></div>
			  <div class="form-group">
				<label for="input02">Name</label>
				<input type="text" name="name" class="form-control" ng-model="task.name" placeholder="Name" value="{{task.name}}" >
			  </div>
			  <div class="form-group">
				<label for="input02">Mobile</label>
				<input type="text" name="mobile" class="form-control" ng-model="task.mobile" placeholder="Mobile" value="{{task.mobile}}" >
			  </div>
			  <div class="form-group">
				<label for="input02">Gardian's Name</label>
				<input type="text" name="gardian_name" class="form-control" ng-model="gardian_name" placeholder="Gardian's Name" >
			  </div>
			  <div class="form-group">
				<label for="input02">Gardian's Mobile</label>
				<input type="text" name="gardian_mobile" class="form-control" ng-model="gardian_mobile" placeholder="Gardian's Mobile" >
			  </div>
			  <div class="form-group">
				<label for="input07">Gender</label><br />

				<input type="radio" name="gender" class="" ng-model="task.gender"   value="Male" ng-selected="{{ Male == task.gender}}"  /> Male
				<input type="radio" name="gender" class="" ng-model="task.gender"   value="Female"  ng-selected="{{ Female == task.gender}}"  /> Female
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
				<label for="input08">Dob</label>
				<input type="text" name="dob" class="form-control datepicker" ng-model="task.dob"   placeholder="DOB" value="{{task.dob}}" >
			  </div>
			  <div class="form-group">
				<label >Image</label>
				<input type="file" id="i_file" name="file"  ng-file-select="onFileSelect($files)"    />
				<input type="hidden" name="image" ng-model="image" value="{{image}}"  />

			  </div>
			 
			  
			  <div class="form-group">
				<label >Current Address</label>
				<textarea name="current_address" class="form-control" ng-model="current_addres" ></textarea>
			  </div>
			   <h4>Admission Info:</h4>
			 <div class="separator"></div>

			  
			  <div class="form-group">
				<label >Registration No</label>
				<input type="text" name="registration_no" class="form-control" ng-model="registration_no"  value="{{registration_no}}" >
			  </div>
		     <div class="form-group">
				<label for="input01">Course</label>
				 <select  name="course_id" ng-model="course_id" class="form-control" id="course_id" ng-change="getBatches();">
					  <option value="" ng-selected="selected">--Select Course--</option>
					  <option ng-repeat="cr in course" value="{{cr.id}}" ng-selected="{{ cr.id== task.course_id}}">{{cr.title}}</option>
				 </select> 
			</div>
			<div class="form-group">
				<label for="input01">Batch</label>
				 <select  name="batch_id" ng-model="batch_id" class="form-control" id="batch_id">
					  <option value="" ng-selected="selected">--Select Batch--</option>
					  <option ng-repeat="bt in batches" value="{{bt.id}}">{{bt.title}}</option>
				 </select> 
			</div>
			
				
			  <div class="form-group">
				<button type="submit" class="btn btn-primary">Add</button>
					<a href="<?php echo site_url('admin/index#/students') ?>" class="btn btn-danger">Close</a>
			  </div>
				
  	  		</form>
      
	  </div>
    </div>
    
  </div>

</div>
