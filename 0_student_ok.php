<?php
    $hakbun = $_POST["hakbun"];
    $name = $_POST["name"];
    $kor = $_POST["kor"];
    $math = $_POST["math"];
    $eng = $_POST["eng"];

    $tot = $kor + $math + $eng;
    $avg = $tot / 3;

    $hak = "";
    if($avg >= 90){
        $hak = "A";
    }else if($avg >= 80){
        $hak = "B";
    }else if($avg >= 70){
        $hak = "C";
    }else if($avg >= 60){
        $hak = "d";
    }else{
        $hak = "F";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>학생 성적 프로그램</title>
</head>
<body>
<h2>
<?php
    echo "<h3>".$name."님의 성적표</h3>";
?>
</h2>
<p>학번 : <?=$hakbun?></p>
<p>이름 : <?=$name?></p>
<p>국어 : <?=$kor?></p>
<p>수학 : <?=$math?></p>
<p>영어 : <?=$eng?></p>
<p>총점 : <?=$tot?></p>
<p>평균 : <?=$avg?></p> 
<p>학점 : <?=$hak?></p>
</body>
</html>