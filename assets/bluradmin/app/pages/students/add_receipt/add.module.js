/**
 * @author v.lugovsky
 * created on 16.12.2015
 */
(function () {
  'use strict';

  angular.module('BlurAdmin.pages.students.add_receipt', [])
      .config(routeConfig);

  /** @ngInject */
  function routeConfig($stateProvider) {
    $stateProvider
        .state('add_receipt', {
          url: '/students/add_receipt/:id',
		  params: {
			id: null,
		  },
          templateUrl: SITE_URL+'/admin/students/add_receipt',
          title: 'Add Student Receipt',
		  controller: function($scope, $stateParams) {
			 $scope.id = $stateParams.id;
		  }
		});
  }
			
})();


