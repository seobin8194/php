<!-- 
    php 상수
    상수란 변수와 마찬가지로 데이터를 저장할 수 있는 메모리공간을 의미
    하지만 변수와 다른점은 한번 선언되고 데이터를 저장하면 그 데이터를 변경하거나 해제(undefined)할 수 없다

    define(상수이름, 값, 대소문자 구분 여부)
    대소문자 구분 여부 : true -> 대소문자 구분 x
 -->
 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>
 </head>
 <body>
 <?php
    //대소문자 구분 여부 생략시 false가 기본값
    define("php","안녕");
    echo php."<br>";
    //에러
    //echo PHP;

    define("num",100,true);
    echo num."<br>";
    echo NUM."<br>";
 ?> 
 </body>
 </html>