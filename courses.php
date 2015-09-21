<?php
session_start();
include('connect.php');
if(isset($_COOKIE["userid"]))
{	
	if($_COOKIE["userid"]=="user_id_auth_remember")
	$_SESSION['userid']="admuser";
}
if(!isset($_SESSION['userid']))
{ 
header('location:index.php'); 
}
?>

<html>
<head>
<title>BIT CERTIFICATE</title>
		<meta name="viewport" content="width=device-width , initial-scale=1.0">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/style.css" rel="stylesheet">
		<link href="css/basic.css" rel="stylesheet">
		<link rel="shortcut icon" type="image/x-icon" href="img/fav.ico">

		<style>
		</style>
</head>
<?php $site="cour"; include("header.php");?>
	<div class="container">
	<div class="row">
		<div id="main_body" class="jumbotron col-sm-6">
			
		</div>
		<div class="col-sm-6">
		<div class="jumbotron" style="margin:0px 40px 30px;padding:10px">
		<?php
		if(isset($_GET['yes']))
		{
		?>
			<h3 class="success" style="color:green">New Course Added Successfully <h3>
			<h2>Add More</h2>
		<?php
		}
		else
		{
		?>
		<h3 class="nav-banner">
			ADD COURSE AND BRANCHES :
			
		</h3>
		<?php
		}
		?>
		<form name="add_course" action="addbranch.php" method="post">
			COURSE NAME : <br><input style="width:70%" class="btn btn-default" name="name" required>
			<select class="btn btn-default" name="type">
				<option>DIPLOMA</option>
				<option>DEGREE</option>
			</select><br>
			BRANCHES : <span style="font-size:13px">(enter all the branches in it separated with a comma ",")</span>
			<textarea class="btn-block" name="branch"></textarea>
			<input  class="btn btn-primary btn-block" id="bitbutton" type="submit" name="sub" value="ADD">
			<br><span style="line-height:100%;padding:60px 0px">you can add or delete branches even after clicking on "ADD" button</span>
		</form>
		</div>
		<div class="jumbotron" style="margin:0px 40px;padding:10px">
			<h3>REMOVE COURSE:</h3>
			<form name="del_cour">
                        <select name="cour"  class="btn btn-primary" id="cour_space2">
				<?php
				$q="select name from course order by name";
				$r=mysqli_query($con,$q);
				if($r)
				{
					while($row=mysqli_fetch_array($r))
					{
						echo '<option>'.$row[0].'</option>'; 
								
					}			
				}
				?>
			</select><br><br>
			<span id="bitbutton" class="btn btn-sm btn-primary" onclick='removecourse()'>REMOVE</span>
			</form>
		</div>
		<div class="jumbotron" style="margin:30px 40px;padding:10px">
			<h3>REMOVE BRANCH:</h3>
			<form name="del_bran">
			<select id="cour_space"  class="btn btn-primary" name="cour" onchange="get_form()">
				<?php
				$q="select name from course order by name";
				$r=mysqli_query($con,$q);
				if($r)
				{
					while($row=mysqli_fetch_array($r))
					{
						echo '<option>'.$row[0].'</option>'; 
								
					}			
				}
				?>
			</select><br><br>
			<span id="bran_space">
			</span><br><br>
			<span id="bitbutton" class="btn btn-sm btn-primary" onclick="removebranch()">REMOVE</span>
			</form>
		</div>
		
		</div>
		
	</div>
	</div>
	<center>
	<span style="font-size:10px;padding:10px">Designed & Developed by A.S.U.S</span>
	</center>
	<div id="lock"></div>
	<!-- script jquery and bootstrap for faster loading of the page-->
	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.js"></script>
	<script src="js/ext_cour_bran.js"></script>
	<!-- script jquery and bootstrap for faster loading of the page-->
</body>
</html>