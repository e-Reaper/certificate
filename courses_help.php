<?php
ob_start();
session_start();
include('connect.php');
if(!isset($_SESSION['userid'])) 
header('location:message.php'); 
?>

<center><h2 style="padding:0px;margin:0px 0px 10px 0px;border-bottom:1px solid">AVAILABLE COURSES AND BRANCHES</h2></center>
				<fieldset class="scheduler-border"  id="degree">
					<h3>Degree Courses<b class="caret"></b></h3>
						<ul id="deg_course">
						<?php
						$i=0;
						$q="select * from course where type='degree' order by name";
						$r=mysqli_query($con,$q);
						if($r)
						{
							while($row=mysqli_fetch_array($r))
							{
								echo 
								"<li class='no_style' style='background:white;margin:10px;border-radius:10px;'>
								<span id='open".$i."' onclick='show(".$i.")' class='btn btn-success'><b class='caret'></b></span>
								<span id='close".$i."' onclick='hide(".$i.")' class='go_hide btn btn-danger' style='padding:0px 12px '><b>&times;</b></span>
								".$row[0]."
								<ul id=".$i." style='color:#000066' class='go_hide'>";
								$tok = strtok($row[2],",");
								while ($tok != false) 
								{
										echo '<li style="padding:0px;margin:0px">'.$tok;
										echo'</li>';
										$tok = strtok(",");
								}
								?>
								</ul>
								<div id="add<?php echo $i; ?>" class='go_hide' style="margin:0px 10px 30px 10px;padding:0px 0px 40px 0px">
								Add Branch :<form name="<?php echo $i;?>" action="#" onsubmit="return false;">
								<input  class='form-control' type='text' name='branch'></form><span class='btn btn-primary pull-right btn-block' id='bitbutton' onClick="addbranch('<?php echo $row[0];?>','<?php echo $i;?>')">ADD</span></div></li>
								<?php
								$i++;
							}
						}
						?>
						</ul>
				</fieldset>
				<br>
				<fieldset class="scheduler-border" id="diploma">
						<h3>Diploma Courses<b class="caret"></b></h3>
						<ul id="dip_course">
						<?php
						$q="select * from course where type='diploma' order by name";
						$r=mysqli_query($con,$q);
						if($r)
						{
							while($row=mysqli_fetch_array($r))
							{
								echo 
								"<li class='no_style' style='background:white;margin:10px;border-radius:10px;'>
								<span id='open".$i."' onclick='show(".$i.")' class='btn btn-success'><b class='caret'></b></span>
								<span id='close".$i."' onclick='hide(".$i.")' class='go_hide btn btn-danger' style='padding:0px 12px '><b>&times;</b></span>
								".$row[0]."
								<ul id=".$i." style='color:#000066' class='go_hide'>";
								$tok = strtok($row[2], ",");
								while ($tok !== false) 
								{
										echo '<li>'.$tok;
										$tok = strtok(",");
								}
								?>
								</ul>
								<div id="add<?php echo $i; ?>" class='go_hide' style="margin:0px 10px 30px 10px;padding:0px 0px 40px 0px">
								Add Branch :<form name="<?php echo $i;?>" action="#">
								<input  class='form-control' type='text' name='branch'></form><span class='btn btn-primary pull-right btn-block' id='bitbutton' onClick="addbranch('<?php echo $row[0];?>','<?php echo $i;?>')">ADD</span></div></li>
								<?php
								$i++;
							}
						}
						?>
						</ul>
				</fieldset>