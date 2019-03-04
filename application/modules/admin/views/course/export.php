<?php

header('Content-Type: "text/csv"');
header('Content-Disposition: attachment; filename="course.csv"');
header('Expires: 0');
header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
header("Content-Transfer-Encoding: binary");
header('Pragma: public');

?>
#,Title,Category,Duration,Fees,Students,Faculties,Batches,
							<?php $i=1;
								
							foreach ($course as $new)
							{
							?>
									<?php echo $i .","?>
									<?php echo $new->title .","?>
									<?php echo $new->category .","?>
									<?php echo $new->duration .","?>
									<?php echo $new->fees .","?>
									<?php echo $new->students .","?>
									<?php echo $new->faculties .","?>
									<?php echo $new->batches .","?>
									<?php echo ",\n";?>
                                <?php $i++;}?>