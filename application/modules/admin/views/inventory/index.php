<div class="widgets">

  <div class="row">
    <div class="col-md-12">
      <div
          ba-panel
          ba-panel-title="Inventory"
          ba-panel-class="with-scroll">
		  
			<div class="row" ng-controller="inventoryCtrl">
			  		<!-- Begin page content -->
					<div class="row">
						<div class="col-md-4 pull-right form-group">
							<a href="<?php echo site_url('admin/index#/inventory/add')?>" class="btn btn-success "> <i class="ion-android-add"></i>  Add</a>
							<a href="#" class="btn btn-warning " ng-click="printData()"> <i class="ion-android-print"></i>  Print</a>
							<a href="<?php echo site_url('admin/inventory/export')?>"  target="_blank" class="btn btn-info " > <i class="ion-android-archive"></i>  CSV</a>
							<a href="<?php echo site_url('admin/inventory/pdf')?>"  target="_blank" class="btn btn-danger" > <i class="ion-android-download"></i>  PDF</a>
						</div>
					</div>
					  <table class="table" datatable="ng" export-csv='csv' id="printTable" >
						<thead>
						<tr class="sortable ">
						  <th>#</th>
						  <th>Title</th>
						  <th>Price</th>
						  <th>Quantity/Stock</th>
						  <th>Added</th>
						  <th>Action</th>
						 </tr>
					   </thead>
						<tbody>
						<tr ng-repeat="task in tasks track by $index" ng-click="go(tasks[$index])">
						  <td class="table-id">{{ $index + 1 }}</td>
						   <td>{{tasks[$index].title}}</td> 
							<td>{{tasks[$index].price}}</td>
						  <td>{{tasks[$index].qty}}</td>
						  <td>{{tasks[$index].added}}</td>
						  <td>
						  	<a class="btn btn-default"  href="<?php echo site_url('admin/index#/inventory/view/')?>/{{tasks[$index].id}}" ><i class="ion-eye"></i> View</a>
							<a class="btn btn-primary"  href="<?php echo site_url('admin/index#/inventory/edit/')?>/{{tasks[$index].id}}" ><i class="ion-edit"></i> Edit</a>
								<a class="btn btn-danger" ng-click="deleteInventory(tasks[$index])" ><i class="ion-ios-trash"></i> Delete</a>
						  </td>
						 
						 </tr>
						</tbody>
					   </table>
						
					</div>
			
	  </div>
    </div>
    
  </div>

</div>

