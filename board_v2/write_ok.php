<?php
    session_start();
    include "../include/dbconn.php";
    include "../include/sessionCheck.php";

    $id = $_SESSION['id'];
    $b_title = $_POST['b_title'];
    $b_content = $_POST['b_content'];
    $filepath = "";

    //b_file있니
    if($_FILES['b_file']['tmp_name']){
        //파일 업로드할 주소
        $uploads_dir = './upload';
        //허용하는 확장명
        $alowed_ext = array('jpg','jpeg','png','gif','bmp');
        
        //파일이 잘 넘어 오지 않았을때 에러저장
        $error = $_FILES['b_file']['error'];
        //파일이 잘 넘어왔을때 파일명 저장
        $name = $_FILES['b_file']['name'];//apple.jpg

        $ext = explode(".", $name);//ext[0] = "apple" ext[1] = "jpg"
        //동일한 파일명 존재방지
        $rename = $ext[0].time();
        $rename = $rename.".".$ext[1];

        //확장명
        //array_pop() : 스택구조. 마지막 값을 뽑아내고 그 값을 반환. 해당 데이터는 배열에서 사라진다
        $ext = strtolower(array_pop($ext));
        
        //UPLOAD_ERR_OK(0) : 오류없이 파일업로드 성공 여부
        if($error != UPLOAD_ERR_OK){
            switch($error){
                case UPLOAD_ERR_INI_SIZE://php.ini에 설정된 최대 파일 초과
                case UPLOAD_ERR_FORM_SIZE://html 폼에 설정된 최대 파일 초과
                    echo "파일 크기가 너무 큽니다";
                    break;
                case UPLOAD_ERR_NO_FILE://파일이 제대로 업로드되지 않음
                    echo "파일이 제대로 첨부되지 않았습니다";
                default:
                    echo "파일 업로드 실패";
            }
            exit;
        }
        //허용하는 확장명인지 검사
        if(!in_array($ext, $alowed_ext)){
            echo "허용하지 않는 확장명입니다";
            exit;
        }
        
        $filepath = $uploads_dir."/".$rename;
        //내가 만든 경로로 파일을 옮긴다
        move_uploaded_file($_FILES['b_file']['tmp_name'], $filepath);
    }

        $sql = "insert into tb_board(b_userid, b_title, b_content, b_file) values ('$id','$b_title','$b_content', '$filepath')";
        $result = mysqli_query($conn, $sql);
        echo "<script>alert('저장되었습니다'); location.href='list.php';</script>";  
?>