(function () {
  'use strict';
  angular.module('BlurAdmin.pages.students.edit_batch')
  	  .controller('editbatchstuCtrl', editbatchstuCtrl);
	
	function editbatchstuCtrl($scope,$http,$window,toastr,$timeout, $upload,$element,$stateParams) {
		$scope.id	=	$stateParams.id;
	
	$http.get(SITE_URL+'/admin/s_api/batch/'+ $stateParams.id).success(function(data){
        $scope.tasks = data;
		//console.log($scope.tasks[0].id);
    }).error(function(data){
        $scope.tasks = data;
    	 
	});
	
	$scope.getBatches = function(){
		var c_id	=	angular.element('#course_id').val();
		var b_id	=	angular.element('#batch_id').val();
		
		$http.get(SITE_URL+'/admin/s_api/getBatches/'+c_id ).success(function(data){
		  $scope.batches= data;
		}).error(function(data){
			$scope.batches= data;
		});	
	}
	
	setTimeout(function(){
						var c_id	=	angular.element('#course_id').val();
						var b_id	=	angular.element('#batch_id').val();
						
						$http.get(SITE_URL+'/admin/s_api/getBatches/'+c_id ).success(function(data){
						  $scope.batches= data;
						}).error(function(data){
							$scope.batches= data;
						});	
		
		}, 3000);
	
		
	$http.get(SITE_URL+'/admin/c_api/tasks').success(function(data){
      $scope.course= data;
    }).error(function(data){
        $scope.course = data;
    });
	
	$scope.updateTask = function(){
     	//console.log($scope.selectedCourse);
		var elem = angular.element($element);
		$http({
			method: 'POST',
			dataType: "json",
			url: SITE_URL+'/admin/s_api/batches',
			headers: {'Content-Type': 'application/x-www-form-urlencoded'},
			data: $(elem).serialize(),
		}).success(function () {
			$window.location.href = SITE_URL+'/admin/index#/students/details/'+$scope.tasks[0].student_id;
			toastr.success('Student Batch Updated Successfully', 'Success!', {
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


