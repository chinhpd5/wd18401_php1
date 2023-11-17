<?php
    include_once('./connect.php');
    $id ='';
    $hoVaTen = '';
    $khoa = '';
    $ngaySinh = '';
    $lopId = '';

    $errHovaTen = '';
    $errKhoa = '';
    $errNgaySinh = '';
    $errLopId = '';
    $isCheck = true;

    if(isset($_GET["id"])){
        $id = $_GET["id"];
        // echo $id;
        if($id){
           
            try {
                $sql ="SELECT * FROM sinhvien WHERE id = $id";
                $result = $conn->query($sql);
                if($result){
                    $sinhVien = $result->fetch(PDO::FETCH_ASSOC);
                    if($sinhVien){
                        // echo "<pre>";
                        // print_r($sinhVien);
                        $id = $sinhVien["id"];
                        $hoVaTen = $sinhVien["hoVaTen"];
                        $khoa = $sinhVien["khoa"];
                        $ngaySinh = $sinhVien["ngaySinh"];
                        $lopId = $sinhVien["lopId"];
                    }else{
                        echo "Không tìm thấy sinh viên";
                        die();
                    }
                }
            } catch (\Throwable $th) {
                echo "Không tìm thấy sinh viên";
                die();
            }
            
        }
    }

    if(isset($_POST["submit"])){
        $id = $_POST["id"];
        $hoVaTen =trim($_POST["hoVaTen"]);
        $khoa = trim($_POST["khoa"]);
        $lopId = $_POST["lopId"];
        $ngaySinh = $_POST["ngaySinh"];
        echo "<pre>";
        print_r([$id,$hoVaTen,$khoa,$ngaySinh,$lopId]);
        if(empty($hoVaTen)){
            $errHovaTen = "Nhập họ và tên";
            $isCheck= false;
        }
        if(empty($khoa)){
            $errKhoa = "Nhập tên khoa";
            $isCheck= false;
        }
        if(empty($ngaySinh)){
            $errNgaySinh = "Nhập ngày sinh";
            $isCheck= false;
        }
        if($isCheck){
            $sql = "UPDATE sinhvien
                    SET hoVaTen = '$hoVaTen', khoa ='$khoa', ngaySinh ='$ngaySinh', lopId='$lopId'
                    WHERE id = $id";

            $result = $conn->query($sql);
            if($result){
                header("Location: index.php");
            }else{
                echo "Lỗi khi sửa";
            }
        }
    }

    $sql ="SELECT * FROM lop";
    $result = $conn->query($sql);
    $option='';
   
   if($result){
        $listLop = $result->fetchAll(PDO::FETCH_ASSOC);
        if($listLop){
            //echo "<pre>";
            // print_r($listLop);
            foreach($listLop as $item){
                $option .= '<option '.($item["id"] == $lopId ? "selected":"").' 
                value="'.$item["id"].'">'.$item["tenLop"].'</option>';
            }
        }
   }
?>

<form action="edit.php" method ="post">
    <input type="hidden" name ="id" value="<?= $id;?>">

    <label for="">Họ và tên</label>
    <input type="text" name="hoVaTen" value ="<?= $hoVaTen ?>">
    <span style="color:red"><?= $errHovaTen ?></span><br>

    <label for="">Khoa</label>
    <input type="text" name="khoa" value ="<?= $khoa ?>"> 
    <span style="color:red"><?= $errKhoa ?></span><br>

    <label for="">Ngày sinh</label>
    <input type="date" name="ngaySinh" id="" value ="<?= $ngaySinh ?>"> 
    <span style="color:red"><?= $errNgaySinh ?></span><br>

    <label for="">Lớp</label>
    <select name="lopId" id="">
        <?= $option; ?>
    </select><br>

    <input type="submit" value="Gửi" name="submit">

</form>