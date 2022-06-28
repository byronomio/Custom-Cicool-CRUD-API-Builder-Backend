<?php
    $host='localhost';
    $username='byronsde_byron';
    $password='GOOgle86!!';
    $dbname = "byronsde_productmanagement";
    $conn=mysqli_connect($host,$username,$password,"$dbname");
    if(!$conn)
        {
          die('Could not Connect MySql Server:' .mysql_error());
        }
?>