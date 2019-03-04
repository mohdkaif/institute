<div class="widgets">

  <div class="row">
    <div class="col-md-12">
      <div
          ba-panel
          ba-panel-title="Expanses"
          ba-panel-class="with-scroll">
		  
			<div class="row" ng-controller="expansesCtrl">
			  		<!-- Begin page content -->
					<div class="row">
						<div class="col-md-4 pull-right form-group">
							<a href="<?php echo site_url('admin/index#/expanses/add')?>" class="btn btn-success "> <i class="ion-android-add"></i>  Add</a>
							<a href="#" class="btn btn-warning " ng-click="printData()"> <i class="ion-android-print"></i>  Print</a>
							<a href="<?php echo site_url('admin/expanses/export')?>"  target="_blank" class="btn btn-info " > <i class="ion-android-archive"></i>  CSV</a>
							<a href="<?php echo site_url('admin/expanses/pdf')?>"  target="_blank" class="btn btn-danger" > <i class="ion-android-download"></i>  PDF</a>
						</div>
					</div>
					  <table class="table" datatable="ng" export-csv='csv' id="printTable" >
						<thead>
						<tr class="sortable ">
						  <th>#</th>
						  <th>Date</th>
						  <th>Title</th>
						  <th>Amount</th>
						  <th>Category</th>
						  <th>Payment Method</th>
						  <th>Status</th>
						  <th>Action</th>
						 </tr>
					   </thead>
						<tbody>
						<tr ng-repeat="task in tasks track by $index">
						  <td class="table-id">{{ $index + 1 }}</td>
						   <td>{{tasks[$index].date | date: "dd/MM/yyyy"}}</td>
						   <td>{{tasks[$index].title}}</td> 
							<td>{{tasks[$index].amount}}</td>
						  <td>{{tasks[$index].category}}</td>
						  <td>{{tasks[$index].payment_method==0?'Cheque':'Cash'}}</td>
						  <td>{{tasks[$index].status==0?'Unpaid':'Paid'}}</td>
						  <td>
						  	<a class="btn btn-default"  href="<?php echo site_url('admin/index#/expanses/view/')?>/{{tasks[$index].id}}" ><i class="ion-eye"></i> View</a>
							<a class="btn btn-primary"  href="<?php echo site_url('admin/index#/expanses/edit/')?>/{{tasks[$index].id}}" ><i class="ion-edit"></i> Edit</a>
								<a class="btn btn-danger" ng-click="deleteExpanses(tasks[$index])" ><i class="ion-ios-trash"></i> Delete</a>
						  </td>
						 
						 </tr>
						</tbody>
					   </table>
						
					</div>
			
	  </div>
    </div>
  </div>
</div>

