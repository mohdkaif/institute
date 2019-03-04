/**
 * @author v.lugovsky
 * created on 16.12.2015
 */
(function () {
  'use strict';

  angular.module('BlurAdmin.pages.settings', [])
      .config(routeConfig);

  /** @ngInject */
  function routeConfig($stateProvider) {
    $stateProvider
        .state('settings', {
          url: '/settings',
          templateUrl: SITE_URL+'/admin/settings',
          title: 'Settings',
          sidebarMeta: {
            icon: 'fa fa-cogs',
            order: 10,
          },
        });
  }

})();


