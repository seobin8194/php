<!-- 
    배열
    배열 만드는 방법
    $배열명 = array(요소1, 요소2, ..)
                    ----   ----
                   인덱스1 인덱스2
    stack영역에 첫번째 요소의 주소를 저장하고 힙영역에 실제 배열이 만들어진다

    배열에 데이터 넣기
    $배열명[인덱스] = 값

    배열 데이터 출력
    echo($arr[0])

    배열 순회하기
    foreach(배열명 as 변수){
        베열요소의 개수만큼 반복할 문장
        변수에 해당 배열요소의 값이 들어간다
    }
 -->
 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>배열</title>
 </head>
 <body>
    <?php
    $arr = array("김사과","오렌지","이메론");
    ?>
    <h2>배열</h2>
    <table boreder="1" width="300">
    <?php
    foreach($arr as $name){
    ?>
        <tr>
            <td><?=$name?></td>
        </tr>
    <?php    
    }
    ?>
    </table>
 </body>
 </html>