<form action="index.php" method ="post">

    <label for="">Môn học</label><br>

    <input type="checkbox" name="subject[]" value ="toan" id=""> Toán <br>
    <input type="checkbox" name="subject[]" value ="van" id="" checked> Văn <br>
    <input type="checkbox" name="subject[]" value ="anh" id=""> Anh <br>

    <label for="">Hoạt động</label> <br>
    <input type="radio" name="action" value="run" id="" checked> Chạy<br>
    <input type="radio" name="action" value="swim" id=""> Bơi<br>
    <input type="radio" name="action" value="football" id="">Đá bóng <br>

    <textarea name="note" id="" cols="30" rows="10"></textarea> <br>

    <input type="submit" name="submit">

</form>

<?php
    if(isset($_POST["submit"])){
        $sub = $_POST["subject"];
        print_r($sub);
        // sử dụng foreach in ra các giá trị có trong mảng
        echo "<br>";
        foreach($sub as $item){
            echo $item."<br>";
        }
        echo "<br>";

        $act = $_POST["action"];
        echo $act."<br>";

        $note = $_POST["note"];
        echo $note;

    }

?>