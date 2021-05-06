<?php
    $mysql_hostname = 'localhost';//localhost
    $mysql_username = 'tester';//root 
    $mysql_password = 'test';
    $mysql_database = 'webhack';//testdb
    $ID = $_POST["user"];
    $passwd = $_POST['pass'];
    // echo $ID."<br/>";
    // echo $passwd."<br/>";
    session_start();
    $String = $ID.$passwd;
    $sha1 = sha1($String);
    $sha1 = strtoupper($sha1);
    $_SESSION['USERINFO'] = $sha1;
    if(!isset($_COOKIE["Times"])){
        setcookie("Times",0,time() + 1800,'/');
    }
    if(!isset($_COOKIE["USERINFO"])){
        setcookie("USERINFO", $sha1, time()+1800,'/');
    }
    $Times = $_COOKIE["Times"];
    $TImes = $Times + 1;
    if($Times > 5){
        // echo "<script>alert('You are so many try');</script>";
        print "<script language=javascript> alert('You are so many try!!'); history.back(-2); </script>";
        // Header("Location:./Injection_Second.php");
    }else{
        setcookie("Times",$TImes,time()+1800,'/');
    }
    $connect = mysqli_connect($mysql_hostname, $mysql_username, $mysql_password,$mysql_database);
    mysqli_select_db($connect, $mysql_database);
    if(mysqli_connect_errno($connect)){
        echo "DB is not connect:" . mysqli_connect_error();
        $result = mysqli_connect_errno($connect);
        echo $result;
    }
    $sql = "select * from second where sha1='".$sha1."'";
    if(!$result = mysqli_query($connect, $sql)){
		echo("쿼리오류 발생: " . mysqli_error($connect));
	}else {
        
            while($info = mysqli_fetch_array($result)){
                if($info['user'] == 'root'){
                    echo "<script>alert('Congratuation!!!');</script>";
                }else{
                    echo "<script>alert('you are user!');</script>";
                    setcookie("USERINFO", $sha1, time()+1800,'/');
                    Header("Location:./main.php"); 
                }
            }   
        echo "<script>history.back();</script>";
    }
?>