<div class="widgets">

  <div class="row">
    <div class="col-md-12">
      <div
          ba-panel
          ba-panel-title="Notification"
          ba-panel-class="with-scroll">
		  
			<div class="row" ng-controller="notiCtrl">
			  		<!-- Begin page content -->
					  <table class="table" datatable="ng" export-csv='csv' id="printTable" >
						<thead>
						<tr class="sortable ">
						  <th>#</th>
						  <th>Title</th>
						 </tr>
					   </thead>
						<tbody >
						<tr ng-repeat="task in tasks track by $index">
						  <td class="table-id">{{ $index + 1 }}</td>
						    <td>{{tasks[$index].template}}</td>
						 
						 </tr>
						</tbody>
					   </table>
						
					</div>
			
	  </div>
    </div>
    
  </div>

</div>

