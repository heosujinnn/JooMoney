<?php
// 로그인 하는 것 마다 insert select delete 다르게 하게 위해
session_start(); // 세션 시작

if (isset($_SESSION['user_id'])) {
    $con = mysqli_connect("localhost", "soojin", "1234", "test");

    $money_history2 = $_POST['history2'];
    $money_price2 = $_POST['price2'];
    $userID = $_SESSION['user_id']; // 세션에 저장된 사용자 ID

    $sql = "INSERT INTO moneyOutput (money_history, money_price, user_id) VALUES ('$money_history2', '$money_price2', '$userID')";

    if ($con->query($sql)) {
        echo '<script>alert("success inserting")</script>';
        echo "<script> location.href = 'money_list.php'; </script>";
    } else {
        echo '<script>alert("fail to insert sql")</script>';
    }

    mysqli_close($con);
} else {
    // 로그인되지 않았을 때의 처리
    echo '로그인이 필요합니다.';
}
?>