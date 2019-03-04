/**
 * @author v.lugovsky
 * created on 16.12.2015
 */
(function () {
  'use strict';

  angular.module('BlurAdmin.pages.students.add_batch', [])
      .config(routeConfig);

  /** @ngInject */
  function routeConfig($stateProvider) {
    $stateProvider
        .state('add_batch', {
          url: '/students/add_batch/:id',
		  params: {
			id: null,
		  },
          templateUrl: SITE_URL+'/admin/students/add_batch',
          title: 'Add Student Batch',
		  controller: function($scope, $stateParams) {
			 $scope.id = $stateParams.id;
		  }
		});
  }
			
})();


