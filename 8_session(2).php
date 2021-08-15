<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>세션</title>
</head>
<body>
    <!-- 8_session(1).php에서 저장한 세션변수는 24분동안은 유효 -->
    <p>세션 id : <?=session_id()?></p>
    <p>세션 id 변수의 값 : <?=$_SESSION['id']?></p>
    <p>세션 name 변수의 값 : <?=$_SESSION['name']?></p>  
</body>
</html>