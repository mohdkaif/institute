/**
 * @author v.lugovsky
 * created on 16.12.2015
 */
(function () {
  'use strict';

  angular.module('BlurAdmin.pages.faculties.edit_courseFee', [])
      .config(routeConfig);

  /** @ngInject */
  function routeConfig($stateProvider) {
    $stateProvider
        .state('edit_courseFee', {
          url: '/faculties/edit_courseFee/:id',
		  params: {
			id: null,
		  },
          templateUrl: SITE_URL+'/admin/faculties/edit_courseFee',
          title: 'Edit Course Fee',
		  controller: function($scope, $stateParams) {
			 $scope.id = $stateParams.id;
		  }
		});
  }
			
})();


