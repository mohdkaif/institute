<?php

header('Content-Type: "text/csv"');
header('Content-Disposition: attachment; filename="Inventory.csv"');
header('Expires: 0');
header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
header("Content-Transfer-Encoding: binary");
header('Pragma: public');

?>
#,Title,Price,Quantity/Stock,Added,
							<?php $i=1;
								
							foreach ($inventory as $new)
							{
							?>
									<?php echo $i .","?>
									<?php echo $new->title .","?>
									<?php echo $new->price .","?>
									<?php echo $new->qty.","?>
									<?php echo date('d/m/Y h:i a', strtotime($new->added)) .","?>
									<?php echo ",\n";?>
                                <?php $i++;}?>