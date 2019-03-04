/**
 * @author v.lugovsky
 * created on 16.12.2015
 */
(function () {
  'use strict';

  angular.module('BlurAdmin.pages.expanses.add', [])
      .config(routeConfig);

  /** @ngInject */
  function routeConfig($stateProvider) {
    $stateProvider
        .state('expanses_add', {
          url: '/expanses/add',
          templateUrl: SITE_URL+'/admin/expanses/add',
          title: 'Add Expanses',
		   
        });
  }

})();


