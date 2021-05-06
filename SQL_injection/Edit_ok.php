<?php
    $mysql_hostname = 'localhost';//localhost
    $mysql_username = 'tester';//root 
    $mysql_password = 'test';
    $mysql_database = 'webhack';//testdb
    $ID = $_POST["user"];
    $passwd = $_POST['pass'];
    $String = $ID.$passwd;
    $sha1 = sha1($String);
    $cookie_sha1 = $_COOKIE['USERINFO'];

    $connect = mysqli_connect($mysql_hostname, $mysql_username, $mysql_password,$mysql_database);
    mysqli_select_db($connect, $mysql_database);


    $sql_query="select user from second where sha1='".$cookie_sha1."'";


    $sql_query = "update second set user='$id',pass='$passwd',sha1='$sha1' where sha1 ='$cookie_sha1'";

    // database_connect
    if(mysqli_connect_errno($connect)){
        echo "DB is not connect:" . mysqli_connect_error();
        $result = mysqli_connect_errno($connect);
        echo $result;
    }
    if(!$result = mysqli_query($connect, $sql_query)){
        echo("
            <script>alert('SQL Error');
            document.location='/web_basic.php';
            </script>
        ");
    }


?>