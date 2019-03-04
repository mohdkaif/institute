/**
 * @author v.lugovsky
 * created on 16.12.2015
 */
(function () {
  'use strict';

  angular.module('BlurAdmin.pages.students.edit_notes', [])
      .config(routeConfig);

  /** @ngInject */
  function routeConfig($stateProvider) {
    $stateProvider
        .state('edit_notes', {
          url: '/students/edit_notes/:id',
		  params: {
			id: null,
		  },
          templateUrl: SITE_URL+'/admin/students/edit_notes',
          title: 'Edit Notes',
		  controller: function($scope, $stateParams) {
			 $scope.id = $stateParams.id;
		  }
		});
  }
			
})();


