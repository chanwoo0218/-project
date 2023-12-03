<?php
	include("./config.php");
	session_start();
	$writer=$_SESSION['nickname'];

	$num=$_GET['num'];
	$page=$_GET['page'];
	$reply_num=$_GET['reply_num'];

	$query="DELETE from reply WHERE UID='$reply_num'";

	mysqli_query($con,$query);
	mysqli_close($con);
	echo("<script> 
		location.href='read.php?page=$page&uid=$num'
		</script>");
	
	
?>