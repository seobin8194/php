<?php
    session_start();
    include "../include/dbconn.php";

    $b_idx = $_GET['b_idx'];

    $sql = "select * from tb_board where b_idx = $b_idx";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);

    $b_title = $row['b_title'];
    $b_content = $row['b_content'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post" action="edit_ok.php">
        <!-- 해당 글을 수정하기 위해서 해당 글 번호를 같이 보낸다 -->
        <input type="hidden" name="b_idx" value="<?=$b_idx?>">
        <p><label>아이디 : <?=$_SESSION['id']?></label></p>
        <p><label>제목 : <input type="text" name="b_title" value="<?=$b_title?>"></label></p>
        <p>내용</p>
        <p><textarea name="b_content" cols="40" rows="6"><?=$b_content?></textarea></p>
        <p><input type="submit" value="확인"> <input type="reset" value="다시작성"> <input type="button" value="리스트" onclick="location.href='./list.php'"></p>
    </form>
</body>
</html>