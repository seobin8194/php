<?php
    session_start();
    session_unset();
?>
<script>
    alert('로그아웃');
    location.href="login.php";
</script>