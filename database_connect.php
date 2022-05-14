<?php

$db_hostname="127.0.0.1";
$db_username="root";
$db_password="";
$db_database="pg_life";
$conn=mysqli_connect($db_hostname,$db_username,$db_password,$db_database);
if(!$conn){
    $response=array("success"=>false,"message"=>"please Check your internet");
}










?>