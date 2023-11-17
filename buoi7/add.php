<?php
    include_once("connect.php");

    $hoVaTen = '';
    $khoa = '';
    $ngaySinh = '';
    $lopId = '';

    $errHovaTen = '';
    $errKhoa = '';
    $errNgaySinh = '';
    $errLopId = '';
    $isCheck = true;

   




   if(isset($_POST["submit"])){
        $hoVaTen = trim($_POST["hoVaTen"]);
        $khoa = trim($_POST["khoa"]);
        $ngaySinh = $_POST["ngaySinh"];
        $lopId = $_POST["lopId"];
        // echo "<pre>";
        // print_r([$hoVaTen,$khoa,$ngaySinh,$lopId]);

        //kiểm tra dữ liệu
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
            $sql ="INSERT INTO sinhvien(hoVaTen,khoa,ngaySinh,lopId)
                    VALUES('$hoVaTen','$khoa','$ngaySinh',$lopId)";

            $result = $conn->query($sql);

            if($result){
                // echo "Thêm thành công";
                header('Location: index.php');
            }else{
                echo "Thêm thất bại";
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
    // echo htmlspecialchars($option);

}
?>

<form action="add.php" method ="post">
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