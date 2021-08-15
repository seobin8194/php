<!-- 
    함수
    하나의 특별한 목적을 수행하도록 설계된 독립적인 블록을 의미
    function 함수명(매개변수, 매개변수2, ..){
        함수가 호출되었을때 실행할 코드
    }

    함수명(값1, 값2, ..);
 -->
 <?php
    //계산하는 함수를 파일로 저장하고 ui에서는 이 파일을 include하여 사용한다
    include "./lib/function.php";
 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>함수</title>
 </head>
 <body>
 <?php
    print_string();
    print_sum(1,2);
    $res = get_sum(1,2);
    echo "1 + 2 = ".$res;
 ?> 
 </body>
 </html>
