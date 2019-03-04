<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Inventory</title>
</head>

<body>

					  <table width="100%" border="1" cellpadding="0" cellspacing="0">
						<thead>
						<tr class="sortable ">
						  <th>#</th>
						  <th>Title</th>
						  <th>Price</th>
						  <th>Quantity/Stock</th>
						  <th>Added</th>
						 </tr>
					   </thead>
						<tbody >
						<?php $i=1;foreach($inventory as $new){
						?>
						<tr>
						  <td class="table-id"><?php echo $i;?></td>
						  <td><?php echo $new->title?></td>
						  <td><?php echo $new->price?></td>
						  <td><?php echo $new->qty?></td>
						  <td><?php echo date('d/m/Y h:i a', strtotime($new->added))?></td>
						</tr>
						<?php $i++;}?>
						</tbody>
					   </table>

</body>
</html>
