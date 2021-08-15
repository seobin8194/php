<!-- 
    내장함수 - 문자열함수
    strlen() : 전달받은 문자열의 길이를 반환
    strcmp() : 전달받은 문자열을 서로 비교. 첫번째 인수의 문자열이 두번째 인수의 문자열보다 크면 양수, 작으면 음수, 같으면 0을 반환(아스키 코드 기준)
               운영체제에 따라 결과 값이 달라질 수 있므로 if(strcmp()>0) 처럼 양수인지 음수인지로 검사한다
    strstr() : 해당 문자열에서 전달받은 문자열과 처음으로 일치하는 부분을 찾는다
               일치하는 부분이 존재하면 처음으로 일치하는 부분을 포함한 이후 모든 문자를 반환
    strpos() : 해당 문자열에서 전달받은 문자열과 처음으로 일치하는 부분의 시작 인덱스를 반환
    substr() : 해당 문자열에서 특정 인덱스부터 전달받은 길이만큼 일부분을 추출하여 반환
               전달받은 인덱스가 양수인 경우 해당 문자열의 끝까지를 반환하고 
               전달받은 인덱스가 음수라면 해당 문자열 끝부터 전달받은 음수의 절대값만큼의 문자열을 반환
    strtolower() : 전달받은 문자열의 모든 문자를 소문자로 변환
    strtoupper() : 전달받은 문자욜의 모든 문자를 대문잘 변환
    explode() : 특정 문자를 기준으로 전달받은 문자열을 나눠서 하나의 배열로 반환
    str_replace() : 해단 문자열에서 전달받은 문자열을 모두 찾고 찾은 문자열을 대체 문자열로 교체
    substr_replace() : 해당 문자열에서 특정 위치의 문자들을 대체 문자열로 교체
 -->
 <?php
    $str1 = "abcdefg12345";
    $str2 = "가나다라마바사 문자열";
    $str3 = "hello,php,hello,world";
 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>
 </head>
 <body>
 <?php
    echo "strlen(str1) : ".strlen($str1)."<br>";//12 : 영문자 숫자 특수문자는 1바이트
    echo "strlen(str2) : ".strlen($str2)."<br>";//31 : 한글은 3바이트
    echo "<br>";

    echo strcmp("abc","ABC")."<br>";//1 : 아스키코드기준으로 앞자리 비교해서 a>A
    echo strcmp("2","10")."<br>";//1 : 아스키코드기준으로 앞자리 비교해서 2>1
    echo strcmp("10","10")."<br>";//0 : 같다
    echo "<br>";

    echo strstr($str1, "cd")."<br>";//cd1234 : cd부터 끝까지
    echo strstr($str1, "abc")."<br>";//abcd1234 : abc부터 끝까지
    echo strstr($str1, "1234")."<br>";//1234 : 1234부터 끝까지
    echo strstr($str1, "ABC")."<br>";//안나옴 : 일치하는 문자없음
    echo "<br>";

    echo strpos($str1, "c")."<br>";//2
    echo "<br>";

    echo substr($str1, 3)."<br>";//d1234 : 인덱스3부터 끝까지
    echo substr($str1, -3)."<br>";//234 : 끝에서 3개
    echo substr($str1, 1, 5)."<br>";//bcd12 : 인덱스1부터 5개
    echo substr($str1, 1, -3)."<br>";//bcd1 : 인덱스1부터 끝에 3개빼고
    echo "<br>";

    echo strtolower("Hello");
    echo strtoupper("Hell0");
    echo "<br>";

    $arr = explode(",", $str3);//"Hello"($arr[0]) "php"($arr[1]) "Hello"($arr[2]) "World!"($arr[3])
    foreach($arr as $word){
        echo $word."  ";
    }
    echo "<br>";

    echo str_replace("o", "*", $str3)."<br>";//hell*,php,hell*,w*rld
    echo "<br>";

    echo substr_replace($str3, "*", 2)."<br>";//he* : 2자만 허용하고 나머지 *
    echo substr_replace($str3, "*", -2)."<br>";//hello,php,hello,wor* : 끝에서 2자를 *
    echo substr_replace($str3, "*", 2, 4)."<br>";//he*php,hello,world : 2부터 4글자 *
 ?>  
 </body>
 </html>