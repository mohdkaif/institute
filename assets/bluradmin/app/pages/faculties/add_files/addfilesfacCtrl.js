(function () {
  'use strict';
  angular.module('BlurAdmin.pages.faculties.add_files')
  	  .controller('addfilesfacCtrl', addfilesfacCtrl);
	
	function addfilesfacCtrl($scope,$http,$window,toastr,$timeout, $upload,$element,$stateParams) {
	
	$scope.faculty_id	=	$stateParams.id;
	
	$scope.getFile= function() {
			//$scope.image;
	}
		
	
	$scope.onFileSelect = function($files) {
		//alert();
		for (var i = 0; i < $files.length; i++) {
			var $file = $files[i];
			$upload.upload({
				url: SITE_URL+'/admin/f_api/files',
				file: $file,
				 data: {
					'is_file': 1,
				},
				progress: function(e){}
				}).then(function(response) {
					$timeout(function() {
					angular.element('#img').val(response.data.image);
				});
			});
		}
	}
	
	$scope.addTask = function(){
		//console.log($scope.example1model);
		var elem = angular.element($element);
		$http({
			method: 'POST',
			dataType: "json",
			url: SITE_URL+'/admin/f_api/files',
			headers: {'Content-Type': 'application/x-www-form-urlencoded'},
			data: $(elem).serialize(),
			//data: $(elem).serialize() + "&image=" + $scope.image,
		}).success(function () {
			$window.location.href = SITE_URL+'/admin/index#/faculties/details/'+$stateParams.id;
			toastr.success('File Saved Successfully', 'Success!', {
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


