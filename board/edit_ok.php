<?php
    session_start();
    include "../include/dbconn.php";

    $b_idx = $_POST['b_idx'];
    $b_title = $_POST['b_title'];
    $b_content = $_POST['b_content'];
    //echo $b_idx."<br>".$b_title."<br>".$b_content;

    $sql = "update tb_board set b_title = '$b_title', b_content = '$b_content' where b_idx = '$b_idx'";
    $result = mysqli_query($conn, $sql);
    echo "<script>alert('수정완료'); location.href='view.php?b_idx=".$b_idx."';</script>";
?>