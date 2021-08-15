<?php
    session_start();
    include "../include/dbconn.php";

    $userid = $_POST['userid'];
    $userpw = $_POST['userpw'];

    if(!$conn){
        echo "db연결실패";
    }else{
        $sql = "select mem_idx, mem_userid, mem_name from tb_member where mem_userid = '$userid' and mem_userpw = '$userpw'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result);

        if($row['mem_idx'] == ""){
            echo "<script>alert('아이디 또는 비밀번호를 확인하세요'); history.back();</script>";
        }else{
            $_SESSION['idx'] = $row['mem_idx'];
            $_SESSION['id'] = $row['mem_userid'];
            $_SESSION['name'] = $row['mem_name'];
            echo "<script>alert('로그인 성공'); location.href='./login.php';</script>";
        }
    }
?>