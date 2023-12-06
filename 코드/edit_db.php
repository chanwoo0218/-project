<?php
    include("config.php");
    include("functions.php");

    
    $uid = isset($_GET['uid']) ? (int)$_GET['uid'] : 0;

    $subject = trim($_POST['subject']);
    $article = trim($_POST['article']);

    $writedate = date("Y-m-d") . '(수정)';

    if (!$subject || !$article) {
        error("입력값이 부족합니다.");
        exit;
    }

    $stmt = $con->prepare("update board set subject=?, article=?, writedate=? where uid=?");
    $stmt->bind_param("sssi", $subject, $article, $writedate, $uid);
    $stmt->execute();

    $con->close();
    forward("./list.php");
?>