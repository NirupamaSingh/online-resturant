<?php
session_start();
$sesid=$_SESSION['user'];
$conn=mysqli_connect("localhost","root","","online-res");

if(!$conn)
{
	echo "error";
}
else
{
	//echo "ok";
}

$a=$_POST['oemail'];
echo "$a";
echo"</br>";
$b=$_POST['nemail'];
echo "$b";
echo"</br>";
$c=$_POST['cemail'];
echo "$c";
$sel="select * from admin where adminemail='$sesid'";
    $res=mysqli_query($conn,$sel);
	$row=mysqli_fetch_array($res,MYSQLI_BOTH);
	
if(!$sesid)
{
	echo "session error";
}
else{
	if($row['1']==$a)
	{
		if($b==$c)
		{
			$up="update admin set adminemail='$b' where adminemail='$sesid'";
			if(mysqli_query($conn,$up))
			{
				header("location:dashboard.php");
			}
		
		else{
			echo "email not change";
		}
	}
	else
	{
		echo "new email and confirm email not match";
	}
	}
	
	else{
		echo "old email not match";
		
}
	}
?>
