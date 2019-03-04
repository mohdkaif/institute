/**
 * @author v.lugovsky
 * created on 16.12.2015
 */
(function () {
  'use strict';

  angular.module('BlurAdmin.pages.enquiries.edit', [])
      .config(routeConfig);

  /** @ngInject */
  function routeConfig($stateProvider) {
    $stateProvider
        .state('edit_enq', {
          url: '/enquiries/edit/:id',
		  params: {
			id: null,
		  },
          templateUrl: SITE_URL+'/admin/enquiries/edit',
          title: 'Edit Enquiry/Lead',
		  controller: function($scope, $stateParams) {
			 $scope.id = $stateParams.id;
		  }
		});
  }
			
})();


