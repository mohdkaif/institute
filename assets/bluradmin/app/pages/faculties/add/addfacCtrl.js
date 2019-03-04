(function () {
  'use strict';
  angular.module('BlurAdmin.pages.faculties.add')
  	  .controller('addfacCtrl', addfacCtrl);
	
	
		
	function addfacCtrl($scope,$http,$window,toastr,$timeout, $upload,$element) {
		$('.datetimepicker').datetimepicker({
					icons: {
						time: "ion-clock",
						date: "fa fa-calendar",
						 previous: 'ion-arrow-left-c',
						next: 'ion-arrow-right-c',
						up: "ion-arrow-up-a",
						down: "ion-arrow-down-a"
					},
					format:'YYYY-MM-DD HH:mm:ss',
					useCurrent:true
		});
		
		$('.timepicker').datetimepicker({
					icons: {
						time: "ion-clock",
						date: "fa fa-calendar",
						 previous: 'ion-arrow-left-c',
						next: 'ion-arrow-right-c',
						up: "ion-arrow-up-a",
						down: "ion-arrow-down-a"
					},
					format:'HH:mm:ss',
					useCurrent:true
		});
		
		
		$('.datepicker').datetimepicker({
					icons: {
					  time: "ion-clock",
						date: "fa fa-calendar",
						 previous: 'ion-arrow-left-c',
						next: 'ion-arrow-right-c',
						up: "ion-arrow-up-a",
						down: "ion-arrow-down-a"
					},
					format:'YYYY-MM-DD',
					useCurrent:true
		});
		$('#joinDate').datetimepicker({
					icons: {
					  time: "ion-clock",
						date: "fa fa-calendar",
						 previous: 'ion-arrow-left-c',
						next: 'ion-arrow-right-c',
						up: "ion-arrow-up-a",
						down: "ion-arrow-down-a"
					},
					format:'YYYY-MM-DD',
					useCurrent:true
		});
		$scope.getFile= function() {
			//$scope.image;
		}
		
		$scope.onFileSelect = function($files) {
			for (var i = 0; i < $files.length; i++) {
				var $file = $files[i];
				$upload.upload({
					url: SITE_URL+'/admin/f_api/tasks',
					file: $file,
					 data: {
						'is_file': 1,
					},
					progress: function(e){}
					}).then(function(response) {
						$timeout(function() {
						//$scope.uploadResult.push(response.data);
						$scope.image	=	response.data.image;
						//alert($scope.image);
						//console.log(response.data);
					});
				});
			}
		}
		
	$http.get(SITE_URL+'/admin/c_api/classes').success(function(data){
      $scope.course= data;
    }).error(function(data){
        $scope.course = data;
    });
  	
	
	$scope.example13model = [];
	
	$scope.example13settings = {
		smartButtonMaxItems: 50,
		enableSearch: true,
		scrollableHeight: '200px',
		scrollable: true,
		smartButtonTextConverter: function(itemText, originalItem) {
			if (itemText === 'Jhon') {
			return 'Jhonny!';
			}
	
			return itemText;
		}
	};
	
  	$scope.selectedCourse = [];
	// JavaScript 
	
	
	$scope.uploadResult = [];	
	
	$scope.addTask = function(){
		//console.log($scope.example13model);
		var elem = angular.element($element);
		$http({
			method: 'POST',
			dataType: "json",
			url: SITE_URL+'/admin/f_api/tasks',
			headers: {'Content-Type': 'application/x-www-form-urlencoded'},
			data: $(elem).serialize()+ "&course=" + $scope.example13model + "&image=" + $scope.image,
			data: $(elem).serialize() + "&image=" + $scope.image,
		}).success(function () {
			$window.location.href = SITE_URL+'/admin/index#/faculties';
			toastr.success('Faculty Created Successfully', 'Success!', {
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


