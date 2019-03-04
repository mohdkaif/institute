<div class="widgets">

  <div class="row">
    <div class="col-md-12">
      <div
          ba-panel
          ba-panel-title="Expanses Category"
          ba-panel-class="with-scroll">
		  
			<div class="row" ng-controller="ecategoryCtrl">
			  		<!-- Begin page content -->
					<div class="row">
						<div class="col-md-2 pull-right form-group">
							<a href="<?php echo site_url('admin/index#/masters/expanses_category/add')?>" class="btn btn-success "> <i class="ion-android-add"></i> Add</a>
						</div>
					</div>
					  <table class="table" datatable="ng">
						<thead>
						<tr class="sortable ">
						  <th>#</th>
						  <th>Name</th>
						  <th class="col-md-3">Action</th>
						</tr>
					   </thead>
						<tbody>
						<tr ng-repeat="task in smartTableData track by $index">
						  <td class="table-id">{{ $index + 1 }}</td>
						  <td>{{smartTableData[$index].name}}</td>
						 	<td>
								
								<a class="btn btn-primary"  href="<?php echo site_url('admin/index#/masters/expanses_category/edit/')?>/{{smartTableData[$index].id}}" ><i class="ion-edit"></i> Edit</a>
								<a class="btn btn-danger" ng-click="deleteTask(smartTableData[$index])" ><i class="ion-ios-trash"></i> Delete</a>
							</td>
						</tr>
						</tbody>
					   </table>
						
					</div>
			
	  </div>
    </div>
    
  </div>

</div>

