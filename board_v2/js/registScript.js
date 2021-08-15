function sendit(){
    const isIdCheck = document.getElementById('isIdCheck')
    const userid = document.getElementById('userid')
    const userpw = document.getElementById('userpw')
    const userpw_re = document.getElementById('userpw_re')
    const username = document.getElementById('username')
    const hp = document.getElementById('hp')
    const email = document.getElementById('email')
    const hobby = document.getElementsByName('hobby')
    const isSSN = document.getElementById('isSSN');
    const ssn1 = document.getElementById('ssn1');
    const ssn2 = document.getElementById('ssn2');

    //정규식 패턴
    const expPwText = /^.*(?=^.{4,20})(?=.*\d)(?=.*[a-zA-Z])(?=.*[!@#$%^&*()+=]).*$/
    const expNameText = /[가-힣]+$/
    const expHpText = /^\d{3}-\d{3,4}-\d{4}$/
    const expEmailText = /^[A-Za-z0-9\.\-]+@[A-Za-z0-9\.\-]+\.[A-Za-z0-9\.\-]+$/;

    if(userid.value == ""){
        alert('아이디를 입력하세요');
        userid.focus();
        return false;
    }
    if(userid.value.length < 4 || userid.value.length > 20){
        alert('아이디는 4자 이상 20자 이하입니다');
        userid.focus();
        return false;
    }
    if(isIdCheck.value == 'false'){
        alert('아이디 중복체크하세요');
        userid.focus();
        return false;
    }

    if(userpw.value == ""){
        alert('비밀번호를 입력하세요');
        userpw.focus();
        return false;
    }
    if(expPwText.test(userpw.value) == false){
        alert('비밀번호 형식을 확인하세요');
        userpw.focus();
        return false;
    }
    if(userpw.value != userpw_re.value){
        alert('두 비밀번호가 일치하지 않습니다');
        userpw.focus();
        return false;
    }

    if(expNameText.test(username.value) == false){
        alert('이름 형식을 확인하세요');
        username.focus();
        return false;
    }

    if(expHpText.test(hp.value) == false){
        alert('휴대폰 번호 형식을 확인하세요');
        hp.focus();
        return false;
    }
    
    if(expEmailText.test(email.value) == false){
        alert('이메일 형식을 확인하세요');
        email.focus();
        return false;
    }

    let isHobbyCheck = false;
    for(let i = 0; i < $("[name='hobby[]']").length; i++){
        if($("input:checkbox[name='hobby[]']").eq(i).is(":checked") == true){
            isHobbyCheck = true;
            break;
        }
    }
    if(!isHobbyCheck){
        alert('취미는 한개 이상 체크하세요');
        return false;
    }

    if(ssn1.vlaue == "" || ssn2.value == ""){
        alert('주민등록번호를 입력하세요');
        ssn1.focus();
        return false;
    }
    if(isSSN.value == 'false'){
        alert('주민등록번호 검증하세요');
        ssn1.focus();
        return false;
    }
}

//주민등록번호 포커스 조절함수
function moveFocus(){
    const ssn1 = document.getElementById('ssn1');
    const ssn2 = document.getElementById('ssn2');

    if(ssn1.value.length >= 6){
        ssn2.focus();
    }
}

//주민등록번호 유효성 검증
function ssnCheck(){
    const isSSN = document.getElementById('isSSN');
    const ssn1 = document.getElementById('ssn1');
    const ssn2 = document.getElementById('ssn2');
    const ssn = ssn1.value + ssn2.value;
    const s1 = Number(ssn.substr(0,1)) * 2;
    const s2 = Number(ssn.substr(1,1)) * 3;
    const s3 = Number(ssn.substr(2,1)) * 4;
    const s4 = Number(ssn.substr(3,1)) * 5;
    const s5 = Number(ssn.substr(4,1)) * 6;
    const s6 = Number(ssn.substr(5,1)) * 7;
    const s7 = Number(ssn.substr(6,1)) * 8;
    const s8 = Number(ssn.substr(7,1)) * 9;
    const s9 = Number(ssn.substr(8,1)) * 2;
    const s10 = Number(ssn.substr(9,1)) * 3;
    const s11 = Number(ssn.substr(10,1)) * 4;
    const s12 = Number(ssn.substr(11,1)) * 5;
    const s13 = Number(ssn.substr(12,1));

    let res = s1 + s2 + s3 + s4 + s5 + s6 + s7 + s8 + s9 + s10 + s11 + s12;
    res = res % 11
    res = 11 - res;
    if(res >= 10) res = res % 10;

    if(res == s13){
        alert("유효한 주민등록번호입니다")
        isSSN.value = true;
    }else{
        alert('유효하지 않은 주민등록번호입니다')
    }
}

//아이디 중복체크
function idRegCheck(){
    const userid = document.getElementById('userid')
    if(userid.value == ""){
        alert('아이디를 입력하세요');
        userid.focus();
        return false;
    }

    const httpRequest = new XMLHttpRequest();
    httpRequest.onreadystatechange = function(){
        //ajax 통신이 제대로 이루어졌을때
        if(httpRequest.readyState == XMLHttpRequest.DONE && httpRequest.status == 200){
            if(httpRequest.responseText == "n"){
                document.getElementById('idRegCheck_text').innerText = "사용할 수 있는 아이디입니다";
                //아이디 중복체크했음 표시
                document.getElementById('isIdCheck').value = "true";
            }else{
                document.getElementById('idRegCheck_text').innerText = "사용할 수 없는 아이디입니다";
            }  
        }
    };

    httpRequest.open("GET", "idRegCheck_ok.php?mem_userid=" + userid.value, true);
    httpRequest.send();
}

//아이디 중복 확인 후 아이디 건드리면 리셋
function isIdChange(){
    document.getElementById('idRegCheck_text').innerHTML = "";
    document.getElementById('isIdCheck').value = "false";
}