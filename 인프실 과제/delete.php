<?php
	include("./config.php");
	$uid=$_GET['uid'];
	$query="DELETE from board where uid=$uid";
	mysqli_query($con,$query);
	mysqli_close($con);
	echo("<script> 
		location.href='list.php'
		</script>");
?>