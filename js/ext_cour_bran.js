rload();
get_form();	
function show(e)
{
document.getElementById(e).style.visibility="visible";
document.getElementById('add'+e).style.visibility="visible";
document.getElementById('close'+e).style.visibility="visible";
document.getElementById('open'+e).style.visibility="hidden";
document.getElementById(e).style.position="relative";
document.getElementById('add'+e).style.position="relative";
document.getElementById('close'+e).style.position="relative";
document.getElementById('open'+e).style.position="absolute";
}
function hide(e)
{
document.getElementById(e).style.visibility="hidden";
document.getElementById('add'+e).style.visibility="hidden";
document.getElementById('open'+e).style.visibility="visible";
document.getElementById('close'+e).style.visibility="hidden";
document.getElementById(e).style.position="absolute";
document.getElementById('add'+e).style.position="absolute";
document.getElementById('open'+e).style.position="relative";
document.getElementById('close'+e).style.position="absolute";
}

function addbranch(e,f)
{
var m=document.forms[f]["branch"].value;
var req;
	if(window.XMLHttpRequest)
	req=new XMLHttpRequest();
	else
	req=new ActiveXObject("Microsoft.XMLHTTP");
	req.onreadystatechange = function ()
	{
		if(req.readystate==4 && req.status==200)
		{
		}
	}
	req.open("GET","addbranch.php?b="+m+"&c="+e,false);
	req.send();
	if(req.responseText==0)
	{
	var node=document.createElement("LI");
	var text=document.createTextNode(m);
	node.appendChild(text);
	document.getElementById(f).appendChild(node);
	get_form();
	}
	
}
function removebranch()
{
	var m=document.forms['del_bran']["cour"].value;
	var n=document.forms['del_bran']["bran"].value;
	var x=confirm("Are you sure you want to delete "+n+" branch from "+m+" course" );
	if(x)
	{
	var req;
	if(window.XMLHttpRequest)
	req=new XMLHttpRequest();
	else
	req=new ActiveXObject("Microsoft.XMLHTTP");
	req.onreadystatechange = function ()
	{
		if(req.readyState==4 && req.status==200)
		{
			document.getElementById("lock").innerHTML="";
			document.getElementById("lock").style.zIndex="-1";document.getElementById("lock").style.background="none";
		}
		else
		{
		        document.getElementById("lock").innerHTML="<center><h1>REMOVING BRANCH . . .</h1></center>";
			document.getElementById("lock").style.zIndex="+2";document.getElementById("lock").style.background="black";
		}
        }
	req.open("GET","remove.php?rembran="+n+"&cour="+m,false);
	req.send();
	rload_form();
	}
	else
	{
	}
}
function removecourse() // remove course
{
	var n=document.forms['del_cour']["cour"].value;
	var x=confirm("Are you sure you want to delete "+n+" from course" );
	if(x)
	{
	var req;
	if(window.XMLHttpRequest)
	req=new XMLHttpRequest();
	else
	req=new ActiveXObject("Microsoft.XMLHTTP");
	req.onreadystatechange = function ()
	{
		if(req.readyState==4 && req.status==200)
		{
			document.getElementById("lock").innerHTML="";
			document.getElementById("lock").style.zIndex="-1";document.getElementById("lock").style.background="none";
		}
		else
		{
		        document.getElementById("lock").innerHTML="<center><h1>DELETING COURSE . . .</h1></center>";
			document.getElementById("lock").style.zIndex="+2";document.getElementById("lock").style.background="black";
		}
        }
	req.open("GET","remove.php?remcour="+n,true);
	req.send();	
	showcourse();
	}
	else
	{
	}
}
function rload()
{
	var req;
	if(window.XMLHttpRequest)
	req=new XMLHttpRequest();
	else
	req=new ActiveXObject("Microsoft.XMLHTTP");
	req.open("GET","courses_help.php",false);
	req.send();	
	document.getElementById("main_body").innerHTML=req.responseText;
}

function showcourse()
{
	var req;
	if(window.XMLHttpRequest)
	req=new XMLHttpRequest();
	else
	req=new ActiveXObject("Microsoft.XMLHTTP");
	req.onreadystatechange = function ()
	{
		if(req.readystate==4 && req.status==200)
		{
		}
	}
	req.open("GET","remove.php?showcour=a",false);
	req.send();	
	document.getElementById("cour_space").innerHTML=req.responseText;
	document.getElementById("cour_space2").innerHTML=req.responseText;
	rload_form();
}
function get_form() // update form field for remove branch
{
	var req=document.forms['del_bran']['cour'].value;
	if (window.XMLHttpRequest)
	x=new XMLHttpRequest();
	else
	x=new ActiveXObject("Microsoft.XMLHTTP");
	x.onreadystatechange=function()
	  {
	  if (x.readyState==4 && x.status==200)
		{
		if(!x.responseText)
			document.getElementById("bran_space").innerHTML="<span>No Branches To Delete</span>";
		else
		document.getElementById("bran_space").innerHTML="<select  class='btn btn-primary' name='bran'>"+x.responseText+"</select>";
		}
	  }
	x.open("GET","remove.php?showbran=show&cour="+req,true);
	x.send();
}
function rload_form() // update form field for remove branch
{
	var req=document.forms['del_bran']['cour'].value;
	if (window.XMLHttpRequest)
	x=new XMLHttpRequest();
	else
	x=new ActiveXObject("Microsoft.XMLHTTP");
	x.onreadystatechange=function()
	  {
	  if (x.readyState==4 && x.status==200)
		{
		if(!x.responseText)
			document.getElementById("bran_space").innerHTML="<span>No Branches To Delete</span>";
		else
		document.getElementById("bran_space").innerHTML="<select  class='btn btn-primary' name='bran'>"+x.responseText+"</select>";
		}
	  }
	x.open("GET","remove.php?showbran=show&cour="+req,true);
	x.send();
	rload();
}
