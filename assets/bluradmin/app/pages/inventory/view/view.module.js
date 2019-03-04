/**
 * @author v.lugovsky
 * created on 16.12.2015
 */
(function () {
  'use strict';

  angular.module('BlurAdmin.pages.inventory.view', [])
      .config(routeConfig);

  /** @ngInject */
  function routeConfig($stateProvider) {
    $stateProvider
        .state('view_inventory', {
          url: '/inventory/view/:id',
		  params: {
			id: null,
		  },
          templateUrl: SITE_URL+'/admin/inventory/view',
          title: 'View Inventory',
		  controller: function($scope, $stateParams) {
			 $scope.id = $stateParams.id;
		  }
		});
  }
			
})();


