(function () {
  'use strict';

  angular.module('BlurAdmin.pages.masters')
      .controller('addecCtrl', addecCtrl);
	
  function addecCtrl($scope,$http,$window,toastr, toastrConfig,$element) {
	  
	
  
  
  $scope.addTask = function(){
		//console.log($scope.example1model);
		var elem = angular.element($element);
		$http({
			method: 'POST',
			dataType: "json",
			url: SITE_URL+'/admin/ec_api/tasks',
			headers: {'Content-Type': 'application/x-www-form-urlencoded'},
			data: $(elem).serialize(),
			//data: $(elem).serialize() + "&image=" + $scope.image,
		}).success(function () {
			$window.location.href = SITE_URL+'/admin/index#/masters/expanses_category';
			toastr.success('Expanses Category Created Successfully', 'Success!', {
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


