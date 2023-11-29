<?php
    session_start();
    if(isset($_SESSION["username"])){
        //xóa session
        unset($_SESSION["username"]);
        header('Location: index.php');
    }else{
        echo "Bạn chưa đăng nhập";
    }

?>