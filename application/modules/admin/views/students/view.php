<div class="widgets">

  <div class="row" >
    <div class="col-md-12">
      <div
          ba-panel
          ba-panel-title="View Enquiry/Lead"
          ba-panel-class="with-scroll" >
		  <div ng-controller="viewenqCtrl">
			<div ng-repeat="task in tasks ">
			 
			 <div class="row">
			  <div class="form-group">
				<div class="col-md-2 "><label for="input01">Date Time </label></div>
				<div class="col-md-4 " >{{task.date_time}}</div>
			  </div>
			 </div> 
			 <div class="row">
			  <div class="form-group">
				<div class="col-md-2 "><label for="input01">Name</label></div>
				<div class="col-md-4 " >{{ task.name}}</div>
			  </div>
			 </div> 
			 <div class="row">
			  <div class="form-group">
				<div class="col-md-2 "><label for="input01">Gender</label></div>
				<div class="col-md-4 " >{{task.gender}}</div>
			  </div>
			 </div> 
			 <div class="row">
			  <div class="form-group">
				<div class="col-md-2 "><label for="input01">DOB</label></div>
				<div class="col-md-4 " >{{task.dob | date: 'dd.MM.yyyy'}}</div>
			  </div>
			 </div>
			  <div class="row">
			  <div class="form-group">
				<div class="col-md-2 "><label for="input01">Mobile</label></div>
				<div class="col-md-4 " >{{task.mobile}}</div>
			  </div>
			 </div> 
			  <div class="row">
			  <div class="form-group">
				<div class="col-md-2 "><label for="input01">Preferred Time</label></div>
				<div class="col-md-4 " >{{task.preferred_time}}</div>
			  </div>
			 </div>
			  <div class="row">
			  <div class="form-group">
				<div class="col-md-2 "><label for="input01">status</label></div>
				<div class="col-md-4 " >{{task.estatus}}</div>
			  </div>
			 </div>
			  <div class="row">
			  <div class="form-group">
				<div class="col-md-2 "><label for="input01">Course</label></div>
				<div class="col-md-4 " >{{task.course}}</div>
			  </div>
			 </div>
			  <div class="row">
			  <div class="form-group">
				<div class="col-md-2 "><label for="input01">Remark</label></div>
				<div class="col-md-4 " >{{task.remark}}</div>
			  </div>
			 </div>
			  <div class="row">
			  <div class="form-group">
				<div class="col-md-2 "><label for="input01">Handeled By</label></div>
				<div class="col-md-4 " >{{task.handeled_by}}</div>
			  </div>
			 </div>
			 
			   
			  
			    <div class="form-group">
				<a href="<?php echo site_url('admin/index#/enquiries') ?>" class="btn btn-danger">Close</a>
			  </div>
			</div>	
  	  	</div>
	  </div>
    </div>
    
  </div>

</div>
