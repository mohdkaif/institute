/**
 * @author v.lugovsky
 * created on 16.12.2015
 */
(function () {
  'use strict';

  angular.module('BlurAdmin.pages.students.edit_batch', [])
      .config(routeConfig);

  /** @ngInject */
  function routeConfig($stateProvider) {
    $stateProvider
        .state('edit_batch_stu', {
          url: '/students/edit_batch/:id',
		  params: {
			id: null,
		  },
          templateUrl: SITE_URL+'/admin/students/edit_batch',
          title: 'Edit Student Batch',
		  controller: function($scope, $stateParams) {
			 $scope.id = $stateParams.id;
		  }
		});
  }
			
})();


