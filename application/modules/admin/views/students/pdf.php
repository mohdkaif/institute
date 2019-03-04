<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Students</title>
</head>

<body>

					  <table width="100%" border="1" cellpadding="0" cellspacing="0">
						<thead>
						<tr class="sortable ">
						  <th>#</th>
						  <th>Full Name</th>
						  <th>G Name</th>
						  <th>Mobile</th>
						  <th>Dob</th>
						  <th>Gender</th>
						  <th>Course</th>
						  <th>Doj</th>
						 </tr>
					   </thead>
						<tbody >
						<?php $i=1;foreach($students as $new){	?>
						<tr>
						  <td class="table-id"><?php echo $i;?></td>
						  <td><?php echo $new->name?></td>
						  <td><?php echo $new->gardian_name?></td>
						  <td><?php echo $new->mobile?></td>
						  <td><?php echo date('d/m/Y', strtotime($new->dob))?></td>
						  <td><?php echo $new->gender?></td>
						  <td><?php echo $new->course?></td>
						  <td><?php echo date('d/m/Y', strtotime($new->added))?></td>
						</tr>
						<?php $i++;}?>
						</tbody>
					   </table>

</body>
</html>
