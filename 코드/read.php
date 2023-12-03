<html>
<head>
  <link rel="stylesheet" type="text/css" href="./common_style.css">
  <style>  
    <?php include("./new_comment.css"); ?>
    .info_table {
      background-color: #CFE1FC;
      border: solid 1pt;
    }
    .article_table {
      background-color: #EFF8FE;
      border: solid 1pt;
    }
    .new-comment{
        width:1000px;
        height:100px;
    }
    th,td{
        padding:5px;
    }
  </style>
</head>
<body>
<center>

<?php
include("./config.php");
include("./functions.php");


$uid = isset($_GET['uid']) ? (int)$_GET['uid'] : 0;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

// 데이터베이스에서 글의 정보 검색
$query = "SELECT gid, name, email, homepage, subject, article, writedate, refnum 
          FROM board WHERE uid = ?";
$stmt = $con->prepare($query);
$stmt->bind_param("i", $uid);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

$subject = htmlspecialchars($row['subject']);
$article = $tag_enable ? $row['article'] : htmlspecialchars($row['article']);
$article = nl2br($article);
$email = $row['email'];
$name = $row['name'];
$homepage = $row['homepage'];
$refnum = $row['refnum'];
?>

    <table class="info_table">
      <tr>
        <td width="590" colspan="2"><b><?=$subject?></b></td>
      </tr>
      <tr>
        <td width="510">글쓴이&nbsp;:&nbsp;

      <?PHP
        if( $email )
          echo( "<a href=\"mailto:$email\">$name</a>" );
        else
          echo $name;

        if( $homepage )
          echo("&nbsp;&nbsp;&nbsp;<a href=\"http://$homepage\">
            [homepage]</a>" );
      ?>

        </td>
        <td width="90">조회:<?=$refnum?></td>
      </tr>
    </table>

    <table class="articel_table">
      <tr>
        <td><?=$article?></td>
      </tr>
    </table>
    
    <table>
      <tr align="right">
        <td><a href="<?=dest_url( "./edit.php", $page, $uid )?>">수정</a>
        <a href="<?=dest_url( "./reply.php", $page, $uid )?>">답변</a>
        <a href="<?=dest_url( "./delete.php", $page, $uid )?>">삭제</a>
        <a href="<?=dest_url( "./list.php" , $page )?>">목록</a></td>
      </tr>
    </table>
    <p style="margin-left:-545px">댓글</p>
    <table style="margin-top:-0px">

    <tr bgcolor="#D9E5FF">
        <td width="50" align="center"> 작성자 </td>
        <td width="470" align="center"> 내용 </td>
        <td width="100 "align="center"> 작성 날짜 </td>
        <td width="100"></td>
    </tr>
    <?php
        session_start();
        $query="SELECT * from reply where num=$uid ORDER BY UID ASC";
        $result=mysqli_query($con,$query);
        while ($row=mysqli_fetch_row($result)){ ?>
            <tr bgcolor="#D9E5FF">

                <td width="50" height="30" align="center"> <?php echo $row[1]; ?> </td>
                <td width="470"> <?php echo $row[0]; ?> </td>
                <td align="center"> <?php echo $row[2]; ?> </td>
                <td align="center"> 
                <?php if(isset($_SESSION['nickname'])){
                    if($row[1]==$_SESSION['nickname']){ ?>
                    <a href="delete_comment.php?num=<?php echo $uid;?>&page=<?php echo $page; ?>&reply_num=<?php echo $row[4];?>?>">삭제</a> 
                <?php }} ?> </td>
            </tr>
            
        
        <?php
        }
    ?>

    </table>
    <?php
    if(isset($_SESSION['nickname'])){ ?>
        <form action="new_comment.php" method="post" id="new-comment">
		    <input type="text" name="article"  placeholder="댓글"  >
            <input type="hidden" name="num" value=<?php echo $uid; ?>>
            <input type="hidden" name="page" value=<?php echo $page; ?>>
	        <input type="submit" value="등록" >
	    </form>
    <?php }else{ ?>
        <br> 댓글을 쓰려면 로그인을 해주세요.
    <?php } ?>

    

    </center>
  </body>
</html>
