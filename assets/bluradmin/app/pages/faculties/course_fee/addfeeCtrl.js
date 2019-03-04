(function () {
  'use strict';
  angular.module('BlurAdmin.pages.faculties.course_fee')
  	  .controller('addfeeCtrl', addfeeCtrl);
	
	
		
	function addfeeCtrl($scope,$http,$window,toastr,$timeout, $upload,$element,$stateParams) {
		$scope.faculty_id	=	$stateParams.id;
	$http.get(SITE_URL+'/admin/c_api/classes').success(function(data){
      $scope.course= data;
    }).error(function(data){
        $scope.course = data;
    });
  	 $scope.example15settings = {enableSearch: true};
  	$scope.selectedCourse = [];
	// JavaScript 
	$scope.example1model = []; 
	//$scope.example1data = [ {id: 1, label: "David"}, {id: 2, label: "Jhon"}, {id: 3, label: "Danny"}];
	
	$scope.uploadResult = [];	
	
	$scope.addTask = function(){
		//console.log($scope.example1model);
		var elem = angular.element($element);
		$http({
			method: 'POST',
			dataType: "json",
			url: SITE_URL+'/admin/f_api/course_fee',
			headers: {'Content-Type': 'application/x-www-form-urlencoded'},
			data: $(elem).serialize(),
			//data: $(elem).serialize() + "&image=" + $scope.image,
		}).success(function () {
			$window.location.href = SITE_URL+'/admin/index#/faculties/details/'+ $scope.faculty_id;
			toastr.success('Course Fee Saved Successfully', 'Success!', {
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


