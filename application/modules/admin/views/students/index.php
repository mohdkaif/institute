<div class="widgets">

  <div class="row">
    <div class="col-md-12">
      <div
          ba-panel
          ba-panel-title="Students"
          ba-panel-class="with-scroll">
		  
			<div class="row" ng-controller="studentsCtrl">
			  		<!-- Begin page content -->
					<div class="row">
						<div class="col-md-4 pull-right form-group">
							<a href="<?php echo site_url('admin/index#/students/add/new')?>" class="btn btn-success "> <i class="ion-android-add"></i>  Add</a>
							<a href="#" class="btn btn-warning " ng-click="printData()"> <i class="ion-android-print"></i>  Print</a>
							<a href="<?php echo site_url('admin/students/export')?>"  target="_blank" class="btn btn-info " > <i class="ion-android-archive"></i>  CSV</a>
							<a href="<?php echo site_url('admin/students/pdf')?>"  target="_blank" class="btn btn-danger" > <i class="ion-android-download"></i>  PDF</a>
						</div>
					</div>
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
						<tr ng-repeat="task in tasks track by $index" ng-click="go(tasks[$index])">
						  <td class="table-id">{{ $index + 1 }}</td>
						    <td>{{tasks[$index].name}}</td>
						  <td>{{tasks[$index].gardian_name}}</td>
						  <td>{{tasks[$index].mobile}}</td>
						  <td>{{tasks[$index].dob| date : 'dd/MM/yyyy'}}</td>
						  <td>{{tasks[$index].gender}}</td>
						 <td>{{tasks[$index].added| date : 'dd/MM/yyyy'}}</td>
						 
						 </tr>
						</tbody>
					   </table>
						
					</div>
			
	  </div>
    </div>
    
  </div>

</div>

