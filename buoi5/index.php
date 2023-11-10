<?php
    function soNguyenTo($number){
        if($number <= 2)
            return false;
        for($i=2; $i <= sqrt($number); $i++){
            if($number % $i ==0){
                return false;
            }
        }
        return true;
    }

    $arr = [1,2,3,4,5,6,7,8,9,10];
    $tong =0;
    foreach($arr as $value){
        if(soNguyenTo($value)){
            //echo $value.'<br>';
            $tong+= $value;
        }
    }
    echo $tong."<br>";

    #date
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    // $giay = time();
    // echo $giay."<br>"; // giây tính từ 1/1/1970

    $now = date('Y-m-d H:i:s');
    echo $now."<br>";
    // echo date_default_timezone_get();
    $stringDate = '2023-11-10 19:05:22';//lấy từ csdl

    //cách 1
    $day1 = new DateTime($stringDate);// trả về 1 đối tượng thời gian
    //cách 2 Khuyến khích
    $day2 = date_create($stringDate);// trả về 1 đối tượng thời gian

    // print_r($day1);
    // print_r($day2);

    echo date_format($day2,'d-m-Y');//trả về kiểu ngày tháng năm
    echo '<br>';
    echo date_format($day2,'H:i:s d-m-Y');//trả về kiểu giờ phút giây
    // ngày tháng năm

    //Cách để lấy ra thông tin cụ thể của đối tượng

    $day = date_parse($stringDate);
    echo "<pre>";
    //print_r($day);
    // echo $day['hour'];

    $array = [
        "football"=> "đá bóng",
        "swim" => "bơi",
        "run" => "chạy"
    ];
    $options = '';
    foreach($array as $key =>$value){
        $options .= '<option value="'.$key.'">'.$value.'</option>';
    }

?>

    <form action="index.php" method="post">
        <label for="">UserName</label>
        <input type="text" name ="user">

        <label for="">Password</label>
        <input type="password" name="pass">

        <label for="">Môn học</label>
        <select name="subject" id="">
            <option value="math">Toán</option>
            <option value="English">Tiếng Anh</option>
            <option value="Code">PHP</option>
        </select>
        <label for="">Hoạt động</label>
        <select name="doing" id="">
            <?php echo $options; ?>
        </select>

        <input type="submit" name="submit" value="Gửi">
    </form>

<?php
    //btvn
    /*
        Tìm hiểu và thực hành với input có type là radio button và
        check box
    */


    if(isset($_POST['submit'])){
        $userName = $_POST['user'];
        echo $userName.'<br>';
        $password = $_POST['pass'];
        echo $password.'<br>';
        $subject = $_POST['subject'];
        echo $subject;
    }
    



?>