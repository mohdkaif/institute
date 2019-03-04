/**
 * @author v.lugovsky
 * created on 16.12.2015
 */
(function () {
  'use strict';

  angular.module('BlurAdmin.pages.faculties.edit_files', [])
      .config(routeConfig);

  /** @ngInject */
  function routeConfig($stateProvider) {
    $stateProvider
        .state('edit_filesfac', {
          url: '/faculties/edit_files/:id',
		  params: {
			id: null,
		  },
          templateUrl: SITE_URL+'/admin/faculties/edit_files',
          title: 'Edit Faculty Files',
		  controller: function($scope, $stateParams) {
			 $scope.id = $stateParams.id;
		  }
		});
  }
			
})();


