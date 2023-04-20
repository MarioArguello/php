<?php
function connection(){
    $host = "localhost:3307";
    $user = "root";
    $pass = "";
    $bd = "crud_php";
    $connect=mysqli_connect($host, $user, $pass);
    mysqli_select_db($connect, $bd);
    return $connect;

}
?>