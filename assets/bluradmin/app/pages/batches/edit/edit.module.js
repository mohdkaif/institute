/**
 * @author v.lugovsky
 * created on 16.12.2015
 */
(function () {
  'use strict';

  angular.module('BlurAdmin.pages.batches.edit', [])
      .config(routeConfig);

  /** @ngInject */
  function routeConfig($stateProvider) {
    $stateProvider
        .state('edit_batch', {
          url: '/batches/edit/:id',
		  params: {
			id: null,
		  },
          templateUrl: SITE_URL+'/admin/batches/edit',
          title: 'Edit Batch',
		  controller: function($scope, $stateParams) {
			 $scope.id = $stateParams.id;
		  }
		});
  }
			
})();


