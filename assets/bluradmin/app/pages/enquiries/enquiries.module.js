/**
 * @author v.lugovsky
 * created on 16.12.2015
 */
(function () {
  'use strict';

  angular.module('BlurAdmin.pages.enquiries', [])
      .config(routeConfig);

  /** @ngInject */
  function routeConfig($stateProvider) {
    $stateProvider
        .state('enquiries', {
          url: '/enquiries',
          templateUrl: SITE_URL+'/admin/enquiries',
          title: 'Enquiries/Leads',
          sidebarMeta: {
            icon: 'ion-android-bulb',
            order: 2,
          },
        });
  }

})();


