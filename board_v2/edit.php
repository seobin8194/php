<?php
    session_start();
    include "../include/dbconn.php";
    include "../include/sessionCheck.php";

    //b_idx가 넘어오지않았을 경우 방어처리
    if(!isset($_GET['b_idx'])){
        echo "<script>alert('잘못된 접근입니다.'); location.href='login.php'</script>";
    }
    $b_idx = $_GET['b_idx'];

    $sql = "select * from tb_board where b_idx = '$b_idx'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);

    $b_userid = $row['b_userid'];
    //로그인 된 계정과 get으로 받은 아이디가 다를 경우 방어처리
    if($_SESSION['id'] != $b_userid){
        echo "<script>alert('잘못된 접근입니다.'); location.href='list.php'</script>";
    }

    $b_title = $row['b_title'];
    $b_content = $row['b_content'];
    $b_file = $row['b_file'];

    //첨부한 파일이 없는 사람은 impath가 ""이고 첨부한 사람은 첨부한 이미지를 가져온다
    $imgpath = "";
    if($row['b_file'] != ""){
        $imgpath = "<img src='".$b_file."' alt='file' width='60'>";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post" action="edit_ok.php" enctype="multipart/form-data">
        <input type="hidden" name="b_idx" value="<?=$b_idx?>">
        <p><label>아이디 : <?=$_SESSION['id']?></label></p>
        <p><label>제목 : <input type="text" name="b_title" value="<?=$b_title?>"></label></p>
        <p>내용</p>
        <p><textarea name="b_content" cols="40" rows="6"><?=$b_content?></textarea></p>
        <p><input type="file" name="b_file"><?=$imgpath?></p>
        <p><input type="submit" value="확인"> <input type="reset" value="다시작성"> <input type="button" value="리스트" onclick="location.href='./list.php'"></p>
    </form>
</body>
</html>