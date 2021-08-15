<?php
    session_start();
    include '../include/dbconn.php';
    include "../include/sessionCheck.php";

    $sql = "select * from tb_board order by b_idx desc";
    $result = mysqli_query($conn, $sql);
    $pageTotal = $result->num_rows;//총 글 개수
    $pageSize = 5;//한 페이지에 보여줄 글 개수
    $start = 0;//요청한 페이지
    if(isset($_GET['start'])){
        $start = $_GET['start'];
    }

    //limit 인덱스, 개수 : 인덱스부터 개수만큼 가져온다
    $sql = "select * from tb_board order by b_idx desc limit $start, $pageSize";
    $result = mysqli_query($conn, $sql);
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
    <p>전체 게시물 : <?=$pageTotal?></p>
    <table border="1" width="800">
        <tr>
            <th>번호</th>
            <th>글쓴이</th>
            <th>제목</th>
            <th>조회수</th>
            <th>날짜</th>
            <th>추천수</th>
        </tr>
<?php
        //while(mysqli_fetch_array($result)){ ... }: 반복문 실행할때마다 커서를 옮기면서 레코드 한 건을 배열 형태로 저장한다
        while($row = mysqli_fetch_array($result)){
            $b_idx = $row['b_idx'];
            $b_userid = $row['b_userid'];
            $b_title = $row['b_title'];
            $b_hit = $row['b_hit'];
            $b_regdate = $row['b_regdate'];
            $b_up = $row['b_up'];
            $b_file = $row['b_file'];

            $imgpath = "";
            if($row['b_file'] != ""){
                $imgpath = "<img src='./images/file.png' alt='file' width=16>";
            }
?>
            <tr>
                <td><?=$b_idx?></td>
                <td><?=$b_userid?></td>
                <!-- 파일첨부한 글 표시 -->
                <td><a href='./view.php?b_idx=<?=$b_idx?>'><?=$b_title?> <?=$imgpath?></a> </td>
                <td><?=$b_hit?></td>
                <td><?=$b_regdate?></td>
                <td><?=$b_up?></td>
            </tr>
<?php
        }
?>
    </table>
    <!-- 페이징 -->
    <p>
<?php
        //select * from tb_board order by b_idx desc limit ((page번호-1)*3) 3; //1페이지 요청 -> 0부터 3개
        //select * from tb_board order by b_idx desc limit (1*3) 3; //2페이지 요청 -> 3부터 3개
        //select * from tb_board order by b_idx desc limit (2*3) 3; //3페이지 요청 -> 6부터 3개
        $pages = $pageTotal/$pageSize;
        for($i = 0; $i < $pages; $i++){
            $pageNum = $i + 1;
            $page = $pageSize * $i;
            //$_SERVER[PHP_SELF] : 현재 페이지
            //start에 0,3,6과 같은 값을 전달해야한다
            echo "<a href=$_SERVER[PHP_SELF]?start=$page>[$pageNum]</a>";
        }
?>
    </p>
    <p><input type="button" value="글쓰기" onclick="location.href='./write.php'"> <input type="button" value="돌아가기" onclick="location.href='./login.php'"></p>
</body>
</html>