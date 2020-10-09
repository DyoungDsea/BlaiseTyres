<?php
$pid=$prow['id'];
								$sid=$prow['sid'];
								$icategory=$prow['icategory'];
								$subcat=$prow['subcat'];
								$ititle=$prow['ititle'];
								$descr=$prow['descr'];
								$prneg=$prow['prneg'];
								$status=$prow['status'];
								$transid=$prow['transid'];
								$dtime=$prow['dtime'];
								$iviews=$prow['iviews'];
								$featured=$prow['featured'];
								//get default image
								$quer=mysqli_query($conn, "select id, picid from _dpics where sid='$sid' and transid='$transid' order by status desc limit 1") 
								or die(mysqli_error($conn));
								if(mysqli_num_rows($quer)==0) {
								$photo='images/nopic.gif';
								}
								else {
								$prow = $quer->fetch_assoc();
								$picid=$prow['picid'];
								$photo='webcontrol/items/'.$picid.'.jpg';
								}
								?>