/**
 * @author v.lugovsky
 * created on 16.12.2015
 */
(function () {
  'use strict';

  angular.module('BlurAdmin.pages.expanses', [])
      .config(routeConfig);

  /** @ngInject */
  function routeConfig($stateProvider) {
    $stateProvider
        .state('expanses', {
          url: '/expanses',
          templateUrl: SITE_URL+'/admin/expanses',
          title: 'Expanses',
          sidebarMeta: {
            icon: 'ion-cash',
            order: 10,
          },
        });
  }

})();


