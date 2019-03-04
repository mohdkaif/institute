<?php

header('Content-Type: "text/csv"');
header('Content-Disposition: attachment; filename="enquiries.csv"');
header('Expires: 0');
header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
header("Content-Transfer-Encoding: binary");
header('Pragma: public');

?>
#,Date Time,Name,Mobile,For Course,Preferred Time,Status,
							<?php $i=1;
								
							foreach ($enquiries as $new)
							{
							?>
									<?php echo $i .","?>
									<?php echo date('d/m/Y h:i a', strtotime($new->date_time)) .","?>
									<?php echo $new->name .","?>
									<?php echo $new->mobile .","?>
									<?php echo $new->course .","?>
									<?php echo $new->preferred_time .","?>
									<?php echo $new->estatus .","?>
									<?php echo ",\n";?>
                                <?php $i++;}?>