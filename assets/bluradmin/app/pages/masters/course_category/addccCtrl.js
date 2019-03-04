(function () {
  'use strict';

  angular.module('BlurAdmin.pages.masters')
      .controller('addccCtrl', addccCtrl);
	
  function addccCtrl($scope,$http,$window,toastr, toastrConfig) {
	  
	
    $http.get(SITE_URL+'/admin/cc_api/tasks').success(function(data){
        $scope.tasks = data;
    }).error(function(data){
        $scope.tasks = data;
    });
 
    $scope.refresh = function(){
        $http.get(SITE_URL+'/admin/cc_api/tasks').success(function(data){
            $scope.tasks = data;
        }).error(function(data){
            $scope.tasks = data;
        });
    }
 
    $scope.addTask = function(){
       //console.log($scope);
	   var newTask = {name: $scope.taskName};
        $http.post(SITE_URL+'/admin/cc_api/tasks', newTask).success(function(data){
            $scope.refresh();
            $scope.taskTitle = '';
			//toastr.success('New Todo Created Successfully', 'null', {});
			$window.location.href = SITE_URL+'/admin/index#/masters/course_category';
			toastr.success('Course Category Created Successfully', 'Success!', {
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
			//$scope.openToast();
			//alert(data.error);
        });
    }
 
    $scope.deleteTask = function(task){
        $http.delete(SITE_URL+'/admin/cc_api/tasks' + task.id);
        $scope.tasks.splice($scope.tasks.indexOf(task),1);
    }
 
    $scope.updateTask = function(task){
        $http.put(SITE_URL+'/admin/cc_api/tasks', task).error(function(data){
            alert(data.error);
        });
        $scope.refresh();
    }
 }
  
  
  
  
  
})();


