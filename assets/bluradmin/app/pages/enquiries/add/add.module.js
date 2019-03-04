/**
 * @author v.lugovsky
 * created on 16.12.2015
 */
(function () {
  'use strict';

  angular.module('BlurAdmin.pages.enquiries.add', [])
      .config(routeConfig);

  /** @ngInject */
  function routeConfig($stateProvider) {
    $stateProvider
        .state('add_enq', {
          url: '/enquiries/add',
          templateUrl: SITE_URL+'/admin/enquiries/add',
          title: 'Add Enquiry/Lead',
		   
        });
  }

})();


