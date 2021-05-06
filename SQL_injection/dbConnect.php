<?php
    #mysql connect

    $mysql_hostname = 'localhost';//localhost
    $mysql_username = 'tester';//root 
    $mysql_password = 'test';   
    $mysql_database = 'webhack';//testdb
    $mysql_table = 'table이름';    
    $mysql_col1 = 'idx';    
    $mysql_col2 = 'name';    
    $mysql_col3 = 'age';    
    $mysql_port = '3306';
    
    $sql = "SELECT * FROM ".$mysql_table;   
    $connect = mysqli_connect($mysql_hostname, $mysql_username, $mysql_password,$mysql_database);
    mysqli_select_db($connect, $mysql_database);
    // echo $connect;
    if(mysqli_connect_errno($connect)){
        echo "DB is not connect:" . mysqli_connect_error();
        $result = mysqli_connect_errno($connect);
        echo $result;
    }
    mysqli_close($connect);
?>