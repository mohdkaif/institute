<div class="widgets">

  <div class="row" >
    <div class="col-md-12">
      <div
          ba-panel
          ba-panel-title="Edit Faculty Receipt Form"
          ba-panel-class="with-scroll">
		  
		  <form role="form" ng-submit="updateTask(tasks[0])" ng-upload enctype="multipart/form-data" ng-controller="editreceiptfacCtrl" >
		  	<div ng-repeat="task in tasks ">
			<input type="hidden" name="faculty_id" ng-model="faculty_id" value="{{task.user_id}}" />
			<input type="hidden" name="id" ng-model="id" value="{{task.id}}" />
			
			 <div class="form-group">
				<label for="input01">Receipt No</label>
				 <input type="text" name="receipt_no" class="form-control"  value="{{task.receipt_no}}" />
				 <input type="hidden" name="oldreceipt_no" class="form-control"  value="{{task.receipt_no}}" />
			</div>
			 <div class="form-group">
				<label for="date">Date</label>
				 <input type="text" name="date" class="form-control datepicker" ng-model="task.date" value="{{task.date}}" />
			</div>
			 <div class="form-group">
				<label for="input01">Batch</label>
				 <select  name="batch_id" ng-model="batch_id" class="form-control" id="batch_id" >
					  <option value="" ng-selected="selected">--Select Batch--</option>
					  <option ng-repeat="cr in batches" value="{{cr.id}}" ng-selected="{{ cr.id== task.batch_id}}">{{cr.title}}</option>
				 </select> 
			</div>
			<div class="form-group">
				<label for="input01">Amount</label>
				 <input type="text" name="amount" class="form-control" ng-model="task.amount"/>
			</div>
			<div class="form-group">
				<label for="input01">Payment Method</label>
				 <select  name="payment_method" ng-model="payment_method" class="form-control" id="payment_method" >
					   <option value="" ng-selected="selected">--Select Payment Method--</option>
					  <option value="0" ng-selected="{{ 0	== task.payment_method}}">Cash</option>
					  <option value="1" ng-selected="{{ 1	== task.payment_method}}">Cheque</option>
				 </select> 
			</div>
			<div class="form-group">
				<label for="input01">Remark</label>
				<textarea name="remark" name="remark" class="form-control" name="task.remark">{{task.remark}}</textarea>
			</div>
			  <div class="form-group">
				<button type="submit" class="btn btn-primary">Update</button>
					<a href="<?php echo site_url('admin/index#/faculties/details/') ?>/{{task.user_id}}" class="btn btn-danger">Close</a>
			  </div>
				
  	  	</div>
			</form>
      
	  </div>
    </div>
    
  </div>

</div>
