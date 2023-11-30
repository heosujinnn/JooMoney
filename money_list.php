<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">

    <title>주Money</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .actions {
            display: flex;
            justify-content: flex-end;
            align-items: center;
        }

 

        button {
            border-radius: 20px;
            border: 1px solid #FF4B2B;
            background-color: #FF4B2B;
            color: #FFFFFF;
            font-size: 12px;
            font-weight: bold;
            letter-spacing: 1px;
            margin-left: 2px; 
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

        .button-container {
            display: flex;
            align-items: center;
            justify-content: flex-end;
        }
    </style>
</head>

<body>
    <h2>Joo Money 입출금 내역 리스트</h2>
    <div class="container" id="container">
        <div class="form-container input">
            <form method="post" action="money_list.php">
                <div style="overflow-y: scroll; max-height: 500px;">
                <table>
                        <thead>
                            <tr>
                                <th>입금</th>
                                <th>내역</th>
                                <th>가격</th>
                                <th>버튼</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                           session_start(); // 세션 시작
                            
                           if (isset($_SESSION['user_id'])) {
                               $con = mysqli_connect("localhost", "soojin", "1234", "test");
                               $userID = $_SESSION['user_id'];
                               $sql = "SELECT * FROM moneyInput WHERE user_id = '$userID'";
                               $result = mysqli_query($con, $sql);
                               while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>";
                                echo "<td>";
                                echo "<form method='post'>";
                                echo "입금";
                                echo "</form>";
                                echo "</td>";
                                echo "<td>" . $row['money_history'] . "</td>";
                                echo "<td>+" . $row['money_price'] . "</td>";
                                echo "<td>";
                                echo "<div class='button-container'>";
                                echo "<a href='input.html'><button type='button'>수정</button></a>";
                                echo "<form method='post' action='money_delete.php'>";
                                echo "<button type='submit' name='b1' value='" . $row['no'] . "'>삭제</button>";
                                echo "</form>";
                                echo "</td>";
                                echo "</tr>";
                               }
                           }
                           mysqli_close($con);
                            
                            ?>
                        </tbody>
                    </table>
                    <table>
                        <thead>
                            <tr>
                                <th>지출</th>
                                <th>내역</th>
                                <th>가격</th>
                                <th>버튼</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                           
                           if (isset($_SESSION['user_id'])) {
                            $con = mysqli_connect("localhost", "soojin", "1234", "test");
                            $userID = $_SESSION['user_id'];
                            $sql = "SELECT * FROM moneyOutput WHERE user_id = '$userID'";
                            $result = mysqli_query($con, $sql);
                            while ($row = mysqli_fetch_assoc($result)) {
                        
                                echo "<tr>";
                                echo "<td>";
                                echo "<form method='post'>";
                                echo "지출";
                                echo "</form>";
                                echo "</td>";
                                echo "<td>" . $row['money_history'] . "</td>";
                                echo "<td>-" . $row['money_price'] . "</td>";
                                echo "<td>";
                                echo "<div class='button-container'>";
                                echo "<a href='input.html'><button type='button'>수정</button></a>";
                                echo "<form method='post' action='money_delete.php'>";
                                echo "<button type='submit' name='b2' value='" . $row['no'] . "'>삭제</button>";
                                echo "</form>";
                                echo "</td>";
                                echo "</tr>";
                            }
                        }
                        mysqli_close($con);
                            ?>
                        </tbody>
                    </table>
                </div>
            </form>
        </div>
        <button id="inout_btn" style="background-color: #3366ff; 
            color: white; 
            padding: 10px 20px; 
            border: none; 
            text-align: center; 
            text-decoration: none; 
            display: block; 
            margin: 0 auto; 
            font-size: 16px; 
            cursor: pointer; 
            border-radius: 8px;">
            입금/지출 입력하기
        </button><br>
    </div>

</body>
<script>
    document.getElementById("inout_btn").onclick = function () {
        window.location.href = "main.html";
    };
</script>

</html>
