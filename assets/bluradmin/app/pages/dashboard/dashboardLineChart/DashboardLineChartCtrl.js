/**
 * @author v.lugovksy
 * created on 16.12.2015
 */
(function () {
  'use strict';

  angular.module('BlurAdmin.pages.dashboard')
      .controller('DashboardLineChartCtrl', DashboardLineChartCtrl);

  /** @ngInject */
  function DashboardLineChartCtrl(baConfig, layoutPaths, baUtil) {
     /*
	$http.get(SITE_URL+'/admin/d_api/revenue/').success(function(data){
     	$scope.tasks = data;
		console.log(data);
	}).error(function(data){
		$scope.tasks = data;
	}); 
	*/
	

   var layoutColors = baConfig.colors;
    var graphColor = baConfig.theme.blur ? '#000000' : layoutColors.primary;
    var chartData = [
      { date: new Date(2013, 2), value: 25000, value0: 22000},
      { date: new Date(2013, 3), value: 21000, value0: 25000},
      { date: new Date(2013, 4), value: 24000, value0: 29000},
      { date: new Date(2013, 5), value: 31000, value0: 26000},
      { date: new Date(2013, 6), value: 40000, value0: 25000},
      { date: new Date(2013, 7), value: 37000, value0: 20000},
      { date: new Date(2013, 8), value: 18000, value0: 22000},
      { date: new Date(2013, 9), value: 5000, value0: 26000},
      { date: new Date(2013, 10), value: 40000, value0: 30000},
      { date: new Date(2013, 11), value: 20000, value0: 25000},
      { date: new Date(2014, 0), value: 5000, value0: 13000},
    ];

    var chart = AmCharts.makeChart('amchart', {
      type: 'serial',
      theme: 'blur',
      marginTop: 15,
      marginRight: 15,
      dataProvider: chartData,
      categoryField: 'date',
      categoryAxis: {
        parseDates: false,
        gridAlpha: 0,
        color: layoutColors.defaultText,
        axisColor: layoutColors.defaultText
      },
      valueAxes: [
        {
          minVerticalGap: 50,
          gridAlpha: 0,
          color: layoutColors.defaultText,
          axisColor: layoutColors.defaultText
        }
      ],
      graphs: [
        {
          id: 'g0',
          bullet: 'none',
          useLineColorForBulletBorder: true,
          lineColor: baUtil.hexToRGB(graphColor, 0.3),
          lineThickness: 1,
          negativeLineColor: layoutColors.danger,
          type: 'smoothedLine',
          valueField: 'value0',
          fillAlphas: 1,
          fillColorsField: 'lineColor'
        },
        {
          id: 'g1',
          bullet: 'none',
          useLineColorForBulletBorder: true,
          lineColor: baUtil.hexToRGB(graphColor, 0.5),
          lineThickness: 1,
          negativeLineColor: layoutColors.danger,
          type: 'smoothedLine',
          valueField: 'value',
          fillAlphas: 1,
          fillColorsField: 'lineColor'
        }
      ],
      chartCursor: {
        categoryBalloonDateFormat: 'MM YYYY',
        categoryBalloonColor: '#4285F4',
        categoryBalloonAlpha: 0.7,
        cursorAlpha: 0,
        valueLineEnabled: true,
        valueLineBalloonEnabled: true,
        valueLineAlpha: 0.5
      },
      dataDateFormat: 'MM YYYY',
      export: {
        enabled: true
      },
      creditsPosition: 'bottom-right',
      zoomOutButton: {
        backgroundColor: '#fff',
        backgroundAlpha: 0
      },
      zoomOutText: '',
      pathToImages: layoutPaths.images.amChart
    });

    function zoomChart() {
      chart.zoomToDates(new Date(2013, 3), new Date(2014, 0));
    }

    chart.addListener('rendered', zoomChart);
    zoomChart();
    if (chart.zoomChart) {
      chart.zoomChart();
    }
  }
})();
 