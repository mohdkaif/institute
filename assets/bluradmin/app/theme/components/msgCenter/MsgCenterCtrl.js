/**
 * @author v.lugovksy
 * created on 16.12.2015
 */
(function () {
  'use strict';

  angular.module('BlurAdmin.theme.components')
      .controller('MsgCenterCtrl', MsgCenterCtrl);

  /** @ngInject */
  function MsgCenterCtrl($scope, $sce,$http,$window,$stateParams,toastr) {
    
	$http.get(SITE_URL+'/admin/b_api/notifications/').success(function(data){
        $scope.notifications = data;
		
		//console.log($scope.tasks);
    }).error(function(data){
        $scope.notifications = data;
    }); 
	
	 $http.get(SITE_URL+'/admin/b_api/new_notifications/').success(function(data){
        
		$scope.count = data.length;
		//console.log($scope.tasks);
    }).error(function(data){
        $scope.tasks= data;
    });
    
    
  }
})();