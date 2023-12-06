<html>
    <head>
        <link rel="stylesheet" type="text/css" href="./common_style.css">
        <style>
            .ques_head{
                background-color: #F9E79D;
                text-align: center;
            }
            .input_td{
                background-color: #FEFCE2;
            }
        </style>
    </head>
    <body>
        <center>
            <table>
            <?PHP
                include("./functions.php");
                include("./config.php");

                $uid = isset($_GET['uid']) ? (int)$_GET['uid'] : 0;
                $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        
                $query = "select name, subject, article from board where uid=$uid";
                $result = mysqli_query($con, $query);
                list($name, $subject, $article) = mysqli_fetch_array($result);
            ?>
            <form name="edit_form" method="post" action="<?=dest_url("./edit_db.php", $page, $uid)?>">
            <tr> <td class="ques_head">글쓴이</td>
                <td class="input_td"><?=$name?></td>
            </tr>
            <tr>
                <td class="ques_head">제목</td>
                <td class="input_td">
                    <input type="text" name="subject" value="<?=$subject?>" size="50"maxsize="255"></td>
            </tr>
            <tr>
                <td class="ques_head">내용</td>
                <td class="input_td">
                    <textarea name="article" cols="60" rows="20">
                        <?=$article?>
                    </textarea>
                </td>
            </tr>
        </table>
        
        <table>
            <tr>
                <td width="100"><a href="javascript:history.back()">뒤로</a></td>
                <td align="center"><input type="submit" value="수정"></td>
                <td width="100" align="right">
                    <a href="<?=dest_url("./list.php", $page)?>">목록</a></td>
            </tr>
        </table>
        </center>        
        </form>
    </body>
</html>