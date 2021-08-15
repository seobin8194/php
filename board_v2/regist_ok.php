<?php
    include "../include/dbconn.php";

    $userid = $_POST['userid'];
    $userpw = $_POST['userpw'];
    $username = $_POST['username'];
    $hp = $_POST['hp'];
    $email = $_POST['email'];
    $hobby = $_POST['hobby'];
    $hobbystr = "";
    //등산v 쇼핑v -> 등산,쇼핑
    foreach($hobby as $h){
        $hobbystr .= $h.",";
    }
    $ssn1 = $_POST['ssn1'];
    $ssn2 = $_POST['ssn2'];
    $zipcode = $_POST['zipcode'];
    $address1 = $_POST['address1'];
    $address2 = $_POST['address2'];
    $address3 = $_POST['address3'];

    if(!$conn){
        echo "db 연결실패";
    }else{
        $sql = "insert into tb_member(mem_userid, mem_userpw, mem_name, mem_hp, mem_email, mem_hobby, mem_ssn1, mem_ssn2, mem_zipcode, mem_address1, mem_address2, mem_address3) values('$userid','$userpw','$username','$hp','$email','$hobbystr','$ssn1','$ssn2','$zipcode','$address1','$address2','$address3')";
        $result = mysqli_query($conn, $sql);
        echo "<script>alert('가입완료'); location.href='./login.php'; </script>";
    }
?>