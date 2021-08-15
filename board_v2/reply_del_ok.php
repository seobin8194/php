<?php
    session_start();
    include "../include/dbconn.php";
    include "../include/sessionCheck.php";

    $re_idx = $_GET['re_idx'];
    $b_idx = $_GET['b_idx'];
    echo $b_idx."<br>";
    echo $re_idx."<br>";

    $sql = "delete from tb_reply where re_idx = '$re_idx'";
    $result = mysqli_query($conn, $sql);

    echo "<script>alert('삭제'); location.href='view.php?b_idx=".$b_idx."';</script>";
?>