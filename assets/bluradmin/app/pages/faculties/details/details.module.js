/**
 * @author v.lugovsky
 * created on 16.12.2015
 */
(function () {
  'use strict';

  angular.module('BlurAdmin.pages.faculties.deatils', [])
      .config(routeConfig);

  /** @ngInject */
  function routeConfig($stateProvider) {
    $stateProvider
        .state('details_fac', {
          url: '/faculties/details/:id',
		  params: {
			id: null,
		  },
          templateUrl: SITE_URL+'/admin/faculties/details',
          title: 'Details',
		  controller: function($scope, $stateParams) {
			 $scope.id = $stateParams.id;
		  }
		});
  }
			
})();


