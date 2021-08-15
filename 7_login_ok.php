<?php
    $id = $_POST['userid'];
    $pw = $_POST['userpw'];
    $saveid = "";
    //checkbox에서 체크를 안해서 값이 안넘어오면 notice가 뜸 -> isset()으로 감싼다
    if(isset($_POST['saveid'])){
        $saveid = $_POST['saveid'];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    if($id == 'admin' && $pw == '1234'){
        //아이디 저장에 체크했다면
        if($saveid == 'y'){
            //회원 아이디를 쿠키로 남긴다
            setcookie('userid', $id, time()+(60*60*24), "/");
        }
?>
            <h2>로그인</h2>
            <p>아이디 : <?=$id?></p>
            <p>비밀번호 : <?=$pw?></p>
<?php
    }else{
        echo "<script>alert('로그인 실패'); history.back(); </script>";
    }
?>
    
</body>
</html>
