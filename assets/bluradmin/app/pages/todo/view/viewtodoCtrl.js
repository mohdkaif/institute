(function () {
  'use strict';

  angular.module('BlurAdmin.pages.todo.view')
      .controller('VIEWTodoCtrl', VIEWTodoCtrl);
	
  function VIEWTodoCtrl($scope,$http,$window,$stateParams,toastr) {
	//alert(1211);
	
	//  alert($stateParams.id);
	 $http.get(SITE_URL+'/admin/todo/tasks/'+ $stateParams.id).success(function(data){
        $scope.tasks = data;
		//console.log($scope.tasks);
    }).error(function(data){
        $scope.tasks = data;
    });
    $scope.refresh = function(){
        $http.get(SITE_URL+'/admin/todo/tasks').success(function(data){
            $scope.tasks = data;
        }).error(function(data){
            $scope.tasks = data;
        });
    }
 
 
    $scope.deleteTask = function(task){
        $http.delete(SITE_URL+'/admin/todo/tasks' + task.id);
        $scope.tasks.splice($scope.tasks.indexOf(task),1);
    }
 
    $scope.updateTask = function(task){
		var id	=	angular.element('#id').val();
		var title	=	angular.element('#input01').val();
		var date	=	angular.element('#input02').val();
		var description	=	angular.element('#textarea01').val();
		//alert($scope.status)
		 var updateTask = {id:$stateParams.id,title: title,description: description,date: date,status: $scope.taskStatus};
        $http.put(SITE_URL+'/admin/todo/tasks', updateTask).success(function(data){
        	$window.location.href = SITE_URL+'/admin/index#/todo';
			toastr.success('To Do Updated Successfully', 'Success!', {
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
            //alert(data.error);
				
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
        });
      //  $scope.refresh();
    }
	
	$scope.updateStatus= function(task){
        $http.put(SITE_URL+'/admin/todo/tasks', task).error(function(data){
            alert(data.error);
        });
    }
	
	
	
  }
})();
