/**
 * @author v.lugovsky
 * created on 16.12.2015
 */
(function () {
  'use strict';

  angular.module('BlurAdmin.pages.reports', [])
      .config(routeConfig);

  /** @ngInject */
  function routeConfig($stateProvider) {
    $stateProvider
        .state('reports', {
          url: '/reports',
          templateUrl: SITE_URL+'/admin/reports',
          title: 'Reports',
          sidebarMeta: {
            icon: 'ion-ios-pulse-strong',
            order: 10,
          },
        });
  }

})();


