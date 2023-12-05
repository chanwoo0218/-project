<?php 
include("config.php");
include("functions.php");

// 세션에서 nickname 가져오기
session_start();
$name = $_SESSION['nickname'];
$subject = trim($_POST['subject']);
$article = trim($_POST['article']);

if (!$subject || !$article) {
    error("입력값이 부족합니다.");
    exit;
}

//$hashed_passwd = password_hash($passwd, PASSWORD_DEFAULT);
$writedate = date("Y-m-d");

//$query = "SELECT MAX(gid) AS gid FROM board";
//$result = $con->query($query);
//$row = $result->fetch_assoc();
//$gid = $row['gid'] + 1;


$stmt = $con->prepare("INSERT INTO board (name, subject, article, writedate) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $name, $subject, $article, $writedate);
$stmt->execute();

$con->close();
forward("./list.php");
?>


