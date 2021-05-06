<?php
    $sha1 = $_COOKIE['USERINFO'];
    $mysql_hostname = 'localhost';//localhost
    $mysql_username = 'tester';//root 
    $mysql_password = 'test';
    $mysql_database = 'webhack';//testdb
    session_start();

    $connect = mysqli_connect($mysql_hostname, $mysql_username, $mysql_password,$mysql_database);
    mysqli_select_db($connect, $mysql_database);
    if(mysqli_connect_errno($connect)){
        echo "DB is not connect:" . mysqli_connect_error();
        $result = mysqli_connect_errno($connect);
        echo $result;
    }
    $sha1 = $_SESSION['USERINFO'];
    setcookie("USERINFO", $sha1, time()+1800,'/');
    $sql = "select * from second where sha1='".$sha1."'";
    // echo $sql;
    if(!$result = mysqli_query($connect, $sql)){
		echo("쿼리오류 발생: " . mysqli_error($connect));
	}else {
        
            while($info = mysqli_fetch_array($result)){
                $user = $info['user']; 
                $password = $info['pass'];
                $sex = $info['sex'];
            }
    }
    $location = "./Edit.html";
    echo "Hi ~ !".$user."</br>";
    // echo "Your password is ".$password."</br>";
    echo "If you want edit your information </br>";
    echo "Click this"."<a href=".$location.">EDIT</a>"."";
?>