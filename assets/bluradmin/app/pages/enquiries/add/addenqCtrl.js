(function () {
  'use strict';
	var app = angular.module('BlurAdmin.pages.enquiries.add');
  angular.module('BlurAdmin.pages.enquiries.add')
      .controller('addenqCtrl', addenqCtrl);
	
	
		
	function addenqCtrl($scope,$http,$window,toastr, toastrConfig,$element) {
		$('.datetimepicker').datetimepicker({
					icons: {
						time: "ion-clock",
						date: "fa fa-calendar",
						 previous: 'ion-arrow-left-c',
						next: 'ion-arrow-right-c',
						up: "ion-arrow-up-a",
						down: "ion-arrow-down-a"
					},
					format:'YYYY-MM-DD HH:mm:ss',
					useCurrent:true
		});
		
		$('.timepicker').datetimepicker({
					icons: {
						time: "ion-clock",
						date: "fa fa-calendar",
						 previous: 'ion-arrow-left-c',
						next: 'ion-arrow-right-c',
						up: "ion-arrow-up-a",
						down: "ion-arrow-down-a"
					},
					format:'HH:mm:ss',
					useCurrent:true
		});
	
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
		
		
	
	
	$http.get(SITE_URL+'/admin/es_api/tasks').success(function(data){
      $scope.items= data;
    }).error(function(data){
        $scope.items = data;
    });
 	
	$http.get(SITE_URL+'/admin/c_api/tasks').success(function(data){
      $scope.course= data;
    }).error(function(data){
        $scope.course = data;
    });
    
    $scope.addTask = function(){
       ///console.log(this.formData);
		var elem = angular.element($element);
		
		$http({
			method: 'POST',
			url: SITE_URL+'/admin/enq_api/tasks',
			headers: {'Content-Type': 'application/x-www-form-urlencoded'},
			data: $(elem).serialize(),
		    headers: {'Content-Type': 'application/x-www-form-urlencoded'}
		}).success(function () {
			$window.location.href = SITE_URL+'/admin/index#/enquiries';
			toastr.success('Enquiry/Lead Created Successfully', 'Success!', {
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
        });;

	  /*var dt	=	angular.element('#input01').val();
	  var newTask = {date_time: dt,name:name,mobile:mobile,preferred_time:preferred_time,status:status,course_id:course_id,gender:gender,dob:dob,remark:remark,handeled_by:handeled_by};
        $http.post(SITE_URL+'/admin/enq_api/tasks', newTask).success(function(data){
            $scope.refresh();
            $scope.taskTitle = '';
			$window.location.href = SITE_URL+'/admin/index#/enquiries';
			toastr.success('Enquiry/Lead Created Successfully', 'Success!', {
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
        });*/
    }
 
 }
  
  
  
  
  
})();


