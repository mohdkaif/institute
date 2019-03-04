(function () {
  'use strict';

  angular.module('BlurAdmin.pages.course')
      .controller('courseCtrl', courseCtrl);

  function courseCtrl($scope,$http,$window,toastr,DTOptionsBuilder, DTColumnBuilder) {
	 $http.get(SITE_URL+'/admin/cc_api/tasks').success(function(data){
        $scope.items= data;
    }).error(function(data){
        $scope.items = data;
    });
	 
     $http.get(SITE_URL+'/admin/c_api/tasks').success(function(data){
     	 $scope.tasks = data;
		$scope.vm = {};
		$scope.vm.dtOptions = DTOptionsBuilder.newOptions().withOption('order', [0, 'asc']);
	 }).error(function(data){
        $scope.tasks = data;
    });
	 
	  $scope.filename = function () {
		// dynamic filename
		return Math.random();
	  };
 	
    $scope.refresh = function(){
        $http.get(SITE_URL+'/admin/c_api/tasks').success(function(data){
              $scope.tasks= 10;
			 $scope.tasks= data;
        }).error(function(data){
            $scope.tasks= data;
        });
    }
 
    $scope.addTask = function(){
        var newTask = {title: $scope.taskTitle};
        $http.post(SITE_URL+'/admin/c_api/tasks', newTask).success(function(data){
            $scope.refresh();
            $scope.taskTitle = '';
        }).error(function(data){
            alert(data.error);
        });
    }
 
    $scope.deleteTask = function(task){
		 if(confirm("Do you want to delete this?")) {
		   		$http.delete(SITE_URL+'/admin/c_api/tasks/' + task.id);
				$scope.tasks.splice($scope.tasks.indexOf(task),1);
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
	
	$scope.go = function(task){
			
				$window.location.href = SITE_URL+'/admin/index#/course/details/'+ task.id;
	    
    }
 
    $scope.updateTask = function(task){
        $http.put(SITE_URL+'/admin/c_api/tasks', task).error(function(data){
            alert(data.error);
        });
        $scope.refresh();
    }
	$scope.printData = function()
	{
	 	 var divToPrint=document.getElementById("printTable");
	   var newWin= window.open("");
	   newWin.document.write(divToPrint.outerHTML);
	   newWin.print();
	   newWin.close();
	}
	$scope.csv = function(){
		$http.post(SITE_URL+'/admin/course/export').success(function(data){
            $scope.refresh();
        }).error(function(data){
            alert(data.error);
        });
		
	}
  }
})();