<?php   
    //파일에 데이터추가
    //form에 입력한 댓글을 파일에 저장
    //post로 넘어 온 데이터가 있나요
    if($_POST != null){
        //텍스트 쓰기모드 : w->저장(덮어씀), a->추가저장(append)
        $fs = @fopen('reply.txt', "a") or exit("break");
        if($fs != null){
            $msg = $_POST['msg'];
            //파일에서 줄바꿈은 "\n"
            fputs($fs, $msg."\n");
            fclose($fs);
        }
    }

    //파일에서 데이터 읽기
    //파일에 담긴 댓글을 내림차순으로 가져온다
    $result = "";
    $fs = @fopen("reply.txt", "r") or exit("break");
    $i = 1;
    while(!feof($fs)){
        //htmlspecialchars : 특수문자를 html 태그형태로 변환
        //이 함수를 쓰지않으면 특수문자(\n)을 그대로 화면에 출력
        $msg = htmlspecialchars(fgets($fs));
        if($msg != ""){
            $result = $i++.">".$msg."<br/>".$result;
        }
    }
    fclose($fs);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>파일을 이용한 댓글</title>
</head>
<body>
    <h2>파일을 이용한 댓글</h2>
    <!-- 댓글 폼 -->
    <form method="post" action="./9_file(2).php">
        <p><label>댓글 : <input type="text" name="msg"></label> <input type="submit" value="확인"></p>
    </form>

    <hr/>

    <!-- 댓글 표시 -->
    <p><?=$result?></p>
</body>
</html>