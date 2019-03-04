(function () {
  'use strict';

  angular.module('BlurAdmin.pages.todo.view')
      .controller('detailsCtrl', detailsCtrl);
	
  function detailsCtrl($scope,$http,$window,$stateParams,toastr) {
	//alert(1211);
	
	//  alert($stateParams.id);
	 $http.get(SITE_URL+'/admin/c_api/tasks/'+ $stateParams.id).success(function(data){
        $scope.tasks = data;
		//console.log($scope.tasks);
    }).error(function(data){
        $scope.tasks = data;
    });
	 
	 $http.get(SITE_URL+'/admin/c_api/enquries/'+ $stateParams.id).success(function(data){
        $scope.enquiries = data;
		//console.log($scope.tasks);
    }).error(function(data){
        $scope.enquiries = data;
    });
	 
	  $http.get(SITE_URL+'/admin/c_api/students/'+ $stateParams.id).success(function(data){
        $scope.students = data;
		//console.log($scope.tasks);
    }).error(function(data){
        $scope.students = data;
    });
	  
	 $http.get(SITE_URL+'/admin/c_api/faculties/'+ $stateParams.id).success(function(data){
        $scope.faculties = data;
		//console.log($scope.tasks);
    }).error(function(data){
        $scope.faculties = data;
    });
	 
	 $http.get(SITE_URL+'/admin/c_api/batches/'+ $stateParams.id).success(function(data){
        $scope.batches = data;
		//console.log($scope.tasks);
    }).error(function(data){
        $scope.batches = data;
    });
	  
	   
	 $http.get(SITE_URL+'/admin/c_api/materials/'+ $stateParams.id).success(function(data){
        $scope.materials = data;
		//console.log($scope.tasks);
    }).error(function(data){
        $scope.materials = data;
    });
	 
    $scope.refresh = function(){
        $http.get(SITE_URL+'/index.php/admin/c_api/tasks').success(function(data){
            $scope.tasks = data;
        }).error(function(data){
            $scope.tasks = data;
        });
    }
 	$scope.refresh = function(){
        $http.get(SITE_URL+'/admin/c_api/materials/'+ $stateParams.id).success(function(data){
			$scope.materials = data;
			//console.log($scope.tasks);
		}).error(function(data){
			 $scope.materials = data;
	    });
    }
 
	  $scope.deleteTask = function(task){
		 if(confirm("Do you want to delete this?")) {
		   		  $http.delete(SITE_URL+'/admin/c_api/tasks/' + task.id);
       
				toastr.success('Course Deleted Successfully', 'Success!', {
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
				$window.location.href = SITE_URL+'/admin/index#/course';
		   }else{
		   
		   }       
        
    }
	
	 $scope.deleteMaterial = function(task){
		 if(confirm("Do you want to delete this?")) {
		   		  $http.delete(SITE_URL+'/admin/c_api/material/' + task);
       
				toastr.success('Study Material Deleted Successfully', 'Success!', {
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
				 $scope.refresh();
				$window.location.refresh;
				//$window.location.href = SITE_URL+'/admin/index#/course/details/'+ $stateParams.id;
		   }else{
		   
		   }       
        
    }
	
	
	
	
 
  }
})();
