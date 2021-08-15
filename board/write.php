<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post" action="write_ok.php">
        <!-- 글 작성자는 현재 로그인 id와 동일 -->
        <p><label>아이디 : <?=$_SESSION['id']?></label></p>
        <p><label>제목 : <input type="text" name="b_title"></label></p>
        <p>내용</p>
        <p><textarea name="b_content" cols="40" rows="6"></textarea></p>
        <p><input type="submit" value="확인"> <input type="reset" value="다시작성"> <input type="button" value="리스트" onclick="location.href='./list.php'"></p>
    </form>
</body>
</html>