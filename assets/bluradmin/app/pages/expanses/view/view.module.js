/**
 * @author v.lugovsky
 * created on 16.12.2015
 */
(function () {
  'use strict';

  angular.module('BlurAdmin.pages.expanses.view', [])
      .config(routeConfig);

  /** @ngInject */
  function routeConfig($stateProvider) {
    $stateProvider
        .state('view_expanses', {
          url: '/expanses/view/:id',
		  params: {
			id: null,
		  },
          templateUrl: SITE_URL+'/admin/expanses/view',
          title: 'View Expanses',
		  controller: function($scope, $stateParams) {
			 $scope.id = $stateParams.id;
		  }
		});
  }
			
})();


