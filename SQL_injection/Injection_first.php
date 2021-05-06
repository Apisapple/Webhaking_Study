<?php
	// include 'dbConnect.php';
	$mysql_hostname = 'localhost';//localhost
    $mysql_username = 'tester';//root 
    $mysql_password = 'test';   
    $mysql_database = 'webhack';//testdb
	$ID = $_POST["user"];
	$passwd = $_POST['pass'];
	$String = $ID.$passwd;
	$sha1result = sha1($String);
	$sha1result = strtoupper($sha1result);
	$connect = mysqli_connect($mysql_hostname, $mysql_username, $mysql_password,$mysql_database);
    mysqli_select_db($connect, $mysql_database);
    if(mysqli_connect_errno($connect)){
        echo "DB is not connect:" . mysqli_connect_error();
        $result = mysqli_connect_errno($connect);
        echo $result;
    }

	$passwd = preg_replace("/[\s\t\;\'\"\=\-\-]+/","", $passwd); // 공백이나 탭 제거, 특수문자 제거(",',;,=,--)
	$passwd = strtoupper($passwd);
	if (strpos($passwd,"OR") or strpos($passwd,"LIKE") or strpos($passwd,"NOT") or strpos($passwd,"IN") or strpos($passwd,"UNION")){
		echo "<script>alert('Do not try SQL injection');</script>";
		$passwd = "";
	};
	$sql = "select * from first where Password='".$passwd."'";
	if(!$result = mysqli_query($connect, $sql)){
		// echo("쿼리오류 발생: " . mysqli_error($connect));
	}
	while($info = mysqli_fetch_array($result)){
		if($info['user'] == 'root'){
			echo "<script>alert('Congratulations!!!');</script>";
		}
	}
	mysqli_close($connect);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>SQL Injection First</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-50">
				<form class="login100-form validate-form" method = "post" action="Injection_first.php">
					<span class="login100-form-title p-b-33">
						Account Login
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="user" placeholder="ID">
						<span class="focus-input100-1"></span>
						<span class="focus-input100-2"></span>
					</div>

					<div class="wrap-input100 rs1 validate-input" data-validate="Password is required">
						<input class="input100" type="password" name="pass" placeholder="Password">
						<span class="focus-input100-1"></span>
						<span class="focus-input100-2"></span>
					</div>

					<div class="container-login100-form-btn m-t-20">
						<button class="login100-form-btn">
							Sign in
						</button>
					</div>

					<div class="text-center p-t-45 p-b-4">
						<span class="txt1">
							Forgot
						</span>

						<a href="#" class="txt2 hov1">
							Username / Password?
						</a>
					</div>

					<div class="text-center">
						<span class="txt1">
							Create an account?
						</span>

						<a href="#" class="txt2 hov1">
							Sign up
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	

	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>