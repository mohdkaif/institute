(function () {
  'use strict';

  angular.module('BlurAdmin.pages.course.edit')
      .controller('editcCtrl', editcCtrl);
	
  function editcCtrl($scope,$http,$window,$stateParams,toastr) {
	//alert(1211);
	$http.get(SITE_URL+'/admin/cc_api/tasks').success(function(data){
        $scope.items= data;
    }).error(function(data){
        $scope.items = data;
    });
	//  alert($stateParams.id);
	 $http.get(SITE_URL+'/admin/c_api/tasks/'+ $stateParams.id).success(function(data){
        $scope.tasks = data;
		//console.log($scope.tasks);
    }).error(function(data){
        $scope.tasks = data;
    });
    $scope.refresh = function(){
        $http.get(SITE_URL+'/admin/c_api/tasks').success(function(data){
            $scope.tasks = data;
        }).error(function(data){
            $scope.tasks = data;
        });
    }
    $scope.updateTask = function(task){
		var id			=	angular.element('#id').val();
		var title		=	angular.element('#input01').val();
		var duration	=	angular.element('#input02').val();
		var duration_type	=	angular.element('#input07').val();
		var fees		=	angular.element('#input03').val();
		var students	=	angular.element('#input04').val();
		var faculties	=	angular.element('#input05').val();
		var batches		=	angular.element('#input06').val();
		var description	=	angular.element('#textarea01').val();
		var category_id	=	angular.element('#cc').val();
		//alert(category_id);return false;
		  var updateTask = {id:id,title: title,category_id: category_id,duration: duration,duration_type: duration_type,fees: fees,students: students,faculties: faculties,batches: batches,description: description};
        $http.post(SITE_URL+'/admin/c_api/tasks', updateTask).success(function(data){
        	$window.location.href = SITE_URL+'/admin/index#/course/details/'+id;
			toastr.success('Course Updated Successfully', 'Success!', {
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
