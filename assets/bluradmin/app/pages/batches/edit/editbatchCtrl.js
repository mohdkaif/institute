(function () {
  'use strict';
  angular.module('BlurAdmin.pages.batches.edit')
  	  .controller('editbatchCtrl', editbatchCtrl);
	
	
		
	function editbatchCtrl($scope,$http,$window,toastr,$timeout, $upload,$element,$stateParams) {
	
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
		
	$http.get(SITE_URL+'/admin/b_api/tasks/'+ $stateParams.id).success(function(data){
        $scope.tasks = data;
		//console.log($scope.tasks[0].id);
    }).error(function(data){
        $scope.tasks = data;
    	 
	});
	$http.get(SITE_URL+'/admin/c_api/tasks/').success(function(data){
	  $scope.courses= data;
	}).error(function(data){
		$scope.courses = data;
	});	
	$scope.getEndDate = function(){
		var c_id	=	angular.element('#course_id').val();
		var sd	=	angular.element('#start_date').val();
		if(c_id	==	''){
			return alert('Select First Course');
		}
		
		$http.get(SITE_URL+'/admin/b_api/getEndDate/'+c_id +'/'+sd).success(function(data){
		 // $scope.ed= data;
		angular.element('#end_date').val(data);
		}).error(function(data){
			$scope.ed	= data;
		});	
	}
	
	$scope.getClasses = function(){
		var cc_id	=	angular.element('#category_id').val();
		$http.get(SITE_URL+'/admin/c_api/c_by_category/'+cc_id).success(function(data){
		  $scope.courses= data;
		}).error(function(data){
			$scope.courses = data;
		});	
	}
	
	
	$http.get(SITE_URL+'/admin/cc_api/tasks').success(function(data){
      $scope.items= data;
    }).error(function(data){
        $scope.items = data;
    });
	$http.get(SITE_URL+'/admin/f_api/faculties').success(function(data){
      $scope.faculties= data;
    }).error(function(data){
        $scope.faculties = data;
    });
	
	$http.get(SITE_URL+'/admin/b_api/select_faculty/'+$scope.id).success(function(data){
      $scope.selfacultis= data;
    }).error(function(data){
        $scope.selfacultis = data;
    });
	//$scope.selfacultis	=	[];
    $scope.example15settings = {enableSearch: true};
	//$scope.example1data = [ {id: 1, label: "David"}, {id: 2, label: "Jhon"}, {id: 3, label: "Danny"}];
	$scope.example15settings = {
		scrollableHeight: '200px',
		scrollable: true
	};
    
	
	$scope.updateTask = function(){
     	//console.log($scope.selectedCourse);
		var elem = angular.element($element);
		$http({
			method: 'POST',
			dataType: "json",
			url: SITE_URL+'/admin/b_api/tasks',
			headers: {'Content-Type': 'application/x-www-form-urlencoded'},
			data: $(elem).serialize(),
		}).success(function () {
			$window.location.href = SITE_URL+'/admin/index#/batches/details/'+$stateParams.id;
			toastr.success('BatchUpdated Successfully', 'Success!', {
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
  
  
  
  
  
})();


