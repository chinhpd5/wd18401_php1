<?php
    include_once('connect.php');
    $tenTheThao='';
    $maTheThao ='';
    $namRaDoi ='';
    $id_NoiDung='';
    $isCheck = true;

    if(isset($_GET["id"])){
        $id = $_GET["id"];
        if($id){
            // echo $id;
            $sql ="SELECT * FROM thethao WHERE id_TheThao =$id";
            $result= $conn->query($sql);
            if($result){
                $theThao = $result->fetch(PDO::FETCH_ASSOC);
                if($theThao){
                    echo "<pre>";
                    print_r($theThao);
                    echo "</pre>";
                    $tenTheThao=$theThao["tenTheThao"];
                    $maTheThao =$theThao["maTheThao"];
                    $namRaDoi =$theThao["namRaDoi"];
                    $id_NoiDung=$theThao["id_NoiDung"];
                    
                }
            }
        }
    }

    if(isset($_POST["submit"])){
        // print_r($_POST);

        //đừng quên id
        $id = $_POST["id"];

        $tenTheThao= $_POST["tenTheThao"];
        $maTheThao = $_POST["maTheThao"];
        $namRaDoi = $_POST["namRaDoi"];
        $id_NoiDung= $_POST["id_NoiDung"];
        $hinhAnh = $_FILES["hinhAnh"];
        // echo "<pre>";
        // print_r([$id,$tenTheThao,$maTheThao,$namRaDoi,$id_NoiDung,$hinhAnh]);
        // echo "</pre>";

        if($isCheck){
            $sql='';
            $filename = $hinhAnh["name"];
            if($filename){
                //nếu có ảnh
                $filename = time().$filename;
                $dir='uploads/'.$filename;
                if(move_uploaded_file($hinhAnh["tmp_name"],$dir)){
                    $sql ="UPDATE thethao SET tenTheThao='$tenTheThao', hinhAnh='$filename',
                    maTheThao='$maTheThao',id_NoiDung ='$id_NoiDung',namRaDoi= '$namRaDoi' 
                    WHERE id_TheThao ='$id'";
                }

            }else{
                //Không có ảnh
                $sql ="UPDATE thethao SET tenTheThao='$tenTheThao',
                maTheThao='$maTheThao',id_NoiDung ='$id_NoiDung',namRaDoi= '$namRaDoi' 
                WHERE id_TheThao ='$id'";
                
            }
            // echo $sql;
            if($sql){
                $result = $conn->query($sql);
                if($result){
                    header('Location: index.php');
                }else{
                    echo "sửa lỗi";
                }
            }
        }
    }
?>

<form action="edit.php" method="post" enctype="multipart/form-data">

    <input type="hidden" name ="id" value="<?= $id?>">

    <label for="">Tên thể thao</label>
    <input type="text" name="tenTheThao" value="<?= $tenTheThao?>"><br>

    <label for="">Mã thể thao</label>
    <input type="text" name="maTheThao" value="<?= $maTheThao?>"><br>

    <label for="">Nội dung</label>
    <select name="id_NoiDung" id="">
        <?php
            $sql = "SELECT * FROM noidung";
            $result = $conn->query($sql);
            $option= '';
            if($result){
                $listND = $result->fetchAll(PDO::FETCH_ASSOC);
                if($listND){
                    // echo "<pre>";
                    // print_r($listND);
                    // echo "</pre>";
                    foreach($listND as $value){
                        $option .= '<option '.($id_NoiDung == $value["id_NoiDung"] ? 'selected':'').' value="'.$value["id_NoiDung"].'">'.$value["tenNoiDung"].'</option>';
                    }
                    echo $option;
                    // echo htmlspecialchars($option);
                }
            }
        ?>
    </select><br>

<!-- Nếu k upload thì bỏ input hình ảnh -->
    <label for="">Hình ảnh</label>
    <input type="file" name= "hinhAnh"><br> 

    <label for="">Năm ra đời</label>
    <input type="text" name="namRaDoi" value="<?= $namRaDoi?>"><br>

    <input type="submit" name ="submit">
</form>