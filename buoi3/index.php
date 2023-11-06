<?php

    #Array tiếp
   $arr =[1,2,3,4];
   $arr1 = [
        "a" => 1,
        "b" => 2,
        "c" => 3
   ];

   echo "<pre>";
   print_r($arr1);
   echo $arr1['b']; //2

   //array đa chiều
   $arr2 =[
        "a"=>[1,2,3,4],
        "b"=>[5,6,7,8],
        "c"=>[9,10,11,12]
   ];
   echo "<br>";
   echo $arr2['b'][3];
   echo "<pre>";
   print_r($arr2);
   echo "<br>";

   # Câu điều kiện
   $so = 100;
   if($so % 2 == 0 && $so >50){
    echo "số chẵn và lớn hơn 50 : $so";
   }else{
    echo "số lẻ: $so";
   }
   echo "<br>";

   $age =100;

   if($age < 0){
        echo "lỗi";
   }else{
        if($age < 15) echo "Thiếu nhi";
        else if($age >= 15 && $age <23) echo "Thiếu niên";
        else if($age >= 23 && $age <40) echo "thanh niên";
        else if($age >= 40 && $age <60) echo "Trung niên";
        else echo "Người già";
   }
    //c2
    $age = 50;
    if($age <15) echo "thiếu nhi";
    else if($age < 23) echo "thiếu niên";
    else if($age < 40) echo "thanh niên";
    else if($age < 60) echo "trung niên";
    else echo "người già";

    if($age >60) echo "thiếu nhi";
    else if($age >40) echo "thiếu niên";
    else if($age >23) echo "thanh niên";
    else if($age >15) echo "trung niên";
    else echo "người già";
    

    $a=4;
    switch($a){ //==
        case 2:
            echo "Thứ 2";
            break;
        case 3:
            echo 'Thứ 3';
            break;
        case '4':
            echo "thứ 4";
            break;
        case 5:
            echo "Thứ 5";
            break;
        default:
            echo "Cuối tuần";
    }

    $age = 100;
    switch(true){//==
        case $age > 60:
            echo "người già";
            break;
        case $age >40:
            echo "trung niên";
            break;
        //...
        case $age >0:
            echo "thiếu nhi";
            break;
        default:
            echo "lỗi";
    }

    // Hằng số

    const PI = 3.14;
    echo PI;
    define('HANG',[1,2,3]);
    print_r(HANG);

    $chek ='1';
    $result = match ($chek) {
        "1" => "chuỗi 1",
        1 => "số 1",
        2 => "số 2",
        default => "nothing"
    };
    echo "<br>";

    echo $result;


   echo "<br>";
   echo "<br>";
   echo "<br>";
   echo "<br>";
   echo "<br>";
   echo "<br>";
   echo "<br>";

?>