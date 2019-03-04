(function () {
  'use strict';

  angular.module('BlurAdmin.pages.todo.edit_todo')
      .controller('EDITTodoCtrl', EDITTodoCtrl);
	
  function EDITTodoCtrl($scope,$http,$window,$stateParams,toastr,$element) {
	//alert(1211);
	
	//  alert($stateParams.id);
	 $http.get(SITE_URL+'/admin/todo/tasks/'+ $stateParams.id).success(function(data){
        $scope.tasks = data;
		//console.log($scope.tasks);
    }).error(function(data){
        $scope.tasks = data;
    });
 	setTimeout(function(){ 
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
	}, 3000);
    $scope.refresh = function(){
        $http.get(SITE_URL+'/admin/todo/tasks').success(function(data){
            $scope.tasks = data;
        }).error(function(data){
            $scope.tasks = data;
        });
    }
 
    $scope.addTask = function(){
       //console.log($scope);
	   //alert($scope.taskTitle);
	   var newTask = {title: $scope.taskTitle,status: $scope.taskStatus,description: $scope.taskDescription,date: $scope.taskDate};
        $http.post(SITE_URL+'/admin/todo/tasks', newTask).success(function(data){
          //  $scope.refresh();
            $scope.taskTitle = '';
			//toastr.success('New Todo Created Successfully', 'null', {});
			$window.location.href = SITE_URL+'/admin/index#/todo';
        }).error(function(data){
            alert(data.error);
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
		
		var elem = angular.element($element);
		 var updateTask = {id:$stateParams.id,title: title,description: description,date: date,status: $scope.taskStatus};
        $http({
			method: 'POST',
			dataType: "json",
			url: SITE_URL+'/admin/todo/todo',
			headers: {'Content-Type': 'application/x-www-form-urlencoded'},
			data: $(elem).serialize(),
		}).success(function () {
			$window.location.href = SITE_URL+'/admin/index#/todo';
			toastr.success('Todo Updated Successfully', 'Success!', {
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
      //  $scope.refresh();
    }
	
	$scope.updateStatus= function(task){
        $http.put(SITE_URL+'/admin/todo/tasks', task).error(function(data){
            alert(data.error);
        });
    }
	
	
	
  }
})();
