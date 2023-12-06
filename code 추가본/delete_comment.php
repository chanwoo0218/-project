<?php
include("./config.php");
session_start();
$writer = $_SESSION['nickname'];

$num = $_GET['num'];
$page = $_GET['page'];
$reply_num = $_GET['reply_num'];

// 파라미터화된 SQL 쿼리 사용
$query = "DELETE FROM reply WHERE UID = ?";
$stmt = mysqli_prepare($con, $query);
mysqli_stmt_bind_param($stmt, 'i', $reply_num);
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);

mysqli_close($con);

echo("<script> 
    location.href='read.php?page=$page&uid=$num'
    </script>");
?>