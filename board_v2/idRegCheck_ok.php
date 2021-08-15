<?php
    include "../include/dbconn.php";
    $mem_userid = $_GET['mem_userid'];

    if(!$conn){
        echo "db연결실패";
    }else{
        $sql = "select mem_idx from tb_member where mem_userid='$mem_userid'";

        //select 결과 객체를 리턴
        //select 결과가 없다면 열 이름만 존재
        $result = mysqli_query($conn, $sql);

        //sql 실행한 결과를 배열로 변환
        $row = mysqli_fetch_array($result);

        if($row['mem_idx']){
            //아이디 있음
            echo "y";
        }else{
            //아이디 없음
            echo "n";
        }
    }
?>