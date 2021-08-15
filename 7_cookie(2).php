<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cookie 불러오기</title>
</head>
<body>
<?php
    //쿠키 읽어오기
    //isset() : 데이터가 존재하는지 여부를 판단 true/false 반환
    if(!isset($_COOKIE['userid'])){
        echo "<p>쿠키가 존재하지 않습니다</p>";
    }else{
        echo "<p>쿠키가 존재합니다</p>";
        echo "<p>저장된 쿠키 값은".$_COOKIE['userid']."</p>";
    }
?>    
</body>
</html>