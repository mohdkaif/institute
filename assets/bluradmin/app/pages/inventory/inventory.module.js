/**
 * @author v.lugovsky
 * created on 16.12.2015
 */
(function () {
  'use strict';

  angular.module('BlurAdmin.pages.inventory', [])
      .config(routeConfig);

  /** @ngInject */
  function routeConfig($stateProvider) {
    $stateProvider
        .state('inventory', {
          url: '/inventory',
          templateUrl: SITE_URL+'/admin/inventory',
          title: 'Inventory',
          sidebarMeta: {
            icon: 'ion-ios-pricetags',
            order: 9,
          },
        });
  }

})();


