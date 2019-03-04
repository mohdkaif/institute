/**
 * @author v.lugovsky
 * created on 16.12.2015
 */
(function () {
  'use strict';

  angular.module('BlurAdmin.pages.students.edit_certificate', [])
      .config(routeConfig);

  /** @ngInject */
  function routeConfig($stateProvider) {
    $stateProvider
        .state('edit_certificate', {
          url: '/students/edit_certificate/:id',
		  params: {
			id: null,
		  },
          templateUrl: SITE_URL+'/admin/students/edit_certificate',
          title: 'Edit Student Certificate',
		  controller: function($scope, $stateParams) {
			 $scope.id = $stateParams.id;
		  }
		});
  }
			
})();


