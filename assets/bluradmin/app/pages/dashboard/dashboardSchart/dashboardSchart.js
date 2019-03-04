/**
 * @author v.lugovsky
 * created on 16.12.2015
 */
(function () {
  'use strict';

   angular.module('BlurAdmin.pages.dashboard')
      .controller('dashboardSchart', dashboardSchart);

  /** @ngInject */
  function dashboardSchart($scope, baConfig, $element, layoutPaths,$http) {
	    
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
	/*
		 dataProvider:[{"date":"Sep","duration":null},{"date":"Oct","duration":null},{"date":"Nov","duration":null},{"date":"Dec","duration":null},{"date":"Jan","duration":null},{"date":"Feb","duration":null},{"date":"Mar","duration":null},{"date":"Apr","duration":null},{"date":"May","duration":null},{"date":"Jun","duration":"5000.00"},{"date":"Jul","duration":"101999.00"}],
		 /*
		  dataProvider: [
			{
			  //lineColor: layoutColors.info,
			  date: 'June',
			  duration: 408
			},
			{
			  date: 'Aug',
			  duration: 11482
			},
			{
			  date: 'July',
			  duration: 562
			},
			{
			  date: 'Sep',
			  duration: 379
			},
			{
			 // lineColor: layoutColors.warning,
			  date: 'Otc',
			  duration: 501
			},
			{
			  date: 'Nov',
			  duration: 443
			},
			{
			  date: 'Dec',
			  duration: 405
			},
			{
			  date: 'Jan',
			  duration: 1309,
			//  lineColor: layoutColors.danger
			}
		  ],*/
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
