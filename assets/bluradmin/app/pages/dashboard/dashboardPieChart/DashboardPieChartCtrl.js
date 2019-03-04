/**
 * @author v.lugovksy
 * created on 16.12.2015
 */
(function () {
  'use strict';

  angular.module('BlurAdmin.pages.dashboard')
      .controller('DashboardPieChartCtrl', DashboardPieChartCtrl);

  /** @ngInject */
  function DashboardPieChartCtrl($scope, $timeout, baConfig, baUtil,$http,$window,toastr, $upload,$element,$stateParams) {
	 $http.get(SITE_URL+'/admin/d_api/dashboard_count/').success(function(data){
        $scope.count = data;
		 var pieColor = baUtil.hexToRGB(baConfig.colors.defaultText, 0.2);
		$scope.charts = [{
		  color: pieColor,
		  description: 'Enquiries',
		  stats: $scope.count.enquiries,
		  icon: 'fa-comments',
		}, {
		  color: pieColor,
		  description: 'Students',
		  stats: $scope.count.students,
		  icon: 'fa-users',
		}, {
		  color: pieColor,
		  description: 'Batches',
		  stats: $scope.count.batches,
		  icon: 'fa-database',
		}, {
		  color: pieColor,
		  description: 'Courses',
		  stats: $scope.count.courses,
		  icon: 'fa-book',
		}
		];

		//console.log($scope.tasks);
    }).error(function(data){
        $scope.count = data;
    });
	 
   
   }
})();