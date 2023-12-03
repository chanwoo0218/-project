<?php 
include("config.php");
include("functions.php");

// 세션에서 nickname 가져오기
session_start();
$name = $_SESSION['nickname'];
$homepage = trim($_POST['homepage']);
$subject = trim($_POST['subject']);
$article = trim($_POST['article']);

if (!$subject || !$article) {
    error("입력값이 부족합니다.");
    exit;
}

if ($homepage && !filter_var($homepage, FILTER_VALIDATE_URL)) {
    error("홈페이지를 잘못 입력하셨습니다.");
    exit;
}

//$hashed_passwd = password_hash($passwd, PASSWORD_DEFAULT);
$writedate = date("Y-m-d");

//$query = "SELECT MAX(gid) AS gid FROM board";
//$result = $con->query($query);
//$row = $result->fetch_assoc();
//$gid = $row['gid'] + 1;


$stmt = $con->prepare("INSERT INTO board (name, homepage, subject, article, writedate) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sssss", $name, $homepage, $subject, $article, $writedate);
$stmt->execute();

$con->close();
forward("./list.php");
?>


