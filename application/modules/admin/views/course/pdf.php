<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Courses</title>
</head>

<body>

					  <table width="100%">
						<thead>
						<tr class="sortable ">
						  <th>#</th>
						  <th>Title</th>
						  <th>Category</th>
						  <th>Duration</th>
						  <th>Fees</th>
						  <th>Students</th>
						  <th>Faculties</th>
						  <th>Batches</th>
						</tr>
					   </thead>
						<tbody >
						<?php $i=1;foreach($course as $new){?>
						<tr>
						  <td class="table-id"><?php echo $i;?></td>
						  <td><?php echo $new->title?></td>
						  <td><?php echo $new->category?></td>
						  <td><?php echo $new->duration?></td>
						  <td><?php echo $new->fees?></td>
						  <td><?php echo $new->students?></td>
						  <td><?php echo $new->faculties?></td>
						  <td><?php echo $new->batches?></td>
						</tr>
						<?php $i++;}?>
						</tbody>
					   </table>

</body>
</html>
