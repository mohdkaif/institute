<?php

header('Content-Type: "text/csv"');
header('Content-Disposition: attachment; filename="Students.csv"');
header('Expires: 0');
header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
header("Content-Transfer-Encoding: binary");
header('Pragma: public');

?>
#,Full Name,G Name,Mobile,Dob,Gender,Course,Doj,
							<?php $i=1;
								
							foreach ($students as $new){?>
									<?php echo $i.","?>
									<?php echo $new->name.","?>
									<?php echo $new->gardian_name .","?>
									<?php echo $new->mobile .","?>
									<?php echo date('d/m/Y', strtotime($new->dob)) .","?>
									<?php echo $new->gender .","?>
									<?php echo $new->course.","?>
									<?php echo date('d/m/Y', strtotime($new->added)) .","?>
									<?php echo ",\n";?>
                                <?php $i++;}?>