<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Receipt</title>
</head>

<body>
		<table width="100%" style="padding-bottom:20px; border: 1px solid #f4f4f4;" cellpadding="1" cellpadding="2" id="printTable">
		  			<tr>
						<td>
								<table border="0" width="100%" style="border-bottom:1px solid #CCCCCC; margin-bottom:20px;">
									<tr>
										<td width="45%" align="center"> <img src="<?php echo base_url('assets/bluradmin/uploads/images/'.$setting->logo)?>" height="70" width="80" /> </td>
										<td align="left">	
											<h3><?php echo $setting->name?></h3>
															
										</td>
									</tr>
									<tr>
										<td colspan="2" align="center" ><?php echo $setting->address?></td>
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
									<td><b>Student Name</b></td>
									<td><?php echo $task->student?></td>
									<td><b>Payment Date</b></td>
									<td><?php echo date('d/m/Y', strtotime($task->date))?></td>
								</tr>
								<tr>
									<td><b>Receipt No</b></td>
									<td><?php echo $task->receipt_no?></td>
									<td><b>Batch</b></td>
									<td><?php echo $task->batch?></td>
								</tr>
								<tr>
									<td><b>Amount</b></td>
									<td><?php echo $task->amount?></td>
									<td><b>Payment Method</b></td>
									<td><?php echo ($task->payment_method==0)?'Cash':''?> <?php echo ($task->payment_method==1)?'Cheque':''?></td>
								</tr>
							</table>
						</td>
					</tr>
		 </table>
</body>
</html>
