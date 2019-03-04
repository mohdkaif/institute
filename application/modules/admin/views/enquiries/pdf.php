<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Enquiries</title>
</head>

<body>

					  <table width="100%">
						<thead>
						<tr class="sortable ">
						  <th>#</th>
						  <th>Date Time</th>
						  <th>Name</th>
						  <th>Mobile</th>
						  <th>For Course</th>
						  <th>Preferred Time</th>
						  <th>Status</th>
						</tr>
					   </thead>
						<tbody >
						<?php $i=1;foreach($enquiries as $new){?>
						<tr>
						  <td class="table-id"><?php echo $i;?></td>
						  <td><?php echo date('d/m/Y h:i a', strtotime($new->date_time))?></td>
						  <td><?php echo $new->name?></td>
						  <td><?php echo $new->mobile?></td>
						  <td><?php echo $new->course?></td>
						  <td><?php echo $new->preferred_time?></td>
						  <td><?php echo $new->estatus?></td>
						</tr>
						<?php $i++;}?>
						</tbody>
					   </table>

</body>
</html>
