/**
 * @author v.lugovsky
 * created on 16.12.2015
 */
(function () {
  'use strict';

  angular.module('BlurAdmin.pages.course.edit_material', [])
      .config(routeConfig);

  /** @ngInject */
  function routeConfig($stateProvider) {
    $stateProvider
        .state('edit_material', {
          url: '/course/edit_material/:id',
		  params: {
			id: null,
		  },
          templateUrl: SITE_URL+'/admin/course/edit_material',
          title: 'Edit Study Material',
		  controller: function($scope, $stateParams) {
			 $scope.id = $stateParams.id;
		  }
		});
  }
			
})();


