<!-- 
    php 파일
    readfile() : 파일에서 데이터를 한줄에 읽어오는 함수
                 echo() 함수 필요없음 -> 텍스트를 표시할 위치에 이 함수를 사용하면 읽어 온 내용을 그대로 출력
    file() : 매개변수에 지정된 파일을 읽어들여 한줄씩 나누어 배열에 저장

    fopen() : file() 함수보다 유연한 코드를 작성하기 위한 함수로 모드를 설정하여 여러가지 파일에 대한 처리를 할 수 있다
    * 모드
      r : 읽기전용
      w : 쓰기전용
      a : 쓰기, 파일내용을 보존, 파일이 없으면 새로 생성
    fgets() : fopen() 함수로 open한 파일의 데이터를 읽어온다
    fputs() : fopen() 함수로 open한 데이터를 저장한다


    파일로드시 실패할 가능성이 있는 경우
    $변수 = @file(파일경로) or 실패했을 경우 처리할 문장
    @기호를 사용하면 실행시 에러가 나더라도 스크립트를 중단하지 않고 화면에 에러를 발생시키지 않는다
 -->
 <?php
    //file()
     $res = "";
     $lines = @file("data.txt") or $res = "파일을 읽을 수 없습니다";
     if($lines != null){
         for($i = 0; $i < count($lines); $i++){
             $res .= ($i + 1)." : ".$lines[$i]."<br>";
         }
     }

     //file()을 이용한 전화부
     $res2 = "";
     $lines2 = @file("tel.txt") or $res2 = "파일을 읽을 수 없습니다";
      /*
        $lines[0] = "김사과,서울 서초구,010-1111-1111";
        $lines[1] = "오렌지,서울 강남구,010-2222-2222";
        ...
        <tr>
            <td>1</td>
            <td>김사과</td>
            <td>서울 서초구</td>
            <td>010-1111-1111</td>
        </tr>
    */
     if($lines2 != null){
         for($i = 0; $i < count($lines2); $i++){
             $res2 .= "<tr>";
             $arr = explode(",", $lines2[$i]);
             $res2 .= "<td>".($i + 1)."</td>";
             for($j = 0; $j < count($arr); $j++){
                $res2 .= "<td>".$arr[$j]."</td>";
             }
             $res2 .= "</tr>";
         }
     }

     //fopn() & fgets()
     //파일을 읽지 못하면 프로그램을 끝내라
     $fs = @fopen("tel.txt", "r") or exit("BREAK");
     $res3 = "";
     //feof() : 파일의 끝을 확인하는 함수
     while(!feof($fs)){
         //10바이트씩 읽어옴, 두번째 매개변수를 지정하지 않으면 1줄씩 읽는다
         $res3 .= fgets($fs, 10);
     }
     fclose($fs);
?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>
     <style>
        table {border: 3px solid red; border-collapse: collapse}
        td, th {width: 300px; height: 30px; border: 3px solid red;}
    </style>
 </head>
 <body>
     <!-- readfile() -->
     <p><?php readfile("data.txt"); ?></p>

     <!-- file() -->
     <p><?= $res ?></p>

     <!-- file()을 이용한 전화부 -->
     <table>
        <tr>
            <th>번호</th>
            <th>이름</th>
            <th>주소</th>
            <th>연락처</th>
        </tr>
        <?=$res2?>
     </table>

     <!-- fopen() & fgets() -->
     <p><?=$res3?></p>
 </body>
 </html>