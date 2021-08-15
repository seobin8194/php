<?php
    //로그인 성공시 저장한 쿠키를 제거한다
    setcookie("userid", "", time()-10, "/");
?>
<script>
    alert('로그아웃');
    location.href = '7_login.php';
</script>