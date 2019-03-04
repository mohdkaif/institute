(function () {
  'use strict';

  angular.module('BlurAdmin.pages.todo.add_todo')
      .controller('ADDTodoCtrl', ADDTodoCtrl);
	
  function ADDTodoCtrl($scope,$http,$window,toastr, toastrConfig) {
	  
	
   $('.datepicker').datetimepicker({
				icons: {
                    time: "ion-android-calendar",
                    date: "fa fa-calendar",
                     previous: 'ion-arrow-left-c',
            		next: 'ion-arrow-right-c',
					up: "ion-arrow-up-a",
                    down: "ion-arrow-down-a"
                },
				format:'YYYY-MM-DD'
	});
	  //alert(123);
      $http.get(SITE_URL+'/admin/todo/tasks').success(function(data){
        $scope.tasks = data;
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
 
    $scope.addTask = function(){
       //console.log($scope);
	   var date	=	angular.element('#input02').val();
	   var newTask = {title: $scope.taskTitle,status: $scope.taskStatus,description: $scope.taskDescription,date: date};
        $http.post(SITE_URL+'/admin/todo/tasks', newTask).success(function(data){
            $scope.refresh();
            $scope.taskTitle = '';
			//toastr.success('New Todo Created Successfully', 'null', {});
			$window.location.href = SITE_URL+'/admin/index#/todo';
			toastr.success('To Do Created Successfully', 'Success!', {
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
        $http.delete(SITE_URL+'/admin/todo/tasks' + task.id);
        $scope.tasks.splice($scope.tasks.indexOf(task),1);
    }
 
    $scope.updateTask = function(task){
        $http.put(SITE_URL+'/admin/todo/tasks', task).error(function(data){
            alert(data.error);
        });
        $scope.refresh();
    }
 }
  
  
  
  
  
})();


