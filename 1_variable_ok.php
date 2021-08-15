<!-- 
    데이터 전송방식
    1. get 방식
       url에 변수(데이터)를 포함하여 전송
       url에 변수(데이터)가 노출되어 보안에 취약
       전송하는 길이에 제약이 있다
       속도가 빠르다
       캐싱할 수 있음 
       -> 히스토리가 남아서 다른 페이지 갔다가 이전 페이지로 돌아오면 데이터가 그대로 남아있다
       예) 네이버 검색
       https://search.naver.com/search.naver?where=nexearch&sm=top_hty&fbm=1&ie=utf8&query=%EB%82%98%EB%93%A4%EC%9D%B4
       -> ? 뒤에 "키 = 값"구조로 데이터를 전달한다
       -> "키=값" == "요소의 name=요소의 value"
       -> 2개 이상의 데이터를 전달할때 "&"로 연결하여 전달한다
    2. post 방식
       url에 변수(데이터)를 노출하지 않고 전송
       url에 데이터가 노출되지 않아 기본 보안은 지켜진다
       전송하는 길이에 제한이 없다
       get 방식보다 속도가 느리다
       캐싱할 수 없다 
       -> 히스토리가 안 남아서 get방식은 이전 페이지로 이동할 수 있는 반면에 post방식은 이전 페이지로 이동하면 "만료된 페이지입니다"와 같은 화면이 나온다
 -->

 
 <?php
    //get 방식으로 넘어 온 데이터를 받는다
    // $id = $_GET['userid'];
    // $pw = $_GET['userpw'];

    //post 방식으로 넘어 온 데이터를 받는다
    $id = $_POST['userid'];
    $pw = $_POST['userpw'];
 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>
 </head>
 <body>
    <p>입력한 아이디는 <?=$id?>이고 비밀번호는 <?=$pw?></p>
 </body>
 </html>
