/**
 * @author v.lugovsky
 * created on 16.12.2015
 */
(function () {
  'use strict';

  angular.module('BlurAdmin.pages.students.receipt', [])
      .config(routeConfig);

  /** @ngInject */
  function routeConfig($stateProvider) {
    $stateProvider
        .state('receipt', {
          url: '/students/receipt/:id',
		  params: {
			id: null,
		  },
          templateUrl: SITE_URL+'/admin/students/receipt',
          title: 'Receipt',
		  controller: function($scope, $stateParams) {
			 $scope.id = $stateParams.id;
		  }
		});
  }
			
})();


