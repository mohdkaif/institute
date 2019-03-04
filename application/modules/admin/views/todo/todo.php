<div class="widgets">

  <div class="row">
    <div class="col-md-12">
      <div
          ba-panel
          ba-panel-title="Todo"
          ba-panel-class="with-scroll">
		  
			<div class="row" ng-controller="TodoCtrl">
			  		<!-- Begin page content -->
					<div class="row">
						<div class="col-md-2 pull-right form-group">
							<a href="<?php echo site_url('admin/index#/todo/add')?>" class="btn btn-success "> <i class="ion-android-add"></i>  Add</a>
						</div>
					</div>
					  <table class="table" datatable="ng">
						<thead>
						<tr class="sortable ">
						  <th>#</th>
						  <th>Title</th>
						  <th>Date</th>
						  <th>Status</th>
						  <th>Action</th>
						</tr>
					   </thead>
						<tbody>
						<tr ng-repeat="task in smartTableData track by $index">
						  <td class="table-id">{{ $index + 1 }}</td>
						  <td>{{smartTableData[$index].title}}</td>
						  <td> {{ smartTableData[$index].date | date :  "dd.MM.y" }}</td>
						  <td>{{smartTableData[$index].status==0 ? 'Inactive' : 'Active'}}<!--<input class="todo" type="checkbox" ng-change="updateTask(tasks[$index])"ng-model="tasks[$index].status" ng-true-value="'1'" ng-false-value="'0'">--></td>
							<td>
								<a class="btn btn-info"  href="<?php echo site_url('admin/index#/todo/view/')?>/{{smartTableData[$index].id}}" ><i class="ion-ios-eye"></i> View</a>

								<a class="btn btn-primary"  href="<?php echo site_url('admin/index#/todo/edit/')?>/{{smartTableData[$index].id}}" ><i class="ion-edit"></i> Edit</a>
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

