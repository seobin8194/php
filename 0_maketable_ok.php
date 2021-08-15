<?php
    $count = $_GET["count"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>테이블 만들기</title>
    <style>
        table {border: 3px solid red;}
        td {text-align: center; width: 300px; border: 3px solid gold;}
    </style>
</head>
<body>
    <table>
    <?php
        $i = 1;
        while($i <= $count){
    ?>
            <tr>
                <td><?=$i?>번째 셀</td>
            </tr>
    <?php    
            $i++;
        }
    ?>
    </table>
</body>
</html>