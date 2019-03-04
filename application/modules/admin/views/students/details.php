<div class="widgets">
	

  <div class="row" ng-controller="detailsstudentCtrl" >
    <div class="col-md-12">
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
								<a class="btn btn-primary"  href="<?php echo site_url('admin/index#/students/edit/')?>/{{task.id}}" ><i class="ion-edit"></i> Edit</a>
								<a class="btn btn-danger" ng-click="deleteTask(task)" ><i class="ion-ios-trash"></i> Delete</a>	
							</div>
						 </div>
						</div>
						 <div class="row">
						  <div class="form-group">
							<div class="col-md-2 "><label for="input01">Registration</label></div>
							<div class="col-md-4 " >{{task.registration==0?'Direct':'Enquiry'}}</div>
						  	<div class="col-md-4 "  ><img ng-src="<?php echo base_url('assets/bluradmin/uploads/images')?>/{{task.image}}" style="height:100" width="80" /></div>
						  </div>
						 </div>
						 
						 <div class="row">
						  <div class="form-group">
							<div class="col-md-2 "><label for="input01">Registration No</label></div>
							<div class="col-md-4 " >{{task.registration_no}}</div>
						  </div>
						 </div>
						 
						 <div class="row">
						  <div class="form-group">
							<div class="col-md-2 "><label for="input01">Full Name</label></div>
							<div class="col-md-4 " >{{task.name}}</div>
							
						  </div>
						 </div> 
						 
						 
						 <div class="row">
						  <div class="form-group">
							<div class="col-md-2 "><label for="input01">Gardian Name</label></div>
							<div class="col-md-4 " >{{task.gardian_name}}</div>
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
							<div class="col-md-2 "><label for="input01">Gardian Mobile</label></div>
							<div class="col-md-4 " >{{task.gardian_mobile}}</div>
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
							<div class="col-md-2 "><label for="input01">Dob</label></div>
							<div class="col-md-4 " >{{task.dob | date : 'dd/MM/yyyy'}}</div>
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
							<div class="col-md-2 "><label for="input01">Current Address</label></div>
							<div class="col-md-4 " >{{task.current_address}}</div>
						  </div>
						 </div>
						 
					</div>		
				  </uib-tab>
				  <uib-tab heading="Batches">
				  	<div class="row">
						<div class="col-md-2 pull-right form-group">
							<a href="<?php echo site_url('admin/index#/students/add_batch')?>/{{tasks[0].id}}" class="btn btn-success "> <i class="ion-android-add"></i>  Add</a>
						</div>
					</div>
				<span ng-if="batches.length > 0">	
				  	<table class="table" datatable="ng" >
						<thead>
						<tr class="sortable ">
						  <th>#</th>
						  <th>Batch</th>
						  <th>Course</th>
						  <th>Added</th>
						  <th></th>
						  </tr>
					   </thead>
						<tbody >
						<tr ng-repeat="bt in batches track by $index" >
						  <td class="table-id">{{ $index + 1 }}</td>
						  <td>{{bt.batch}}</td>
						  <td>{{bt.course}}</td>
						  <td>{{bt.added | date : 'dd/MM/yyyy'}}</td>
						   <td>
						   		<a class="btn btn-primary"  href="<?php echo site_url('admin/index#/students/edit_batch/')?>/{{bt.id}}" ><i class="ion-edit"></i> Edit</a>
								<a class="btn btn-danger" ng-click="deleteBatch(bt.id)" ><i class="ion-ios-trash"></i> Delete</a>
							</td>
						 </tr>
						</tbody>
					   </table>
					 </span>
					 <span ng-if="batches.length == 0">
							<b>No Batch Avaiable for {{tasks[0].name}}</b>
					</span>  
				  </uib-tab>
				  <uib-tab heading="Receipts">
				  	<div class="row">
						<div class="col-md-2 pull-right form-group">
							<a href="<?php echo site_url('admin/index#/students/add_receipt')?>/{{tasks[0].id}}" class="btn btn-success "> <i class="ion-android-add"></i>  Add</a>
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
						  <th></th>
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
						   		<a class="btn btn-default"  href="<?php echo site_url('admin/index#/students/receipt/')?>/{{rt.id}}" ><i class="ion-printer"></i> Print</a>
						   		<a class="btn btn-warning"  href="<?php echo site_url('admin/students/receiptdownload/')?>/{{rt.id}}" target="_blank" ><i class="ion-android-download"></i> Download</a>
								<a class="btn btn-primary"  href="<?php echo site_url('admin/index#/students/edit_receipt/')?>/{{rt.id}}" ><i class="ion-edit"></i> Edit</a>
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
				  <uib-tab heading="Certificates">
				  	<div class="row">
						<div class="col-md-2 pull-right form-group">
							<a href="<?php echo site_url('admin/index#/students/add_certificate')?>/{{tasks[0].id}}" class="btn btn-success "> <i class="ion-android-add"></i>  Add</a>
						</div>
					</div>
					<span ng-if="certificates.length > 0">
					<table class="table" datatable="ng" >
						<thead>
						<tr class="sortable ">
						  <th>#</th>
						  <th>Title</th>
						  <th>Issue On</th>
						  <th>Added</th>
						  <th></th>
						  </tr>
					   </thead>
						<tbody >
						<tr ng-repeat="ct in certificates track by $index" >
						  <td class="table-id">{{ $index + 1 }}</td>
						  <td>{{ct.title}}</td>
						  <td>{{ct.issued | date : 'dd/MM/yyyy'}}</td>
						  <td>{{ct.added}}</td>
						   <td>
						   		<a class="btn btn-info"  href="<?php echo base_url('assets/bluradmin/uploads/certificates/')?>/{{ct.file_name}}" download ><i class="ion-ios-download"></i> Download</a>
								<a class="btn btn-primary"  href="<?php echo site_url('admin/index#/students/edit_certificate/')?>/{{ct.id}}" ><i class="ion-edit"></i> Edit</a>
								<a class="btn btn-danger" ng-click="deleteCertificate(ct.id)" ><i class="ion-ios-trash"></i> Delete</a>
							</td>
						 </tr>
						</tbody>
					   </table>
				  	</span>
						<span ng-if="certificates.length == 0">
						<b>No Certificates Avaiable for {{tasks[0].name}}</b>
					  </span>
				  	
				  </uib-tab>
				  <uib-tab heading="Notes">
				  	<form role="form" ng-submit="addNotes();"  enctype="multipart/form-data"  >
					 <input type="hidden" name="student_id" id="student_id" ng-model="student_id" id="student_id" value="{{tasks[0].id}}" />
					 
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
						  	<a class="btn btn-primary"  href="<?php echo site_url('admin/index#/students/edit_notes/')?>/{{nt.id}}" ><i class="ion-edit"></i> Edit</a>
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
							<a href="<?php echo site_url('admin/index#/students/add_files')?>/{{tasks[0].id}}" class="btn btn-success "> <i class="ion-android-add"></i>  Add</a>
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
								<a class="btn btn-primary"  href="<?php echo site_url('admin/index#/students/edit_files/')?>/{{fs.id}}" ><i class="ion-edit"></i> Edit</a>
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
				  <uib-tab heading="Progress Reports">
				  	<div class="row">
					  <form method="post">
					  <div class="col-md-12" ng-controller="pchartCtrl">
						<div ba-panel ba-panel-title="Progress Reports By Course" ba-panel-class="with-scroll ">
						   <div class="form-group col-md-3 pull-right">
								<label for="input01">Course</label>
								 <select  name="course_id" ng-model="course_id" class="form-control" id="course_id" ng-change="getReport();" >
									  <option ng-repeat="cr in batches track by $index" value="{{cr.batch_id}}" ng-selected="{{ $index	== 0}}">{{cr.course}}</option>
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
