<?php
    session_start();
    include "../include/dbconn.php";
    include "../include/sessionCheck.php";

    $idx = $_SESSION['idx'];
    $id = $_SESSION['id'];
    $name = $_SESSION['name'];

    //*을 컬럼명으로 변경
    $sql = "select * from tb_member where mem_idx = $idx";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);

    $email = $row['mem_email'];
    $ssn1 = $row['mem_ssn1'];
    $ssn2 = $row['mem_ssn2'];
    $hp = $row['mem_hp'];
    $hobby = $row['mem_hobby'];//드라이브,등산
    $hobbyarr = explode(",", $hobby);//hobbyarr[0]='드라이브' hobbyarr[1]='등산'
    $zipcode = $row['mem_zipcode'];
    $address1 = $row['mem_address1'];
    $address2 = $row['mem_address2'];
    $address3 = $row['mem_address3'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="./js/modifyScript.js"></script>
    <script src="https://t1.daumcdn.net/mapjsapi/bundle/postcode/prod/postcode.v2.js"></script>
    <script>
        function sample6_execDaumPostcode() {
            new daum.Postcode({
                oncomplete: function(data) {
                    var addr = ''; 
                    var extraAddr = '';

                    if (data.userSelectedType === 'R') {
                        addr = data.roadAddress;
                    } else { 
                        addr = data.jibunAddress;
                    }

                    if(data.userSelectedType === 'R'){
                        if(data.bname !== '' && /[동|로|가]$/g.test(data.bname)){
                            extraAddr += data.bname;
                        }
                        if(data.buildingName !== '' && data.apartment === 'Y'){
                            extraAddr += (extraAddr !== '' ? ', ' + data.buildingName : data.buildingName);
                        }
                        if(extraAddr !== ''){
                            extraAddr = ' (' + extraAddr + ')';
                        }
                        document.getElementById("sample6_extraAddress").value = extraAddr;
                    
                    } else {
                        document.getElementById("sample6_extraAddress").value = '';
                    }

                    document.getElementById('sample6_postcode').value = data.zonecode;
                    document.getElementById("sample6_address").value = addr;
                    document.getElementById("sample6_detailAddress").focus();
                }
            }).open();
        }
    </script>
</head>
<body>
    <form name="regForm" id="regForm" action="./modify_ok.php" method="post" onsubmit="return sendit()">
        <input type="hidden" name="isSSN" id="isSSN" value="false">
        <!-- 아이디는 변경 불가 -->
        <p><label>아이디 : <b><?=$id?></b></label></p>
        <p><label>비밀번호 : <input type="password" name="userpw" id="userpw" maxlength="20"></label></p>
        <p><label>비밀번호 확인 : <input type="password" name="userpw_re" id="userpw_re" maxlength="20"></label></p>
        <!-- 이름 변경 불가 -->
        <p>이름 : <b><?=$name?></b></p>
        <p><label>휴대폰 번호 : <input type="text" name="hp" id="hp" value="<?=$hp?>"></label></p>
        <p><label>이메일 : <input type="text" name="email" id="email" value="<?=$email?>"></label></p>
        <p>취미 : 
            <label>여행 <input type="checkbox" name="hobby[]" value="여행"
                <?php
                     //in_array() : 배열에 특정 값이 존재하는지
                    if(in_array("여행", $hobbyarr)){
                ?>
                        checked
                <?php
                    }
                ?>
            ></label>
            <label>드라이브 <input type="checkbox" name="hobby[]" value="드라이브"
                <?php
                     //in_array() : 배열에 특정 값이 존재하는지
                    if(in_array("드라이브", $hobbyarr)){
                ?>
                        checked
                <?php
                    }
                ?>
            ></label>
            <label>노래듣기 <input type="checkbox" name="hobby[]" value="노래듣기"
                <?php
                     //in_array() : 배열에 특정 값이 존재하는지
                    if(in_array("노래듣기", $hobbyarr)){
                ?>
                        checked
                <?php
                    }
                ?>
            ></label>
            <label>운동 <input type="checkbox" name="hobby[]" value="운동"
                <?php
                     //in_array() : 배열에 특정 값이 존재하는지
                    if(in_array("운동", $hobbyarr)){
                ?>
                        checked
                <?php
                    }
                ?>
            ></label>
            <label>그림그리기 <input type="checkbox" name="hobby[]" value="그림그리기"
                <?php
                     //in_array() : 배열에 특정 값이 존재하는지
                    if(in_array("그림그리기", $hobbyarr)){
                ?>
                        checked
                <?php
                    }
                ?>
            ></label>
        </p>
        <p>주민등록번호 : 
            <input type="text" name="ssn1" id="ssn1" maxlength="6" onkeyup="moveFocus()" value="<?=$ssn1?>"> - <input type="text" name="ssn2" id="ssn2" maxlength="7" value="<?=$ssn2?>"> 
            <input type="button" value="주민증록번호 검증" onclick="ssnCheck()">
        </p>
        <p><label>우편번호 : 
            <input type="text" name="zipcode" id="sample6_postcode" value="<?=$zipcode?>"></label> 
            <input type="button" value="우편번호 검색" onclick="sample6_execDaumPostcode()">
        </p>
        <p><label>주소 : <input type="text" name="address1" id="sample6_address" value="<?=$address1?>"></label></p>
        <p><label>상세주소 : <input type="text" name="address2" d="sample6_detailAddress" value="<?=$address2?>"></label></p>
        <p><label>참고사항 : <input type="text" name="address3" id="sample6_extraAddress" value="<?=$address3?>"></label></p>
        <p><input type="submit" value="수정완료"> <input type="reset" value="다시 작성"> <input type="button" value="돌아가기" onclick="location.href='./login.php'"></p>
    <form> 
</body>
</html>