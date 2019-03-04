/**
 * @author v.lugovsky
 * created on 16.12.2015
 */
(function () {
  'use strict';

  angular.module('BlurAdmin.pages.todo', [])
      .config(routeConfig);

  /** @ngInject */
  function routeConfig($stateProvider) {
    $stateProvider
        .state('todo', {
          url: '/todo',
          templateUrl: SITE_URL+'/admin/index/todos',
          title: 'Todo',
          sidebarMeta: {
            icon: 'ion-ios-list',
            order: 8,
          },
        });
  }

})();


