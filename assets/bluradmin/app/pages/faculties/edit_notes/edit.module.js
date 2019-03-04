/**
 * @author v.lugovsky
 * created on 16.12.2015
 */
(function () {
  'use strict';

  angular.module('BlurAdmin.pages.faculties.edit_notes', [])
      .config(routeConfig);

  /** @ngInject */
  function routeConfig($stateProvider) {
    $stateProvider
        .state('edit_notesfac', {
          url: '/faculties/edit_notes/:id',
		  params: {
			id: null,
		  },
          templateUrl: SITE_URL+'/admin/faculties/edit_notes',
          title: 'Edit Notes',
		  controller: function($scope, $stateParams) {
			 $scope.id = $stateParams.id;
		  }
		});
  }
			
})();


