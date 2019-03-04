/**
 * @author v.lugovsky
 * created on 16.12.2015
 */
(function () {
  'use strict';

  angular.module('BlurAdmin.pages.faculties.course_fee', [])
      .config(routeConfig);

  /** @ngInject */
  function routeConfig($stateProvider) {
    $stateProvider
        .state('course_fee', {
          url: '/faculties/course_fee/:id',
		  params: {
			id: null,
		  },
          templateUrl: SITE_URL+'/admin/faculties/course_fee',
          title: 'Course Fee',
		  controller: function($scope, $stateParams) {
			 $scope.id = $stateParams.id;
		  }
		});
  }
			
})();


