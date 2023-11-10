<html>
<!-- <meta charset="utf-8"> -->
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

	<?php

		$host = 'localhost';
		$user = 'soojin';
		$pw = '1234';
		$dbName = 'test';
		$mysqli = new mysqli($host, $user, $pw, $dbName);

		$member_email = $_POST['email'];
	    $member_pw_1 = $_POST['pw_1'];
	    $member_name = $_POST['name'];

		$sql = "insert into moneyMember (
                member_name,
				member_email,
				member_pw_1
    		)";
		
		$sql = $sql. "values (
				'$member_name',
				'$member_email',
				'$member_pw_1'
		)";

		if($mysqli->query($sql)){ 
		  echo '<script>alert("success inserting")</script>'; 
		  echo "<script> location.href = 'login.html'; </script>";

		}else{ 
		  echo '<script>alert("fail to insert sql")</script>';
		  echo "<script> location.href = 'login.html'; </script>";

		}

		mysqli_close($mysqli);
	  
	?>
</html>