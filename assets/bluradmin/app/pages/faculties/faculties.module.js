/**
 * @author v.lugovsky
 * created on 16.12.2015
 */
(function () {
  'use strict';

  angular.module('BlurAdmin.pages.faculties', [])
      .config(routeConfig);

  /** @ngInject */
  function routeConfig($stateProvider) {
    $stateProvider
        .state('faculties', {
          url: '/faculties',
          templateUrl: SITE_URL+'/admin/faculties',
          title: 'Faculties',
          sidebarMeta: {
            icon: 'ion-person-stalker',
            order: 5,
          },
        });
  }

})();


