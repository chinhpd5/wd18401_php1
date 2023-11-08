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
    echo "<br>";
    echo "<br>";
    echo "<br>";
    echo "<br>";

?>