/**
 * @author v.lugovsky
 * created on 16.12.2015
 */
(function () {
  'use strict';

  angular.module('BlurAdmin.pages.todo.view', [])
      .config(routeConfig);

  /** @ngInject */
  function routeConfig($stateProvider) {
    $stateProvider
        .state('view', {
          url: '/todo/view/:id',
		  params: {
			id: null,
		  },
          templateUrl: SITE_URL+'/admin/index/view_todo',
          title: 'View Todo',
		  controller: function($scope, $stateParams) {
			 $scope.id = $stateParams.id;
		  }
		});
  }
			
})();


