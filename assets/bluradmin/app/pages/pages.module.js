/**
 * @author v.lugovsky
 * created on 16.12.2015
 */
(function () {
  'use strict';

  angular.module('BlurAdmin.pages', [
    'ui.router',

    'BlurAdmin.pages.dashboard',
    'BlurAdmin.pages.todo',
	'BlurAdmin.pages.todo.add_todo',
	'BlurAdmin.pages.todo.edit_todo',
	'BlurAdmin.pages.todo.view',
	'BlurAdmin.pages.masters',
	'BlurAdmin.pages.course',
	'BlurAdmin.pages.course.add',
	'BlurAdmin.pages.course.edit',
	'BlurAdmin.pages.course.details',
	'BlurAdmin.pages.course.add_material',
	'BlurAdmin.pages.course.edit_material',
	'BlurAdmin.pages.enquiries',
	'BlurAdmin.pages.enquiries.add',
	'BlurAdmin.pages.enquiries.edit',
	'BlurAdmin.pages.enquiries.view',
	'BlurAdmin.pages.faculties',
	'BlurAdmin.pages.faculties.add',
	'BlurAdmin.pages.faculties.edit',
	'BlurAdmin.pages.faculties.deatils',
	'BlurAdmin.pages.faculties.course_fee',
	'BlurAdmin.pages.faculties.edit_courseFee',
  	'BlurAdmin.pages.faculties.add_receipt',
	'BlurAdmin.pages.faculties.edit_receipt',
	'BlurAdmin.pages.faculties.receipt',
	'BlurAdmin.pages.faculties.edit_notes',
	'BlurAdmin.pages.faculties.add_files',
	'BlurAdmin.pages.faculties.edit_files',
	'BlurAdmin.pages.batches',
	'BlurAdmin.pages.batches.add',
	'BlurAdmin.pages.batches.details',
	'BlurAdmin.pages.batches.edit',
	'BlurAdmin.pages.batches.notifications',
	'BlurAdmin.pages.students',
	'BlurAdmin.pages.students.add',
	'BlurAdmin.pages.students.details',
	'BlurAdmin.pages.students.edit',
	'BlurAdmin.pages.students.add_batch',
	'BlurAdmin.pages.students.edit_batch',
	'BlurAdmin.pages.students.add_receipt',
	'BlurAdmin.pages.students.edit_receipt',
	'BlurAdmin.pages.students.receipt',
	'BlurAdmin.pages.students.add_certificate',
	'BlurAdmin.pages.students.edit_certificate',
	'BlurAdmin.pages.students.edit_notes',
	'BlurAdmin.pages.students.add_files',
	'BlurAdmin.pages.students.edit_files',
	'BlurAdmin.pages.inventory',
	'BlurAdmin.pages.inventory.add',
	'BlurAdmin.pages.inventory.edit',
	'BlurAdmin.pages.inventory.view',
	'BlurAdmin.pages.expanses',
	'BlurAdmin.pages.expanses.add',
	'BlurAdmin.pages.expanses.edit',
	'BlurAdmin.pages.expanses.view',
	'BlurAdmin.pages.settings',
	'BlurAdmin.pages.reports',
  ])
      .config(routeConfig);
 /** @ngInject */
  function routeConfig($urlRouterProvider, baSidebarServiceProvider) {
    $urlRouterProvider.otherwise('/dashboard');

    /*baSidebarServiceProvider.addStaticItem({
      title: 'Pages',
      icon: 'ion-document',
      subMenu: [{
        title: 'Sign In',
        fixedHref: 'auth.html',
        blank: true
      }, {
        title: 'Sign Up',
        fixedHref: 'reg.html',
        blank: true
      }, {
        title: 'User Profile',
        stateRef: 'profile'
      }, {
        title: '404 Page',
        fixedHref: '404.html',
        blank: true
      }]
    });
    baSidebarServiceProvider.addStaticItem({
      title: 'Menu Level 1',
      icon: 'ion-ios-more',
      subMenu: [{
        title: 'Menu Level 1.1',
        disabled: true
      }, {
        title: 'Menu Level 1.2',
        subMenu: [{
          title: 'Menu Level 1.2.1',
          disabled: true
        }]
      }]
    });*/
	
  }

})();
