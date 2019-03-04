<div class="widgets">

  <div class="row">
    <div class="col-md-12">
      <div
          ba-panel
          ba-panel-title="Courses"
          ba-panel-class="with-scroll">
		  
			<div class="row" ng-controller="enquiriesCtrl">
			  		<!-- Begin page content -->
					<div class="row">
						<div class="col-md-4 pull-right form-group">
							<a href="<?php echo site_url('admin/index#/enquiries/add')?>" class="btn btn-success "> <i class="ion-android-add"></i>  Add</a>
							<a href="#" class="btn btn-warning " ng-click="printData()"> <i class="ion-android-print"></i>  Print</a>
							<a href="<?php echo site_url('admin/enquiries/export')?>"  target="_blank" class="btn btn-info " > <i class="ion-android-archive"></i>  CSV</a>
							<a href="<?php echo site_url('admin/enquiries/pdf')?>"  target="_blank" class="btn btn-danger" > <i class="ion-android-download"></i>  PDF</a>
						</div>
					</div>
					  <table class="table" datatable="ng" export-csv='csv' id="printTable" >
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
						<tr ng-repeat="task in tasks track by $index" ng-click="go(tasks[$index])">
						  <td class="table-id">{{ $index + 1 }}</td>
						    <td>{{tasks[$index].date_time  | date:'MM/dd/yyyy @ h:mma'}}</td>
						  <td>{{tasks[$index].name}}</td>
						  <td>{{tasks[$index].mobile}}</td>
						  <td>{{tasks[$index].course}}</td>
						  <td>{{tasks[$index].preferred_time}}</td>
						  <td>{{tasks[$index].estatus}}</td>
						  <td>
						  	<a class="btn btn-info"  href="<?php echo site_url('admin/index#/enquiries/view/')?>/{{tasks[$index].id}}" ><i class="ion-ios-eye"></i> View</a>

								<a class="btn btn-primary"  href="<?php echo site_url('admin/index#/enquiries/edit/')?>/{{tasks[$index].id}}" ><i class="ion-edit"></i> Edit</a>
								<a class="btn btn-danger" ng-click="deleteTask(tasks[$index])" ><i class="ion-ios-trash"></i> Delete</a>
								<span ng-if="tasks[$index].admitted==0">
								<a class="btn btn-success"  href="<?php echo site_url('admin/index#/students/add/')?>/{{tasks[$index].id}}" ><i class="fa  fa-sign-in"></i> Admission</a>
								</span>
								<span ng-if="tasks[$index].admitted==1">
								<a class="btn btn-success"  href="#" ><i class="fa  fa-check"></i> Admitted</a>
								</span>
						  </td>
						</tr>
						</tbody>
					   </table>
						
					</div>
			
	  </div>
    </div>
    
  </div>

</div>

