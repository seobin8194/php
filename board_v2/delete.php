<?php
    session_start();
    include "../include/dbconn.php";

    //b_idx가 넘어오지않았을 경우 방어처리
    if(!isset($_GET['b_idx'])){
        echo "<script>alert('잘못된 접근입니다.'); location.href='login.php'</script>";
    }

    $b_idx = $_GET['b_idx'];
    $loginMem = $_SESSION['id'];
    
    $sql = "delete from tb_board where b_idx = $b_idx and b_userid = '$loginMem'";
    $result = mysqli_query($conn, $sql);

    //글쓴이와 다른계정으로 로그인 사람이 삭제하려고 하는 경우 방어처리
    if(mysqli_affected_rows($conn) > 0){
        echo "<script>alert('삭제되었습니다'); location.href='list.php';</script>";
    }else{
        echo "<script>alert('잘못된 접근입니다.'); location.href='login.php'</script>";
    } 
?>