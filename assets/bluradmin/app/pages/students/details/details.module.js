/**
 * @author v.lugovsky
 * created on 16.12.2015
 */
(function () {
  'use strict';

  angular.module('BlurAdmin.pages.students.details', [])
      .config(routeConfig);

  /** @ngInject */
  function routeConfig($stateProvider) {
    $stateProvider
        .state('details_students', {
          url: '/students/details/:id',
		  params: {
			id: null,
		  },
          templateUrl: SITE_URL+'/admin/students/details',
          title: 'Student Details',
		  controller: function($scope, $stateParams) {
			 $scope.id = $stateParams.id;
		  }
		});
  }
			
})();


