<div class="widgets">
	

  <div class="row" ng-controller="detailsbatchcCtrl" >
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
								<a class="btn btn-primary"  href="<?php echo site_url('admin/index#/batches/edit/')?>/{{task.id}}" ><i class="ion-edit"></i> Edit</a>
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
							<div class="col-md-2 "><label for="input01">Category</label></div>
							<div class="col-md-4 " >{{task.category}}</div>
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
							<div class="col-md-2 "><label for="input01">Fees</label></div>
							<div class="col-md-4 " >{{task.fees}}</div>
						  </div>
						 </div> 
						  <div class="row">
						  <div class="form-group">
							<div class="col-md-2 "><label for="input01">Time</label></div>
							<div class="col-md-4 " >{{task.batch_time | date : 'h:mm a'}}</div>
						  </div>
						 </div> 
						  <div class="row">
						  <div class="form-group">
							<div class="col-md-2 "><label for="input01">Start Date</label></div>
							<div class="col-md-4 " >{{task.start_date | date : 'dd/MM/yyyy'}}</div>
						  </div>
						 </div> 
						 <div class="row">
						  <div class="form-group">
							<div class="col-md-2 "><label for="input01">Expected End Date</label></div>
							<div class="col-md-4 " >{{task.end_date | date : 'dd/MM/yyyy'}}</div>
						  </div>
						 </div> 
						 <div class="row">
						  <div class="form-group">
							<div class="col-md-2 "><label for="input01">Faculty</label></div>
							<div class="col-md-4 " >{{task.faculty}}</div>
						  </div>
						 </div> 
						  <div class="row">
						  <div class="form-group">
							<div class="col-md-2 "><label for="input01">Faculty Agreed Fee</label></div>
							<div class="col-md-4 " >{{task.agreed_fee}}</div>
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
							<div class="col-md-2 "><label for="input01">Description</label></div>
							<div class="col-md-4 " >{{task.description}}</div>
						  </div>
						 </div>
					</div>		
				  </uib-tab>
				  <uib-tab heading="Staudents">
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
						<tbody  style="cursor:pointer">
						<tr ng-repeat="st in students track by $index" ng-click="gostudents(st.student_id)">
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
						<b>No Student Avaiable for Batch {{tasks[0].title}}</b>
					  </span>	
				  </uib-tab>
				  <uib-tab heading="Earning Report">
				  		 <div class="col-md-12">
						<div ba-panel ba-panel-title="Progress Reports By Course" ba-panel-class="with-scroll ">
						   <canvas id="pie" class="chart chart-pie"
								  chart-legend="true" chart-options="options" chart-data="data" chart-labels="labels" >
						  </canvas>
						</div>
					  </div>
				  </uib-tab>
			</uib-tabset>
			
			
			
			
			
			 
			   
  	  	</div>
	  </div>
    </div>
    
  </div>

</div>
