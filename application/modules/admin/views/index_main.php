<!DOCTYPE html>
<html lang="en" ng-app="BlurAdmin">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>institute</title>
  	<script>var SITE_URL = '<?php echo site_url() ?>';</script>
	<script>var BASE_URL = '<?php echo base_url() ?>';</script>
	  <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900italic,900&subset=latin,greek,greek-ext,vietnamese,cyrillic-ext,latin-ext,cyrillic' rel='stylesheet' type='text/css'>

  <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicon-16x16.png">
  <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon-96x96.png">

  <!-- build:css({.tmp/serve,src}) styles/vendor.css -->
  <!-- bower:css -->
  <link rel="stylesheet" href="<?php echo base_url('assets/bluradmin')?>/lib/ionicons.css" >
  <link rel="stylesheet" href="<?php echo base_url('assets/bluradmin')?>/lib/angular-toastr.css" >
  <link rel="stylesheet" href="<?php echo base_url('assets/bluradmin')?>/lib/animate.css" >
  <link rel="stylesheet" href="<?php echo base_url('assets/bluradmin')?>/lib/bootstrap.css" >
  <link rel="stylesheet" href="<?php echo base_url('assets/bluradmin')?>/lib/bootstrap-select.css" >
  <link rel="stylesheet" href="<?php echo base_url('assets/bluradmin')?>/lib/bootstrap-switch.css" >
  <link rel="stylesheet" href="<?php echo base_url('assets/bluradmin')?>/lib/bootstrap-tagsinput.css" >
  <link rel="stylesheet" href="<?php echo base_url('assets/bluradmin')?>/lib/font-awesome.css" >
  <link rel="stylesheet" href="<?php echo base_url('assets/bluradmin')?>/lib/fullcalendar.css" >
  <link rel="stylesheet" href="<?php echo base_url('assets/bluradmin')?>/lib/leaflet.css" >
  <link rel="stylesheet" href="<?php echo base_url('assets/bluradmin')?>/lib/angular-progress-button-styles.min.css" >
  <link rel="stylesheet" href="<?php echo base_url('assets/bluradmin')?>/lib/angular-chart.css" >
  <link rel="stylesheet" href="<?php echo base_url('assets/bluradmin')?>/lib/chartist.min.css" >
  <link rel="stylesheet" href="<?php echo base_url('assets/bluradmin')?>/lib/morris.css" >
  <link rel="stylesheet" href="<?php echo base_url('assets/bluradmin')?>/lib/ion.rangeSlider.css" >
  <link rel="stylesheet" href="<?php echo base_url('assets/bluradmin')?>/lib/ion.rangeSlider.skinFlat.css" >
  <link rel="stylesheet" href="<?php echo base_url('assets/bluradmin')?>/lib/textAngular.css" >
  <link rel="stylesheet" href="<?php echo base_url('assets/bluradmin')?>/lib/xeditable.css" >
  <link rel="stylesheet" href="<?php echo base_url('assets/bluradmin')?>/lib/style.css" >
  <!--<link rel="stylesheet" href="<?php //echo base_url('assets/bluradmin')?>/lib/datatables/css/dataTables.bootstrap.css" >-->
  <link rel="stylesheet" href="<?php echo base_url('assets/bluradmin')?>/lib/datatables/css/jquery.dataTables.css" >
  <link rel="stylesheet" href="<?php echo base_url('assets/bluradmin')?>/bower_components/datetimepicker/bootstrap-datetimepicker.min.css" >
   <link rel="stylesheet" href="<?php echo base_url('assets/bluradmin')?>/bower_components/datetimepicker/bootstrap-datetimepicker-standalone.css" >
   <link rel="stylesheet" href="<?php echo base_url('assets/bluradmin')?>/lib/select2.css" >
   <link rel="stylesheet" href="<?php echo base_url('assets/bluradmin')?>/lib/select2-bootstrap.css" >
   
   
  <!-- endbower -->
  <!-- endbuild -->

  <!-- build:css({.tmp/serve,src}) styles/app.css -->
  <!-- inject:css -->
  <link rel="stylesheet" href="<?php echo base_url('assets/bluradmin')?>/app/main.css">
  <!-- endinject -->
  <!-- endbuild -->
</head>
<body>
<div class="body-bg"></div>
<main ng-if="$pageFinishedLoading" ng-class="{ 'menu-collapsed': $baSidebarService.isMenuCollapsed() }">

  <ba-sidebar></ba-sidebar>
  <page-top></page-top>

  <div class="al-main">
    <div class="al-content">
      <content-top></content-top>
      <div ui-view></div>
    </div>
  </div>

  <footer class="al-footer clearfix">
    <div class="al-footer-right">Created with <i class="ion-heart"></i></div>
    <div class="al-footer-main clearfix">
      <div class="al-copy">institute</div>
      <ul class="al-share clearfix">
      </ul>
    </div>
  </footer>

  <back-top></back-top>
</main>

<div id="preloader" ng-show="!$pageFinishedLoading">
  <div></div>
</div>

<!-- build:js(src) scripts/vendor.js -->
<!-- bower:js -->
<script src="<?php echo base_url('assets/bluradmin')?>/bower_components/jquery/dist/jquery.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/bower_components/Chart.js/Chart.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/bower_components/amcharts/dist/amcharts/amcharts.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/bower_components/amcharts/dist/amcharts/plugins/responsive/responsive.min.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/bower_components/amcharts/dist/amcharts/serial.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/bower_components/angular/angular.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/bower_components/angular-route/angular-route.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/bower_components/slimScroll/jquery.slimscroll.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/bower_components/angular-slimscroll/angular-slimscroll.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/bower_components/angular-smart-table/dist/smart-table.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/bower_components/angular-toastr/dist/angular-toastr.tpls.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/bower_components/angular-touch/angular-touch.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/bower_components/jquery-ui/jquery-ui.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/bower_components/angular-ui-sortable/sortable.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/bower_components/bootstrap/js/dropdown.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/bower_components/bootstrap-select/dist/js/bootstrap-select.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/bower_components/bootstrap-switch/dist/js/bootstrap-switch.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/bower_components/bootstrap-tagsinput/dist/bootstrap-tagsinput.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/bower_components/moment/moment.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/bower_components/fullcalendar/dist/fullcalendar.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/bower_components/jquery.easing/js/jquery.easing.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/bower_components/jquery.easy-pie-chart/dist/jquery.easypiechart.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/bower_components/leaflet/dist/leaflet-src.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/bower_components/angular-progress-button-styles/dist/angular-progress-button-styles.min.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/bower_components/angular-ui-router/release/angular-ui-router.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/bower_components/angular-chart.js/dist/angular-chart.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/bower_components/chartist/dist/chartist.min.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/bower_components/angular-chartist.js/dist/angular-chartist.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/bower_components/raphael/raphael.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/bower_components/mocha/mocha.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/bower_components/morris.js/morris.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/bower_components/angular-morris-chart/src/angular-morris-chart.min.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/bower_components/ionrangeslider/js/ion.rangeSlider.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/bower_components/angular-bootstrap/ui-bootstrap-tpls.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/bower_components/angular-animate/angular-animate.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/bower_components/rangy/rangy-core.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/bower_components/rangy/rangy-classapplier.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/bower_components/rangy/rangy-highlighter.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/bower_components/rangy/rangy-selectionsaverestore.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/bower_components/rangy/rangy-serializer.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/bower_components/rangy/rangy-textrange.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/bower_components/textAngular/dist/textAngular.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/bower_components/textAngular/dist/textAngular-sanitize.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/bower_components/textAngular/dist/textAngularSetup.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/bower_components/angular-xeditable/dist/js/xeditable.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/bower_components/jstree/dist/jstree.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/bower_components/ng-js-tree/dist/ngJsTree.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/bower_components/datetimepicker/bootstrap-datetimepicker.min.js"></script>
<!-- endbower -->
<!-- endbuild -->

<!-- build:js({.tmp/serve,.tmp/partials,src}) scripts/app.js -->
<!-- inject:js -->
<script src="<?php echo base_url('assets/bluradmin')?>/app/pages/pages.module.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/app/theme/theme.module.js"></script>

<script src="<?php echo base_url('assets/bluradmin')?>/app/pages/dashboard/dashboard.module.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/app/pages/maps/maps.module.js"></script>

<script src="<?php echo base_url('assets/bluradmin')?>/app/theme/components/components.module.js"></script>

<script src="<?php echo base_url('assets/bluradmin')?>/app/pages/todo/todo.module.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/app/pages/todo/todoCtrl.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/app/pages/todo/add_todo/addtodo.module.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/app/pages/todo/add_todo/addtodoCtrl.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/app/pages/todo/edit_todo/edittodo.module.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/app/pages/todo/edit_todo/edittodoCtrl.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/app/pages/todo/view/viewtodo.module.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/app/pages/todo/view/viewtodoCtrl.js"></script>

<script src="<?php echo base_url('assets/bluradmin')?>/app/pages/masters/masters.module.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/app/pages/masters/course_category/conrtoller.js"></script>
<script src="<?php  echo base_url('assets/bluradmin')?>/app/pages/masters/course_category/addccCtrl.js"></script>
<script src="<?php  echo base_url('assets/bluradmin')?>/app/pages/masters/course_category/editccCtrl.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/app/pages/masters/exapanses_category/ecategoryCtrl.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/app/pages/masters/exapanses_category/addecCtrl.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/app/pages/masters/exapanses_category/editecCtrl.js"></script>

<script src="<?php echo base_url('assets/bluradmin')?>/app/pages/course/course.module.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/app/pages/course/courseCtrl.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/app/pages/course/add/add.module.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/app/pages/course/add/addcCtrl.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/app/pages/course/edit/edit.module.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/app/pages/course/edit/editcCtrl.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/app/pages/course/details/details.module.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/app/pages/course/details/detailsCtrl.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/app/pages/course/add_material/add.module.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/app/pages/course/add_material/addmaterialCtrl.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/app/pages/course/edit_material/edit.module.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/app/pages/course/edit_material/editmaterialCtrl.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/app/pages/course/coursechartCtrl.js"></script>

<script src="<?php echo base_url('assets/bluradmin')?>/app/pages/masters/enquiries_status/esconrtoller.js"></script>
<script src="<?php  echo base_url('assets/bluradmin')?>/app/pages/masters/enquiries_status/addesCtrl.js"></script>
<script src="<?php  echo base_url('assets/bluradmin')?>/app/pages/masters/enquiries_status/editesCtrl.js"></script>


<script src="<?php echo base_url('assets/bluradmin')?>/app/pages/enquiries/enquiries.module.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/app/pages/enquiries/enquiriesCtrl.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/app/pages/enquiries/add/add.module.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/app/pages/enquiries/add/addenqCtrl.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/app/pages/enquiries/edit/edit.module.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/app/pages/enquiries/edit/editenqCtrl.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/app/pages/enquiries/view/view.module.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/app/pages/enquiries/view/viewenqCtrl.js"></script>

<script src="<?php echo base_url('assets/bluradmin')?>/app/pages/faculties/faculties.module.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/app/pages/faculties/facultiesCtrl.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/app/pages/faculties/add/add.module.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/app/pages/faculties/add/addfacCtrl.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/app/pages/faculties/edit/edit.module.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/app/pages/faculties/edit/editfacCtrl.js"></script>

<script src="<?php echo base_url('assets/bluradmin')?>/app/pages/faculties/details/details.module.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/app/pages/faculties/details/detailsfacCtrl.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/app/pages/faculties/course_fee/fee.module.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/app/pages/faculties/course_fee/addfeeCtrl.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/app/pages/faculties/edit_courseFee/editfee.module.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/app/pages/faculties/edit_courseFee/editfeeCtrl.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/app/pages/faculties/add_receipt/add.module.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/app/pages/faculties/add_receipt/addreceiptfacCtrl.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/app/pages/faculties/edit_receipt/edit.module.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/app/pages/faculties/edit_receipt/editreceiptfacCtrl.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/app/pages/faculties/receipt/receipt.module.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/app/pages/faculties/receipt/receiptfacCtrl.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/app/pages/faculties/edit_notes/edit.module.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/app/pages/faculties/edit_notes/editnotesfacCtrl.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/app/pages/faculties/add_files/add.module.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/app/pages/faculties/add_files/addfilesfacCtrl.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/app/pages/faculties/edit_files/edit.module.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/app/pages/faculties/edit_files/editfilesfacCtrl.js"></script>


<script src="<?php echo base_url('assets/bluradmin')?>/app/pages/batches/batches.module.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/app/pages/batches/batchesCtrl.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/app/pages/batches/add/add.module.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/app/pages/batches/add/addbatchCtrl.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/app/pages/batches/details/details.module.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/app/pages/batches/details/detailsbatchCtrl.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/app/pages/batches/edit/edit.module.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/app/pages/batches/edit/editbatchCtrl.js"></script>

<script src="<?php echo base_url('assets/bluradmin')?>/app/pages/batches/notimodule.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/app/pages/batches/notiCtrl.js"></script>

<script src="<?php echo base_url('assets/bluradmin')?>/app/pages/students/students.module.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/app/pages/students/studentsCtrl.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/app/pages/students/add/add.module.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/app/pages/students/add/addstudentCtrl.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/app/pages/students/details/details.module.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/app/pages/students/details/detailsstudentCtrl.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/app/pages/students/edit/edit.module.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/app/pages/students/edit/editstudentCtrl.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/app/pages/students/add_batch/add.module.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/app/pages/students/add_batch/addbatchstuCtrl.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/app/pages/students/edit_batch/edit.module.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/app/pages/students/edit_batch/editbatchstuCtrl.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/app/pages/students/add_receipt/add.module.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/app/pages/students/add_receipt/addreceiptstuCtrl.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/app/pages/students/edit_receipt/edit.module.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/app/pages/students/edit_receipt/editreceiptstuCtrl.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/app/pages/students/receipt/receipt.module.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/app/pages/students/receipt/receiptstuCtrl.js"></script>

<script src="<?php echo base_url('assets/bluradmin')?>/app/pages/students/add_certificate/add.module.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/app/pages/students/add_certificate/addcertificatestuCtrl.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/app/pages/students/edit_certificate/edit.module.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/app/pages/students/edit_certificate/editcertificatestuCtrl.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/app/pages/students/edit_notes/edit.module.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/app/pages/students/edit_notes/editnotesstuCtrl.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/app/pages/students/add_files/add.module.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/app/pages/students/add_files/addfilesstuCtrl.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/app/pages/students/edit_files/edit.module.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/app/pages/students/edit_files/editfilesstuCtrl.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/app/pages/students/details/pchartCtrl.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/app/pages/inventory/inventory.module.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/app/pages/inventory/inventoryCtrl.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/app/pages/inventory/add/add.module.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/app/pages/inventory/add/addinventoryCtrl.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/app/pages/inventory/edit/edit.module.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/app/pages/inventory/edit/editinventoryCtrl.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/app/pages/inventory/view/view.module.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/app/pages/inventory/view/viewinventoryCtrl.js"></script>

<script src="<?php echo base_url('assets/bluradmin')?>/app/pages/expanses/expanses.module.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/app/pages/expanses/expansesCtrl.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/app/pages/expanses/add/add.module.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/app/pages/expanses/add/addexpansesCtrl.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/app/pages/expanses/edit/edit.module.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/app/pages/expanses/edit/editexpansesCtrl.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/app/pages/expanses/view/view.module.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/app/pages/expanses/view/viewexpansesCtrl.js"></script>

<script src="<?php echo base_url('assets/bluradmin')?>/app/pages/settings/add.module.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/app/pages/settings/settingCtrl.js"></script>

<script src="<?php echo base_url('assets/bluradmin')?>/app/pages/reports/reports.module.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/app/pages/reports/reportsCtrl.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/app/pages/reports/reportsRchart/reportsRchart.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/app/pages/reports/reportsSchart/reportsSchart.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/app/pages/reports/batchchartCtrl.js"></script>

<script src="<?php echo base_url('assets/bluradmin')?>/app/pages/dashboard/dashboardRchart/dashboardRchart.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/app/pages/dashboard/dashboardSchart/dashboardSchart.js"></script>

<script src="<?php echo base_url('assets/bluradmin')?>/app/app.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/app/theme/theme.config.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/app/theme/theme.configProvider.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/app/theme/theme.constants.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/app/theme/theme.run.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/app/theme/theme.service.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/app/theme/components/toastrLibConfig.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/app/theme/directives/animatedChange.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/app/theme/directives/autoExpand.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/app/theme/directives/autoFocus.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/app/theme/directives/includeWithScope.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/app/theme/directives/ionSlider.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/app/theme/directives/ngFileSelect.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/app/theme/directives/scrollPosition.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/app/theme/directives/trackWidth.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/app/theme/directives/zoomIn.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/app/theme/services/baUtil.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/app/theme/services/fileReader.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/app/theme/services/preloader.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/app/theme/services/stopableInterval.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/app/pages/dashboard/calendar/dashboardCalendar.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/app/pages/dashboard/dashboardCalendar/DashboardCalendarCtrl.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/app/pages/dashboard/dashboardCalendar/dashboardCalendar.directive.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/app/pages/dashboard/dashboardPieChart/DashboardPieChartCtrl.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/app/pages/dashboard/dashboardPieChart/dashboardPieChart.directive.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/app/pages/dashboard/dashboardTodo/DashboardTodoCtrl.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/app/pages/dashboard/dashboardTodo/dashboardTodo.directive.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/app/pages/dashboard/pieCharts/dashboardPieChart.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/app/pages/maps/leaflet/LeafletPageCtrl.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/app/theme/components/baPanel/baPanel.directive.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/app/theme/components/baPanel/baPanel.service.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/app/theme/components/baPanel/baPanelBlur.directive.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/app/theme/components/baPanel/baPanelBlurHelper.service.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/app/theme/components/baPanel/baPanelSelf.directive.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/app/theme/components/baSidebar/BaSidebarCtrl.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/app/theme/components/baSidebar/baSidebar.directive.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/app/theme/components/baSidebar/baSidebar.service.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/app/theme/components/baSidebar/baSidebarHelpers.directive.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/app/theme/components/baWizard/baWizard.directive.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/app/theme/components/baWizard/baWizardCtrl.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/app/theme/components/baWizard/baWizardStep.directive.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/app/theme/components/backTop/backTop.directive.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/app/theme/components/contentTop/contentTop.directive.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/app/theme/components/msgCenter/MsgCenterCtrl.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/app/theme/components/msgCenter/msgCenter.directive.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/app/theme/components/pageTop/pageTop.directive.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/app/theme/components/widgets/widgets.directive.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/app/theme/filters/image/appImage.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/app/theme/filters/image/kameleonImg.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/app/theme/filters/image/profilePicture.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/app/theme/filters/text/removeHtml.js"></script>

<script src="<?php echo base_url('assets/bluradmin')?>/app/theme/components/backTop/lib/jquery.backTop.min.js"></script>
<!-- endinject -->
<script src="<?php echo base_url('assets/bluradmin')?>/lib/style.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/lib/datatables/angular-datatables.min.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/lib/datatables/jquery.dataTables.min.js"></script>

<script src="<?php echo base_url('assets/bluradmin')?>/lib/angularjs-dropdown-multiselect.min.js"></script>
<script src="<?php echo base_url('assets/bluradmin')?>/lib/angular-file-upload.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/bluradmin')?>/lib/lodash.min.js"></script>
<!--<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/select2/3.4.8/select2.min.js"></script>-->

<!-- inject:partials -->
<!-- angular templates will be automatically converted in js and inserted here -->
<!-- endinject -->
<!-- endbuild -->

</body>
</html>