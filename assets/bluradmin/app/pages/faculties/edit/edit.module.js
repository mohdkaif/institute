/**
 * @author v.lugovsky
 * created on 16.12.2015
 */
(function () {
  'use strict';

  angular.module('BlurAdmin.pages.faculties.edit', [])
      .config(routeConfig);

  /** @ngInject */
  function routeConfig($stateProvider) {
    $stateProvider
        .state('edit_fac', {
          url: '/faculties/edit/:id',
		  params: {
			id: null,
		  },
          templateUrl: SITE_URL+'/admin/faculties/edit',
          title: 'Edit Faculty',
		  controller: function($scope, $stateParams) {
			 $scope.id = $stateParams.id;
		  }
		});
  }
			
})();


