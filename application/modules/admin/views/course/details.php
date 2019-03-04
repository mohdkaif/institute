<div class="widgets">
	

  <div class="row" ng-controller="detailsCtrl" >
    <div class="col-md-12">
      <div
          ba-panel
          ba-panel-title="{{tasks[0].title}}"
          ba-panel-class="with-scroll" >
		  <div >
			
			
			<uib-tabset>
				  <uib-tab heading="Basic Info">
				  	<div ng-repeat="task in tasks ">
			 			
						<div class="row">
						  <div class="form-group">
							<div class="col-md-3 pull-right ">
								<a class="btn btn-primary"  href="<?php echo site_url('admin/index#/course/edit/')?>/{{task.id}}" ><i class="ion-edit"></i> Edit</a>
								<a class="btn btn-danger" ng-click="deleteTask(task)" ><i class="ion-ios-trash"></i> Delete</a>	
							</div>
						 </div>
						</div>
						 
						 <div class="row">
						  <div class="form-group">
							<div class="col-md-2 "><label for="input01">Title</label></div>
							<div class="col-md-4 " >{{task.title}}</div>
						  </div>
						 </div> 
						 
						 <div class="row">
						  <div class="form-group">
							<div class="col-md-2 "><label for="input01">Course Category</label></div>
							<div class="col-md-4 " >{{task.category}}</div>
						  </div>
						 </div> 
						 <div class="row">
						  <div class="form-group">
							<div class="col-md-2 "><label for="input01">Duration</label></div>
							<div class="col-md-4 " >{{task.duration}}</div>
						  </div>
						 </div> 
						 <div class="row">
						  <div class="form-group">
							<div class="col-md-2 "><label for="input01">Duration Type</label></div>
							<div class="col-md-4 " >{{1== task.duration_type ? 'Hours':'Days'}}</div>
						  </div>
						 </div> 
						 <div class="row">
						  <div class="form-group">
							<div class="col-md-2 "><label for="input01">Fees</label></div>
							<div class="col-md-4 " >{{task.fees}}</div>
						  </div>
						 </div> 
						 <div class="row">
						  <div class="form-group">
							<div class="col-md-2 "><label for="input01">Students</label></div>
							<div class="col-md-4 " >{{task.students}}</div>
						  </div>
						 </div> 
						 <div class="row">
						  <div class="form-group">
							<div class="col-md-2 "><label for="input01">Faculties</label></div>
							<div class="col-md-4 " >{{task.faculties}}</div>
						  </div>
						 </div> 
						 <div class="row">
						  <div class="form-group">
							<div class="col-md-2 "><label for="input01">Batches</label></div>
							<div class="col-md-4 " >{{task.batches}}</div>
						  </div>
						 </div> 
						 <div class="row">
						  <div class="form-group">
							<div class="col-md-2 "><label for="input01">Description</label></div>
							<div class="col-md-8 " >{{task.description}}</div>
						  </div>
						 </div> 
					
					</div>		
				  </uib-tab>
				  <uib-tab heading="Enquiries">
				  	<span ng-if="enquiries.length > 0">	
						<table class="table" datatable="ng" >
						<thead>
						<tr class="sortable ">
						  <th>#</th>
						  <th>Date Time</th>
						  <th>Name</th>
						  <th>Mobile</th>
						  <th>For Course</th>
						  <th>Preferred Time</th>
						  <th>Status</th>
						  <th class="col-md-4">Action</th>
						</tr>
					   </thead>
						<tbody >
						<tr ng-repeat="task in enquiries track by $index" >
						  <td class="table-id">{{ $index + 1 }}</td>
						    <td>{{task.date_time  | date:'MM/dd/yyyy @ h:mma'}}</td>
						  <td>{{task.name}}</td>
						  <td>{{task.mobile}}</td>
						  <td>{{task.course}}</td>
						  <td>{{task.preferred_time}}</td>
						  <td>{{task.estatus}}</td>
						  <td class="col-md-4">
						  	<a class="btn btn-info"  href="<?php echo site_url('admin/index#/enquiries/view/')?>/{{task.id}}" ><i class="ion-ios-eye"></i> View</a>

								<a class="btn btn-primary"  href="<?php echo site_url('admin/index#/enquiries/edit/')?>/{{task.id}}" ><i class="ion-edit"></i> Edit</a>
								<span ng-if="task.admitted==0">
								<a class="btn btn-success"  href="<?php echo site_url('admin/index#/students/add/')?>/{{task.id}}" ><i class="fa  fa-sign-in"></i> Admission</a>
								</span>
								<span ng-if="task.admitted==1">
								<a class="btn btn-success"  href="#" ><i class="fa  fa-check"></i> Admitted</a>
								</span>
						  </td>
						</tr>
						</tbody>
					   </table>
					</span>	
					<span ng-if="enquiries.length == 0">
						<b>No Enquries Avaiable for Course {{tasks[0].title}}</b>
					  </span>	
				  </uib-tab>
				  <uib-tab heading="Students">
				  		<span ng-if="students.length > 0">
						<table class="table" datatable="ng" export-csv='csv' id="printTable" >
						<thead>
						<tr class="sortable ">
						  <th>#</th>
						  <th>Full Name</th>
						  <th>G Name</th>
						  <th>Mobile</th>
						  <th>Dob</th>
						  <th>Gender</th>
						  <th>Doj</th>
						 </tr>
					   </thead>
						<tbody  >
						<tr ng-repeat="st in students track by $index" >
						  <td class="table-id">{{ $index + 1 }}</td>
						    <td>{{st.name}}</td>
						  <td>{{st.gardian_name}}</td>
						  <td>{{st.mobile}}</td>
						  <td>{{st.dob| date : 'dd/MM/yyyy'}}</td>
						  <td>{{st.gender}}</td>
						 <td>{{st.added| date : 'dd/MM/yyyy'}}</td>
						 
						 </tr>
						</tbody>
					   </table>
						
						</span>	
						<span ng-if="students.length == 0">
							<b>No Students Avaiable for Course {{tasks[0].title}}</b>
						  </span>
				  </uib-tab>
				  <uib-tab heading="Faculties">
				  		<span ng-if="faculties.length > 0">
						  <table class="table" datatable="ng" export-csv='csv' id="printTable" >
						<thead>
						<tr class="sortable ">
						  <th>#</th>
						  <th>Full Name</th>
						  <th>Mobile</th>
						  <th>DOB</th>
						  <th>Gender</th>
						  <th>Course/es</th>
						  <th>DOJ</th>
						  <th>Join As</th>
						</tr>
					   </thead>
						<tbody >
						<tr ng-repeat="task in faculties track by $index" >
						  <td class="table-id">{{ $index + 1 }}</td>
						    <td>{{task.name}}</td>
						  <td>{{task.mobile}}</td>
						  <td>{{task.dob}}</td>
						  <td>{{task.gender}}</td>
						  <td>{{task.facultycourse.courses}}</td>
						  <td>{{task.join_date}}</td>
						  <td>{{task.join_as}}</td>
						 </tr>
						</tbody>
					   </table>
					
						</span>	
						<span ng-if="faculties.length == 0">
							<b>No Faculty Avaiable for Course {{tasks[0].title}}</b>
						  </span>
				  </uib-tab>
				  <uib-tab heading="Batches">
				  	<span ng-if="batches.length > 0">	
					 <table class="table" datatable="ng" export-csv='csv' id="printTable" >
						<thead>
						<tr class="sortable ">
						  <th>#</th>
						  <th>Title</th>
						  <th>Course Category</th>
						  <th>Course</th>
						  <th>Time</th>
						  <th>Start Date</th>
						  <th>Expected End Date</th>
						  <th>Faculty</th>
						 </tr>
					   </thead>
						<tbody >
						<tr ng-repeat="task in batches track by $index">
						  <td class="table-id">{{ $index + 1 }}</td>
						    <td>{{task.title}}</td>
						  <td>{{task.category}}</td>
						  <td>{{task.course}}</td>
						  <td>{{task.batch_time | date : 'h:mm a' }}</td>
						  <td>{{task.start_date | date : 'dd/MM/yyyy'}}</td>
						  <td>{{task.end_date | date : 'dd/MM/yyyy'}}</td>
						  <td>{{task.faculty}}</td>
						 </tr>
						</tbody>
					   </table>
					</span>
					<span ng-if="batches.length == 0">
							<b>No Batch Avaiable for Course {{tasks[0].title}}</b>
						  </span>
				  
				  </uib-tab>
				  <uib-tab heading="Study Materials">
				  	<div class="row">
						<div class="col-md-2 pull-right form-group">
							<a href="<?php echo site_url('admin/index#/course/add_material')?>/{{tasks[0].id}}" class="btn btn-success "> <i class="ion-android-add"></i>  Add</a>
						</div>
					</div>
				  
				  		<span ng-if="materials.length > 0">	
					 <table class="table" datatable="ng" export-csv='csv' id="printTable" >
						<thead>
						<tr class="sortable ">
						  <th>#</th>
						  <th>Title</th>
						  <th class="col-md-4"></th>
						 </tr>
					   </thead>
						<tbody >
						<tr ng-repeat="task in materials track by $index">
						  <td class="table-id">{{ $index + 1 }}</td>
						  <td>{{task.title}}</td>
						   <td class="col-md-4">
						   		<a class="btn btn-info"  href="<?php echo base_url('assets/bluradmin/uploads/files/')?>/{{task.file_name}}" download ><i class="ion-ios-download"></i> Download</a>
								<a class="btn btn-primary"  href="<?php echo site_url('admin/index#/course/edit_material/')?>/{{task.id}}" ><i class="ion-edit"></i> Edit</a>
								<a class="btn btn-danger" ng-click="deleteMaterial(task.id)" ><i class="ion-ios-trash"></i> Delete</a>
							</td>

						 </tr>
						</tbody>
					   </table>
					</span>
					<span ng-if="materials.length == 0">
						<b>No Study Material Avaiable for Course {{tasks[0].title}}</b>
					  </span>
				  
				  </uib-tab>
				  <uib-tab heading="Reports">
				  		<div class="row">
							  <form method="post">
							  <div class="col-md-12" ng-controller="coursechartCtrl">
								<div ba-panel ba-panel-title="Progress Reports By Batch" ba-panel-class="with-scroll ">
								   <div class="form-group col-md-3 pull-right">
										<label for="input01">Batch</label>
										 <select  name="course_id" ng-model="course_id" class="form-control" id="course_id" ng-change="getReport();" >
											  <option ng-repeat="cr in batches track by $index" value="{{cr.id}}" ng-selected="{{ $index	== 0}}">{{cr.title}} ({{cr.course}})</option>
										 </select> 
									</div>
								  <canvas id="pie" class="chart chart-pie"
										  chart-legend="true" chart-options="options" chart-data="data" chart-labels="labels" >
								  </canvas>
								</div>
							  </div>
							  </form>
							</div>
				  </uib-tab>
			</uib-tabset>
			
			
			
			
			
			 
			   
  	  	</div>
	  </div>
    </div>
    
  </div>

</div>
