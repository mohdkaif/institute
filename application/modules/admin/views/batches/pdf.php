<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Batches</title>
</head>

<body>

					  <table width="100%" border="1" cellpadding="0" cellspacing="0">
						<thead>
						<tr class="sortable ">
						  <th>#</th>
						  <th>Title</th>
						  <th>Course Category</th>
						  <th>Time</th>
						  <th>Start Date</th>
						  <th>End Date</th>
						  <th>Faculty</th>
						 </tr>
					   </thead>
						<tbody >
						<?php $i=1;foreach($batches as $new){
						$fids	=	json_decode($new->faculties);;
							$facs	=	$this->batch_model->get_faculties($fids);;
						?>
						<tr>
						  <td class="table-id"><?php echo $i;?></td>
						  <td><?php echo $new->title?></td>
						  <td><?php echo $new->category?></td>
						  <td><?php echo date('h:i a', strtotime($new->batch_time))?></td>
						  <td><?php echo date('d/m/Y', strtotime($new->start_date))?></td>
						  <td><?php echo date('d/m/Y', strtotime($new->end_date))?></td>
						  <td><?php echo $facs->facs?></td>
						</tr>
						<?php $i++;}?>
						</tbody>
					   </table>

</body>
</html>
