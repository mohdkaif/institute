/**
 * @author v.lugovsky
 * created on 16.12.2015
 */
(function () {
  'use strict';

  angular.module('BlurAdmin.pages.faculties.receipt', [])
      .config(routeConfig);

  /** @ngInject */
  function routeConfig($stateProvider) {
    $stateProvider
        .state('receiptfac', {
          url: '/faculties/receipt/:id',
		  params: {
			id: null,
		  },
          templateUrl: SITE_URL+'/admin/faculties/receipt',
          title: 'Faculty Receipt',
		  controller: function($scope, $stateParams) {
			 $scope.id = $stateParams.id;
		  }
		});
  }
			
})();


