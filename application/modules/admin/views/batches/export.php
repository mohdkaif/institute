<?php

header('Content-Type: "text/csv"');
header('Content-Disposition: attachment; filename="faculties.csv"');
header('Expires: 0');
header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
header("Content-Transfer-Encoding: binary");
header('Pragma: public');

?>
#,Title,Course Category,Time,Start Date,End Date,Faculty,
							<?php $i=1;
								
							foreach ($batches as $new)
							{
							$fids	=	json_decode($new->faculties);;
							$facs	=	$this->batch_model->get_faculties($fids);;
							?>
									<?php echo $i .","?>
									<?php echo $new->title .","?>
									<?php echo $new->category .","?>
									<?php echo date('h:i a', strtotime($new->batch_time)) .","?>
									<?php echo date('d/m/Y', strtotime($new->start_date)) .","?>
									<?php echo date('d/m/Y', strtotime($new->end_date)) .","?>
									<?php echo $facs->facs.","?>
									<?php echo ",\n";?>
                                <?php $i++;}?>