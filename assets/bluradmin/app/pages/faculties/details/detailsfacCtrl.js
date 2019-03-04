(function () {
  'use strict';

  angular.module('BlurAdmin.pages.faculties.deatils')
      .controller('detailsfacCtrl', detailsfacCtrl);
	
  function detailsfacCtrl($scope,$http,$window,$stateParams,toastr,DTOptionsBuilder, DTColumnBuilder) {
	//alert(1211);
	
	//  alert($stateParams.id);
	 $http.get(SITE_URL+'/admin/f_api/tasks/'+ $stateParams.id).success(function(data){
        $scope.tasks = data;
		//console.log($scope.tasks);
    }).error(function(data){
        $scope.tasks = data;
    });
	 $http.get(SITE_URL+'/admin/f_api/batches/'+ $stateParams.id).success(function(data){
        $scope.batches = data;
		//console.log($scope.tasks);
    }).error(function(data){
        $scope.batches = data;
    });
	 
	 $http.get(SITE_URL+'/admin/f_api/receipts/'+ $stateParams.id).success(function(data){
        $scope.receipts = data;
		//console.log($scope.tasks);
    }).error(function(data){
        $scope.receipts = data;
    });
	 
 	//Get Course Fees
	 $http.get(SITE_URL+'/admin/f_api/courseFee/'+ $stateParams.id).success(function(data){
        $scope.courseFee = data;
		//console.log($scope.tasks);
    }).error(function(data){
        $scope.courseFee = data;
    }); 
	 
	$http.get(SITE_URL+'/admin/f_api/notes/'+ $stateParams.id).success(function(data){
		$scope.notes = data;
		$scope.vm = {};
		$scope.vm.dtOptions = DTOptionsBuilder.newOptions().withOption('order', [0, 'asc']);
	 }).error(function(data){
		$scope.notes = data;
	}); 
	$http.get(SITE_URL+'/admin/f_api/files/'+ $stateParams.id).success(function(data){
			$scope.files = data;
			$scope.vm = {};
			$scope.vm.dtOptions = DTOptionsBuilder.newOptions().withOption('order', [0, 'asc']);
		 }).error(function(data){
			$scope.files = data;
		});
	
	  $scope.refresh = function(){
		 $http.get(SITE_URL+'/admin/f_api/receipts/'+ $stateParams.id).success(function(data){
				$scope.receipts = data;
				//console.log($scope.tasks);
			}).error(function(data){
				$scope.receipts = data;
		
		});
		
		$http.get(SITE_URL+'/admin/f_api/notes/'+ $stateParams.id).success(function(data){
			$scope.notes = data;
			$scope.vm = {};
			$scope.vm.dtOptions = DTOptionsBuilder.newOptions().withOption('order', [0, 'asc']);
		 }).error(function(data){
			$scope.notes = data;
		});
		
		$http.get(SITE_URL+'/admin/f_api/files/'+ $stateParams.id).success(function(data){
			$scope.files = data;
			$scope.vm = {};
			$scope.vm.dtOptions = DTOptionsBuilder.newOptions().withOption('order', [0, 'asc']);
		 }).error(function(data){
			$scope.files = data;
		});
	}	  
	
	
	
	
	 
	 $scope.addNotes = function(){
		
		var notes		=	angular.element('#notes').val();
		var faculty_id	=	angular.element('#faculty_id').val();
		$http({
			method: 'POST',
			dataType: "json",
			url: SITE_URL+'/admin/f_api/notes',
			headers: {'Content-Type': 'application/x-www-form-urlencoded'},
			//data: {notes:notes,student_id:student_id},
			data: "&notes=" + notes +"&faculty_id=" + faculty_id,
		}).success(function () {
			$scope.refresh();
			$window.location.href = SITE_URL+'/admin/index#/faculties/details/'+$stateParams.id;
			var notes		=	angular.element('#notes').val('');
			toastr.success('Notes Saved Successfully', 'Success!', {
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

	}
	 $scope.deleteTask = function(task){
		 if(confirm("Do you want to delete this?")) {
		   		$http.delete(SITE_URL+'/admin/f_api/tasks/' + task.id);
				$scope.tasks.splice($scope.tasks.indexOf(task),1);
				$window.location.href = SITE_URL+'/admin/index#/faculties/';
				toastr.success('Faculty Deleted Successfully', 'Success!', {
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
				$window.location.href = SITE_URL+'/admin/index#/faculties/details/'+ task.id;
	}
	
	$scope.gobt = function(task){
				$window.location.href = SITE_URL+'/admin/index#/batches/details/'+ task;
	}
	
	
	$scope.deleteFees = function(fees_id){
		 if(confirm("Do you want to delete this?")) {
		   		$http.delete(SITE_URL+'/admin/f_api/deleteFees/' + fees_id);
				$scope.courseFee.splice($scope.courseFee.indexOf(fees_id),1);
				$window.location.href = SITE_URL+'/admin/index#/faculties/details/'+fees_id;
				toastr.success('Faculty Deleted Successfully', 'Success!', {
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
	
	
	$scope.deleteReceipt = function(task){
		 if(confirm("Do you want to delete this?")) {
		   		$http.delete(SITE_URL+'/admin/f_api/receipts/' + task).success(function(data){
					$scope.tasks.splice($scope.receipts.indexOf(task),1);
					$scope.refresh(); 
					toastr.success('Receipt Deleted Successfully', 'Success!', {
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
				
				});;
				
		   }
		   else
		   {
		   }       
        
    }
	
	$scope.deleteFiles = function(task){
		 if(confirm("Do you want to delete this?")) {
		   		$http.delete(SITE_URL+'/admin/f_api/files/' + task).success(function(data){
					$scope.tasks.splice($scope.files.indexOf(task),1);
					$scope.refresh(); 
					toastr.success('File Deleted Successfully', 'Success!', {
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
				
				});;
				
		   }
		   else
		   {
		   }       
        
    }
	$scope.deleteNotes = function(task){
		 if(confirm("Do you want to delete this?")) {
		   		$http.delete(SITE_URL+'/admin/f_api/notes/' + task).success(function(data){
					$scope.tasks.splice($scope.notes.indexOf(task),1);
					$scope.refresh(); 
					toastr.success('Notes Deleted Successfully', 'Success!', {
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
				
				});;
				
		   }
		   else
		   {
		   }       
        
    }
	
	$scope.getReport = function(task){
			 var course_id		=	angular.element('#course_id').val();
				//alert(course_id);
				$http.get(SITE_URL+'/admin/f_api/preport/'+course_id).success(function(data){
					//console.log(data.c);
					$scope.data = data.report;
					$scope.labels =data.label;
				 }).error(function(data){
					$scope.data= data;
				});
					
		
				
				//$scope.data = [$scope.cdata.c, $scope.cdata.p];
				$scope.options = {
				  segmentShowStroke : false
				};
		
	}
	setTimeout(function(){ 
				 var course_id		=	angular.element('#course_id').val();
				//alert(course_id);
				$http.get(SITE_URL+'/admin/f_api/preport/'+course_id).success(function(data){
					//console.log(data.c);
					$scope.data = data.report;
					$scope.labels =data.label;
				 }).error(function(data){
					$scope.data= data;
				});
					
		
				//$scope.labels =["Paid", "Remaining"];
				//$scope.data = [$scope.cdata.c, $scope.cdata.p];
				$scope.options = {
				  segmentShowStroke : false
				};					 
	}, 3000);

  }
})();
