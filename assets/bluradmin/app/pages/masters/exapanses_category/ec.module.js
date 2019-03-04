/**
 * @author v.lugovsky
 * created on 16.12.2015
 */
(function () {
  'use strict';

  angular.module('BlurAdmin.pages.masters.expanses_category', [])
      .config(routeConfig);

  /** @ngInject */
  function routeConfig($stateProvider) {
    $stateProvider
        .state('expanses_category', {
          url: '/expanses_category',
          templateUrl: SITE_URL+'/admin/index/expanses_category',
          title: 'Expanses Category',
          sidebarMeta: {
            icon: 'ion-android-home',
            order: 1,
          },
        });
  }

})();


