<?php
$host = 'localhost';
$user = 'soojin';
$pw = '1234';
$dbName = 'test';
$con = new mysqli($host, $user, $pw, $dbName);

$id = $_POST['id']; // 아이디
$pw = $_POST['pw']; // 패스워드

$query = "select * from moneyMember where member_email='$id' and member_pw_1='$pw'";

$result = mysqli_query($con, $query);
$row = mysqli_fetch_array($result);

if (empty($id) || empty($pw)) {
   // 아이디 또는 비밀번호가 비어있을 경우
   echo "<script> alert('아이디와 비밀번호를 모두 입력하세요.'); </script>";
   echo "<script> location.href = 'login.html'; </script>";
} else {
   $query = "SELECT * FROM moneyMember WHERE member_email='$id' AND member_pw_1='$pw'";
   $result = mysqli_query($con, $query);
   $row = mysqli_fetch_array($result);

   if ($row) {
       // 로그인 성공
       echo "<script> alert('로그인 성공'); </script>";
       echo "<script> location.href = 'main.html'; </script>";
   } else {
       // 로그인 실패
       echo "<script> alert('로그인 실패'); </script>";
       echo "<script> location.href = 'login.html'; </script>";
   }
}





