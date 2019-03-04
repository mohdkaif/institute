/**
 * @author v.lugovsky
 * created on 16.12.2015
 */
(function () {
  'use strict';

  angular.module('BlurAdmin.pages.students.edit', [])
      .config(routeConfig);

  /** @ngInject */
  function routeConfig($stateProvider) {
    $stateProvider
        .state('edit_student', {
          url: '/students/edit/:id',
		  params: {
			id: null,
		  },
          templateUrl: SITE_URL+'/admin/students/edit',
          title: 'Edit Student',
		  controller: function($scope, $stateParams) {
			 $scope.id = $stateParams.id;
		  }
		});
  }
			
})();


