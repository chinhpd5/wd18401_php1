<?php
    include_once('connect.php');
    //lấy id trên URL
    if(isset($_GET["id"])){
        $id = $_GET["id"];
        
        if($id){
            try {
                $sql = "SELECT * FROM sinhvien WHERE id = $id";
                $result = $conn->query($sql);
                if($result){
                    $sinhVien = $result->fetch(PDO::FETCH_ASSOC);
                    if($sinhVien){
                        //nêu tồn tại sinh viên thì xóa
                        $sql = "DELETE FROM sinhvien WHERE id = ".$sinhVien["id"];
                        //echo $sql;
                        $result = $conn->query($sql);
                        if($result){
                            header('Location: index.php');
                        }
                    }else{
                        echo "Không tìm thấy sinh viên";
                    }
                }

            } catch (\Throwable $th) {
               echo "Không tìm thấy sinh viên";
               die();
            }
        }



    }


?>