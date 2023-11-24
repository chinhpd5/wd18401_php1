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
    

    if(isset($_POST["submit"])){
        $tenLoaiXe = trim($_POST["tenLoaiXe"]);
        $xuatXu = trim($_POST["xuatXu"]);
        $mauSac = $_POST["mauSac"];
        $idDanhMuc = $_POST["idDanhMuc"];
        $image = $_FILES["hinhAnh"];
        echo "<pre>";
        print_r([$tenLoaiXe,$xuatXu,$mauSac,$idDanhMuc,$image]);

        //validate
        if($tenLoaiXe==""){
            $isCheck = false;
            $errTenLoaiXe ="Cần nhập tên xe";
        }

        if($xuatXu == ""){
            $isCheck = false;
            $errXuatXu ="Cần nhập xuất xứ";
        }
        $filename = $image["name"];
        if($filename){
            $extension = pathinfo($filename,PATHINFO_EXTENSION);

            $arr= ['png','jpg','jpeg'];

            if(!in_array($extension,$arr)){
                $isCheck = false;
                $errHinhAnh ="cần nhập file ảnh";
            }

        }else{
            $isCheck = false;
            $errHinhAnh ="cần nhập file";
        }

        if($isCheck){
            $filename = time().$filename;
            $dir = 'uploads/'.$filename;
            if(move_uploaded_file($image['tmp_name'],$dir)){
                $sql = "INSERT INTO xe(tenLoaiXe,xuatXu,idDanhMuc,mauSac,hinhAnh) 
                    VALUES ('$tenLoaiXe','$xuatXu','$idDanhMuc','$mauSac','$filename')";
                $result= $conn->query($sql);
                if($result){
                    header('Location: index.php');
                }

            }else{
                echo "thêm ảnh lỗi";
            }

            
        }

    }

    

?>

<form action="add.php" method="post" enctype="multipart/form-data">
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
                        $options .= '<option '.($value["id"] ==$idDanhMuc ? 'selected': '').' value="'.$value["id"].'">'.$value["tenHangXe"].'</option>';
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
    <img src="" alt="" id="img" style="width:200px"> <br>

    <input type="submit" name="submit" value="Gửi">



</form>

<script>
    const input = document.getElementById('inputImg');
    const img = document.getElementById('img');

    input.addEventListener('change',function(event){
        const file = event.target.files[0];
        const filename = file.name;
        // console.log(filename);
        const arr = filename.split('.');
        const extension = arr[arr.length -1];
        const arrAllow = ['png','jpg','jpeg'];

        if(arrAllow.includes(extension)){
            img.src = URL.createObjectURL(file);
        }
    });

</script>