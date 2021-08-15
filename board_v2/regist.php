<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="./js/registScript.js"></script>
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
<form name="regForm" id="regForm" method="POST" action="regist_ok.php" onsubmit="return sendit()">
        <!-- 아이디 중복체크했는지 검사 : false이면 폼체크에서 가입을 막는다-->
        <input type="hidden" name="isIdCheck" id="isIdCheck" value="false">
        <!-- 주민증록번호 유효성 검사했는지 검사 : false이면 폼체크에서 가입을 막는다-->
        <input type="hidden" name="isSSN" id="isSSN" value="false">
        <p>
            <label>아이디 : <input type="text" name="userid" id="userid" maxlength="20" onchange="isIdChange()"></label> 
            <input type="button" value="중복확인" onclick="idRegCheck()">
        </p>
        <!-- 사용가능한 아이디인지 여부 표시 영역 -->
        <p id="idRegCheck_text"></p>
        <p><label>비밀번호 : <input type="password" name="userpw" id="userpw" maxlength="20"></label></p>
        <p><label>비밀번호 확인 : <input type="password" name="userpw_re" id="userpw_re" maxlength="20"></label></p>
        <p><label>이름 : <input type="text" name="username" id="username"></label></p>
        <p><label>휴대폰 번호 : <input type="text" name="hp" id="hp"></label></p>
        <p><label>이메일 : <input type="text" name="email" id="email"></label></p>
        <!-- 체크박스 post로 넘길때 name에 []추가해야한다 -->
        <p>취미 : 
            <label>여행 <input type="checkbox" name="hobby[]" value="여행"></label>
            <label>드라이브 <input type="checkbox" name="hobby[]" value="드라이브"></label>
            <label>노래듣기 <input type="checkbox" name="hobby[]" value="노래듣기"></label>
            <label>운동 <input type="checkbox" name="hobby[]" value="운동"></label>
            <label>그림그리기 <input type="checkbox" name="hobby[]" value="그림그리기"></label>
        </p>
        <p>주민등록번호 : 
            <input type="text" name="ssn1" id="ssn1" maxlength="6" onkeyup="moveFocus()"> - <input type="text" name="ssn2" id="ssn2" maxlength="7"> 
            <input type="button" value="주민증록번호 검증" onclick="ssnCheck()">
        </p>
        <p><label>우편번호 : 
            <input type="text" name="zipcode" id="sample6_postcode"></label> 
            <input type="button" value="우편번호 검색" onclick="sample6_execDaumPostcode()">
        </p>
        <p><label>주소 : <input type="text" name="address1" id="sample6_address"></label></p>
        <p><label>상세주소 : <input type="text" name="address2" d="sample6_detailAddress"></label></p>
        <p><label>참고사항 : <input type="text" name="address3" id="sample6_extraAddress"></label></p>
        <p><input type="submit" value="가입완료"> <input type="reset" value="다시 작성"> <input type="button" value="로그인" onclick="location.href='./login.php'"></p>  
    </form>  
</body>
</html>