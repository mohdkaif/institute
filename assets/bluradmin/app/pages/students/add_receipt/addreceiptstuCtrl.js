(function () {
  'use strict';
  angular.module('BlurAdmin.pages.students.add_receipt')
  	  .controller('addreceiptstuCtrl', addreceiptstuCtrl);
	
	function addreceiptstuCtrl($scope,$http,$window,toastr,$timeout, $upload,$element,$stateParams) {
	
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
	$scope.student_id	=	$stateParams.id;
	
	angular.element('#r_amount_div').hide();
	
	$http.get(SITE_URL+'/admin/c_api/tasks').success(function(data){
      $scope.course= data;
    }).error(function(data){
        $scope.course = data;
    });
	
	$http.get(SITE_URL+'/admin/b_api/tasks').success(function(data){
      $scope.batches= data;
    }).error(function(data){
        $scope.batches = data;
    });
	
	$http.get(SITE_URL+'/admin/s_api/receiptNo').success(function(data){
      $scope.receipt_no= data;
    }).error(function(data){
        $scope.receipt_no = data;
    });
	
	$scope.getFees = function(){
		var b_id = angular.element('#batch_id').val();
		//alert(b_id);
		if(b_id==""){
			return false;	
		}
		$http.get(SITE_URL+'/admin/s_api/getFees/'+$stateParams.id+'/'+b_id).success(function(data){
		  $scope.fees= data;
		  angular.element('#r_amount_div').show();
		}).error(function(data){
			$scope.fees= data;
		});
	}
	$scope.addTask = function(){
		//console.log($scope.example1model);
		var elem = angular.element($element);
		var amt = angular.element('#amount').val();
		 if(amt > $scope.fees.r_amount){
		 		if(confirm("Amount Is Greater Then Remaining Amount")) {
		 		   $http({
						method: 'POST',
						dataType: "json",
						url: SITE_URL+'/admin/s_api/receipts',
						headers: {'Content-Type': 'application/x-www-form-urlencoded'},
						data: $(elem).serialize(),
						//data: $(elem).serialize() + "&image=" + $scope.image,
					}).success(function () {
						$window.location.href = SITE_URL+'/admin/index#/students/details/'+$stateParams.id;
						toastr.success('Receipt Saved Successfully', 'Success!', {
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
				}else{
		 			return false;
				}
		 }else{
					$http({
						method: 'POST',
						dataType: "json",
						url: SITE_URL+'/admin/s_api/receipts',
						headers: {'Content-Type': 'application/x-www-form-urlencoded'},
						data: $(elem).serialize(),
						//data: $(elem).serialize() + "&image=" + $scope.image,
					}).success(function () {
						$window.location.href = SITE_URL+'/admin/index#/students/details/'+$stateParams.id;
						toastr.success('Receipt Saved Successfully', 'Success!', {
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
		 
		 

	}
	
 
 }
  
 
  
  
  
})();


