/**
 * @author v.lugovsky
 * created on 16.12.2015
 */
(function () {
  'use strict';

  angular.module('BlurAdmin.pages.inventory.add', [])
      .config(routeConfig);

  /** @ngInject */
  function routeConfig($stateProvider) {
    $stateProvider
        .state('inventory_add', {
          url: '/inventory/add',
          templateUrl: SITE_URL+'/admin/inventory/add',
          title: 'Add Inventory',
		   
        });
  }

})();


