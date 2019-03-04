(function () {
  'use strict';

  angular.module('BlurAdmin.pages.batches.notifications')
      .controller('notiCtrl', notiCtrl);

  function notiCtrl($scope,$http,$window,toastr,DTOptionsBuilder, DTColumnBuilder) {
	 
    $http.get(SITE_URL+'/admin/b_api/notifications_all/').success(function(data){
        $scope.tasks = data;
		//console.log($scope.tasks);
    }).error(function(data){
        $scope.tasks= data;
    }); 
	
 
 
  }
})();