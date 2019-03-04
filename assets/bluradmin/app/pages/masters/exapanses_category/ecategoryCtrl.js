(function () {
  'use strict';

  angular.module('BlurAdmin.pages.masters')
      .controller('ecategoryCtrl', ecategoryCtrl);

  function ecategoryCtrl($scope,$http,$window,toastr,DTOptionsBuilder, DTColumnBuilder) {
	  //alert(123);
	  
      $http.get(SITE_URL+'/admin/ec_api/tasks').success(function(data){
     	 $scope.smartTableData = data;
		$scope.vm = {};
		$scope.vm.dtOptions = DTOptionsBuilder.newOptions()
      	.withOption('order', [0, 'asc']);
	 }).error(function(data){
        $scope.smartTableData = data;
    });
 	
    $scope.refresh = function(){
        $http.get(SITE_URL+'/admin/ec_api/tasks').success(function(data){
              $scope.smartTablePageSize = 10;
			 $scope.smartTableData = data;
        }).error(function(data){
            $scope.smartTableData = data;
        });
    }
 
    $scope.deleteTask = function(task){
		 if(confirm("Do you want to delete this?")) {
		   		$http.delete(SITE_URL+'/admin/ec_api/tasks/' + task.id);
				$scope.smartTableData.splice($scope.smartTableData.indexOf(task),1);
				//$scope.refresh();
				toastr.success('Expanses Category Deleted Successfully', 'Success!', {
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
 
    
  }
})();