function sendit(){
    const userPw = document.getElementById('userpw')
    const userPw_re = document.getElementById('userpw_re')
    const hp = document.getElementById('hp')
    const email = document.getElementById('email');
    const hobby = document.getElementsByName('hobby');
    const isSSN = document.getElementById('isSSN');
    const ssn1 = document.getElementById('ssn1');
    const ssn2 = document.getElementById('ssn2');

    //정규식 패턴
    //4자 이상 20 이하, 숫자필수, 영문자(소문자 또는 대문자) 필수, 지정한 특수문자 포함
    const expPwText = /^.*(?=^.{4,20})(?=.*\d)(?=.*[a-zA-Z])(?=.*[!@#$%^&*()+=]).*$/
    //xxx-xxx/xxxx-xxxx 형태인지
    const expHpText = /^\d{3}-\d{3,4}-\d{4}$/
    //이메일 형태인지
    const expEmailText = /^[A-Za-z0-9\.\-]+@[A-Za-z0-9\.\-]+\.[A-Za-z0-9\.\-]+$/;

    if(userPw.value == ""){
        alert('비밀번호를 입력하시오')
        userPw.focus();
        return false;
    }
    if(expPwText.test(userPw.value) == false){
        alert('비밀번호 형식을 확인하세요')
        userPw.focus();
        return false;
    }
    if(userPw.value != userPw_re.value){
        alert('두 비밀번호가 일치하지 않습니다')
        userPw_re.focus()
        return false;
    }

    if(expHpText.test(hp.value) == false){
        alert('휴대폰 번호 형식을 확인하세요')
        hp.focus()
        return false;
    }

    if(expEmailText.test(email.value) == false){
        alert('이메일 형식을 확인하세요')
        email.focus()
        return false;
    }
    
    //checkbox에서 몇개 체크했는지 카운트
    // let count = 0;
    // for(let i = 0; i < hobby.length; i++){
    //     if(hobby[i].checked){
    //         count++;
    //     }
    // }
    // if(count == 0){
    //     alert('취미는 적어도 1개 이상 선택하시오')
    //     return false;
    // }
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

    if(ssn1.value == "" || ssn2.value == ""){
        alert('주민등록번호를 입력하시오')
        ssn1.focus();
        return false;
    }
    //주민등록번호 검증을 통과하면 isSSN값을 true로 지정한다
    if(isSSN.value == 'false'){
        alert('주민등록번호 검증하세요')
        ssn1.focus();
        return false;
    } 
}

//주민등록번호 앞자리 6자리 다 작성하면 다음 칸으로 포커스가 옮겨진다
function moveFocus(){
    const ssn1 = document.getElementById('ssn1');
    const ssn2 = document.getElementById('ssn2');
    
    if(ssn1.value.length >= 6){
        ssn2.focus();
    }
}

//주민등로번호 유효성 검증하는 메소드
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