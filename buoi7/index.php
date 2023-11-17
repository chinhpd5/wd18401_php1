<?php
    include_once("connect.php");

    //print_r($conn);
    $sql ="SELECT sinhvien.id, hoVaTen, khoa, ngaySinh, lopId,lop.tenLop
            FROM sinhvien INNER JOIN lop ON sinhvien.lopId = lop.id";

    $result = $conn->query($sql);
    $hang='';
    if($result){
        $listSinhVien = $result->fetchAll(PDO::FETCH_ASSOC);//lấy ra 1 ds trả về 1 array
        if($listSinhVien){
            // echo "<pre>";
            // print_r($listSinhVien);
            foreach($listSinhVien as $key =>$item){

                $dateObject = date_create($item["ngaySinh"]);
                $ntn= date_format($dateObject,'d-m-Y');
                //echo $ntn;
                $hang .= '
                    <tr>
                        <td>'.($key+1).'</td>
                        <td>'.$item["hoVaTen"].'</td>
                        <td>'.$item["khoa"].'</td>
                        <td>'.$ntn.'</td>
                        <td>'.$item["tenLop"].'</td>
                        <td><a href="edit.php?id='.$item["id"].'">Sửa</a></td>
                    </tr>';
            }
        }

    }

?>

<button><a href="add.php" style ="text-decoration:none">Thêm sinh viên</a></button>

<table border>
    <thead>
        <th>STT</th>
        <th>Họ và tên</th>
        <th>Khoa</th>
        <th>Ngày sinh</th>
        <th>Tên Lớp</th>
    </thead>
    <tbody>
        <?php echo $hang; ?>
    </tbody>
</table>