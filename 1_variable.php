<!-- 
    php 변수
    $변수명; // 변수선언
    $변수명 = 값; // 변수 초기화

    php 변수 종류
    1. 지역변수
       함수 내부에서 선언된 변수는 오직 함수 내에서만 사용할 수 있다
       함수 내부에서 선언된 변수는 함수 호출이 종료되면 메모리에서 삭제된다
    2. 전역변수
       함수 밖에서 선언된 변수는 함수 밖에서만 사용할 수 있다
       함수 밖에서 선언된 변수를 내부에서 사용하려면 global 키워드를 함께 사용해야한다
       * 전역변수를 사용하고자하는 함수마다 global을 선언해야한다
    3. 정적변수
       static 키워드로 선언된 변수를 의미
       tomcat이 꺼지기 전까지 값이 힙영역에 저장되어 있다
       함수 내부에서 선언된 정적변수는 함수의 호출이 종료되도 메모리에서 사라지지 않는다
       공용변수로 사용한다
       정적변수를 많이 사용하면 사용자수가 많을때 서버 속도가 느려질 수 있다
       * 정적변수여도 전역에서 사용할 수 없다
    4. 슈퍼 글로벌 변수
       미리 정의된 전역변수인 슈퍼 글로벌 변수
       특별한 선언없이 스크립트 내 어디서든 바로 사용가능
       $_GET, $_POST, $_COOKIE, $_SESSION, ...
 -->

 <?php
    $name = "김사과";
    $age = 20;
    $job = "학생";
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="./js/login.js"></script>
</head>
<body>
<!-- 출력방법 -->
<?php
//  연결연산자 : php에서 문자열을 연결할 경우 .을 이용
    echo("<h3>".$name."님 안녕하세요</h3>");
?>   
    <p><?=$name?>님의 나이는 <?=$age?>살 입니다</p>
<?php
    echo "<p>{$name}님의 직업은 {$job}입니다</p>"
?>

<!-- 지역변수와 전역변수 -->
<?php
    $num1 = 5;
    function func1(){
        $num2 = 10;
        echo "함수 내에서 호출한 지역변수 num2 값은 {$num2}<br>";
        global $num1;
        echo "함수 내에서 호출한 전역변수 num1 값은".$num1."입니다<br>";
    }
    //전역변수를 사용하고자하는 함수마다 global을 선언해야한다
    function func2(){
        global $num1;
        echo "함수 내에서 호출한 전역변수 num1 값은".$num1."입니다<br>"; 
    }
    func1();
    func2();
    echo "함수 밖에서 호출한 전역변수 num1 값은 {$num1}입니다<br>";
?>

<!-- 정적변수 -->
<?php
    function counter(){
        static $cnt = 1;
        echo "변수 cnt 값은 {$cnt}<br>";
        $cnt++;
    }
    //함수를 호출하여 변경된 값이 함수가 종료되도 저장되어 있으므로 변경된 값을 가지고 또 작업할 수 있다
    counter();
    counter();

    //정적변수여도 전역에서 사용할 수 없다
    //echo $cnt;
?>

<!-- 슈퍼 글로벌 변수 -->
    <!-- formcheck를 submit button에 onclick()으로 거르는것보다 form태그에서 onsubmit()으로 거르는게 좋은 이유는 엔터를 쳤을때도 formcheck 가능하기 때문이다 -->
    <!-- php에서 거르지 않고 자바스크립트로 미리 거르는 이유는 서버에게 부담을 덜 주기위함 -->

    <!-- <form method="get" action="1_variable_ok.php"> -->
    <form method="post" action="1_variable_ok.php" onsubmit="return sendit()">
        <p><label>아이디 : <input type="text" name="userid" id="userid"></label></p>
        <p><label>비밀번호 : <input type="password" name="userpw" id="userpw"></label></p>
        <p><input type="submit" value="로그인"></p>
    </form>
</body>
</html>