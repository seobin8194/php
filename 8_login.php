<?php
    session_start();

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
<?php
    if(!isset($_SESSION['id'])){
?>
        <h2>로그인 화면</h2>
        <form method="post" action="8_login_ok.php">
            <p><label>아이디 : <input type="text" name="userid" value="<?=$userid?>"></label></p>
            <p><label>비밀번호 : <input type="password" name="userpw"></label></p>
            <p><label><input type="checkbox" name="saveid" value="y" <?=$saveid?>>아이디 저장</label></p>
            <p><input type="submit" value="로그인"></p>
        </form>  
<?php
    }else{
?>
        <h2>로그인 성공화면</h2>
        <p><?=$_SESSION['id']?>님 환영합니다</p>
        <p><a href='8_logout.php'>로그아웃</a></p>
<?php
    }
?>
</body>
</html>