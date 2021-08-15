<?php
    session_start();
    include "../include/dbconn.php";

    $id = $_SESSION['id'];
    $b_title = $_POST['b_title'];
    $b_content = $_POST['b_content'];

    $sql = "insert into tb_board(b_userid, b_title, b_content) values ('$id','$b_title','$b_content')";
    $result = mysqli_query($conn, $sql);
    echo "<script>alert('저장되었습니다'); location.href='list.php';</script>";
?>