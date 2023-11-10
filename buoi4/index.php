<?php
    #while
    $i=1;
    while($i <= 10){
        echo "i = $i <br>";
        $i++;
    }

    #do ..while
    $a = 1;
    $tong =0;
    do{
        $tong += $a; // $tong = $tong +$a;
        $a++;// tăng giá trị để không bị lặp vô hạn
    }while($a <= 10);
    echo "tổng = $tong <br>";

    # For
    $arr = [1,2,3,4,5,6,7,8,9,10];
    $tong = 0;
    $tichChan = 1;
    for($i =0; $i < count($arr); $i++){
        //echo $arr[$i]." <br>";
        $tong = $tong + $arr[$i];
        if($arr[$i] % 2 ==0){
            $tichChan*= $arr[$i];
        }
    }
    echo $tong."<br>";
    echo $tichChan."<br>";


    $arr2 =[
        "a"=>1,
        "b"=>2,
        "c"=>3,
        "d"=>4,
    ];

    foreach($arr2 as $key => $value){
        echo "key = $key ; value = $value <br>";
    }

    foreach($arr2 as $value){
        echo "value = $value <br>";
    }
    echo "<br>";
    $array1 = [
        "name" => "Phí Đức Chính",
        "age" => 20,
        "khoa" => "Công nghệ thông tin",
        "gt" => true,
        "result" => [6,7.5,8.5,9]
    ];
    $thongTin ='';

    $thongTin .= "Họ và tên: ".$array1["name"]."<br>";
    $thongTin .= "Tuổi: ".$array1["age"]."<br>";
    $thongTin .= "Khoa: ".$array1["khoa"]."<br>";
    $thongTin .= "Giới tính: ".( $array1['gt'] ? "Nam" : "Nữ" )."<br>";
    $thongTin .= "Tổng điểm: ".( array_sum($array1["result"]) )."<br>";
    
    echo $thongTin;



    #Function - Hàm

    function sayHello($name){
        echo "Xin chào $name<br>";
    }

    $myName = "chính";
    sayHello($myName);

    function tinhTong($a, $b){
        return $a + $b;
    }

    $result = tinhTong(3,4);
    echo $result;
    $tinhTich = function ($a, $b) {
        return $a * $b;
    };
    echo $tinhTich(4, 5);
    // BTVN
    /*
        1. viết 1 hàm để kiểm tra 1 số có phải là số nguyên tố hay không?
        2. sử dụng hàm đó để kết hợp với foreach tính tổng các phần tử
        trong 1 array nếu là số nguyên tố
    */

    echo "<br>";
    echo "<br>";
    echo "<br>";
    echo "<br>";

?>