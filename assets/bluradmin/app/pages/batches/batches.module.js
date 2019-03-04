/**
 * @author v.lugovsky
 * created on 16.12.2015
 */
(function () {
  'use strict';

  angular.module('BlurAdmin.pages.batches', [])
      .config(routeConfig);

  /** @ngInject */
  function routeConfig($stateProvider) {
    $stateProvider
        .state('batches', {
          url: '/batches',
          templateUrl: SITE_URL+'/admin/batches',
          title: 'Batches',
          sidebarMeta: {
            icon: 'ion-ios-book',
            order: 4,
          },
        });
  }

})();


