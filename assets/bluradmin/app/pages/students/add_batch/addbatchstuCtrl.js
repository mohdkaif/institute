(function () {
  'use strict';
  angular.module('BlurAdmin.pages.students.add_batch')
  	  .controller('addbatchstuCtrl', addbatchstuCtrl);
	
	function addbatchstuCtrl($scope,$http,$window,toastr,$timeout, $upload,$element,$stateParams) {
		$scope.student_id	=	$stateParams.id;
		
	$scope.getBatches = function(){
		var c_id	=	angular.element('#course_id').val();
		var b_id	=	angular.element('#batch_id').val();
		
		$http.get(SITE_URL+'/admin/s_api/getBatches/'+c_id ).success(function(data){
		  $scope.batches= data;
		}).error(function(data){
			$scope.batches= data;
		});	
	}

	
	$http.get(SITE_URL+'/admin/enq_api/tasks').success(function(data){
      $scope.enquires= data;
    }).error(function(data){
        $scope.enquires = data;
    });
		
	$http.get(SITE_URL+'/admin/c_api/tasks').success(function(data){
      $scope.course= data;
    }).error(function(data){
        $scope.course = data;
    });
	
	$scope.addTask = function(){
		//console.log($scope.example1model);
		var elem = angular.element($element);
		$http({
			method: 'POST',
			dataType: "json",
			url: SITE_URL+'/admin/s_api/batches',
			headers: {'Content-Type': 'application/x-www-form-urlencoded'},
			data: $(elem).serialize(),
			//data: $(elem).serialize() + "&image=" + $scope.image,
		}).success(function () {
			$window.location.href = SITE_URL+'/admin/index#/students/details/'+$stateParams.id;
			toastr.success('Batch Added To Student Successfully', 'Success!', {
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


