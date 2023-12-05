<?php
	include("./config.php");
	$today = date("Y-m-d").'(수정)';
	session_start();
	$article=$_POST['article'];
	$num=$_GET['num'];
	$page=$_GET['page'];
    $UID = $_GET['$reply_num'];
	if($article==""){
		echo("<script> 
		window.alert('내용을 작성하십시오.'); 
		history.go(-1);
		</script>");
	}else{
		$stmt = $con->prepare("update reply set article=?, today=? where UID=?");
        $stmt->bind_param("ssi", $article, $today, $UID);
		mysqli_query($con,$query);
		mysqli_close($con);
		echo("<script> 
			location.href='read.php?page=$page&uid=$num'
			</script>");
	}
?>