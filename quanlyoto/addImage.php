<?php
    include_once('./connect.php');
    $errImage='';
    $image ='';
    $isCheck =true;

    if(isset($_POST["submit"])){
        //lấy thông tin file
        $image = $_FILES["hinhAnh"];
        echo "<pre>";
        print_r($image);

        //kiểm tra
        $filename = $image["name"];
        if($filename){
            //lấy đuôi file
            $extension = pathinfo($filename,PATHINFO_EXTENSION);
            // echo $extension;

            $arrAllow = ['png','jpg','jpeg'];
            //kiểm tra xem 1 file có phải hình ảnh không
            if(!in_array($extension,$arrAllow)){
                $errImage ="Cần nhập hình ảnh";
                $isCheck =false;
            }
        }else{
            $isCheck =false;
            $errImage ="Cần nhập file";
        }

        if($isCheck){
            //thêm ảnh lên server
            $filename = time().$filename;
            $dir = "uploads/".$filename;
            if(move_uploaded_file($image["tmp_name"],$dir)){
                $sql = "INSERT INTO image(hinhAnh) VALUES ('$filename')";
                $result = $conn->query($sql);
                if($result){
                    echo "thêm thành công";
                }
                else{
                    echo "Thêm thất bại";
                }
            }

        }

    }

?>

<form action="addImage.php" method="post"  enctype="multipart/form-data">
    <label for="">Hình ảnh</label>
    <input type="file" name="hinhAnh" > 
    <span style="color:red"><?= $errImage ?></span>
    <br>

    <input type="submit" name ="submit" value="Gửi">
</form>
