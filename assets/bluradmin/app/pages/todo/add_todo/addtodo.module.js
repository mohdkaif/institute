/**
 * @author v.lugovsky
 * created on 16.12.2015
 */
(function () {
  'use strict';

  angular.module('BlurAdmin.pages.todo.add_todo', [])
      .config(routeConfig);

  /** @ngInject */
  function routeConfig($stateProvider) {
    $stateProvider
        .state('add_todo', {
          url: '/todo/add',
          templateUrl: SITE_URL+'/admin/index/add_todo',
          title: 'Add Todo',
		   
        });
  }

})();


