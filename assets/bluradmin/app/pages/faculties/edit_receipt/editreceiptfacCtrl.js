(function () {
  'use strict';
  angular.module('BlurAdmin.pages.faculties.edit_receipt')
  	  .controller('editreceiptfacCtrl', editreceiptfacCtrl);
	
	function editreceiptfacCtrl($scope,$http,$window,toastr,$timeout, $upload,$element,$stateParams) {
		$scope.id	=	$stateParams.id;
	
	
	setTimeout(function(){
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
					
		
		}, 1000);

	
	
	$http.get(SITE_URL+'/admin/f_api/receipt/'+ $stateParams.id).success(function(data){
        $scope.tasks = data;
		$scope.user_id	=	$scope.tasks[0].user_id;
		$http.get(SITE_URL+'/admin/f_api/batches/'+ $scope.tasks[0].user_id).success(function(data){
			$scope.batches = data;
			//console.log($scope.tasks);
		}).error(function(data){
			$scope.batches = data;
		});
		//console.log($scope.tasks[0].id);
    }).error(function(data){
        $scope.tasks = data;
    	 
	});
	
	 
	
	$scope.updateTask = function(){
     	//console.log($scope.selectedCourse);
		var elem = angular.element($element);
		$http({
			method: 'POST',
			dataType: "json",
			url: SITE_URL+'/admin/f_api/receipts',
			headers: {'Content-Type': 'application/x-www-form-urlencoded'},
			data: $(elem).serialize(),
		}).success(function () {
			$window.location.href = SITE_URL+'/admin/index#/faculties/details/'+$scope.tasks[0].user_id;
			toastr.success('Receipt Updated Successfully', 'Success!', {
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


