<div class="widgets">

  <div class="row" ng-controller="receiptfacCtrl" >
    <div class="col-md-12" >
      <div
          ba-panel
          ba-panel-title="Receipt"
          ba-panel-class="with-scroll">
		  	
			  <table width="100%" style="padding-bottom:20px; border: 1px solid #f4f4f4;" cellpadding="1" cellpadding="2" id="printTable">
		  			<tr>
						<td>
								<table border="0" width="100%" style="border-bottom:1px solid #CCCCCC; margin-bottom:20px;">
									<tr>
										<td width="45%" align="center"> <img src="<?php echo base_url('assets/bluradmin/uploads/images/')?>/{{setting[0].logo}}" height="70" width="80" /> </td>
										<td align="left">	
											<h3>{{setting[0].name}}</h3>
															
										</td>
									</tr>
									<tr>
										<td colspan="2" align="center" >{{setting[0].address}}</td>
									</tr>
									<tr>
										<td colspan="2"></td>
									</tr>
								</table>
						</td>
					</tr>
					<tr>
						<td>
							<table width="100%" style="margin-top:5px;" >
								<tr>
									<td><b>Faculty Name</b></td>
									<td>{{tasks[0].faculty}}</td>
									<td><b>Payment Date</b></td>
									<td>{{tasks[0].date | date : 'dd/MM/yyyy'}}</td>
								</tr>
								<tr>
									<td><b>Receipt No</b></td>
									<td>{{tasks[0].receipt_no}}</td>
									<td><b>Batch</b></td>
									<td>{{tasks[0].batch}}</td>
								</tr>
								<tr>
									<td><b>Amount</b></td>
									<td>{{tasks[0].amount}}</td>
									<td><b>Payment Method</b></td>
									<td>{{tasks[0].payment_method==0?'Cash':''}} {{tasks[0].payment_method==1?'Cheque':''}}</td>
								</tr>
							</table>
						</td>
					</tr>
		 </table>
		 	
			  <div class="form-group" style="padding-top:50px;">
				<button type="button" class="btn btn-primary" ng-click="printData()">Print</button>
					<a href="<?php echo site_url('admin/index#/faculties/details/') ?>/{{tasks[0].user_id}}" class="btn btn-danger">Close</a>
			  </div>
		
	  </div>
    </div>
    
  </div>

</div>
