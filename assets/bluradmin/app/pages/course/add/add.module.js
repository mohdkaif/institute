/**
 * @author v.lugovsky
 * created on 16.12.2015
 */
(function () {
  'use strict';

  angular.module('BlurAdmin.pages.course.add', [])
      .config(routeConfig);

  /** @ngInject */
  function routeConfig($stateProvider) {
    $stateProvider
        .state('add', {
          url: '/course/add',
          templateUrl: SITE_URL+'/admin/course/add',
          title: 'Add Course',
		   
        });
  }

})();


