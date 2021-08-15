<?php
    include '../include/dbconn.php';

    $sql = "select * from tb_board order by b_idx desc";
    $result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table border="1" width="800">
        <tr>
            <th>번호</th>
            <th>글쓴이</th>
            <th>제목</th>
            <th>조회수</th>
            <th>날짜</th>
        </tr>
<?php
        //select 결과가 여러개일때
        //반복돌때마다 레코드 1개씩
        while($row = mysqli_fetch_array($result)){
            $b_idx = $row['b_idx'];
            $b_userid = $row['b_userid'];
            $b_title = $row['b_title'];
            $b_hit = $row['b_hit'];
            $b_regdate = $row['b_regdate'];
?>
            <tr>
                <td><?=$b_idx?></td>
                <td><?=$b_userid?></td>
                <!-- view.php에서 클릭한 글 정보를 데이터베이스에서 가져오기 위해 글 번호를 같이 넘긴다 -->
                <td><a href='./view.php?b_idx=<?=$b_idx?>'><?=$b_title?></a></td>
                <td><?=$b_hit?></td>
                <td><?=$b_regdate?></td>
            </tr>
<?php
        }
?>       
    </table>
    <p><input type="button" value="글쓰기" onclick="location.href='./write.php'"> <input type="button" value="돌아가기" onclick="location.href='./login.php'"></p>
</body>
</html>