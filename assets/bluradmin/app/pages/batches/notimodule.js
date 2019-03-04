/**
 * @author v.lugovsky
 * created on 16.12.2015
 */
(function () {
  'use strict';

  angular.module('BlurAdmin.pages.batches.notifications', [])
      .config(routeConfig);

  /** @ngInject */
  function routeConfig($stateProvider) {
    $stateProvider
        .state('notifications', {
          url: '/notifications',
          templateUrl: SITE_URL+'/admin/batches/notifications',
          title: 'notifications',
          sidebarMeta: {
            icon: 'ion-android-map',
            order: 1,
          },
        });
  }

})();


