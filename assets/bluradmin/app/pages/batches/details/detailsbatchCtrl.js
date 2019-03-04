(function () {
  'use strict';

  angular.module('BlurAdmin.pages.batches.details')
      .controller('detailsbatchcCtrl', detailsbatchcCtrl);
	
  function detailsbatchcCtrl($scope,$http,$window,$stateParams,toastr) {
	//alert(1211);
	
	//  alert($stateParams.id);
	 $http.get(SITE_URL+'/admin/b_api/tasks/'+ $stateParams.id).success(function(data){
        $scope.tasks = data;
		//console.log($scope.tasks);
    }).error(function(data){
        $scope.tasks = data;
    }); 
	 
	 $http.get(SITE_URL+'/admin/b_api/report/'+ $stateParams.id).success(function(data){
					//console.log(data.c);
					$scope.data = data.report;
					$scope.labels =data.label;
				 }).error(function(data){
					$scope.data= data;
	});
	$scope.options = {
			  segmentShowStroke : false
	}; 
	 
	 $http.get(SITE_URL+'/admin/b_api/students/'+ $stateParams.id).success(function(data){
        $scope.students = data;
		//console.log($scope.tasks);
    }).error(function(data){
        $scope.students = data;
    }); 
 	$scope.gostudents = function(task){
		$window.location.href = SITE_URL+'/admin/index#/students/details/'+task;
	}
	$scope.deleteTask = function(task){
		 if(confirm("Do you want to delete this?")) {
		   		$http.delete(SITE_URL+'/admin/b_api/tasks/' + task.id);
				//$scope.tasks.splice($scope.tasks.indexOf(task),1);
				$window.location.href = SITE_URL+'/admin/index#/batches';
				toastr.success('Batch Deleted Successfully', 'Success!', {
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
		   }
		   else
		   {
		   }       
        
    }
	$scope.go = function(task){
				$window.location.href = SITE_URL+'/admin/index#/batches/details/'+ task.id;
	}	
	
	
	$scope.deleteFees = function(fees_id){
		 if(confirm("Do you want to delete this?")) {
		   		$http.delete(SITE_URL+'/admin/f_api/deleteFees/' + fees_id);
				$scope.courseFee.splice($scope.courseFee.indexOf(fees_id),1);
				$window.location.href = SITE_URL+'/admin/index#/faculties/details/'+fees_id;
				toastr.success('Faculty Deleted Successfully', 'Success!', {
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
		   }
		   else
		   {
		   }       
        
    }
	
  }
})();
