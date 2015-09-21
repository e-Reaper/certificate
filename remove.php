<?php
ob_start();
session_start();
include('connect.php');
if(!isset($_SESSION['userid'])) 
header('location:message.php'); 

if(isset($_GET['showbran']))
{
	$c=$_GET['cour'];
	
	$q="select branch from course where name ='$c'";
	$r=mysqli_query($con,$q);
	if($r)
	{
		while($row=mysqli_fetch_array($r))
		{
			$tok = strtok($row[0], ",");
			while ($tok !== false) 
			{
					echo '<option>'.$tok.'</option>';
					$tok = strtok(",");
			}
		}
	}
}
else if(isset($_GET['rembran']))
{
	$b=$_GET['rembran'];
	$c=$_GET['cour'];
	$str='';
	$q="select branch from course where name ='$c'";
	$r=mysqli_query($con,$q);
	if($r)
	{
		while($row=mysqli_fetch_array($r))
		{
			$tok = strtok($row[0], ",");
			while ($tok != false) 
			{
					if($b!=$tok)
					$str=$str.','.$tok;
					$tok = strtok(",");
			}
		}
	}
	$q="update course set branch='$str' where name ='$c'";
	echo $q;
	$r=mysqli_query($con,$q);
	if($r)
	echo '1';
	else
	echo '0';
}
else if(isset($_GET['showcour']))
{
	$q="select name from course order by name";
	$r=mysqli_query($con,$q);
	if($r)
	{
		while($row=mysqli_fetch_array($r))
		{
			echo '<option>'.$row[0].'</option>'; 	
		}			
	}
}
else if(isset($_GET['remcour']))
{
	$c=$_GET['remcour'];
	$q="delete from course where name='$c'";
	echo $q;
	$r=mysqli_query($con,$q);
	if($r)
	echo '1';
}
else if(isset($_GET['showexte']))
{
$q="select name from extension";
$r=mysqli_query($con,$q);
if($r)
{
	while($row=mysqli_fetch_array($r))
	{
	
	echo"<option>".$row[0]."</option>";
	}
}
}
else if(isset($_GET['exte']))
{
$e=$_GET['exte'];
$q="delete from extension where name='$e'";
$r=mysqli_query($con,$q);
}

else if(isset($_GET['listexte']))
{
$q="select name from extension";
echo '<h3>List of Extension Centers</h3><hr style="">';
$r=mysqli_query($con,$q);
if($r)
{
	echo '<ul>';
	while($row=mysqli_fetch_array($r))
	{
	echo"<li>".$row[0]."</li>";
	}
	echo '</ul>';
}
}

?>