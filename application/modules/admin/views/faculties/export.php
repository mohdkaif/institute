<?php

header('Content-Type: "text/csv"');
header('Content-Disposition: attachment; filename="faculties.csv"');
header('Expires: 0');
header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
header("Content-Transfer-Encoding: binary");
header('Pragma: public');

?>
#,Full Name, Mobile,Dob,Gender,Courses,Doj,Join As,
							<?php $i=1;
								
							foreach ($faculties as $new)
							{
							?>
									<?php echo $i .","?>
									<?php echo $new->name .","?>
									<?php echo $new->mobile .","?>
									<?php echo date('d/m/Y', strtotime($new->dob)) .","?>
									<?php echo $new->gender .","?>
									<?php echo '--' .","?>
									<?php echo date('d/m/Y', strtotime($new->join_date)) .","?>
									<?php echo $new->join_as .","?>
									<?php echo ",\n";?>
                                <?php $i++;}?>