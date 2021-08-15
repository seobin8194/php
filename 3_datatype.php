<!-- 
    php 데이터 타입
    1. 정수(Integer)
       정수는 부호를 가지는 소수부가 없는 수를 말한다
       php에서 정수의 표현범위는 운영체제에 따라 달라지며 64비트 운영체제 기준으로 약 -21억 ~ 21억 사이의 값을 가진다
    2. 실수(Float)
       실수는 소수부나 지수부를 가지는 수를 말한다
       정수보다 넓은 표현범위를 갖는다
    3. 불린형(Boolean)
       불리언은 참(true) 거짓(false)을 표현
       php에서 불리언은 상수인 true와 false를 이용하여 나타내며 대소문자를 구분하지 않는다
       true false값 이 외 모든 값은 true로 인식하고 0은 false로 인식
       -> 자료가 있냐 없냐 판단할때 유용
    4. 문자열형
       문자열은 일련의 연속된 문자들의 집합
       php에서 문자열 리터럴은 ""나 ''로 감싸서 표현
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
//  var_dump(변수) : 변수의 정보를 출력
    var_dump((bool)false);//bool(false)
    echo "<br>";

    var_dump((int)1);//int(1)
    echo "<br>";

    //한글은 3바이트 취급한다
    var_dump("안녕하세요");//string(15) "안녕하세요"
    echo "<br>";
    
    $num = 10;
    var_dump($num);//int(10)
 ?>   
 </body>
 </html>