/**
 * @author v.lugovsky
 * created on 16.12.2015
 */
(function () {
  'use strict';

  angular.module('BlurAdmin.pages.enquiries.view', [])
      .config(routeConfig);

  /** @ngInject */
  function routeConfig($stateProvider) {
    $stateProvider
        .state('view_enq', {
          url: '/enquiries/view/:id',
		  params: {
			id: null,
		  },
          templateUrl: SITE_URL+'/admin/enquiries/view',
          title: 'View',
		  controller: function($scope, $stateParams) {
			 $scope.id = $stateParams.id;
		  }
		});
  }
			
})();


