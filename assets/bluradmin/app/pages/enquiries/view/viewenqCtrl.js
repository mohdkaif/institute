(function () {
  'use strict';

  angular.module('BlurAdmin.pages.enquiries.view')
      .controller('viewenqCtrl', viewenqCtrl);
	
  function viewenqCtrl($scope,$http,$window,$stateParams,toastr) {
	//alert(1211);
	
	//  alert($stateParams.id);
	 $http.get(SITE_URL+'/admin/enq_api/tasks/'+ $stateParams.id).success(function(data){
        $scope.tasks = data;
		//console.log($scope.tasks);
    }).error(function(data){
        $scope.tasks = data;
    }); 
 
	
	
	
  }
})();
