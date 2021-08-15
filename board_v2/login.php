<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    session_start();

    if(!isset($_SESSION['id'])){
?>
        <h2>로그인 화면</h2>
        <form method="post" action="login_ok.php">
            <p><label>아이디 : <input type="text" name="userid"></label></p>
            <p><label>비밀번호 : <input type="password" name="userpw"></label></p>
            <p><input type="submit" value="로그인"> <input type="button" value="회원가입" onclick="location.href='regist.php'"></p>
        </form>
<?php
    }else{
?>
        <h2>로그인 성공화면</h2>
        <h3><?=$_SESSION['id']?>님 환영합니다</h3>
        <p>
            <input type="button" value="로그아웃" onclick="location.href='./logout.php'"> 
            <input type="button" value="정보수정" onclick="location.href='./modify.php'"> 
            <input type="button" value="게시판 리스트" onclick="location.href='./list.php'">
        </p>
<?php
    }
?> 
</body>
</html>