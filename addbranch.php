<?php
ob_start();
session_start();
include('connect.php');
if(!isset($_SESSION['userid'])) 
header('location:message.php'); 
?>

<?php
	if(isset($_GET['exte']))
	{
		$e=$_GET['exte'];
		$q="insert into extension values('$e')";
		$r=mysqli_query($con,$q);
		if($r)
		echo '1';
		else
		echo '2';
	}
	else if(isset($_GET['dide']))
	{
		$d=$_GET['dide'];
		$q="select name from course where type='$d'";
		$r=mysqli_query($con,$q);
		if($r)
		while($row=mysqli_fetch_array($r))
		{
			echo '<option>'.$row[0].'</option>';
		}
	}
	else if(isset($_GET['cour']))
	{
		$c=$_GET['cour'];
		$q="select branch from course where name='$c'";
		$r=mysqli_query($con,$q);
		if($r)
		while($row=mysqli_fetch_array($r))
		{
			$tok=strtok($row[0],',');
			while($tok !== false)
			{
				echo '<option>'.$tok.'</option>';
				$tok=strtok(",");
			}	
		}
	}
	else if(isset($_POST['sub']))
	{
		$name=$_POST['name'];
		$type=$_POST['type'];
		$branch=','.$_POST['branch'].',';
		$q="insert into course values('$name','$type','$branch')";
		echo $q;
		$r=mysqli_query($con,$q);
		if($r)
		header('location:courses.php?yes=1');
		else
		header('location:courses.php?yes=0');
	}
	else
	{
	$br=','.$_GET['b'].',';
	$co=$_GET['c'];
	$q="select branch from course where name='$co' and branch like '%$br%'";
	$r=mysqli_query($con,$q);
	if($r)
	{
		if(mysqli_num_rows($r)>0)
		echo '1';
		else
		{
			$q="select branch from course where name='$co'";
			$r=mysqli_query($con,$q);
			$branch="";
			if($r)
			while($row=mysqli_fetch_array($r))
			{
				$branch=$row[0];
			}
			$branch=$branch.','.$br.',';

			$q="update course set branch='$branch' where name='$co'";
			$r=mysqli_query($con,$q);
			if($r) echo '0';
			else echo '2';
		}
	}
	}
?>