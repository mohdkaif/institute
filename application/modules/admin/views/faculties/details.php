<div class="widgets">
	

  <div class="row" >
    <div class="col-md-12" ng-controller="detailsfacCtrl">
      <div
          ba-panel
          ba-panel-title="{{tasks[0].name}}"
          ba-panel-class="with-scroll" >
		  <div >
			
			
			<uib-tabset>
				
				  <uib-tab heading="Basic Info">
				  	<div ng-repeat="task in tasks ">
			 			
						<div class="row">
						  <div class="form-group">
							<div class="col-md-3 pull-right ">
								<a class="btn btn-primary"  href="<?php echo site_url('admin/index#/faculties/edit/')?>/{{task.id}}" ><i class="ion-edit"></i> Edit</a>
								<a class="btn btn-danger" ng-click="deleteTask(task)" ><i class="ion-ios-trash"></i> Delete</a>	
							</div>
						 </div>
						</div>
						 
						 <div class="row">
						  <div class="form-group">
							<div class="col-md-2 "><label for="input01">Full Name</label></div>
							<div class="col-md-4 " >{{task.name}}</div>
							<div class="col-md-4 "  ><img ng-src="<?php echo base_url('assets/bluradmin/uploads/images')?>/{{task.image}}" style="height:80" width="60" /></div>
						  </div>
						 </div> 
						 
						 <div class="row">
						  <div class="form-group">
							<div class="col-md-2 "><label for="input01">Father Name</label></div>
							<div class="col-md-4 " >{{task.fname}}</div>
						  </div>
						 </div> 
						  <div class="row">
						  <div class="form-group">
							<div class="col-md-2 "><label for="input01">Username</label></div>
							<div class="col-md-4 " >{{task.username}}</div>
						  </div>
						 </div> 
						  <div class="row">
						  <div class="form-group">
							<div class="col-md-2 "><label for="input01">Email</label></div>
							<div class="col-md-4 " >{{task.email}}</div>
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
							<div class="col-md-2 "><label for="input01">Gender</label></div>
							<div class="col-md-4 " >{{task.gender}}</div>
						  </div>
						 </div> 
						 <div class="row">
						  <div class="form-group">
							<div class="col-md-2 "><label for="input01">DOB</label></div>
							<div class="col-md-4 " >{{task.dob | date : 'dd/MM/yyyy'}}</div>
						  </div>
						 </div> 
						 <div class="row">
						  <div class="form-group">
							<div class="col-md-2 "><label for="input01">Current Address</label></div>
							<div class="col-md-4 " >{{task.current_address}}</div>
						  </div>
						 </div> 
						 <div class="row">
						  <div class="form-group">
							<div class="col-md-2 "><label for="input01">Course</label></div>
							<div class="col-md-4 " >{{tasks[$index].facultycourse.courses}}</div>
						  </div>
						 </div> 
						 <div class="row">
						  <div class="form-group">
							<div class="col-md-2 "><label for="input01">Highest Qualification</label></div>
							<div class="col-md-4 " >{{task.highest_quali}}</div>
						  </div>
						 </div>
						 <div class="row">
						  <div class="form-group">
							<div class="col-md-2 "><label for="input01">Years of Experiance</label></div>
							<div class="col-md-4 " >{{task.year_of_exp}}</div>
						  </div>
						 </div>
						 <div class="row">
						  <div class="form-group">
							<div class="col-md-2 "><label for="input01">Date Of Join</label></div>
							<div class="col-md-4 " >{{task.join_date}}</div>
						  </div>
						 </div> 
						 <div class="row">
						  <div class="form-group">
							<div class="col-md-2 "><label for="input01">Join As</label></div>
							<div class="col-md-4 " >{{task.join_as}}</div>
						  </div>
						 </div> 
					
					</div>		
				  </uib-tab>
				  <uib-tab heading="Course-Fee">
				  	<div class="row">
						<div class="col-md-2 pull-right form-group">
							<a href="<?php echo site_url('admin/index#/faculties/course_fee')?>/{{tasks[0].id}}" class="btn btn-success "> <i class="ion-android-add"></i>  Add</a>
						</div>
					</div>
					<span ng-if="courseFee.length > 0">
					 <table class="table" datatable="ng"  id="printTable2" >
						<thead>
						<tr class="sortable ">
						  <th>#</th>
						  <th>Course/es</th>
						  <th>Payout</th>
						  <th>Salary</th>
						  <th>Percent</th>
						  <th>Date</th>
						  <th>Action</th>
						</tr>
					   </thead>
						<tbody >
						<tr ng-repeat="fees in courseFee track by $index" >
						  <td class="table-id">{{ $index + 1 }}</td>
						  <td>{{fees.facultycourse.courses}}</td>
						  <td>{{fees.payout==1 ? 'Percent' : ''}} {{fees.payout==2 ? 'Fixed' : ''}}</td>
						  <td>{{fees.salary}}</td>
						  <td>{{fees.percent}}</td>
						  <td>{{fees.date | date: 'dd.MM.yyyy'}}</td>
						  <td>

								<a class="btn btn-primary"  href="<?php echo site_url('admin/index#/faculties/edit_courseFee/')?>/{{fees.id}}" ><i class="ion-edit"></i> Edit</a>
								<a class="btn btn-danger" ng-click="deleteFees(fees.id)" ><i class="ion-ios-trash"></i> Delete</a>
							</td>
						 </tr>
						</tbody>
					   </table>
					  </span> 
					  <span ng-if="courseFee.length == 0">
					  	<b>No Course Fee Avaiable for {{tasks[0].name}}</b>
					  </span>
				  </uib-tab>
				  <uib-tab heading="Batches">
				  	<span ng-if="batches.length > 0">
					<table class="table" datatable="ng" export-csv='csv' >
						<thead>
						<tr class="sortable ">
						  <th>#</th>
						  <th>Title</th>
						  <th>Course Category</th>
						  <th>Course</th>
						  <th>Time</th>
						  <th>Start Date</th>
						  <th>Expected End Date</th>
						  <th>Fee Agreed</th>
						 </tr>
					   </thead>
						<tbody  style="cursor:pointer">
						<tr ng-repeat="batch in batches track by $index" ng-click="gobt(batch.id)">
						  <td class="table-id">{{ $index + 1 }} </td>
						    <td>{{batch.title}}</td>
						  <td>{{batch.category}}</td>
						  <td>{{batch.course}}</td>
						  <td>{{batch.batch_time | date : 'h:mm a' }}</td>
						  <td>{{batch.start_date | date : 'dd/MM/yyyy'}}</td>
						  <td>{{batch.end_date | date : 'dd/MM/yyyy'}}</td>
						  <td>{{batch.agreed_fee}}</td>
						 
						 </tr>
						</tbody>
					   </table>
						</span>
						<span ng-if="batches.length == 0">
					  	<b>No Batch  Avaiable for {{tasks[0].name}}</b>
					  </span>
				  </uib-tab>
				  <uib-tab heading="Receipts">
				  	<div class="row">
						<div class="col-md-2 pull-right form-group">
							<a href="<?php echo site_url('admin/index#/faculties/add_receipt')?>/{{tasks[0].id}}" class="btn btn-success "> <i class="ion-android-add"></i>  Add</a>
						</div>
					</div>
				<span ng-if="receipts.length > 0">	
					<table class="table" datatable="ng" >
						<thead>
						<tr class="sortable ">
						  <th>#</th>
						  <th>Receipt No</th>
						  <th>Date</th>
						  <th>Amount</th>
						  <th>Batch</th>
						  <th>Payment Method</th>
						  <th>Remark</th>
						  <th ></th>
						  </tr>
					   </thead>
						<tbody >
						<tr ng-repeat="rt in receipts track by $index" >
						  <td class="table-id">{{ $index + 1 }}</td>
						  <td>{{rt.receipt_no}}</td>
						  <td>{{rt.date| date : 'dd/MM/yyyy'}}</td>
						  <td>{{rt.amount}}</td>
						  <td>{{rt.batch}}</td>
						  <td>{{rt.payment_method==0?'Cash':'Cheque'}}</td>
						  <td>{{rt.remark}}</td>
						   <td>
						   		<a class="btn btn-default"  href="<?php echo site_url('admin/index#/faculties/receipt/')?>/{{rt.id}}" ><i class="ion-printer"></i> Print</a>
						   		<a class="btn btn-warning"  href="<?php echo site_url('admin/faculties/receiptdownload/')?>/{{rt.id}}" target="_blank" ><i class="ion-android-download"></i> Download</a>
								<a class="btn btn-primary"  href="<?php echo site_url('admin/index#/faculties/edit_receipt/')?>/{{rt.id}}" ><i class="ion-edit"></i> Edit</a>
								<a class="btn btn-danger" ng-click="deleteReceipt(rt.id)" ><i class="ion-ios-trash"></i> Delete</a>
							</td>
						 </tr>
						</tbody>
					   </table>
				  	</span>	
						<span ng-if="receipts.length == 0">
							<b>No Receipt Avaiable for {{tasks[0].name}}</b>
						  </span>
				  </uib-tab>
				  <uib-tab heading="Notes">
				  	<form role="form" ng-submit="addNotes();"  enctype="multipart/form-data"  >
					 <input type="hidden" name="faculty_id" id="faculty_id" ng-model="faculty_id" id="faculty_id" value="{{tasks[0].id}}" />
					 
					  <div class="form-group">
						<label for="input02">Notes</label><br />
							<textarea name="notes" class="form-control" id="notes"></textarea>	
					  </div>
					  <div class="form-group">
						<button type="submit" class="btn btn-primary"  >Add</button>
					  </div>
					 </form>
					<span ng-if="notes.length > 0"> 
					 <table class="table" datatable="ng" >
						<thead>
						<tr class="sortable ">
						  <th>#</th>
						  <th>Notes</th>
						  <th>Added</th>
						  <th></th>
						  </tr>
					   </thead>
						<tbody >
						<tr ng-repeat="nt in notes track by $index" >
						  <td class="table-id">{{ $index + 1 }}</td>
						  <td>{{nt.notes}}</td>
						  <td>{{nt.added}}</td>
						   <td>
						  	<a class="btn btn-primary"  href="<?php echo site_url('admin/index#/faculties/edit_notes/')?>/{{nt.id}}" ><i class="ion-edit"></i> Edit</a>
							<a class="btn btn-danger" ng-click="deleteNotes(nt.id)" ><i class="ion-ios-trash"></i> Delete</a>
							</td>
						 </tr>
						</tbody>
					   </table>
					     	</span>	
						<span ng-if="notes.length == 0">
							<b>No Notes Avaiable for {{tasks[0].name}}</b>
						  </span>
				  </uib-tab>
				  <uib-tab heading="Files">
				  
				    <div class="row">
						<div class="col-md-2 pull-right form-group">
							<a href="<?php echo site_url('admin/index#/faculties/add_files')?>/{{tasks[0].id}}" class="btn btn-success "> <i class="ion-android-add"></i>  Add</a>
						</div>
					</div>
						<span ng-if="files.length > 0">
					<table class="table" datatable="ng" >
						<thead>
						<tr class="sortable ">
						  <th>#</th>
						  <th>Title</th>
						  <th>Added</th>
						  <th></th>
						  </tr>
					   </thead>
						<tbody >
						<tr ng-repeat="fs in files track by $index" >
						  <td class="table-id">{{ $index + 1 }}</td>
						  <td>{{fs.title}}</td>
						  <td>{{fs.added}}</td>
						   <td>
						   		<a class="btn btn-info"  href="<?php echo base_url('assets/bluradmin/uploads/files/')?>/{{fs.file_name}}" download ><i class="ion-ios-download"></i> Download</a>
								<a class="btn btn-primary"  href="<?php echo site_url('admin/index#/faculties/edit_files/')?>/{{fs.id}}" ><i class="ion-edit"></i> Edit</a>
								<a class="btn btn-danger" ng-click="deleteFiles(fs.id)" ><i class="ion-ios-trash"></i> Delete</a>
							</td>
						 </tr>
						</tbody>
					   </table>
					    	</span>	
						<span ng-if="files.length == 0">
							<b>No Files Avaiable for {{tasks[0].name}}</b>
						  </span> 
				  	
				  </uib-tab>
				  <uib-tab heading="Payment Reports">
				  			<div class="row">
							  <form method="post">
							  <div class="col-md-12" >
								<div ba-panel ba-panel-title="Payment Reports By Batch" ba-panel-class="with-scroll ">
								   <div class="form-group col-md-3 pull-right">
										<label for="input01">Batch</label>
										 <select  name="course_id" ng-model="course_id" class="form-control" id="course_id" ng-change="getReport();" >
											  <option ng-repeat="cr in batches track by $index" value="{{cr.id}}" ng-selected="{{ $index	== 0}}">{{cr.title}}</option>
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
