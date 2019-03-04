/**
 * @author v.lugovsky
 * created on 16.12.2015
 */
(function () {
  'use strict';

  angular.module('BlurAdmin.pages.students.add_certificate', [])
      .config(routeConfig);

  /** @ngInject */
  function routeConfig($stateProvider) {
    $stateProvider
        .state('add_certificate', {
          url: '/students/add_certificate/:id',
		  params: {
			id: null,
		  },
          templateUrl: SITE_URL+'/admin/students/add_certificate',
          title: 'Add Student Certificate',
		  controller: function($scope, $stateParams) {
			 $scope.id = $stateParams.id;
		  }
		});
  }
			
})();


