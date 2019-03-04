/**
 * @author v.lugovsky
 * created on 16.12.2015
 */
(function () {
  'use strict';

  angular.module('BlurAdmin.pages.students.edit_files', [])
      .config(routeConfig);

  /** @ngInject */
  function routeConfig($stateProvider) {
    $stateProvider
        .state('edit_files', {
          url: '/students/edit_files/:id',
		  params: {
			id: null,
		  },
          templateUrl: SITE_URL+'/admin/students/edit_files',
          title: 'Edit Student Files',
		  controller: function($scope, $stateParams) {
			 $scope.id = $stateParams.id;
		  }
		});
  }
			
})();


