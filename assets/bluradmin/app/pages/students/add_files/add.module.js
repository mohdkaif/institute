/**
 * @author v.lugovsky
 * created on 16.12.2015
 */
(function () {
  'use strict';

  angular.module('BlurAdmin.pages.students.add_files', [])
      .config(routeConfig);

  /** @ngInject */
  function routeConfig($stateProvider) {
    $stateProvider
        .state('add_files', {
          url: '/students/add_files/:id',
		  params: {
			id: null,
		  },
          templateUrl: SITE_URL+'/admin/students/add_files',
          title: 'Add Student Files',
		  controller: function($scope, $stateParams) {
			 $scope.id = $stateParams.id;
		  }
		});
  }
			
})();


