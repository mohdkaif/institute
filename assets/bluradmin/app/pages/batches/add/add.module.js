/**
 * @author v.lugovsky
 * created on 16.12.2015
 */
(function () {
  'use strict';

  angular.module('BlurAdmin.pages.batches.add', [])
      .config(routeConfig);

  /** @ngInject */
  function routeConfig($stateProvider) {
    $stateProvider
        .state('batches_add', {
          url: '/batches/add',
          templateUrl: SITE_URL+'/admin/batches/add',
          title: 'Add Batch',
		   
        });
  }

})();


