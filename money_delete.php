<?php

$con = mysqli_connect("localhost", "soojin", "1234", "test");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $b1_d = $_POST["b1"];

    $sql = "DELETE FROM moneyInput WHERE no=$b1_d";
    mysqli_query($con, $sql);

    $b2_d = $_POST["b2"];

    $sql = "DELETE FROM moneyOutput WHERE no=$b2_d";
    mysqli_query($con, $sql);

    while ($row = mysqli_fetch_assoc($result)) {
        echo $row['money_history'] . ". ";
        echo $row['money_price'] . " ";
    }
    // 삭제 후 화면 이동
    echo '<script>alert("삭제되었습니다.");</script>';
    echo '<script>window.location.href = "money_list.php";</script>';
}
?>