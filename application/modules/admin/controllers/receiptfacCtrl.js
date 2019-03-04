(function () {
  'use strict';
  angular.module('BlurAdmin.pages.faculties.receipt')
  	  .controller('receiptfacCtrl', receiptfacCtrl);
	
	function receiptfacCtrl($scope,$http,$window,toastr,$timeout, $upload,$element,$stateParams) {
		
		$scope.id	=	$stateParams.id;
		$http.get(SITE_URL+'/admin/f_api/receipt/'+ $stateParams.id).success(function(data){
			$scope.tasks = data;
			$scope.user_id	=	$scope.tasks[0].user_id;
		//console.log($scope.tasks[0].id);
			alert(123);
		}).error(function(data){
			$scope.tasks = data;
			 
		});
		
	$http.get(SITE_URL+'/admin/st_api/tasks/').success(function(data){
      $scope.setting		= data;
	  console.log(data);
    }).error(function(data){
        $scope.setting	= data;
    });
	
 
	}
  
 
  
  
  
})();


