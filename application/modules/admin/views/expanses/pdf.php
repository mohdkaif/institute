<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Expanses</title>
</head>

<body>

					  <table width="100%" border="1" cellpadding="0" cellspacing="0">
						<thead>
						<tr class="sortable ">
						  <th>#</th>
						  <th>Date</th>
						  <th>Title</th>
						  <th>Amount</th>
						  <th>Category</th>
						  <th>Payment Method</th>
						  <th>Status</th>
						 </tr>
					   </thead>
						<tbody >
						<?php $i=1;foreach($expanses as $new){
						?>
						<tr>
						  <td class="table-id"><?php echo $i;?></td>
						  <td><?php echo date('d/m/Y', strtotime($new->date))?></td>
						  <td><?php echo $new->title?></td>
						  <td><?php echo $new->amount?></td>
						  <td><?php echo $new->category?></td>
						  <td><?php echo ($new->payment_method==1)?'Cash':'Cheque'?></td>
						  <td><?php echo ($new->status==1)?'Paid':'Unpaid'?></td>
						  
						</tr>
						<?php $i++;}?>
						</tbody>
					   </table>

</body>
</html>
