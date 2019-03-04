/**
 * @author v.lugovsky
 * created on 16.12.2015
 */
(function () {
  'use strict';

  angular.module('BlurAdmin.pages.faculties.add_receipt', [])
      .config(routeConfig);

  /** @ngInject */
  function routeConfig($stateProvider) {
    $stateProvider
        .state('add_receiptfac', {
          url: '/faculties/add_receipt/:id',
		  params: {
			id: null,
		  },
          templateUrl: SITE_URL+'/admin/faculties/add_receipt',
          title: 'Add Faculty Receipt',
		  controller: function($scope, $stateParams) {
			 $scope.id = $stateParams.id;
		  }
		});
  }
			
})();


