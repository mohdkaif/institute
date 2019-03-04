(function () {
  'use strict';
  angular.module('BlurAdmin.pages.faculties.add_receipt')
  	  .controller('addreceiptfacCtrl', addreceiptfacCtrl);
	
	function addreceiptfacCtrl($scope,$http,$window,toastr,$timeout, $upload,$element,$stateParams) {
		
	$scope.faculty_id	=	$stateParams.id;
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
	angular.element('#r_admount_div').hide();	
	$scope.getPayment = function(){
		var b_id	=	angular.element('#batch_id').val();
		if(b_id	==	''){
			return false;
		}
		
		$http.get(SITE_URL+'/admin/f_api/getPayment/'+$stateParams.id +'/'+b_id).success(function(data){
			angular.element('#r_admount_div').show();
		 $scope.paid= data;
		}).error(function(data){
			$scope.paid = data;
		});	
	}
		
	 $http.get(SITE_URL+'/admin/f_api/batches/'+ $stateParams.id).success(function(data){
        $scope.batches = data;
		//console.log($scope.tasks);
    }).error(function(data){
        $scope.batches = data;
    });
	
	$http.get(SITE_URL+'/admin/f_api/receiptNo').success(function(data){
      $scope.receipt_no= data;
    }).error(function(data){
        $scope.receipt_no = data;
    });
	
	$scope.addTask = function(){
		//console.log($scope.example1model);
		
		var amount	=	angular.element('#amount').val();
		if(amount > $scope.paid.r_amount){
				if(confirm("Paid Amount Is Greater Then Agreed Fees!")) {
						var elem = angular.element($element);
						$http({
							method: 'POST',
							dataType: "json",
							url: SITE_URL+'/admin/f_api/receipts',
							headers: {'Content-Type': 'application/x-www-form-urlencoded'},
							data: $(elem).serialize(),
							//data: $(elem).serialize() + "&image=" + $scope.image,
						}).success(function () {
							$window.location.href = SITE_URL+'/admin/index#/faculties/details/'+$stateParams.id;
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
						var elem = angular.element($element);
						$http({
							method: 'POST',
							dataType: "json",
							url: SITE_URL+'/admin/f_api/receipts',
							headers: {'Content-Type': 'application/x-www-form-urlencoded'},
							data: $(elem).serialize(),
							//data: $(elem).serialize() + "&image=" + $scope.image,
						}).success(function () {
							$window.location.href = SITE_URL+'/admin/index#/faculties/details/'+$stateParams.id;
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
		//alert($scope.paid.agreed_fee);
		
		

	}
	
 
 }
  
 
  
  
  
})();


