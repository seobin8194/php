<?php
    session_start();
    include "../include/dbconn.php";
    include "../include/sessionCheck.php";

    $id = $_SESSION['id'];
    $re_content = $_POST['re_content'];
    $b_idx = $_POST['b_idx'];

    $sql = "insert into tb_reply(re_userid, re_content, re_boardidx) values('$id','$re_content','$b_idx')";
    $result = mysqli_query($conn, $sql);
    echo "<script>alert('댓글저장'); location.href='view.php?b_idx=".$b_idx."'</script>";

?>