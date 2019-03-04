<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Min extends Admin_Controller 
{

	function __construct()
	{
		parent::__construct();
		require 'jsmin.php';
	}
    
	
	function index(){}
	
	function js()
	{
		$data	=	JSMin::minify(
						file_get_contents(base_url('assets/bluradmin/bower_components/jquery/dist/jquery.js')) . 
						file_get_contents(base_url('assets/bluradmin/bower_components/Chart.js/Chart.js')) . 
						file_get_contents(base_url('assets/bluradmin/bower_components/amcharts/dist/amcharts/amcharts.js')) . 
						file_get_contents(base_url('assets/bluradmin/bower_components/amcharts/dist/amcharts/plugins/responsive/responsive.min.js')) .  	
						file_get_contents(base_url('assets/bluradmin/bower_components/amcharts/dist/amcharts/serial.js')) . 
						file_get_contents(base_url('assets/bluradmin/bower_components/angular/angular.js')) . 
						file_get_contents(base_url('assets/bluradmin/bower_components/angular-route/angular-route.js')) . 
						file_get_contents(base_url('assets/bluradmin/bower_components/slimScroll/jquery.slimscroll.js')) . 
						file_get_contents(base_url('assets/bluradmin/bower_components/angular-slimscroll/angular-slimscroll.js')) . 
						file_get_contents(base_url('assets/bluradmin/bower_components/angular-smart-table/dist/smart-table.js')) . 
						file_get_contents(base_url('assets/bluradmin/bower_components/angular-toastr/dist/angular-toastr.tpls.js')) . 
						file_get_contents(base_url('assets/bluradmin/bower_components/angular-touch/angular-touch.js')) . 
						file_get_contents(base_url('assets/bluradmin/bower_components/jquery-ui/jquery-ui.js')) . 
						file_get_contents(base_url('assets/bluradmin/bower_components/angular-ui-sortable/sortable.js')) . 
						file_get_contents(base_url('assets/bluradmin/bower_components/jquery/dist/jquery.js')) . 
						file_get_contents(base_url('assets/bluradmin/bower_components/jquery/dist/jquery.js')) . 
						file_get_contents(base_url('assets/bluradmin/bower_components/jquery/dist/jquery.js')) . 
						file_get_contents(base_url('assets/bluradmin/bower_components/jquery/dist/jquery.js')) . 
						file_get_contents(base_url('assets/bluradmin/bower_components/bootstrap/js/dropdown.js')) .
						file_get_contents(base_url('assets/bluradmin/bower_components/bootstrap-select/dist/js/bootstrap-select.js')) .
						file_get_contents(base_url('assets/bluradmin/bower_components/bootstrap-switch/dist/js/bootstrap-switch.js')) .
						file_get_contents(base_url('assets/bluradmin/bower_components/bootstrap-tagsinput/dist/bootstrap-tagsinput.js')) .
						file_get_contents(base_url('assets/bluradmin/bower_components/moment/moment.js')) .
						file_get_contents(base_url('assets/bluradmin/bower_components/fullcalendar/dist/fullcalendar.js')) .
						file_get_contents(base_url('assets/bluradmin/bower_components/jquery.easing/js/jquery.easing.js')) .
						file_get_contents(base_url('assets/bluradmin/bower_components/jquery.easy-pie-chart/dist/jquery.easypiechart.js')) .
						file_get_contents(base_url('assets/bluradmin/bower_components/leaflet/dist/leaflet-src.js')) .
						file_get_contents(base_url('assets/bluradmin/bower_components/angular-progress-button-styles/dist/angular-progress-button-styles.min.js')) .
						file_get_contents(base_url('assets/bluradmin/bower_components/angular-ui-router/release/angular-ui-router.js')) .
						file_get_contents(base_url('assets/bluradmin/bower_components/angular-chart.js/dist/angular-chart.js')) .
						file_get_contents(base_url('assets/bluradmin/bower_components/chartist/dist/chartist.min.js')) .
						file_get_contents(base_url('assets/bluradmin/bower_components/angular-chartist.js/dist/angular-chartist.js')) .
						file_get_contents(base_url('assets/bluradmin/bower_components/raphael/raphael.js')) .
						file_get_contents(base_url('assets/bluradmin/bower_components/mocha/mocha.js')) .
						file_get_contents(base_url('assets/bluradmin/bower_components/morris.js/morris.js')) .
						file_get_contents(base_url('assets/bluradmin/bower_components/angular-morris-chart/src/angular-morris-chart.min.js')) .
						file_get_contents(base_url('assets/bluradmin/bower_components/ionrangeslider/js/ion.rangeSlider.js')) .
						file_get_contents(base_url('assets/bluradmin/bower_components/angular-bootstrap/ui-bootstrap-tpls.js')) .
						file_get_contents(base_url('assets/bluradmin/bower_components/angular-animate/angular-animate.js')) .
						file_get_contents(base_url('assets/bluradmin/bower_components/rangy/rangy-core.js')) .
						file_get_contents(base_url('assets/bluradmin/bower_components/rangy/rangy-classapplier.js')) .
						file_get_contents(base_url('assets/bluradmin/bower_components/rangy/rangy-highlighter.js')) .
						file_get_contents(base_url('assets/bluradmin/bower_components/rangy/rangy-selectionsaverestore.js')) .
						file_get_contents(base_url('assets/bluradmin/bower_components/rangy/rangy-serializer.js')) .
						file_get_contents(base_url('assets/bluradmin/bower_components/rangy/rangy-textrange.js')) . 					
						file_get_contents(base_url('assets/bluradmin/bower_components/textAngular/dist/textAngular.js')) .
						file_get_contents(base_url('assets/bluradmin/bower_components/textAngular/dist/textAngular-sanitize.js')) .
						file_get_contents(base_url('assets/bluradmin/bower_components/textAngular/dist/textAngularSetup.js')) .
						file_get_contents(base_url('assets/bluradmin/bower_components/angular-xeditable/dist/js/xeditable.js')) .
						file_get_contents(base_url('assets/bluradmin/bower_components/jstree/dist/jstree.js')) .
						file_get_contents(base_url('assets/bluradmin/bower_components/ng-js-tree/dist/ngJsTree.js')) .
						file_get_contents(base_url('assets/bluradmin/bower_components/datetimepicker/bootstrap-datetimepicker.min.js')) .
						file_get_contents(base_url('assets/bluradmin/app/app.js')) .
						file_get_contents(base_url('assets/bluradmin/app/theme/theme.config.js')) .
						file_get_contents(base_url('assets/bluradmin/app/theme/theme.configProvider.js')) .
						file_get_contents(base_url('assets/bluradmin/app/theme/theme.constants.js')) .
						file_get_contents(base_url('assets/bluradmin/app/theme/theme.run.js')) .
						file_get_contents(base_url('assets/bluradmin/app/theme/theme.service.js')) .
						file_get_contents(base_url('assets/bluradmin/app/theme/components/toastrLibConfig.js')) .
						file_get_contents(base_url('assets/bluradmin/app/theme/directives/animatedChange.js')) .
						file_get_contents(base_url('assets/bluradmin/app/theme/directives/autoExpand.js')) .
						file_get_contents(base_url('assets/bluradmin/app/theme/directives/autoFocus.js')) .
						file_get_contents(base_url('assets/bluradmin/app/theme/directives/includeWithScope.js')) .
						file_get_contents(base_url('assets/bluradmin/app/theme/directives/ionSlider.js')) .
						file_get_contents(base_url('assets/bluradmin/app/theme/directives/ngFileSelect.js')) .
						file_get_contents(base_url('assets/bluradmin/app/theme/directives/scrollPosition.js')) .
						file_get_contents(base_url('assets/bluradmin/app/theme/directives/trackWidth.js')) .
						file_get_contents(base_url('assets/bluradmin/app/theme/directives/zoomIn.js')) .
						file_get_contents(base_url('assets/bluradmin/app/theme/services/baUtil.js')) .
						file_get_contents(base_url('assets/bluradmin/app/theme/services/fileReader.js')) .
						file_get_contents(base_url('assets/bluradmin/app/theme/services/preloader.js')) .
						file_get_contents(base_url('assets/bluradmin/app/theme/services/stopableInterval.js')) .
						file_get_contents(base_url('assets/bluradmin/app/pages/dashboard/calendar/dashboardCalendar.js')) .
						file_get_contents(base_url('assets/bluradmin/app/pages/dashboard/dashboardCalendar/DashboardCalendarCtrl.js')) .
						file_get_contents(base_url('assets/bluradmin/app/pages/dashboard/dashboardCalendar/dashboardCalendar.directive.js')) .
						file_get_contents(base_url('assets/bluradmin/app/pages/dashboard/dashboardPieChart/DashboardPieChartCtrl.js')) .
						file_get_contents(base_url('assets/bluradmin/app/pages/dashboard/dashboardPieChart/dashboardPieChart.directive.js')) . 	
						file_get_contents(base_url('assets/bluradmin/app/pages/dashboard/dashboardTodo/DashboardTodoCtrl.js')) .
						file_get_contents(base_url('assets/bluradmin/app/pages/dashboard/dashboardTodo/dashboardTodo.directive.js')) .
						file_get_contents(base_url('assets/bluradmin/app/pages/dashboard/pieCharts/dashboardPieChart.js')) .
						file_get_contents(base_url('assets/bluradmin/app/pages/maps/leaflet/LeafletPageCtrl.js')) .
						file_get_contents(base_url('assets/bluradmin/app/theme/components/baPanel/baPanel.directive.js')) .
						file_get_contents(base_url('assets/bluradmin/app/theme/components/baPanel/baPanel.service.js')) .
						file_get_contents(base_url('assets/bluradmin/app/theme/components/baPanel/baPanelBlur.directive.js')) .
						file_get_contents(base_url('assets/bluradmin/app/theme/components/baPanel/baPanelBlurHelper.service.js')) .
						file_get_contents(base_url('assets/bluradmin/app/theme/components/baPanel/baPanelSelf.directive.js')) .
						file_get_contents(base_url('assets/bluradmin/app/theme/components/baSidebar/BaSidebarCtrl.js')) .
						file_get_contents(base_url('assets/bluradmin/app/theme/components/baSidebar/baSidebar.directive.js')) .
						file_get_contents(base_url('assets/bluradmin/app/theme/components/baSidebar/baSidebar.service.js')) .
						file_get_contents(base_url('assets/bluradmin/app/theme/components/baSidebar/baSidebarHelpers.directive.js')) .
						file_get_contents(base_url('assets/bluradmin/app/theme/components/baWizard/baWizard.directive.js')) .
						file_get_contents(base_url('assets/bluradmin/app/theme/components/baWizard/baWizardCtrl.js')) .
						file_get_contents(base_url('assets/bluradmin/app/theme/components/baWizard/baWizardStep.directive.js')) .
						file_get_contents(base_url('assets/bluradmin/app/theme/components/backTop/backTop.directive.js')) .
						file_get_contents(base_url('assets/bluradmin/app/theme/components/contentTop/contentTop.directive.js')) .
						file_get_contents(base_url('assets/bluradmin/app/theme/components/msgCenter/MsgCenterCtrl.js')) .
						file_get_contents(base_url('assets/bluradmin/app/theme/components/msgCenter/msgCenter.directive.js')) .
						file_get_contents(base_url('assets/bluradmin/app/theme/components/pageTop/pageTop.directive.js')) .
						file_get_contents(base_url('assets/bluradmin/app/theme/components/widgets/widgets.directive.js')) .
						file_get_contents(base_url('assets/bluradmin/app/theme/filters/image/appImage.js')) .
						file_get_contents(base_url('assets/bluradmin/app/theme/filters/image/kameleonImg.js')) .
						file_get_contents(base_url('assets/bluradmin/app/theme/filters/image/profilePicture.js')) .
						file_get_contents(base_url('assets/bluradmin/app/theme/filters/text/removeHtml.js')) .
						file_get_contents(base_url('assets/bluradmin/app/theme/components/backTop/lib/jquery.backTop.min.js')) .
						file_get_contents(base_url('assets/bluradmin/lib/style.js')) .
						file_get_contents(base_url('assets/bluradmin/lib/datatables/angular-datatables.min.js')) .
						file_get_contents(base_url('assets/bluradmin/lib/datatables/jquery.dataTables.min.js')) .
						file_get_contents(base_url('assets/bluradmin/lib/angularjs-dropdown-multiselect.min.js')) .
						file_get_contents(base_url('assets/bluradmin/lib/angular-file-upload.js')) .
						file_get_contents(base_url('assets/bluradmin/lib/lodash.min.js')) 
					);
		echo $data;
	}
	
	function js_modules()
	{
		$data	=	JSMin::minify(
						file_get_contents(base_url('assets/bluradmin/app/pages/pages.module.js')) .
						file_get_contents(base_url('assets/bluradmin/app/theme/theme.module.js')) .
						file_get_contents(base_url('assets/bluradmin/app/pages/dashboard/dashboard.module.js')) .
						file_get_contents(base_url('assets/bluradmin/app/pages/maps/maps.module.js')) .
						file_get_contents(base_url('assets/bluradmin/app/theme/components/components.module.js')) .
						file_get_contents(base_url('assets/bluradmin/app/pages/todo/todo.module.js')) .
						file_get_contents(base_url('assets/bluradmin/app/pages/todo/todoCtrl.js')) .
						file_get_contents(base_url('assets/bluradmin/app/pages/todo/add_todo/addtodo.module.js')) .
						file_get_contents(base_url('assets/bluradmin/app/pages/todo/add_todo/addtodoCtrl.js')) .
						file_get_contents(base_url('assets/bluradmin/app/pages/todo/edit_todo/edittodo.module.js')) .
						file_get_contents(base_url('assets/bluradmin/app/pages/todo/edit_todo/edittodoCtrl.js')) .
						file_get_contents(base_url('assets/bluradmin/app/pages/todo/view/viewtodo.module.js')) .
						file_get_contents(base_url('assets/bluradmin/app/pages/todo/view/viewtodoCtrl.js')) .
						file_get_contents(base_url('assets/bluradmin/app/pages/masters/masters.module.js')) .
						file_get_contents(base_url('assets/bluradmin/app/pages/masters/course_category/conrtoller.js')) .
						file_get_contents(base_url('assets/bluradmin/app/pages/masters/course_category/addccCtrl.js')) .
						file_get_contents(base_url('assets/bluradmin/app/pages/masters/course_category/editccCtrl.js')) .
						file_get_contents(base_url('assets/bluradmin/app/pages/masters/exapanses_category/ecategoryCtrl.js')) .
						file_get_contents(base_url('assets/bluradmin/app/pages/masters/exapanses_category/addecCtrl.js')) .
						file_get_contents(base_url('assets/bluradmin/app/pages/masters/exapanses_category/editecCtrl.js')) .
						file_get_contents(base_url('assets/bluradmin/app/pages/course/course.module.js')) .
						file_get_contents(base_url('assets/bluradmin/app/pages/course/courseCtrl.js')) . 	
						file_get_contents(base_url('assets/bluradmin/app/pages/course/add/add.module.js')) .
						file_get_contents(base_url('assets/bluradmin/app/pages/course/add/addcCtrl.js')) .
						file_get_contents(base_url('assets/bluradmin/app/pages/course/edit/edit.module.js')) .
						file_get_contents(base_url('assets/bluradmin/app/pages/course/edit/editcCtrl.js')) .
						file_get_contents(base_url('assets/bluradmin/app/pages/course/details/details.module.js')) .
						file_get_contents(base_url('assets/bluradmin/app/pages/course/details/detailsCtrl.js')) .
						file_get_contents(base_url('assets/bluradmin/app/pages/masters/enquiries_status/esconrtoller.js')) .
						file_get_contents(base_url('assets/bluradmin/app/pages/masters/enquiries_status/addesCtrl.js')) .
						file_get_contents(base_url('assets/bluradmin/app/pages/masters/enquiries_status/editesCtrl.js')) .
						file_get_contents(base_url('assets/bluradmin/app/pages/enquiries/enquiries.module.js')) .
						file_get_contents(base_url('assets/bluradmin/app/pages/enquiries/enquiriesCtrl.js')) .
						file_get_contents(base_url('assets/bluradmin/app/pages/enquiries/add/add.module.js')) .
						file_get_contents(base_url('assets/bluradmin/app/pages/enquiries/add/addenqCtrl.js')) .
						file_get_contents(base_url('assets/bluradmin/app/pages/enquiries/edit/edit.module.js')) .
						file_get_contents(base_url('assets/bluradmin/app/pages/enquiries/edit/editenqCtrl.js')) .
						file_get_contents(base_url('assets/bluradmin/app/pages/enquiries/view/view.module.js')) .
						file_get_contents(base_url('assets/bluradmin/app/pages/enquiries/view/viewenqCtrl.js')) .
						file_get_contents(base_url('assets/bluradmin/app/pages/faculties/faculties.module.js')) .
						file_get_contents(base_url('assets/bluradmin/app/pages/faculties/facultiesCtrl.js')) .
						file_get_contents(base_url('assets/bluradmin/app/pages/faculties/add/add.module.js')) . 	
						file_get_contents(base_url('assets/bluradmin/app/pages/faculties/add/addfacCtrl.js')) .
						file_get_contents(base_url('assets/bluradmin/app/pages/faculties/edit/edit.module.js')) .
						file_get_contents(base_url('assets/bluradmin/app/pages/faculties/edit/editfacCtrl.js')) .
						file_get_contents(base_url('assets/bluradmin/app/pages/faculties/details/details.module.js')) .
						file_get_contents(base_url('assets/bluradmin/app/pages/faculties/details/detailsfacCtrl.js')) .
						file_get_contents(base_url('assets/bluradmin/app/pages/faculties/course_fee/fee.module.js')) .
						file_get_contents(base_url('assets/bluradmin/app/pages/faculties/course_fee/addfeeCtrl.js')) .
						file_get_contents(base_url('assets/bluradmin/app/pages/faculties/edit_courseFee/editfee.module.js')) .
						file_get_contents(base_url('assets/bluradmin/app/pages/faculties/edit_courseFee/editfeeCtrl.js')) .
						file_get_contents(base_url('assets/bluradmin/app/pages/faculties/add_receipt/add.module.js')) .
						file_get_contents(base_url('assets/bluradmin/app/pages/faculties/add_receipt/addreceiptfacCtrl.js')) .
						file_get_contents(base_url('assets/bluradmin/app/pages/faculties/edit_receipt/edit.module.js')) .
						file_get_contents(base_url('assets/bluradmin/app/pages/faculties/edit_receipt/editreceiptfacCtrl.js')) .
						file_get_contents(base_url('assets/bluradmin/app/pages/faculties/edit_notes/edit.module.js')) .
						file_get_contents(base_url('assets/bluradmin/app/pages/faculties/edit_notes/editnotesfacCtrl.js')) .
						file_get_contents(base_url('assets/bluradmin/app/pages/faculties/add_files/add.module.js')) .
						file_get_contents(base_url('assets/bluradmin/app/pages/faculties/add_files/addfilesfacCtrl.js')) .
						file_get_contents(base_url('assets/bluradmin/app/pages/faculties/edit_files/edit.module.js')) .
						file_get_contents(base_url('assets/bluradmin/app/pages/faculties/edit_files/editfilesfacCtrl.js')) .
						file_get_contents(base_url('assets/bluradmin/app/pages/batches/batches.module.js')) .
						file_get_contents(base_url('assets/bluradmin/app/pages/batches/batchesCtrl.js')) .
						file_get_contents(base_url('assets/bluradmin/app/pages/batches/add/add.module.js')) .
						file_get_contents(base_url('assets/bluradmin/app/pages/batches/add/addbatchCtrl.js')) .
						file_get_contents(base_url('assets/bluradmin/app/pages/batches/details/details.module.js')) .
						file_get_contents(base_url('assets/bluradmin/app/pages/batches/details/detailsbatchCtrl.js')) .
						file_get_contents(base_url('assets/bluradmin/app/pages/batches/edit/edit.module.js')) .
						file_get_contents(base_url('assets/bluradmin/app/pages/batches/edit/editbatchCtrl.js')) .
						file_get_contents(base_url('assets/bluradmin/app/pages/batches/notimodule.js')) .
						file_get_contents(base_url('assets/bluradmin/app/pages/batches/notiCtrl.js')) .
						file_get_contents(base_url('assets/bluradmin/app/pages/students/students.module.js')) .
						file_get_contents(base_url('assets/bluradmin/app/pages/students/studentsCtrl.js')) .
						file_get_contents(base_url('assets/bluradmin/app/pages/students/add/add.module.js')) .
						file_get_contents(base_url('assets/bluradmin/app/pages/students/add/addstudentCtrl.js')) .
						file_get_contents(base_url('assets/bluradmin/app/pages/students/details/details.module.js')) .
						file_get_contents(base_url('assets/bluradmin/app/pages/students/details/detailsstudentCtrl.js')) .
						file_get_contents(base_url('assets/bluradmin/app/pages/students/edit/edit.module.js')) .
						file_get_contents(base_url('assets/bluradmin/app/pages/students/edit/editstudentCtrl.js')) .
						file_get_contents(base_url('assets/bluradmin/app/pages/students/add_batch/add.module.js')) .
						file_get_contents(base_url('assets/bluradmin/app/pages/students/add_batch/addbatchstuCtrl.js')) .
						file_get_contents(base_url('assets/bluradmin/app/pages/students/edit_batch/edit.module.js')) .
						file_get_contents(base_url('assets/bluradmin/app/pages/students/edit_batch/editbatchstuCtrl.js')) .
						file_get_contents(base_url('assets/bluradmin/app/pages/students/add_receipt/add.module.js')) .
						file_get_contents(base_url('assets/bluradmin/app/pages/students/add_receipt/addreceiptstuCtrl.js')) .
						file_get_contents(base_url('assets/bluradmin/app/pages/students/edit_receipt/edit.module.js')) .
						file_get_contents(base_url('assets/bluradmin/app/pages/students/edit_receipt/editreceiptstuCtrl.js')) .
						file_get_contents(base_url('assets/bluradmin/app/pages/students/add_certificate/add.module.js')) .
						file_get_contents(base_url('assets/bluradmin/app/pages/students/add_certificate/addcertificatestuCtrl.js')) .
						file_get_contents(base_url('assets/bluradmin/app/pages/students/edit_certificate/edit.module.js')) .
						file_get_contents(base_url('assets/bluradmin/app/pages/students/edit_certificate/editcertificatestuCtrl.js')) .
						file_get_contents(base_url('assets/bluradmin/app/pages/students/edit_notes/edit.module.js')) .
						file_get_contents(base_url('assets/bluradmin/app/pages/students/edit_notes/editnotesstuCtrl.js')) .
						file_get_contents(base_url('assets/bluradmin/app/pages/students/add_files/add.module.js')) .
						file_get_contents(base_url('assets/bluradmin/app/pages/students/add_files/addfilesstuCtrl.js')) .
						file_get_contents(base_url('assets/bluradmin/app/pages/students/edit_files/edit.module.js')) .
						file_get_contents(base_url('assets/bluradmin/app/pages/students/edit_files/editfilesstuCtrl.js')) .
						file_get_contents(base_url('assets/bluradmin/app/pages/students/details/pchartCtrl.js')) .
						file_get_contents(base_url('assets/bluradmin/app/pages/inventory/inventory.module.js')) .
						file_get_contents(base_url('assets/bluradmin/app/pages/inventory/inventoryCtrl.js')) .
						file_get_contents(base_url('assets/bluradmin/app/pages/inventory/add/add.module.js')) .
						file_get_contents(base_url('assets/bluradmin/app/pages/inventory/add/addinventoryCtrl.js')) .
						file_get_contents(base_url('assets/bluradmin/app/pages/inventory/edit/edit.module.js')) .
						file_get_contents(base_url('assets/bluradmin/app/pages/inventory/edit/editinventoryCtrl.js')) .
						file_get_contents(base_url('assets/bluradmin/app/pages/inventory/view/view.module.js')) .
						file_get_contents(base_url('assets/bluradmin/app/pages/inventory/view/viewinventoryCtrl.js')) .
						file_get_contents(base_url('assets/bluradmin/app/pages/expanses/expanses.module.js')) .
						file_get_contents(base_url('assets/bluradmin/app/pages/expanses/expansesCtrl.js')) .
						file_get_contents(base_url('assets/bluradmin/app/pages/expanses/add/add.module.js')) .
						file_get_contents(base_url('assets/bluradmin/app/pages/expanses/add/addexpansesCtrl.js')) .
						file_get_contents(base_url('assets/bluradmin/app/pages/expanses/edit/edit.module.js')) .
						file_get_contents(base_url('assets/bluradmin/app/pages/expanses/edit/editexpansesCtrl.js')) .
						file_get_contents(base_url('assets/bluradmin/app/pages/expanses/view/view.module.js')) .
						file_get_contents(base_url('assets/bluradmin/app/pages/expanses/view/viewexpansesCtrl.js')) .
						file_get_contents(base_url('assets/bluradmin/app/pages/settings/add.module.js')) .
						file_get_contents(base_url('assets/bluradmin/app/pages/settings/settingCtrl.js')) .
						file_get_contents(base_url('assets/bluradmin/app/pages/reports/reports.module.js')) .
						file_get_contents(base_url('assets/bluradmin/app/pages/reports/reportsCtrl.js')) .
						file_get_contents(base_url('assets/bluradmin/app/pages/reports/reportsRchart/reportsRchart.js')) .
						file_get_contents(base_url('assets/bluradmin/app/pages/reports/reportsSchart/reportsSchart.js')) .
						file_get_contents(base_url('assets/bluradmin/app/pages/reports/batchchartCtrl.js')) .
						file_get_contents(base_url('assets/bluradmin/app/pages/dashboard/dashboardRchart/dashboardRchart.js')) .
						file_get_contents(base_url('assets/bluradmin/app/pages/dashboard/dashboardSchart/dashboardSchart.js')) 
					);
		echo $data;
	}
	
	
	function css()
	{
			$data	=	JSMin::minify(
						file_get_contents(base_url('assets/bluradmin/')) .
						file_get_contents(base_url('assets/bluradmin/')) .
						file_get_contents(base_url('assets/bluradmin/')) .
						file_get_contents(base_url('assets/bluradmin/')) .
						file_get_contents(base_url('assets/bluradmin/')) .
						file_get_contents(base_url('assets/bluradmin/')) .
						file_get_contents(base_url('assets/bluradmin/')) .
						file_get_contents(base_url('assets/bluradmin/')) .
						file_get_contents(base_url('assets/bluradmin/')) .
						file_get_contents(base_url('assets/bluradmin/')) .
						file_get_contents(base_url('assets/bluradmin/')) .
						file_get_contents(base_url('assets/bluradmin/')) .
						file_get_contents(base_url('assets/bluradmin/')) .
						file_get_contents(base_url('assets/bluradmin/')) .
						file_get_contents(base_url('assets/bluradmin/')) .
						file_get_contents(base_url('assets/bluradmin/')) .
						file_get_contents(base_url('assets/bluradmin/')) .
						file_get_contents(base_url('assets/bluradmin/')) .
						file_get_contents(base_url('assets/bluradmin/')) .
						file_get_contents(base_url('assets/bluradmin/')) .
						file_get_contents(base_url('assets/bluradmin/')) .
						file_get_contents(base_url('assets/bluradmin/')) .
						file_get_contents(base_url('assets/bluradmin/')) .
						file_get_contents(base_url('assets/bluradmin/')) .
						file_get_contents(base_url('assets/bluradmin/')) .
						file_get_contents(base_url('assets/bluradmin/')) .
						file_get_contents(base_url('assets/bluradmin/')) .
						file_get_contents(base_url('assets/bluradmin/')) .
						file_get_contents(base_url('assets/bluradmin/')) .
						file_get_contents(base_url('assets/bluradmin/')) 
					);
		echo $data;
	}
	
    

}

?>