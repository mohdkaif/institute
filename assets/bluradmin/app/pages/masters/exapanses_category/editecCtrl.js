(function () {
  'use strict';

  angular.module('BlurAdmin.pages.masters')
      .controller('editecCtrl', editecCtrl);
	
  function editecCtrl($scope,$http,$window,$stateParams,toastr,$element) {
	 $http.get(SITE_URL+'/admin/ec_api/tasks/'+ $stateParams.id).success(function(data){
        $scope.tasks = data;
	 }).error(function(data){
        $scope.tasks = data;
    });
	 
	$scope.updateTask = function(){
    	var elem = angular.element($element);
		$http({
			method: 'POST',
			dataType: "json",
			url: SITE_URL+'/admin/ec_api/tasks',
			headers: {'Content-Type': 'application/x-www-form-urlencoded'},
			data: $(elem).serialize(),
		}).success(function () {
			$window.location.href = SITE_URL+'/admin/index#/batches/details/'+$stateParams.id;
			toastr.success('Inventory Updated Successfully', 'Success!', {
				  "autoDismiss": false,
				  "positionClass": "toast-top-right",
				  "type": "info",
				  "timeOut": "10000",
				  "extendedTimeOut": "2000",
				  "allowHtml": false,
				  "closeButton": false,
				  "tapToDismiss": true,
				  "progressBar": false,
				  "newestOnTop": true,
				  "maxOpened": 0,
				  "preventDuplicates": false,
				  "preventOpenDuplicates": false
				});
		
		}).error(function(data){
			
			toastr.error(data.error, 'Error!', {
			  "autoDismiss": false,
			   "positionClass": "toast-top-full-width",
			  "type": "error",
			  "timeOut": "10000",
			  "extendedTimeOut": "2000",
			  "allowHtml": true,
			  "closeButton": false,
			  "tapToDismiss": true,
			  "progressBar": false,
			  "newestOnTop": true,
			  "maxOpened": 0,
			  "preventDuplicates": false,
			  "preventOpenDuplicates": false
			});
        });;
	}
 	
	
  }
})();
