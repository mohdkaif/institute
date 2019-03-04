/**
 * @author v.lugovsky
 * created on 16.12.2015
 */
(function () {
  'use strict';

  angular.module('BlurAdmin.pages.students', [])
      .config(routeConfig);

  /** @ngInject */
  function routeConfig($stateProvider) {
    $stateProvider
        .state('students', {
          url: '/students',
          templateUrl: SITE_URL+'/admin/students',
          title: 'Students',
          sidebarMeta: {
            icon: 'ion-ios-people',
            order: 3,
          },
        });
  }

})();


