(function () {
  'use strict';
  angular.module('BlurAdmin.pages.students.add')
  	  .controller('addstudetCtrl', addstudetCtrl);
	

	
		
	function addstudetCtrl($scope,$http,$window,toastr,$timeout, $upload,$element,$stateParams) {
		
		
					if($stateParams.id > 0){
						//alert($stateParams.id);	
						$http.get(SITE_URL+'/admin/enq_api/tasks/'+$stateParams.id).success(function(data){
						  $scope.enquiry= data;
						  $scope.task	= $scope.enquiry[0];
						  if($scope.task.id){
						  	$scope.registration = 1;
								setTimeout(function(){
									$scope.getBatches();
								}, 3000);
						  }
						}).error(function(data){
						  $scope.enquiry= data;
						});
					}else{
						//alert('add new');
						$scope.enquiry	=	[]
					}
		
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
		
	$scope.getBatches = function(){
		var c_id	=	angular.element('#course_id').val();
		var b_id	=	angular.element('#batch_id').val();
		
		$http.get(SITE_URL+'/admin/s_api/getBatches/'+c_id ).success(function(data){
		  $scope.batches= data;
		}).error(function(data){
			$scope.batches= data;
		});	
	}

	
	$http.get(SITE_URL+'/admin/enq_api/tasks').success(function(data){
      $scope.enquires= data;
    }).error(function(data){
        $scope.enquires = data;
    });
	$http.get(SITE_URL+'/admin/s_api/registrationNo').success(function(data){
      $scope.registration_no= data;
    }).error(function(data){
        $scope.registration_no = data;
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
						$scope.image	=	response.data.image;
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
	$http.get(SITE_URL+'/admin/f_api/faculties').success(function(data){
      $scope.faculties= data;
    }).error(function(data){
        $scope.faculties = data;
    });
  	 $scope.example15settings = {enableSearch: true};
	 $scope.example15settings = {
		scrollableHeight: '200px',
		scrollable: true
	};
  	$scope.selectedCourse = [];
	// JavaScript 
	$scope.example1model = []; 
	//$scope.example1data = [ {id: 1, label: "David"}, {id: 2, label: "Jhon"}, {id: 3, label: "Danny"}];
	$scope.select2	=function(){
	  	//alert(12);
	 $.getScript('//cdnjs.cloudflare.com/ajax/libs/select2/3.4.8/select2.min.js',function(){
  
		$(".select2").select2();
		
	  });//script  
	  
  	}	
	$scope.addTask = function(){
		//console.log($scope.example1model);
		var elem = angular.element($element);
		$http({
			method: 'POST',
			dataType: "json",
			url: SITE_URL+'/admin/s_api/tasks',
			headers: {'Content-Type': 'application/x-www-form-urlencoded'},
			data: $(elem).serialize(),
			//data: $(elem).serialize() + "&image=" + $scope.image,
		}).success(function () {
			$window.location.href = SITE_URL+'/admin/index#/students';
			toastr.success('Student Added Successfully', 'Success!', {
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
	
	
	// init jquery functions and plugins
$(document).ready(function(){

  $.getScript('//cdnjs.cloudflare.com/ajax/libs/select2/3.4.8/select2.min.js',function(){
  
    $(".select2").select2({
    	
    });
    
  });//script
  
});
 
 }
  
 
  
  
  
})();


