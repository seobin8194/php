<?php
    session_start();
    include "../include/dbconn.php";

    $idx = $_SESSION['idx'];
    $id = $_SESSION['id'];
    $name = $_SESSION['name'];

    $pw = $_POST['userpw'];
    $hp = $_POST['hp'];
    $email = $_POST['email'];
    $hobby = $_POST['hobby'];
    $hobbystr = "";
    foreach($hobby as $h){
        $hobbystr .= $h.",";
    } 
    $ssn1 = $_POST['ssn1'];
    $ssn2 = $_POST['ssn2'];
    $zipcode = $_POST['zipcode'];
    $address1 = $_POST['address1'];
    $address2 = $_POST['address2'];
    $address3 = $_POST['address3'];

    //비밀번호 확인
    $sql = "select mem_userpw from tb_member where mem_idx = $idx";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    if($row['mem_userpw'] == $pw){
        //정보수정
        $sql = "update tb_member set mem_email = '$email', mem_hp = '$hp', mem_hobby = '$hobbystr', mem_ssn1 = '$ssn1', mem_ssn2 = '$ssn2', mem_zipcode = '$zipcode', mem_address1 = '$address1', mem_address2 = '$address2', mem_address3 = '$address3' where mem_idx = '$idx'";
        $result = mysqli_query($conn, $sql);
        echo "<script>alert('수정완료'); location.href='modify.php';</script>";
    }else{
        echo "<script>alert('비밀번호가 틀렸습니다'); history.back();</script>";
    }
?>