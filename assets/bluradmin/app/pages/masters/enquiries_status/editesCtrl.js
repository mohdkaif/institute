(function () {
  'use strict';

  angular.module('BlurAdmin.pages.masters')
      .controller('editesCtrl', editesCtrl);
	
  function editesCtrl($scope,$http,$window,$stateParams,toastr) {
	//alert(1211);
	
	//  alert($stateParams.id);
	 $http.get(SITE_URL+'/admin/es_api/tasks/'+ $stateParams.id).success(function(data){
        $scope.tasks = data;
		//console.log($scope.tasks);
    }).error(function(data){
        $scope.tasks = data;
    });
    $scope.refresh = function(){
        $http.get(SITE_URL+'/admin/es_api/tasks').success(function(data){
            $scope.tasks = data;
        }).error(function(data){
            $scope.tasks = data;
        });
    }
 
  $scope.addTask = function(){
       //console.log($scope);
	   var newTask = {name: $scope.taskName};
        $http.post(SITE_URL+'/admin/es_api/tasks', newTask).success(function(data){
            $scope.refresh();
            $scope.taskTitle = '';
			//toastr.success('New Todo Created Successfully', 'null', {});
			$window.location.href = SITE_URL+'/admin/index#/masters/enquiries_status';
			toastr.success('Enquiry Status Created Successfully', 'Success!', {
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
 
 
    $scope.updateTask = function(task){
		var id	=	angular.element('#id').val();
		var name	=	angular.element('#input01').val();
		 var updateTask = {id:$stateParams.id,name: name,};
        $http.post(SITE_URL+'/admin/es_api/tasks', updateTask).success(function(data){
        	$window.location.href = SITE_URL+'/admin/index#/masters/enquiries_status';
			toastr.success('Enquiry Status Updated Successfully', 'Success!', {
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
	
	
	
  }
})();
