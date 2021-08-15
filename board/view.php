<?php
    session_start();
    include "../include/dbconn.php";

    $b_idx = $_GET['b_idx'];

    //조회수 증가
    $sql = "update tb_board set b_hit = b_hit + 1 where b_idx = $b_idx";
    $result = mysqli_query($conn, $sql);

    $sql = "select * from tb_board where b_idx = $b_idx";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);

    $id = $_SESSION['id'];//세션 아이디
    $b_userid = $row['b_userid'];//글쓴이
    $b_title = $row['b_title'];
    $b_content = $row['b_content'];
    $b_hit = $row['b_hit'];
    $b_up = $row['b_up'];
    $b_regdate = $row['b_regdate'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>글 보기</h2>
    <p><b>글쓴이</b> : <?=$b_userid ?></p>
    <p><b>날짜</b> : <?=$b_regdate?></p>
    <p><b>조회수</b> : <?=$b_hit?></p>
    <p><b>추천수</b> : <?=$b_up?></p>
    <p><b>제목</b> : <?=$b_title?></p>
    <p><b>내용</b></p>
    <p><?=$b_content?></p>
    <p><input type="button" value="리스트" onclick="location.href='./list.php'">
    <?php
        //남의 글은 수정삭제 불가
        if($id == $b_userid){
    ?>
            <!-- 해당 글을 수정하거나 삭제해야하므로 해당 글 번호를 같이 넘긴다 -->
            <input type="button" value="수정" onclick="location.href='./edit.php?b_idx=<?=$b_idx?>'">
            <input type="button" value="삭제" onclick="location.href='./delete.php?b_idx=<?=$b_idx?>'"></p>
    <?php
        }else{
    ?>
            </p>
    <?php
        }
    ?>
</body>
</html>