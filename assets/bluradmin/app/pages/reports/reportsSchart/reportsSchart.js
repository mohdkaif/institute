/**
 * @author v.lugovsky
 * created on 16.12.2015
 */
(function () {
  'use strict';

   angular.module('BlurAdmin.pages.reports')
      .controller('reportsSchart', reportsSchart);

  /** @ngInject */
  function reportsSchart($scope, baConfig, $element, layoutPaths,$http) {
	    
	$http.get(SITE_URL+'/admin/d_api/students/').success(function(data){
     	$scope.tasks = data;
		//console.log(data);
	}).error(function(data){
		$scope.tasks = data;
	}); 
	 
	  setTimeout(function(){ 
			var layoutColors = baConfig.colors;
    var id = $element[0].getAttribute('id');
    var areaChart = AmCharts.makeChart(id, {
      type: 'serial',
      theme: 'blur',
      color: layoutColors.defaultText,
   	 dataProvider: $scope.tasks,
		  balloon: {
			cornerRadius: 6,
			horizontalPadding: 15,
			verticalPadding: 10
		  },
		 
		  graphs: [
			{
			  bullet: 'square',
			  bulletBorderAlpha: 1,
			  bulletBorderThickness: 1,
			  fillAlphas: 0.5,
			  fillColorsField: 'lineColor',
			  legendValueText: '[[value]]',
			  lineColorField: 'lineColor',
			  title: 'duration',
			  valueField: 'duration'
			}
		  ],
	
		  chartCursor: {
			categoryBalloonDateFormat: 'YYYY MMM DD',
			cursorAlpha: 0,
			fullWidth: true
		  },
		  dataDateFormat: 'YYYY-MM-DD',
		  categoryField: 'date',
		  categoryAxis: {
			dateFormats: [
			  {
				period: 'DD',
				format: 'DD'
			  },
			  {
				period: 'WW',
				format: 'MMM DD'
			  },
			  {
				period: 'MM',
				format: 'MMM'
			  },
			  {
				period: 'YYYY',
				format: 'YYYY'
			  }
			],
			parseDates: false,
			autoGridCount: false,
			gridCount: 50,
			gridAlpha: 0.5,
			gridColor: layoutColors.border,
		  },
		  export: {
			enabled: true
		  },
		  pathToImages: layoutPaths.images.amChart
		});
	
		areaChart.addListener('dataUpdated', zoomAreaChart);
 	
	 }, 3000);
	
    function zoomAreaChart() {
      areaChart.zoomToDates(new Date(2012, 0, 3), new Date(2012, 0, 11));
    }
  }

})();
