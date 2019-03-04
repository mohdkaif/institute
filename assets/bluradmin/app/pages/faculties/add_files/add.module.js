/**
 * @author v.lugovsky
 * created on 16.12.2015
 */
(function () {
  'use strict';

  angular.module('BlurAdmin.pages.faculties.add_files', [])
      .config(routeConfig);

  /** @ngInject */
  function routeConfig($stateProvider) {
    $stateProvider
        .state('add_filesfac', {
          url: '/faculties/add_files/:id',
		  params: {
			id: null,
		  },
          templateUrl: SITE_URL+'/admin/faculties/add_files',
          title: 'Add Faculty Files',
		  controller: function($scope, $stateParams) {
			 $scope.id = $stateParams.id;
		  }
		});
  }
			
})();


