<?php
// config.php
$dbHost = "localhost";
$dbUsername = "phpadmin";
$dbPassword = "phpadmin";
$dbName = "goods";//알맞은 데이터베이스로 수정

$con = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

$rows_page = 10; // 한 페이지에 표시할 행의 수
$direct_pages = 5; // 표시할 페이지 수
$row_length = 30; // 제목의 길이 제한
$tag_enable = FALSE;
?>

