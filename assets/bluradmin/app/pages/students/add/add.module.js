
(function () {
  'use strict';

  angular.module('BlurAdmin.pages.students.add', [])
      .config(routeConfig);

  /** @ngInject */
  function routeConfig($stateProvider) {
    $stateProvider
        .state('students_add', {
          url: '/students/add/:id',
		  params: {
			id: null,
		  },
          templateUrl: SITE_URL+'/admin/students/add',
          title: 'Add Student',
		  controller: function($scope, $stateParams) {
			 $scope.id = $stateParams.id;
		  }
		});
  }
			
})();





