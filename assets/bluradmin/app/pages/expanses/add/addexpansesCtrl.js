(function () {
  'use strict';
  angular.module('BlurAdmin.pages.expanses.add')
  	  .controller('addexpansesCtrl', addexpansesCtrl);
	

	
		
	function addexpansesCtrl($scope,$http,$window,toastr,$timeout, $upload,$element) {
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
		$http.get(SITE_URL+'/admin/ec_api/tasks').success(function(data){
			 $scope.items = data;
		 }).error(function(data){
			$scope.items  = data;
		});
		 
	
		
	$scope.addTask = function(){
		//console.log($scope.example1model);
		var elem = angular.element($element);
		$http({
			method: 'POST',
			dataType: "json",
			url: SITE_URL+'/admin/ex_api/tasks',
			headers: {'Content-Type': 'application/x-www-form-urlencoded'},
			data: $(elem).serialize(),
			//data: $(elem).serialize() + "&image=" + $scope.image,
		}).success(function () {
			$window.location.href = SITE_URL+'/admin/index#/expanses';
			toastr.success('Expanses Added Successfully', 'Success!', {
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


