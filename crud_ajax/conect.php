<?php
function conect(){
    $host="localhost:3307";
    $user="root";
    $pass="";
    $db="crud_php";
    $connect= mysqli_connect($host,$user,$pass);
    mysqli_select_db($connect,$db);
    return $connect;
}
?>