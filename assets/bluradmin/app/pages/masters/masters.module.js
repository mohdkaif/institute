/**
 * @author v.lugovsky
 * created on 16.12.2015
 */
(function () {
  'use strict';

  angular.module('BlurAdmin.pages.masters', [])
      .config(routeConfig);

  /** @ngInject */
  function routeConfig($stateProvider) {
    $stateProvider
        .state('masters', {
          url: '/masters',
          template : '<ui-view></ui-view>',
          abstract: true,
          title: 'Masters',
          sidebarMeta: {
            icon: 'ion-compose',
            order: 7,
          },
        })
         .state('masters.expanses_category',
        {
          url: '/expanses_category',
          templateUrl: SITE_URL+'/admin/expanses_category/',
          //controller: 'WizardCtrl',
          //controllerAs: 'vm',
          title: 'Expanses Category',
          sidebarMeta: {
            order: 1,
          },
        }).state('masters.add_expanses_category', {
          url: '/expanses_category/add',
          templateUrl: SITE_URL+'/admin/expanses_category/add',
          title: 'Add Expanses Category',
          //sidebarMeta: {
            //order: 0,
          //},
        }).state('masters.edit_expanses_category', {
          url: '/expanses_category/edit/:id',
		  params: {
			id: null,
		  },
          templateUrl: SITE_URL+'/admin/expanses_category/edit',
          title: 'Edit Expanses Category',
		  controller: function($scope, $stateParams) {
			 $scope.id = $stateParams.id;
		  }
          //sidebarMeta: {
            //order: 0,
          //},
        }).state('masters.course_category',
        {
          url: '/course_category',
          templateUrl: SITE_URL+'/admin/course_category/',
          //controller: 'WizardCtrl',
          //controllerAs: 'vm',
          title: 'Course Category',
          sidebarMeta: {
            order: 2,
          },
        }).state('masters.add_course_category', {
          url: '/course_category/add',
          templateUrl: SITE_URL+'/admin/course_category/add',
          title: 'Add Course Category',
          //sidebarMeta: {
            //order: 0,
          //},
        }).state('masters.edit_course_category', {
          url: '/course_category/edit/:id',
		  params: {
			id: null,
		  },
          templateUrl: SITE_URL+'/admin/course_category/edit',
          title: 'Edit Course Category',
		  controller: function($scope, $stateParams) {
			 $scope.id = $stateParams.id;
		  }
          //sidebarMeta: {
            //order: 0,
          //},
        }).state('masters.enquiries_status',
        {
          url: '/enquiries_status',
          templateUrl: SITE_URL+'/admin/enquiries_status/',
          //controller: 'WizardCtrl',
          //controllerAs: 'vm',
          title: 'Enquiries Status',
          sidebarMeta: {
            order: 3,
          },
        }).state('masters.add', {
          url: '/enquiries_status/add',
          templateUrl: SITE_URL+'/admin/enquiries_status/add',
          title: 'Add Enquiry Status',
          //sidebarMeta: {
            //order: 0,
          //},
        }).state('masters.edit', {
          url: '/enquiries_status/edit/:id',
		  params: {
			id: null,
		  },
          templateUrl: SITE_URL+'/admin/enquiries_status/edit',
          title: 'Edit Enquiry Status',
		  controller: function($scope, $stateParams) {
			 $scope.id = $stateParams.id;
		  }
          //sidebarMeta: {
            //order: 0,
          //},
        });
		
  }
})();
