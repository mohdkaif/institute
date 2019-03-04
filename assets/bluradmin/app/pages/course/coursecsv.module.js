/**
 * @author v.lugovsky
 * created on 16.12.2015
 */
(function () {
  'use strict';

  angular.module('BlurAdmin.pages.course.export', [])
      .config(routeConfig);

  /** @ngInject */
  function routeConfig($stateProvider) {
    $stateProvider
        .state('course', {
          url: '/course',
          templateUrl: SITE_URL+'/admin/course',
          title: 'Course',
          sidebarMeta: {
            icon: 'fa fa-book',
            order: 1,
          },
        });
  }

})();


