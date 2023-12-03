<?php
	include("./config.php");
	$today = date("Y-m-d");
	session_start();
	$writer=$_SESSION['nickname'];
	$article=$_POST['article'];
	$num=$_POST['num'];
	$page=$_POST['page'];
	if($article==""){
		echo("<script> 
		window.alert('내용을 적어주세요.'); 
		history.go(-1);
		</script>");
	}else{
		$query="INSERT INTO reply VALUES ('$article','$writer','$today','$num',NULL)";
		mysqli_query($con,$query);
		mysqli_close($con);
		echo("<script> 
			location.href='read.php?page=$page&uid=$num'
			</script>");
	}
	
?>