<?php
    session_start();
    include "../include/dbconn.php";
    include "../include/sessionCheck.php";

    //b_idx가 넘어오지않았을 경우 방어처리
    if(!isset($_GET['b_idx'])){
        echo "<script>alert('잘못된 접근입니다.'); location.href='login.php'</script>";
    }
    $b_idx = $_GET['b_idx'];

    //조회수 증가
    $sql = "update tb_board set b_hit = b_hit + 1 where b_idx = $b_idx"; 
    $result = mysqli_query($conn, $sql);

    //해당 글 한 건 가져오기
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
    $b_file = $row['b_file'];

    $imgpath = "";
    if($b_file != ""){
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
    <script>
        //추천수 증가 후 화면 갱신
        function up(){
            const httpRequest = new XMLHttpRequest();
            httpRequest.onreadystatechange = function(){
                if(httpRequest.readyState == XMLHttpRequest.DONE && httpRequest.status == 200){
                    //ajax 통신이 제대로 이루어졌을 경우
                    document.getElementById("up").innerHTML = httpRequest.responseText;
                }
            };
            httpRequest.open("GET", "up_ok.php?b_idx=<?=$b_idx?>", true);
            httpRequest.send();
        }
    </script>
</head>
<body>
    <h2>글보기</h2>
    <p><b>글쓴이</b> : <?=$b_userid?></p>
    <p><b>날짜</b> : <?=$b_regdate?></p>
    <p><b>조회수</b> : <?=$b_hit?></p>
    <p><b>추천수</b> : <span id="up"><?=$b_up?></span></p>
    <p><b>제목</b> : <?=$b_title?></p>
    <p><b>내용</b></p>
    <p><?=$b_content?></p>
    <p><?=$imgpath?></p>
    <p><input type="button" value="리스트" onclick="location.href='./list.php'"> <button onclick="up()"><img src="./images/up.png"></button>
<?php
        //남의 글 수정 삭제 불가
        if($id == $b_userid){
?>
            <input type="button" value="수정" onclick="location.href='./edit.php?b_idx=<?=$b_idx?>'"> <input type="button" value="삭제" onclick="del(<?=$b_idx?>)">
<?php
        }
?>   
    </p>

    <!-- 댓글 달기 -->
    <form name="reform" method="post" action="reply_ok.php">
        <input type="hidden" name="b_idx" value="<?=$b_idx?>">
        <p><?=$id?> : <input type="text" name="re_content"> <input type="submit" value="댓글달기"></p>
    </form>

    <hr>

    <!-- 댓글 출력 -->
<?php
    $sql = "select * from tb_reply where re_boardidx = '$b_idx' order by re_idx desc";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_array($result)){
        $re_idx = $row['re_idx'];
        $re_userid = $row['re_userid'];
        $re_content = $row['re_content'];
        $re_regdate = $row['re_regdate'];
        $re_boardidx = $row['re_boardidx'];
?>
        <p><?=$re_userid?> - <?=$re_content?>(<?=$re_regdate?>)
<?php
        //남의 댓글 삭제 불가
        if($id == $re_userid){
?>
            <!-- b_idx를 같이 넘기는 이유는 댓글삭제 후 돌아올때 필요하기 때문 -->
            <input type="button" value="삭제" onclick="location.href='reply_del_ok.php?b_idx=<?=$b_idx?>&re_idx=<?=$re_idx?>'">
<?php
        }
?>       
        </p>
<?php
    }
?>
</body>
</html>
<script>

    function del(b_idx){
        const yn = confirm('삭제하시겠습니까?');
        if(yn){
            location.href='delete.php?b_idx=' + b_idx;
        }
    }

</script>