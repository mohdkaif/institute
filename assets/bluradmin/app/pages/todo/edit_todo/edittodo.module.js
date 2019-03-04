/**
 * @author v.lugovsky
 * created on 16.12.2015
 */
(function () {
  'use strict';

  angular.module('BlurAdmin.pages.todo.edit_todo', [])
      .config(routeConfig);

  /** @ngInject */
  function routeConfig($stateProvider) {
    $stateProvider
        .state('edit_todo', {
          url: '/todo/edit/:id',
		  params: {
			id: null,
		  },
          templateUrl: SITE_URL+'/admin/index/edit_todo',
          title: 'Edit Todo',
		  controller: function($scope, $stateParams) {
			 $scope.id = $stateParams.id;
		  }
		});
  }
			
})();


