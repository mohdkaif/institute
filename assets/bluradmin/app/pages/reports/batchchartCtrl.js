/**
 * @author a.demeshko
 * created on 12/16/15
 */
(function () {
  'use strict';

  angular.module('BlurAdmin.pages.reports')
    .controller('batchchartCtrl', batchchartCtrl);

  /** @ngInject */
  function batchchartCtrl($scope,$http,$window,$stateParams,$element) {
	 	 $http.get(SITE_URL+'/admin/b_api/tasks/').success(function(data){
			//console.log(data.c);
			$scope.batches = data;
		 }).error(function(data){
			$scope.batches= data;
		});
		 
		 setTimeout(function(){ 
				 var course_id		=	angular.element('#course_id').val();
				//alert($scope.course_id);
				
				$http.get(SITE_URL+'/admin/s_api/preport/'+course_id).success(function(data){
					//console.log(data.c);
					$scope.data = data;
				 }).error(function(data){
					$scope.data= data;
				});
				
				$scope.labels =["Completed", "Remaining"];
				//$scope.data = [$scope.cdata.c, $scope.cdata.p];
				$scope.options = {
				  segmentShowStroke : false
				};					 
		}, 3000);
		
	 $scope.getReport = function(){
		 var course_id		=	angular.element('#course_id').val();
	 		//alert(course_id);
	 	$http.get(SITE_URL+'/admin/s_api/preport/'+course_id).success(function(data){
			//console.log(data.c);
			$scope.data = data;
		 }).error(function(data){
			$scope.data= data;
		});
			

		$scope.labels =["Completed", "Remaining"];
		//$scope.data = [$scope.cdata.c, $scope.cdata.p];
		$scope.options = {
		  segmentShowStroke : false
		};
	 
	 }
	 
	 
	 


  }

})();