/**
 * @author v.lugovsky
 * created on 16.12.2015
 */
(function () {
  'use strict';

  angular.module('BlurAdmin.pages.students.edit_receipt', [])
      .config(routeConfig);

  /** @ngInject */
  function routeConfig($stateProvider) {
    $stateProvider
        .state('edit_receipt', {
          url: '/students/edit_receipt/:id',
		  params: {
			id: null,
		  },
          templateUrl: SITE_URL+'/admin/students/edit_receipt',
          title: 'Edit Student Receipt',
		  controller: function($scope, $stateParams) {
			 $scope.id = $stateParams.id;
		  }
		});
  }
			
})();


