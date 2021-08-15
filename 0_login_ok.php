<?php
    $userId = $_POST["userId"];
    $userPw = $_POST["userPw"];

    $isLogin;
    if($userId == "admin" && $userPw == "1234"){
        $isLogin = true;
    }else{
        $isLogin = false;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    if($isLogin){
        echo "로그인 성공  ".$userId."님 환영합니다";
    }else{
?>
        <script>
            alert("로그인 실패!\n아이디와 비밀번호를 확인하세요");
            /*
                location.href='0_login.php' vs history.back()
                locaion.href는 새로운 페이지를 불러옴
                history.back()은 이전 페이지로 이동하며 캐시가 남음
            */
            history.back();
         </script>
<?php
    }
?>
</body>
</html>