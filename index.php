<?php
    # Comment
    
    // echo "chinhpd5";

    /*
        Dòng 1
        Dòng 2
    */

    # In

    echo "WD18401 <br>";
    print "Cách 2 <br>";

    # Biến

    $bien ="abc";
    $_a = '123';
    echo 'biến:' .$_a. '<br>';// sử dụng dấu chấm để nối chuỗi
    echo "biến: $bien <br>"; // sử dụng dấu nháy kép

    //$1abc ="abc"; không được bắt đầu bằng kí tự số hoặc kí tự đặc biệt

    # Number

    # Integer
    $soNguyen = '10000';
    $a = -123;

    var_dump($a); // in ra kiểu dữ liệu và giá trị
    echo "<br>";
    var_dump(is_int($soNguyen)); //is_integer($bien);
    echo "<br>";

    # Float

    $soThuc = 1.2234;
    var_dump($soThuc);
    echo "<br>";
    echo is_float($soThuc);
    echo "<br>";

    # String
    $name = "chinhpd";
    $chuoi = 'Đây là chuỗi 1 \': $name \'<br>';
    $chuoi2 = "Đây là chuỗi 2 \": $name \" <br>";
    // echo $chuoi;
    // echo $chuoi2;
    echo strlen($name); //kiểm tra độ dài của chuỗi
    echo "<br>";
    $newName = str_replace("chuỗi","kí tự",$chuoi); // thay thế từ
    echo $newName;



?>