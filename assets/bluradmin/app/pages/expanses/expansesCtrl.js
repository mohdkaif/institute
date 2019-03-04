(function () {
  'use strict';

  angular.module('BlurAdmin.pages.expanses')
      .controller('expansesCtrl', expansesCtrl);

  function expansesCtrl($scope,$http,$window,toastr,DTOptionsBuilder, DTColumnBuilder) {
	 
    $http.get(SITE_URL+'/admin/ex_api/tasks').success(function(data){
     	 $scope.tasks = data;
		$scope.vm = {};
		$scope.vm.dtOptions = DTOptionsBuilder.newOptions().withOption('order', [0, 'asc']);
	 }).error(function(data){
        $scope.tasks = data;
    });
	 
 	
    $scope.refresh = function(){
        $http.get(SITE_URL+'/admin/ex_api/tasks').success(function(data){
              $scope.tasks= 10;
			 $scope.tasks= data;
        }).error(function(data){
            $scope.tasks= data;
        });
    }
 
 
    $scope.deleteExpanses = function(task){
		 if(confirm("Do you want to delete this?")) {
		   		$http.delete(SITE_URL+'/admin/ex_api/tasks/' + task.id);
				$scope.tasks.splice($scope.tasks.indexOf(task),1);
				toastr.success('Expanses Deleted Successfully', 'Success!', {
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
    $scope.printData = function()
	{
	 	 var divToPrint=document.getElementById("printTable");
	   var newWin= window.open("");
	   newWin.document.write(divToPrint.outerHTML);
	   newWin.print();
	   newWin.close();
	}
  }
})();