(function () {
  'use strict';

  angular.module('BlurAdmin.pages.todo')
      .controller('TodoCtrl', TodoCtrl);

  function TodoCtrl($scope,$http,$window,toastr,DTOptionsBuilder, DTColumnBuilder) {
	  //alert(123);
	  
      $http.get(SITE_URL+'/admin/todo/tasks').success(function(data){
     	 $scope.smartTableData = data;
		$scope.vm = {};
		$scope.vm.dtOptions = DTOptionsBuilder.newOptions()
      	.withOption('order', [0, 'asc']);
	 }).error(function(data){
        $scope.smartTableData = data;
    });
 	
    $scope.refresh = function(){
        $http.get(SITE_URL+'/admin/todo/tasks').success(function(data){
              $scope.smartTablePageSize = 10;
			 $scope.smartTableData = data;
        }).error(function(data){
            $scope.smartTableData = data;
        });
    }
 
    $scope.addTask = function(){
        var newTask = {title: $scope.taskTitle};
        $http.post(SITE_URL+'/admin/todo/tasks', newTask).success(function(data){
            $scope.refresh();
            $scope.taskTitle = '';
        }).error(function(data){
            alert(data.error);
        });
    }
 
    $scope.deleteTask = function(task){
		 if(confirm("Do you want to delete this?")) {
		   		$http.delete(SITE_URL+'/admin/todo/tasks/' + task.id);
				$scope.smartTableData.splice($scope.smartTableData.indexOf(task),1);
				toastr.success('To Do Deleted Successfully', 'Success!', {
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
 
    $scope.updateTask = function(task){
        $http.put(SITE_URL+'/admin/todo/tasks', task).error(function(data){
            alert(data.error);
        });
        $scope.refresh();
    }
	 $scope.openEdit = function(task){
 		$window.location.href = SITE_URL+'/admin/dashboard#/edit_todo/';
 	}
  }
})();