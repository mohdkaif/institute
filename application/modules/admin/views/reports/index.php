<div class="widgets">
	

  <div class="row" >
    <div class="col-md-12">
      <div
          ba-panel
          ba-panel-title="Reports"
          ba-panel-class="with-scroll" >
		  <div ng-controller="reportsCtrl">
			
			
			<uib-tabset>
				  <uib-tab heading="Revenue Reports">
				  	 <div id="areaChart" class="admin-chart" ng-controller="reportsRchart" ></div>
				  </uib-tab>
				  <uib-tab heading="Staudent Reports">
				 	<div id="areaChart2" class="admin-chart" ng-controller="reportsSchart" style="height:335px;"></div>
				  </uib-tab>
				  <uib-tab heading="Batch Report">
				  			<div class="row">
							  <form method="post">
							  <div class="col-md-12" ng-controller="batchchartCtrl">
								<div ba-panel ba-panel-title="Progress Reports By Batch" ba-panel-class="with-scroll ">
								   <div class="form-group col-md-3 pull-right">
										<label for="input01">Batch</label>
										 <select  name="course_id" ng-model="course_id" class="form-control" id="course_id" ng-change="getReport();" >
											  <option ng-repeat="cr in batches track by $index" value="{{cr.id}}" ng-selected="{{ $index	== 0}}">{{cr.title}} ({{cr.course}})</option>
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
