/**
 * @author v.lugovsky
 * created on 16.12.2015
 */
(function () {
  'use strict';

  angular.module('BlurAdmin.pages.expanses.edit', [])
      .config(routeConfig);

  /** @ngInject */
  function routeConfig($stateProvider) {
    $stateProvider
        .state('edit_expanses', {
          url: '/expanses/edit/:id',
		  params: {
			id: null,
		  },
          templateUrl: SITE_URL+'/admin/expanses/edit',
          title: 'Edit Expanses',
		  controller: function($scope, $stateParams) {
			 $scope.id = $stateParams.id;
		  }
		});
  }
			
})();


