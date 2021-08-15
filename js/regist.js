function sendit(){
    const userid = document.getElementById('userid');
    const userpw = document.getElementById('userpw');
    const userpw_re = document.getElementById('userpw_re');
    const name = document.getElementById('name');
    const hp = document.getElementById('hp');
    const email = document.getElementById('email');
    const hobby = document.getElementsByName('hobby[]');

    //정규식 패턴
   //한글 1자 이상 
   /*
        []: 범위
        +: 1자 이상 검사
        $: 정규식 검사 끝
   */
    const expNameText = /[가-힣]+$/;
    /*
        010-1111-1111
        010-111-1111
        ^: ~로 시작
        \d: 숫자
        {3}: 3자리
        {3,4}: 3자리 또는 4자리
    */
   const expHpText = /^\d{3}-\d{3,4}-\d{4}$/;
   /*
        [A-Za-z0-9\.\_]: 영문자, 숫자, ".", "-"만 가능
   */
   const expEmailText = /^[A-Za-z0-9\.\_]+@[A-Za-z0-9\.\_]+\.[A-Za-z0-9\.\_]+$/;

    if(userid.value == ''){
        alert('아이디를 입력해주세요');
        userid.focus();
        return false;
    }
    if(userid.value.length < 4 || userid.value.length > 20){
        alert('아이디를 4자 이상 20자 이하로 입력하세요');
        userid.focus();
        return false;
    }

    if(userpw.value == ''){
        alert('비밀번호를 입력하세요');
        userpw.focus();
        return false;
    }
    if(userpw.value.length < 4 || userpw.value.length > 20){
        alert('비밀번호를 4자 이상 20자 이하로 입력하세요');
        userpw.focus();
        return false;
    }
    if(userpw.value != userpw_re.value){
        alert('두 비밀번호가 일치하지 않습니다');
        userpw_re.focus();
        return false;
    }

    if(expNameText.test(name.value) == false){
        alert('이름 형식을 확인하세요');
        name.focus();
        return false;
    }

    if(expHpText.test(hp.value) == false){
        alert('휴대폰 형식을 확인하세요');
        hp.focus();
        return false;
    }

    if(expEmailText.test(email.value) == false){
        alert('이메일 형식을 확인하세요');
        email.focus();
        return false;
    }

    let count = 0;
    for(let i = 0; i < hobby.length; i++){
        if(hobby[i].checked){
            count++;
        }
    }
    if(count == 0){
        alert('취미는 적어도 한개 이상 선택해야 합니다');
        return false;
    }
}

function moveFocus(){
    const ssn1 = document.getElementById('ssn1');
    const ssn2 = document.getElementById('ssn2');

    if(ssn1.value.length >= 6){
        ssn2.focus();
    }
}

function ssnCheck(){
    /*
        주민등록번호 검증
         0 0 1 0 1 1 - 3 0 6 8 5 1 8
         1. 각 자리에 234567892345를 곱하고 모두 더함 (마지막 자리만 제외)
            0 0 1 0 1 1 - 3 0 6 8 5 1    8
            * * * * * *   * * * * * * 
            2 3 4 5 6 7   8 9 2 3 4 5 

            0+0+4+0+6+7+24+0+12+24+20+5 = 102

         2. 11로 나눈 나머지 값을 구함
            102 % 11 = 3
        
        3. 11에서 뺌
            11 - 3 = 8;
            (만약 결과가 2자리면 10으로 나눈 나머지 값을 구함)
        
        4. 주민번호의 마지막 자리와 결과가 같으면 유효한 주민등록번호
    */
   const ssn1 = document.getElementById('ssn1');
   const ssn2 = document.getElementById('ssn2');

   if(ssn1.value == '' || ssn2.value == ''){
       alert('주민번호를 입력하세요');
       ssn2.focus();
       return false;
   }

   const ssn = ssn1.value + ssn2.value;
   const s1 = Number(ssn.substr(0, 1)) * 2;
   const s2 = Number(ssn.substr(1, 1)) * 3;
   const s3 = Number(ssn.substr(2, 1)) * 4;
   const s4 = Number(ssn.substr(3, 1)) * 5;
   const s5 = Number(ssn.substr(4, 1)) * 6;
   const s6 = Number(ssn.substr(5, 1)) * 7;
   const s7 = Number(ssn.substr(6, 1)) * 8;
   const s8 = Number(ssn.substr(7, 1)) * 9;
   const s9 = Number(ssn.substr(8, 1)) * 2;
   const s10 = Number(ssn.substr(9, 1)) * 3;
   const s11 = Number(ssn.substr(10, 1)) * 4;
   const s12 = Number(ssn.substr(11, 1)) * 5;
   const s13 = Number(ssn.substr(12, 1));

   let result = s1 + s2 + s3 + s4 + s5 + s6 + s7 + s8 + s9 + s10 + s11 + s12;
   result = result % 11;
   result = 11 - result;
   if(result >= 10) result = result % 10;

   if(result == s13){
       alert('유효한 주민등록번호입니다');
   }else{
       alert('유효하지 않은 주민등록번호입니다');
   }
}