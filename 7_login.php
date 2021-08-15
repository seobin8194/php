<?php
    $userid = "";
    $saveid = "";
    if(isset($_COOKIE['userid'])){
        $userid = $_COOKIE['userid'];
        $saveid = "checked";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>로그인</title>
</head>
<body>
    <h2>로그인 화면</h2>
    <form method="post" action="7_login_ok.php">
        <!-- 이전 로그인에서 아이디 저장 체크 후 로그인했을 경우 로그인 아이디 표시 -->
        <p><label>아이디 : <input type="text" name="userid" value="<?=$userid?>"></label></p>
        <p><label>비밀번호 : <input type="password" name="userpw"></label></p>
        <p><label><input type="checkbox" name="saveid" value="y" <?=$saveid?>>아이디 저장</label></p>
        <p><input type="submit" value="로그인"></p>
    </form>  
</body>
</html>