/**
 * @author v.lugovsky
 * created on 16.12.2015
 */
(function () {
  'use strict';

  angular.module('BlurAdmin.pages.course.add_material', [])
      .config(routeConfig);

  /** @ngInject */
  function routeConfig($stateProvider) {
    $stateProvider
        .state('add_material', {
          url: '/course/add_material/:id',
		  params: {
			id: null,
		  },
          templateUrl: SITE_URL+'/admin/course/add_material',
          title: 'Add Study Material',
		  controller: function($scope, $stateParams) {
			 $scope.id = $stateParams.id;
		  }
		});
  }
			
})();


