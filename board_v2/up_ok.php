<?php
    session_start();
    include "../include/dbconn.php";
    include "../include/sessionCheck.php";

    $b_idx = $_GET['b_idx'];

    $sql = "update tb_board set b_up = b_up + 1 where b_idx = '$b_idx'";
    $result = mysqli_query($conn, $sql);

    $sql = "select b_up from tb_board where b_idx = '$b_idx'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    echo $row['b_up'];
?>