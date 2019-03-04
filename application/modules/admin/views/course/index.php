<div class="widgets">

  <div class="row">
    <div class="col-md-12">
      <div
          ba-panel
          ba-panel-title="Courses"
          ba-panel-class="with-scroll">
		  
			<div class="row" ng-controller="courseCtrl">
			  		<!-- Begin page content -->
					<div class="row">
						<div class="col-md-5 pull-right form-group">
							<a href="<?php echo site_url('admin/index#/course/add')?>" class="btn btn-success "> <i class="ion-android-add"></i>  Add</a>
							<a href="#" class="btn btn-warning " ng-click="printData()"> <i class="ion-android-print"></i>  Print</a>
							<a href="<?php echo site_url('admin/course/export')?>"  target="_blank" class="btn btn-info " > <i class="ion-android-archive"></i>  CSV</a>
							<a href="<?php echo site_url('admin/course/pdf')?>"  target="_blank" class="btn btn-danger" > <i class="ion-android-download"></i>  PDF</a>
						</div>
					</div>
					  <table class="table" datatable="ng" export-csv='csv' id="printTable" >
						<thead>
						<tr class="sortable ">
						  <th>#</th>
						  <th>Title</th>
						  <th>Category</th>
						  <th>Duration</th>
						  <th>Fees</th>
						  <th>Students</th>
						  <th>Faculties</th>
						  <th>Batches</th>
						</tr>
					   </thead>
						<tbody style="cursor:pointer">
						<tr ng-repeat="task in tasks track by $index" ng-click="go(tasks[$index])">
						  <td class="table-id">{{ $index + 1 }}</td>
						  <td>{{tasks[$index].title}}</td>
						  <td>{{tasks[$index].category}}</td>
						  <td>{{tasks[$index].duration}} {{1== task.duration_type ? 'Hours':'Days'}}</td>
						  <td>{{tasks[$index].fees}}</td>
						  <td>{{tasks[$index].students}}</td>
						  <td>{{tasks[$index].faculties}}</td>
						  <td>{{tasks[$index].batches}}</td>
						</tr>
						</tbody>
					   </table>
						
					</div>
			
	  </div>
    </div>
    
  </div>

</div>

