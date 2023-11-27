<?php
    include_once('connect.php');
    $tenLoaiXe='';
    $xuatXu ='';
    $idDanhMuc ='';
    $mauSac ='';
    $hinhAnh ='';

    $errTenLoaiXe ='';
    $errXuatXu ='';
    $errHinhAnh ='';

    $isCheck = true;

    if(isset($_GET["id"])){
        $id = $_GET["id"];
        // echo $id;

        $sql = "SELECT * FROM xe WHERE id = $id";
        $result = $conn->query($sql);
        if($result){
            $xe = $result->fetch(PDO::FETCH_ASSOC);
            if($xe){
                // echo "<pre>";
                // print_r($xe);
                $tenLoaiXe= $xe["tenLoaiXe"];
                $xuatXu =$xe["xuatXu"];
                $idDanhMuc =$xe["idDanhMuc"];
                $mauSac =$xe["mauSac"];
                $hinhAnh =$xe["hinhAnh"];
            }
        }
    }

    if(isset($_POST["submit"])){
        // print_r($_POST);
        $id = $_POST["id"];
        $tenLoaiXe= $_POST["tenLoaiXe"];
        $xuatXu =$_POST["xuatXu"];
        $idDanhMuc =$_POST["idDanhMuc"];
        $mauSac =$_POST["mauSac"];
        $hinhAnh =$_FILES["hinhAnh"];

        // echo "<pre>";
        // print_r([ $id,$tenLoaiXe, $xuatXu,$idDanhMuc,$mauSac, $hinhAnh]);
        // echo "</pre>";
        $filename = $hinhAnh["name"];
        // echo $filename;
        $sql='';
        if($filename){
            $filename = time().$filename;
            $dir = "uploads/$filename";
            if(move_uploaded_file($hinhAnh["tmp_name"],$dir)){
                $sql = "UPDATE xe 
                        SET tenLoaiXe ='$tenLoaiXe',xuatXu ='$xuatXu', idDanhMuc='$idDanhMuc',
                        mauSac ='$mauSac',hinhAnh ='$filename' 
                        WHERE id = '$id'";
            }
        }else{
            $sql = "UPDATE xe 
                    SET tenLoaiXe ='$tenLoaiXe',xuatXu ='$xuatXu', idDanhMuc='$idDanhMuc',
                    mauSac ='$mauSac' 
                    WHERE id = '$id'";
        }
        $result =$conn->query($sql);
        if($result){
            header('Location: index.php');
        }else{
            echo "Sửa lỗi";
        }
    }
?>


<form action="edit.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $id ?>">
    <label for="">Tên xe</label>
    <input type="text" name ="tenLoaiXe" value ="<?= $tenLoaiXe ?>" >
    <span style="color:red"><?= $errTenLoaiXe?></span><br>

    <label for="">Xuất xứ</label>
    <input type="text" name ="xuatXu" value ="<?= $xuatXu ?>" >
    <span style="color:red"><?= $errXuatXu?></span><br>

    <label for="">Danh mục</label>
    <select name="idDanhMuc" id="">
        <?php
            $sql ="SELECT * FROM danhmuc";
            $result= $conn->query($sql);
            $options ='';
            if($result){
                $listDanhMuc = $result->fetchAll(PDO::FETCH_ASSOC);
                if($listDanhMuc){
                    // print_r($listDanhMuc);
                    foreach($listDanhMuc as $value){
                        $options .= '<option '.($value["id"]==$idDanhMuc ? 'selected':'').' value="'.$value["id"].'">'.$value["tenHangXe"].'</option>';
                    }
                }
                // echo htmlspecialchars($options);
                echo $options;
            }else{
                echo 'lỗi';
            }
        ?>
    </select> <br>

    <label for="">Màu sắc</label>
    <input type="color" name ="mauSac" value ="<?= $mauSac ?>" > <br>

    <label for="">Hình ảnh</label>
    <input type="file" name ="hinhAnh" id="inputImg" > <br>
    <img src="uploads/<?= $hinhAnh?>" style="width:150px" alt="">

    <input type="submit" name="submit" value="Gửi">



</form>