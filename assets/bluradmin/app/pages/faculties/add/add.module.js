/**
 * @author v.lugovsky
 * created on 16.12.2015
 */
(function () {
  'use strict';

  angular.module('BlurAdmin.pages.faculties.add', [])
      .config(routeConfig);

  /** @ngInject */
  function routeConfig($stateProvider) {
    $stateProvider
        .state('add_fac', {
          url: '/faculties/add',
          templateUrl: SITE_URL+'/admin/faculties/add',
          title: 'Add Faculty',
		   
        });
  }

})();


