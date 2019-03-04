<div class="widgets">

  <div class="row">
    <div class="col-md-12">
      <div
          ba-panel
          ba-panel-title="Batches"
          ba-panel-class="with-scroll">
		  
			<div class="row" ng-controller="batchesCtrl">
			  		<!-- Begin page content -->
					<div class="row">
						<div class="col-md-4 pull-right form-group">
							<a href="<?php echo site_url('admin/index#/batches/add')?>" class="btn btn-success "> <i class="ion-android-add"></i>  Add</a>
							<a href="#" class="btn btn-warning " ng-click="printData()"> <i class="ion-android-print"></i>  Print</a>
							<a href="<?php echo site_url('admin/batches/export')?>"  target="_blank" class="btn btn-info " > <i class="ion-android-archive"></i>  CSV</a>
							<a href="<?php echo site_url('admin/batches/pdf')?>"  target="_blank" class="btn btn-danger" > <i class="ion-android-download"></i>  PDF</a>
						</div>
					</div>
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
						<tbody  style="cursor:pointer">
						<tr ng-repeat="task in tasks track by $index" ng-click="go(tasks[$index])">
						  <td class="table-id">{{ $index + 1 }}</td>
						    <td>{{tasks[$index].title}}</td>
						  <td>{{tasks[$index].category}}</td>
						  <td>{{tasks[$index].course}}</td>
						  <td>{{tasks[$index].batch_time | date : 'h:mm a' }}</td>
						  <td>{{tasks[$index].start_date | date : 'dd/MM/yyyy'}}</td>
						  <td>{{tasks[$index].end_date | date : 'dd/MM/yyyy'}}</td>
						  <td>{{tasks[$index].faculty}}</td>
						 
						 </tr>
						</tbody>
					   </table>
						
					</div>
			
	  </div>
    </div>
    
  </div>

</div>

