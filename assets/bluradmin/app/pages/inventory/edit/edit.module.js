/**
 * @author v.lugovsky
 * created on 16.12.2015
 */
(function () {
  'use strict';

  angular.module('BlurAdmin.pages.inventory.edit', [])
      .config(routeConfig);

  /** @ngInject */
  function routeConfig($stateProvider) {
    $stateProvider
        .state('edit_inventory', {
          url: '/inventory/edit/:id',
		  params: {
			id: null,
		  },
          templateUrl: SITE_URL+'/admin/inventory/edit',
          title: 'Edit Inventory',
		  controller: function($scope, $stateParams) {
			 $scope.id = $stateParams.id;
		  }
		});
  }
			
})();


