<!DOCTYPE html>
<html lang="ko">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="main.css">
  <title>주Money</title>
  <style type="text/css">
    @import url('https://fonts.googleapis.com/css?family=Montserrat:400,800');

    * {
      box-sizing: border-box;
    }

    body {
      background: #f6f5f7;
      display: flex;
      justify-content: center;
      align-items: center;
      flex-direction: column;
      font-family: 'Montserrat', sans-serif;
      height: 100vh;
      margin: -20px 0 50px;
    }

    h1 {
      font-weight: bold;
      margin: 0;
    }

    h2 {
      text-align: center;
    }

    p {
      font-size: 14px;
      font-weight: 100;
      line-height: 20px;
      letter-spacing: 0.5px;
      margin: 20px 0 30px;
    }

    span {
      font-size: 12px;
    }

    a {
      color: #333;
      font-size: 14px;
      text-decoration: none;
      margin: 15px 0;
    }

    button {
      border-radius: 20px;
      border: 1px solid #FF4B2B;
      background-color: #FF4B2B;
      color: #FFFFFF;
      font-size: 12px;
      font-weight: bold;
      padding: 12px 45px;
      letter-spacing: 1px;
      text-transform: uppercase;
      transition: transform 80ms ease-in;
    }

    button:active {
      transform: scale(0.95);
    }

    button:focus {
      outline: none;
    }

    button.ghost {
      background-color: transparent;
      border-color: #FFFFFF;
    }

    form {
      background-color: #FFFFFF;
      display: flex;
      align-items: center;
      justify-content: center;
      flex-direction: column;
      padding: 0 50px;
      height: 100%;
      text-align: center;
    }

    input {
      background-color: #eee;
      border: none;
      padding: 12px 15px;
      margin: 8px 0;
      width: 80%;
      margin-right: 0;
    }

    .container {
      background-color: #fff;
      border-radius: 10px;
      box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25),
        0 10px 10px rgba(0, 0, 0, 0.22);
      position: relative;
      overflow: hidden;
      width: 768px;
      max-width: 100%;
      min-height: 480px;

    }

    .form-container {
      margin-bottom: 50px;
      margin-top: 50px;
    }
  </style>
</head>

<body>
  <h2>입금 내역 작성</h2>
  <div class="container" id="container">
    <div class="form-container input">
    <form method="post">
  <h1>입금 내역</h1><br><br>
  <label>내역</label>
  <input type="text" name="money_history"><br><br><br><br>
  <label>금액</label>
  <input type="number" name="money_price"><br><br><br><br>
  <input type="hidden" name="a1" value="<?php echo $_POST['a1']; ?>">
  <button type="submit" name="submit">저장</button>
</form>

<?php
$con = mysqli_connect("localhost", "soojin", "1234", "test");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $money_history = $_POST["money_history"];
    $money_price = $_POST["money_price"];
    $a1_u = $_POST["a1"];

    $sql = "UPDATE moneyInput SET money_history = '$money_history', money_price = '$money_price' WHERE no = '$a1_u'";

    // 쿼리 실행
    mysqli_query($con, $sql);

    // 성공 메시지 출력 및 페이지 이동
    echo '<script>alert("수정되었습니다.");</script>';
    echo '<script>window.location.href = "money_list.php";</script>';
}
?>
</body>

</html>