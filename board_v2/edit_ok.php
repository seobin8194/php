<?php
    session_start();
    include "../include/dbconn.php";
    include "../include/sessionCheck.php";

    //b_idx가 넘어오지않았을 경우 방어처리
    if(!isset($_POST['b_idx'])){
        echo "<script>alert('잘못된 접근입니다.'); location.href='login.php'</script>";
    }

    $loginMem = $_SESSION['id'];
    $b_idx = $_POST['b_idx'];
    $b_title = $_POST['b_title'];
    $b_content = $_POST['b_content'];
    $filepath = "";

    //첨부파일이 있을때
    if($_FILES['b_file']['tmp_name']){
        $uploads_dir = './upload';
        $allowed_ext = array('jpg','jpeg','png','gif','bmp');
        $error = $_FILES['b_file']['error'];
        $name = $_FILES['b_file']['name'];
        $ext = explode(".", $name);
        $rename = $ext[0].time();
        $rename = $rename.".".$ext[1];
        $ext = strtolower(array_pop($ext));

        if($error != UPLOAD_ERR_OK){
            switch($error){
                case UPLOAD_ERR_INI_SIZE:
                case UPLOAD_ERR_FORM_SIZE:
                    echo "파일 크기가 너무 큽니다";
                    break;
                case UPLOAD_ERR_NO_FILE:
                    echo "파일이 제대로 첨부되지 않았습니다";
                default:
                    echo "파일 업로드 실패";
            }
            exit;
        }

        if(!in_array($ext, $allowed_ext)){
            echo "허용되지 않은 확장명입니다";
            exit;
        }

        $filepath = $uploads_dir."/".$rename;
        move_uploaded_file($_FILES['b_file']['tmp_name'], $filepath);

        $sql = "update tb_board set b_title = '$b_title', b_content = '$b_content', b_file='$filepath' where b_idx = '$b_idx' and b_userid = '$loginMem'";    
    }else{
        //첨부파일이 없을때는 기존 첨부파일 유지
        $sql = "update tb_board set b_title = '$b_title', b_content = '$b_content' where b_idx = '$b_idx'";   
    }

    $result = mysqli_query($conn, $sql);
    //echo $sql;
    //echo mysqli_affected_rows($conn); //0: 반영안됨, 1: 적용
    //글쓴이와 다른계정으로 로그인 사람이 수정하려고 하는 경우 방어처리
    if(mysqli_affected_rows($conn) > 0){
        echo "<script>alert('수정완료'); location.href='view.php?b_idx=".$b_idx."'; </script>";
    }else{
        echo "<script>alert('잘못된 접근입니다.'); location.href='login.php'</script>";
    }
?>