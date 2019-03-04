/**
 * @author v.lugovsky
 * created on 16.12.2015
 */
(function () {
  'use strict';

  angular.module('BlurAdmin.pages.batches.details', [])
      .config(routeConfig);

  /** @ngInject */
  function routeConfig($stateProvider) {
    $stateProvider
        .state('details_batches', {
          url: '/batches/details/:id',
		  params: {
			id: null,
		  },
          templateUrl: SITE_URL+'/admin/batches/details',
          title: 'Batch Details',
		  controller: function($scope, $stateParams) {
			 $scope.id = $stateParams.id;
		  }
		});
  }
			
})();


