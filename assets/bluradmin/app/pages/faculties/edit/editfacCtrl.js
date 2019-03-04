(function () {
  'use strict';
  angular.module('BlurAdmin.pages.faculties.edit')
  	  .controller('editfacCtrl', editfacCtrl);
	
	
		
	function editfacCtrl($scope,$http,$window,toastr,$timeout, $upload,$element,$stateParams) {
		setTimeout(function(){ 
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
		
		}, 3000);
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
		$scope.getFile= function() {
			//$scope.image;
		}
		$scope.uploadResult = [];
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
	
	$http.get(SITE_URL+'/admin/f_api/tasks/'+ $stateParams.id).success(function(data){
        $scope.tasks = data;
		//console.log($scope.tasks[0].id);
    }).error(function(data){
        $scope.tasks = data;
    	 
	});
	$http.get(SITE_URL+'/admin/c_api/classes').success(function(data){
      $scope.course= data;
    }).error(function(data){
        $scope.course = data;
    });
	
	$http.get(SITE_URL+'/admin/c_api/select_classes/'+$scope.id).success(function(data){
      $scope.selcourse= data;
    }).error(function(data){
        $scope.selcourse = data;
    });
    /*setTimeout(function(){ 
			 $scope.example15settings = {
					smartButtonTextConverter: function(itemText, originalItem) {
						return itemText;
					},
					enableSearch: true,
					scrollableHeight: '200px',
					scrollable: true,
			};					
	}, 3000);
	*/
	
     $scope.example15settings = {
					smartButtonTextConverter: function(itemText, originalItem) {
						return itemText;
					},
					smartButtonMaxItems: 50,
					enableSearch: true,
					scrollableHeight: '200px',
					scrollable: true,
			};	
	
	$scope.updateTask = function(){
     	//console.log($scope.selectedCourse);
		var elem = angular.element($element);
		$http({
			method: 'POST',
			dataType: "json",
			url: SITE_URL+'/admin/f_api/tasks',
			headers: {'Content-Type': 'application/x-www-form-urlencoded'},
			data: $(elem).serialize()+ "&course=" + $scope.selcourse+ "&image=" + $scope.image,
		}).success(function () {
			$window.location.href = SITE_URL+'/admin/index#/faculties/details/'+$stateParams.id;
			toastr.success('Faculty Updated Successfully', 'Success!', {
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


