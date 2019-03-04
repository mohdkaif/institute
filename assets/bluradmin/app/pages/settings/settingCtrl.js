(function () {
  'use strict';
  angular.module('BlurAdmin.pages.settings')
  	  .controller('settingCtrl', settingCtrl);
	
	
		
	function settingCtrl($scope,$http,$window,toastr,$timeout, $upload,$element,$stateParams) {
	
	$scope.refresh = function(){
		$http.get(SITE_URL+'/admin/st_api/tasks/').success(function(data){
		  $scope.tasks		= data;
		}).error(function(data){
			$scope.tasks	= data;
		});
	}
		
	$http.get(SITE_URL+'/admin/st_api/tasks/').success(function(data){
      $scope.tasks		= data;
    }).error(function(data){
        $scope.tasks	= data;
    });
	
	$scope.getFile= function() {
			//$scope.image;
	}
		
	
		$scope.onFileSelect = function($files) {
			//alert();
			for (var i = 0; i < $files.length; i++) {
				var $file = $files[i];
				$upload.upload({
					url: SITE_URL+'/admin/st_api/tasks',
					file: $file,
					 data: {
						'is_file': 1,
					},
					progress: function(e){}
					}).then(function(response) {
						$timeout(function() {
						//$scope.uploadResult.push(response.data);
						//$scope.image	=	response.data.image;
						angular.element('#img').val(response.data.image);
						//alert($scope.image);
						//console.log(response.data);
					});
				});
			}
		}

	$scope.updateTask = function(){
     	//console.log($scope.selectedCourse);
		var elem = angular.element($element);
		$http({
			method: 'POST',
			dataType: "json",
			url: SITE_URL+'/admin/st_api/tasks',
			headers: {'Content-Type': 'application/x-www-form-urlencoded'},
			data: $(elem).serialize(),
		}).success(function () {
			$scope.refresh();	
			$window.location.href = SITE_URL+'/admin/index#/settings';
			toastr.success('Settings Updated Successfully', 'Success!', {
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


