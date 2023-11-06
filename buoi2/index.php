<?php
    # Toán tử:
    /*
        1. Toán tử số học: +,-,*,/,**,%,...
        2. Toán tử gắn: =, +=, -=,...
        3. Toán tử so sánh: ==, !=, >=, <= ,>,<,....
        4. Toán logic: && , ||, !
    */


    # toán tử so sánh ===
    var_dump(1 === '1'); // ss về giá trị và kiểu dữ liệu
    echo '<br>';
    # Toán tử tăng giảm ++ --

    $x = 3;
    $y= 4;
    echo ++$x * $y-- + $x++ * --$y;
    echo "<br>";
    //echo ++$x; //4 // tăng 1 giá trị rồi mới in 
    // echo $x++; //3 // in xong mới tăng 1 giá trị
    // echo '<br>'.$x; //4

    # Toán tử 3 ngôi

    $check = false;

    $result = ($check == true) ? "Đúng" : "Sai";

    // if($check==true){
    //     $result= "Đúng";
    // }else{
    //     $result= "Sai";
    // }

    echo $result.'<br>';

    $a = "abc";
    $$a ="đẹp trai";

    // echo $abc;

    # Ép kiểu

    $a = '123';

    $b= (int) $a;//ép kiểu về số nguyên

    var_dump($b);
    is_int($b);
    echo "<br>";

    $c = (float) $a; //ép kiểu về số thực

    $d = (boolean) $a; //ép kiểu về Boolean

    $e = (string) $c; // ép kiểu về chuỗi

    #Array - Mảng

    $array = array(1,2,3,4);

    //print_r($array);// sử dụng print_r() để in mảng;
        
    $arr = ['a','b','c','d'];// khuyến khích

   

    //echo $arr[2];   
    $arr[2] = 'cc'; // thay đổi giá trị

    // Thêm phần tử vào mảng
    $arr[] = "e";    
    array_push($arr,'f',"g"); // thêm 1 hoặc nhiều phẩn tử vào cuối mảng
    array_unshift($arr,"0");// thêm 1 hoặc nhiều phần tử vào đầu mảng
    array_splice($arr,3,0,"chính");// thêm 1 hoặc nhiều phần tử vào vị trí chỉ định

    // Xóa phần tử trong mảng

    unset($arr[3]);// xóa vị trí chỉ định
    array_pop($arr);// xóa phần tử cuối cùng
    array_shift($arr);// xóa phần tử đầu tiên của mảng
    array_splice($arr,3,2,"abc");
    // array_slice()
    echo "<pre>";
        print_r($arr);
    echo "</pre>";
?>