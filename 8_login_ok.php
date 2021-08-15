<?php
    session_start();
    $userid = $_POST['userid'];
    $userpw = $_POST['userpw'];
    $saveid = "";
    if(isset($_COOKIE['userid'])){
        $userid = $_COOKIE['userid'];
        $saveid = "checked";
    }

    if($userid == 'admin' && $userpw == '1234'){
        if($saveid == 'y'){
            setcookie('userid', $id, time()+(60*60*24), "/");
        }
        $_SESSION['id'] = $userid;
        echo "<script>alert('로그인'); location.href='8_login.php';</script>"; 
    }else{
        echo "<script>alert('아이디 또는 비밀번호를 확인하세요'); history.back();</script>";
    }
?>