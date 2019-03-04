(function () {
  'use strict';
  angular.module('BlurAdmin.pages.students.edit')
  	  .controller('editstudentCtrl', editstudentCtrl);
	
	
		
	function editstudentCtrl($scope,$http,$window,toastr,$timeout, $upload,$element,$stateParams) {
	
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

		
		
	$http.get(SITE_URL+'/admin/s_api/tasks/'+ $stateParams.id).success(function(data){
        $scope.tasks = data;
		//console.log($scope.tasks[0].id);
    }).error(function(data){
        $scope.tasks = data;
    	 
	});
	$http.get(SITE_URL+'/admin/enq_api/tasks').success(function(data){
      $scope.enquires= data;
    }).error(function(data){
        $scope.enquires = data;
    });
	$scope.getFile= function() {
			//$scope.image;
	}
		
	
		$scope.onFileSelect = function($files) {
			//alert();
			for (var i = 0; i < $files.length; i++) {
				var $file = $files[i];
				$upload.upload({
					url: SITE_URL+'/admin/s_api/tasks',
					file: $file,
					 data: {
						'is_file': 1,
					},
					progress: function(e){}
					}).then(function(response) {
						$timeout(function() {
						//$scope.uploadResult.push(response.data);
						//$scope.image	=	response.data.image;
						angular.element('#img').val(response.data.image);
						//alert($scope.image);
						//console.log(response.data);
					});
				});
			}
		}
		
	$http.get(SITE_URL+'/admin/c_api/tasks').success(function(data){
      $scope.course= data;
    }).error(function(data){
        $scope.course = data;
    });
	
	$scope.select2	=function(){
	  	//alert(12);
	 $.getScript('//cdnjs.cloudflare.com/ajax/libs/select2/3.4.8/select2.min.js',function(){
  
		$(".select2").select2();
		
	  });//script  
	  
  	}
	
	$scope.updateTask = function(){
     	//console.log($scope.selectedCourse);
		var elem = angular.element($element);
		$http({
			method: 'POST',
			dataType: "json",
			url: SITE_URL+'/admin/s_api/tasks',
			headers: {'Content-Type': 'application/x-www-form-urlencoded'},
			data: $(elem).serialize(),
		}).success(function () {
			$window.location.href = SITE_URL+'/admin/index#/students/details/'+$stateParams.id;
			toastr.success('Student Updated Successfully', 'Success!', {
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
	
		$(document).ready(function(){

		  $.getScript('//cdnjs.cloudflare.com/ajax/libs/select2/3.4.8/select2.min.js',function(){
		  
			$(".select2").select2();
			
		  });//script
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
		});

 
 }
  
  
  
  
  
})();


