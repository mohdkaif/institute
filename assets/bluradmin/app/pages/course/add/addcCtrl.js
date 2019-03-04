(function () {
  'use strict';

  angular.module('BlurAdmin.pages.course.add')
      .controller('addcCtrl', addcCtrl);
	
  function addcCtrl($scope,$http,$window,toastr, toastrConfig) {
	
	$http.get(SITE_URL+'/admin/cc_api/tasks').success(function(data){
        $scope.items= data;
    }).error(function(data){
        $scope.items = data;
    });
 
    $scope.refresh = function(){
        $http.get(SITE_URL+'/admin/c_api/tasks').success(function(data){
            $scope.tasks = data;
        }).error(function(data){
            $scope.tasks = data;
        });
    }
 
    $scope.addTask = function(){
       //console.log($scope);
	   var date	=	angular.element('#input02').val();
	   var newTask = {title: $scope.taskTitle,category_id: $scope.course_category,duration: $scope.taskDuration,duration_type: $scope.duration_type,fees: $scope.taskFees,students: $scope.taskStudents,faculties: $scope.taskFaculties,batches: $scope.taskBatches,description: $scope.taskDescription};
        $http.post(SITE_URL+'/admin/c_api/tasks', newTask).success(function(data){
            $scope.refresh();
            $scope.taskTitle = '';
			$window.location.href = SITE_URL+'/admin/index#/course';
			toastr.success('Course  Created Successfully', 'Success!', {
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
        $http.delete(SITE_URL+'/admin/c_api/tasks' + task.id);
        $scope.tasks.splice($scope.tasks.indexOf(task),1);
    }
 
    $scope.updateTask = function(task){
        $http.put(SITE_URL+'/admin/c_api/tasks', task).error(function(data){
            alert(data.error);
        });
        $scope.refresh();
    }
 }
  
  
  
  
  
})();


