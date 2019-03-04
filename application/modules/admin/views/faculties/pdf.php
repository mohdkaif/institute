<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Faculties</title>
</head>

<body>

					  <table width="100%">
						<thead>
						<tr class="sortable ">
						  <th>#</th>
						  <th>Full Name</th>
						  <th>Mobile</th>
						  <th>Dob</th>
						  <th>Gender</th>
						  <th>Courses</th>
						  <th>Doj</th>
						  <th>Join As</th>
						</tr>
					   </thead>
						<tbody >
						<?php $i=1;foreach($faculties as $new){?>
						<tr>
						  <td class="table-id"><?php echo $i;?></td>
						  <td><?php echo $new->name?></td>
						  <td><?php echo $new->mobile?></td>
						  <td><?php echo date('d/m/Y', strtotime($new->dob))?></td>
						  <td><?php echo $new->gender?></td>
						  <td>--</td>
						  <td><?php echo date('d/m/Y', strtotime($new->join_date))?></td>
						  <td><?php echo $new->join_as?></td>
						</tr>
						<?php $i++;}?>
						</tbody>
					   </table>

</body>
</html>
