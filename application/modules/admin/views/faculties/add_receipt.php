<div class="widgets">

  <div class="row" >
    <div class="col-md-12">
      <div
          ba-panel
          ba-panel-title="Add Faculty Receipt Form"
          ba-panel-class="with-scroll">
		  
		  
		  <form role="form" ng-submit="addTask()" ng-upload enctype="multipart/form-data" ng-controller="addreceiptfacCtrl" >
		  	<input type="hidden" name="faculty_id" ng-model="faculty_id" value="{{faculty_id}}" />
			 <div class="form-group">
				<label for="input01">Receipt No</label>
				 <input type="text" name="receipt_no" class="form-control" ng-model="receipt_no" value="{{receipt_no}}" />
			</div>
			 <div class="form-group">
				<label for="date">Date</label>
				 <input type="text" name="date" class="form-control datepicker" ng-model="date" value="{{date}}" />
			</div>
			 <div class="form-group">
				<label for="input01">Batch</label>
				 <select  name="batch_id" ng-model="batch_id" class="form-control" id="batch_id" ng-change="getPayment();">
					  <option value="" ng-selected="selected">--Select Batch--</option>
					  <option ng-repeat="b in batches" value="{{b.id}}">{{b.title}}</option>
				 </select> 
			</div>
			<div class="form-group " id="r_admount_div">
				<label for="input01">Remaining Amount:</label>
				 {{paid.r_amount}}
			</div>
			<div class="form-group">
				<label for="input01">Amount</label>
				 <input type="text" name="amount" class="form-control" ng-model="amount" id="amount"/>
			</div>
			<div class="form-group">
				<label for="input01">Payment Method</label>
				 <select  name="payment_method" ng-model="payment_method" class="form-control" id="payment_method" >
					   <option value="" ng-selected="selected">--Select Payment Method--</option>
					  <option value="0">Cash</option>
					  <option value="1" >Cheque</option>
				 </select> 
			</div>
			<div class="form-group">
				<label for="input01">Remark</label>
				<textarea name="remark" name="remark" class="form-control"></textarea>
			</div>
			  <div class="form-group">
				<button type="submit" class="btn btn-primary">Add</button>
					<a href="<?php echo site_url('admin/index#/faculties/details/') ?>/{{faculty_id}}" class="btn btn-danger">Close</a>
			  </div>
				
  	  
			</form>
      
	  </div>
    </div>
    
  </div>

</div>
