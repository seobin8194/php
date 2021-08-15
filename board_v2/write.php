<?php
    session_start();
    include "../include/sessionCheck.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>게시판 글 작성</title>
</head>
<body>
    <h2>게시판 글 작성하기</h2>

    <!-- enctype="multipart/form-data : form을 이용하여 파일을 보낼때 반드시 작성 -->
    <form method="post" action="write_ok.php" enctype="multipart/form-data">
        <p><label>아이디 : <?=$_SESSION['id']?></label></p>
        <p><label>제목 : <input type="text" name="b_title"></label></p>
        <p>내용</p>
        <p><textarea name="b_content" cols="40" rows="6"></textarea></p>
        <p>파일 : <input type="file" name="b_file"></p>
        <p><input type="submit" value="확인"> <input type="reset" value="다시작성"> <input type="button" value="리스트" onclick="location.href='./list.php'"></p>
    </form>
    
</body>
</html>