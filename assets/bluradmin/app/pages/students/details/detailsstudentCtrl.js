(function () {
  'use strict';

  angular.module('BlurAdmin.pages.students.details')
      .controller('detailsstudentCtrl', detailsstudentCtrl);
	
  function detailsstudentCtrl($scope,$http,$window,$stateParams,toastr,DTOptionsBuilder, DTColumnBuilder) {
	//alert(1211);
	
	//  alert($stateParams.id);
	 $http.get(SITE_URL+'/admin/s_api/tasks/'+ $stateParams.id).success(function(data){
        $scope.tasks = data;
		//console.log($scope.tasks);
    }).error(function(data){
        $scope.tasks = data;
    }); 
 	
	 $scope.refresh = function(){
       	$http.get(SITE_URL+'/admin/s_api/batches/'+ $stateParams.id).success(function(data){
			$scope.batches = data;
			$scope.vm = {};
			$scope.vm.dtOptions = DTOptionsBuilder.newOptions().withOption('order', [0, 'asc']);
		 }).error(function(data){
			$scope.batches = data;
		});
		
		$http.get(SITE_URL+'/admin/s_api/receipts/'+ $stateParams.id).success(function(data){
			$scope.receipts = data;
			$scope.vm = {};
			$scope.vm.dtOptions = DTOptionsBuilder.newOptions().withOption('order', [0, 'asc']);
		 }).error(function(data){
			$scope.receipts = data;
		});
		
		$http.get(SITE_URL+'/admin/s_api/certificates/'+ $stateParams.id).success(function(data){
			$scope.certificates = data;
			$scope.vm = {};
			$scope.vm.dtOptions = DTOptionsBuilder.newOptions().withOption('order', [0, 'asc']);
		 }).error(function(data){
			$scope.certificates = data;
		});
		
		$http.get(SITE_URL+'/admin/s_api/notes/'+ $stateParams.id).success(function(data){
			$scope.notes = data;
			$scope.vm = {};
			$scope.vm.dtOptions = DTOptionsBuilder.newOptions().withOption('order', [0, 'asc']);
		 }).error(function(data){
			$scope.notes = data;
		});
		
		$http.get(SITE_URL+'/admin/s_api/files/'+ $stateParams.id).success(function(data){
			$scope.files = data;
			$scope.vm = {};
			$scope.vm.dtOptions = DTOptionsBuilder.newOptions().withOption('order', [0, 'asc']);
		 }).error(function(data){
			$scope.files = data;
		});
    }
	
	
	$http.get(SITE_URL+'/admin/s_api/receipts/'+ $stateParams.id).success(function(data){
		$scope.receipts = data;
		$scope.vm = {};
		$scope.vm.dtOptions = DTOptionsBuilder.newOptions().withOption('order', [0, 'asc']);
	 }).error(function(data){
		$scope.receipts = data;
	});
	
	$http.get(SITE_URL+'/admin/s_api/batches/'+ $stateParams.id).success(function(data){
     	$scope.batches = data;
		$scope.vm = {};
		$scope.vm.dtOptions = DTOptionsBuilder.newOptions().withOption('order', [0, 'asc']);
	 }).error(function(data){
        $scope.batches = data;
    });
	$http.get(SITE_URL+'/admin/s_api/certificates/'+ $stateParams.id).success(function(data){
		$scope.certificates = data;
		$scope.vm = {};
		$scope.vm.dtOptions = DTOptionsBuilder.newOptions().withOption('order', [0, 'asc']);
	 }).error(function(data){
		$scope.certificates = data;
	});
	
	$http.get(SITE_URL+'/admin/s_api/notes/'+ $stateParams.id).success(function(data){
		$scope.notes = data;
		$scope.vm = {};
		$scope.vm.dtOptions = DTOptionsBuilder.newOptions().withOption('order', [0, 'asc']);
	 }).error(function(data){
		$scope.notes = data;
	});
	
	$http.get(SITE_URL+'/admin/s_api/files/'+ $stateParams.id).success(function(data){
		$scope.files = data;
		$scope.vm = {};
		$scope.vm.dtOptions = DTOptionsBuilder.newOptions().withOption('order', [0, 'asc']);
	 }).error(function(data){
		$scope.files = data;
	});
	
	$scope.deleteTask = function(task){
		 if(confirm("Do you want to delete this?")) {
		   		$http.delete(SITE_URL+'/admin/s_api/tasks/' + task.id);
				//$scope.tasks.splice($scope.tasks.indexOf(task),1);
				$window.location.href = SITE_URL+'/admin/index#/students';
				toastr.success('Student Deleted Successfully', 'Success!', {
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
				$window.location.href = SITE_URL+'/admin/index#/students/details/'+ task.id;
	}	           
	
	
	$scope.deleteBatch = function(task){
		 if(confirm("Do you want to delete this?")) {
		   		$http.delete(SITE_URL+'/admin/s_api/batch/' + task);
				//$scope.tasks.splice($scope.tasks.indexOf(task),1);
				$scope.tasks.splice($scope.batches.indexOf(task),1);
				$scope.refresh();
				//$window.location.href = SITE_URL+'/admin/index#/students/details/'+ $stateParams.id;
				
				toastr.success('Student Deleted Successfully', 'Success!', {
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
		   		$http.delete(SITE_URL+'/admin/s_api/receipts/' + task).success(function(data){
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
	
	$scope.deleteCertificate = function(task){
		 if(confirm("Do you want to delete this?")) {
		   		$http.delete(SITE_URL+'/admin/s_api/certificates/' + task).success(function(data){
					$scope.tasks.splice($scope.certificates.indexOf(task),1);
					$scope.refresh(); 
					toastr.success('Certificate Deleted Successfully', 'Success!', {
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
	
	
	$scope.addNotes = function(){
		
		var notes		=	angular.element('#notes').val();
		var student_id	=	angular.element('#student_id').val();
		$http({
			method: 'POST',
			dataType: "json",
			url: SITE_URL+'/admin/s_api/notes',
			headers: {'Content-Type': 'application/x-www-form-urlencoded'},
			//data: {notes:notes,student_id:student_id},
			data: "&notes=" + notes +"&student_id=" + student_id,
		}).success(function () {
			$scope.refresh();
			$window.location.href = SITE_URL+'/admin/index#/students/details/'+$stateParams.id;
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
	
	
	$scope.deleteNotes = function(task){
		 if(confirm("Do you want to delete this?")) {
		   		$http.delete(SITE_URL+'/admin/s_api/notes/' + task).success(function(data){
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
	
	
	$scope.deleteFiles = function(task){
		 if(confirm("Do you want to delete this?")) {
		   		$http.delete(SITE_URL+'/admin/s_api/files/' + task).success(function(data){
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
  }
})();
