(function () {
  'use strict';
  angular.module('BlurAdmin.pages.inventory.view')
  	  .controller('viewexpansesCtrl', viewexpansesCtrl);
	
	
		
	function viewexpansesCtrl($scope,$http,$window,toastr,$timeout, $upload,$element,$stateParams) {
	
		
		
	$http.get(SITE_URL+'/admin/ex_api/tasks/'+ $stateParams.id).success(function(data){
        $scope.tasks = data;
		//console.log($scope.tasks[0].id);
    }).error(function(data){
        $scope.tasks = data;
    	 
	});
	
	
 }
  
  
  
  
  
})();


