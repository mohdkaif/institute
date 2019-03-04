<?php

header('Content-Type: "text/csv"');
header('Content-Disposition: attachment; filename="Expanses.csv"');
header('Expires: 0');
header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
header("Content-Transfer-Encoding: binary");
header('Pragma: public');

?>
#,Date,Title,Amount,Category,Payment Method,Status,
							<?php $i=1;
								
							foreach ($expanses as $new)
							{
							?>
									<?php echo $i .","?>
									<?php echo date('d/m/Y', strtotime($new->date)) .","?>
									<?php echo $new->title .","?>
									<?php echo $new->amount .","?>
									<?php echo $new->category.","?>
									<?php echo ($new->payment_method==1)?'Cash':'Cheque' .","?>
									<?php echo ($new->status==1)?'Cash':'Unpaid'.","?>
									<?php echo ",\n";?>
                                <?php $i++;}?>